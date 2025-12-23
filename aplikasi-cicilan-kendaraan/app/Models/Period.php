<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $primaryKey = 'period_id';
    protected $fillable = ['time_period', 'interest'];

    public function submission() {
        return $this->hasMany(Submission::class, 'period_id', 'period_id');
    }
}
