<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis',
        'user_id',
        'payment_date',
        'month_paid',
        'year_paid',
        'total',
    ];

    public function student() {
        return $this->belongsTo(Student::class, 'nis', 'nis');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
