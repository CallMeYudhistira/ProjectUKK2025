<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    use HasFactory;

    protected $primaryKey = 'submission_id';
    protected $fillable = ['user_id', 'vehicle_id', 'period_id', 'submission_date', 'total_price', 'monthly_installments', 'identity_card', 'status'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function vehicle() {
        return $this->belongsTo(Vehicle::class, 'vehicle_id', 'vehicle_id');
    }
    public function period() {
        return $this->belongsTo(Period::class, 'period_id', 'period_id');
    }
    public function payment() {
        return $this->hasMany(Payment::class, 'submission_id', 'submission_id');
    }
}
