<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SentCareerApplicationMail;
use App\Models\CareerApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class CareerApplicationController extends Controller
{
    public function store(Request $request)
    {
        try {          

            
            // Validate the request data
            $data = $request->validate([
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50'],
                'phone' => ['required', 'string', 'max:20'],
                'cover_letter' => ['nullable', 'string', 'max:200'],                
                'job_role' => ['required', 'string', 'max:50'],
            ]);

            // Check if the file is present and handle the upload
            if ($request->hasFile('upload_attachment')) {
                $file = $request->file('upload_attachment');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('uploads', $fileName, 'public');
                $data['file_name'] = $fileName;
                $data['file_path'] = '/storage/' . $filePath;        
                Log::info($data['file_name']);
            }
            

            // Save to database
            CareerApplication::create($data);

            // Send email
            Mail::to(config('custom.mail_to'))->send(new SentCareerApplicationMail($data));

            Log::info('Career application submitted successfully', ['data' => $data]);

            return response()->json([
                'message' => 'Your message has been submitted successfully.',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error submitting career application', ['errors' => $e->errors()]);
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error submitting career application', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'There was an error submitting your request.',
            ], 500);
        }
    }
}
