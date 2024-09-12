<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemoRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'company',
        'first_name',
        'last_name',
        'email',
        'phone',
        'demo_type',
        'interaction_reason',
        'mortgage_business_function',
        'mortgage_los',
        'mortgage_monthly_volume',
        'mortgage_service',
        'insurance_company_type',
        'insurance_business_role',
        'insurance_employee_count',
        'insurance_service',
    ];
}
