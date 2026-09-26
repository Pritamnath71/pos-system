<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseFile extends Model
{
    use HasFactory;

    protected $fillable = [
    'purchase_id',
    'original_name',
    'file_name',
    'file_path',
    'file_type',
    'file_size',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }
}