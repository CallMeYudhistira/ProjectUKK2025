<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';
    protected $fillable = ['submission_id', 'payment_date', 'amount_of_paid', 'status', 'remaining_debt', 'note'];

    public function submission() {
        return $this->belongsTo(Submission::class, 'submission_id', 'submission_id');
    }
}
