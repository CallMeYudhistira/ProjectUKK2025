<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'starting_price', 'highest_price', 'winner_id', 'admin_id', 'status'];

    public function auction_detail()
    {
        return $this->hasMany(AuctionDetail::class)->orderBy('created_at', 'desc');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id', 'id');
    }

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id', 'id');
    }

    public function highestBid()
    {
        return $this->hasOne(AuctionDetail::class)
            ->orderByDesc('bid_price');
    }
}
