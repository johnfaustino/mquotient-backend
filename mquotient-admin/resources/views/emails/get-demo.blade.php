
<!DOCTYPE html>
<html>
<head>
    <title>Demo Request</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .container {
            width: 100%;
            padding: 5
            \]0px;
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
        
        }
        h1 {
            color: #333;
            font-size: 24px;
            border-bottom: 2px solid #eaeaea;
            padding-bottom: 10px;
        }
        .details {
            margin: 20px 0;
        }
        .details p {
            margin: 8px 0;
        }
        .details strong {
            display: inline-block;
            width: 150px;
            color: #555;
            
        }
        .footer {
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #eaeaea;
            color: #777;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Demo Request Details</h1>
        <div class="details">
            <p><strong>Company:</strong> {{ $data['company'] }}</p>
            <p><strong>First Name:</strong> {{ $data['first_name'] }}</p>
            <p><strong>Last Name:</strong> {{ $data['last_name'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Phone:</strong> {{ $data['phone'] }}</p>
            <p><strong>Demo Type:</strong> {{ $data['demo_type'] }}</p>
            <p><strong>Interaction Reason:</strong> {{ $data['interaction_reason'] }}</p>

            @if($data['demo_type'] === 'mortgage')
                <h2>Mortgage Details</h2>
                <p><strong>Business Function:</strong> {!! $data['mortgage_business_function'] !!}</p>
                <p><strong>LOS:</strong> {!! $data['mortgage_los'] !!}</p>
                <p><strong>Monthly Volume:</strong> {!! $data['mortgage_monthly_volume'] !!}</p>
                <p><strong>Service:</strong> {!! $data['mortgage_service'] !!}</p>
            @endif

            @if($data['demo_type'] === 'insurance')
                <h2>Insurance Details</h2>
                <p><strong>Company Type:</strong> {!! $data['insurance_company_type'] !!}</p>
                <p><strong>Business Role:</strong> {!! $data['insurance_business_role'] !!}</p>
                <p><strong>Employee Count:</strong> {!! $data['insurance_employee_count'] !!}</p>
                <p><strong>Service:</strong> {!! $data['insurance_service'] !!}</p>
            @endif
        </div>
        <div class="footer">
            <p>Thank you for your attention to this request.</p>
        </div>
    </div>
</body>
</html>

