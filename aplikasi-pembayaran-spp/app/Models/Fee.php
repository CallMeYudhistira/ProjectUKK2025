<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'amount',
    ];

    public function student() {
        return $this->hasMany(Student::class, 'grade_id', 'id');
    }
}
