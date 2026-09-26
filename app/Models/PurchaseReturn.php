<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseReturn extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id',
        'reference_no',
        'return_date',
        'quantity',
        'amount',
        'reason',
        'status',
    ];


    protected $casts = [
        'return_date' => 'date',
        'quantity' => 'integer',
        'amount' => 'decimal:2',
    ];


    public function purchase()
    {
        return $this->belongsTo(
            Purchase::class
        );
    }
}