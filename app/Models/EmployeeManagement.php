<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeManagement extends Model
{
    use HasFactory;
    protected $table = 'employee_management';
    public $timestamps = false;
}
