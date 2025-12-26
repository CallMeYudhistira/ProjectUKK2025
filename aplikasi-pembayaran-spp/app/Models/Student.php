<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'nis',
        'name',
        'address',
        'phone_number',
        'grade_id',
        'fee_id',
    ];

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function fee() {
        return $this->belongsTo(Fee::class, 'fee_id', 'id');
    }

    public function payment() {
        return $this->hasMany(Payment::class, 'nis', 'nis');
    }
}
