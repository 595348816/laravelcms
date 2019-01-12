<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VisaOrder extends Model
{
    protected $fillable = [
        'type', 'money', 'remark','pay_time'
    ];
}
