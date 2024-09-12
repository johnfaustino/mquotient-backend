<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\DemoRequest; // Make sure to import the DemoRequest model
use App\Mail\SentGetDemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class DemoRequestController extends Controller
{
    public function store(Request $request)
    {
        try {
            $baseRules = [
                'company' => ['required', 'string', 'max:50'],
                'first_name' => ['required', 'string', 'max:50'],
                'last_name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50'],
                'phone' => ['required', 'string', 'max:20'],
                'demo_type' => ['required', 'string', 'max:20'],
                'interaction_reason' => ['required', 'string', 'max:200'],
            ];
           
            $mortgageRules = [
                'mortgage_business_function' => ['required_if:demo_type,mortgage', 'nullable', 'string', 'max:50'],
                'mortgage_los' => ['required_if:demo_type,mortgage', 'nullable', 'string', 'max:50'],
                'mortgage_monthly_volume' => ['required_if:demo_type,mortgage', 'nullable', 'string', 'max:50'],
                'mortgage_service' => ['required_if:demo_type,mortgage', 'nullable', 'string', 'max:50'],
            ];

            $insuranceRules = [
                'insurance_company_type' => ['required_if:demo_type,insurance', 'nullable', 'string', 'max:50'],
                'insurance_business_role' => ['required_if:demo_type,insurance', 'nullable', 'string', 'max:50'],
                'insurance_employee_count' => ['required_if:demo_type,insurance', 'nullable', 'string', 'max:50'],
                'insurance_service' => ['required_if:demo_type,insurance', 'nullable', 'string', 'max:50'],
            ];
            
            $rules = array_merge($baseRules, $mortgageRules, $insuranceRules);
            $data = $request->validate($rules);

            // Save to database
            DemoRequest::create($data);

            // Send email
            Mail::to('johnbfaustino@gmail.com')->send(new SentGetDemoMail($data));

            Log::info('Demo request submitted successfully', ['data' => $data]);

            return response()->json([
                'message' => 'Your message has been submitted successfully.',
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error submitting demo request', ['errors' => $e->errors()]);
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Error submitting demo request', ['error' => $e->getMessage()]);
            return response()->json([
                'message' => 'There was an error submitting your request.',
            ], 500);
        }
    }
}
