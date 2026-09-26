<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_no',
        'supplier_id',
        'purchase_date',
        'status',
        'payment_status',
        'grand_total',
        'payment_due',
        'notes',
    ];

    protected $casts = [
        'purchase_date' => 'date',
        'grand_total' => 'decimal:2',
        'payment_due' => 'decimal:2',
    ];

    public function supplier()
{
    return $this->belongsTo(Supplier::class);
}

public function items()
{
    return $this->hasMany(PurchaseItem::class);
}

public function files()
{
    return $this->hasMany(PurchaseFile::class);
}
public function returns()
{
    return $this->hasMany(
        PurchaseReturn::class
    );
}
}