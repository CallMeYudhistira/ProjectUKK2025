<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $primaryKey = 'vehicle_id';
    protected $fillable = ['pict', 'vehicle_name', 'brand', 'type', 'price', 'production_year'];

    public function submission() {
        return $this->hasMany(Submission::class, 'vehicle_id', 'vehicle_id');
    }
}
