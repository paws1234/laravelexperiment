<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['amount', 'user_id', 'status'];
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
