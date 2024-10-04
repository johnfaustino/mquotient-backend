<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactUs; // Import the ContactUs model
use App\Mail\SentContactUsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactUsController extends Controller
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
                'message' => ['required', 'string', 'max:200'],
            ]);

            // Save to database
            ContactUs::create($data);

            // Send email
            Mail::to(config('custom.mail_to') )->send(new SentContactUsMail($data));

            Log::info('Contact us message submitted successfully', ['data' => $data]);

            return response()->json([
                'message' => 'Your message has been submitted successfully.' ,
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error submitting contact us message', ['errors' => $e->errors()]);
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error submitting contact us message', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'There was an error submitting your request.',
            ], 500);
        }
    }
}
