<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // List Purchases
    public function index(Request $request)
    {
        $query = Purchase::with('supplier');

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'reference_no',
                    'like',
                    "%{$search}%"
                )
                ->orWhereHas('supplier', function ($supplierQuery) use ($search) {

                    $supplierQuery->where(
                        'name',
                        'like',
                        "%{$search}%"
                    );

                });

            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        // Payment status filter
        if ($request->filled('payment_status')) {
            $query->where(
                'payment_status',
                $request->payment_status
            );
        }

        $purchases = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'purchases.index',
            compact('purchases')
        );
    }


    // Add Purchase Form
    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();

        return view(
            'purchases.create',
            compact('suppliers')
        );
    }


    // Save Purchase
    public function store(Request $request)
    {
        $validated = $request->validate([

            'supplier_id' => 'required|exists:suppliers,id',

            'purchase_date' => 'required|date',

            'status' => 'required|string|max:50',

            'payment_status' => 'required|string|max:50',

            'payment_due' => 'nullable|numeric|min:0',

            'notes' => 'nullable|string',

            'items' => 'required|array|min:1',

            'items.*.product_name' =>
                'required|string|max:255',

            'items.*.quantity' =>
                'required|integer|min:1',

            'items.*.unit_cost' =>
                'required|numeric|min:0',
        ]);


        // Calculate grand total

        $grandTotal = 0;

        foreach ($validated['items'] as $item) {

            $grandTotal +=
                $item['quantity'] *
                $item['unit_cost'];
        }


        // Create purchase

        $purchase = Purchase::create([

            'reference_no' =>
                'PUR-' . date('YmdHis'),

            'supplier_id' =>
                $validated['supplier_id'],

            'purchase_date' =>
                $validated['purchase_date'],

            'status' =>
                $validated['status'],

            'payment_status' =>
                $validated['payment_status'],

            'grand_total' =>
                $grandTotal,

            'payment_due' =>
                $validated['payment_due'] ?? 0,

            'notes' =>
                $validated['notes'] ?? null,
        ]);


        // Create purchase items

        foreach ($validated['items'] as $item) {

            $purchase->items()->create([

                'product_name' =>
                    $item['product_name'],

                'quantity' =>
                    $item['quantity'],

                'unit_cost' =>
                    $item['unit_cost'],

                'subtotal' =>
                    $item['quantity'] *
                    $item['unit_cost'],
            ]);
        }


        return redirect()
            ->route('purchases.index')
            ->with(
                'success',
                'Purchase added successfully.'
            );
    }


    // View Purchase
    public function show(Purchase $purchase)
    {
        $purchase->load(
            'supplier',
            'items'
        );

        return view(
            'purchases.show',
            compact('purchase')
        );
    }


    // Edit Purchase
    public function edit(Purchase $purchase)
    {
        $suppliers =
            Supplier::orderBy('name')->get();

        return view(
            'purchases.edit',
            compact(
                'purchase',
                'suppliers'
            )
        );
    }


    // Update Purchase
    public function update(
    Request $request,
    Purchase $purchase
) {
    $validated = $request->validate([

        'supplier_id' =>
            'required|exists:suppliers,id',

        'purchase_date' =>
            'required|date',

        'status' =>
            'required|string|max:50',

        'payment_status' =>
            'required|string|max:50',

        'payment_due' =>
            'nullable|numeric|min:0',

        'notes' =>
            'nullable|string',

        'items' =>
            'required|array|min:1',

        'items.*.product_name' =>
            'required|string|max:255',

        'items.*.quantity' =>
            'required|integer|min:1',

        'items.*.unit_cost' =>
            'required|numeric|min:0',
    ]);


    // Calculate total

    $grandTotal = 0;

    foreach ($validated['items'] as $item) {

        $grandTotal +=
            $item['quantity'] *
            $item['unit_cost'];
    }


    // Update purchase

    $purchase->update([

        'supplier_id' =>
            $validated['supplier_id'],

        'purchase_date' =>
            $validated['purchase_date'],

        'status' =>
            $validated['status'],

        'payment_status' =>
            $validated['payment_status'],

        'grand_total' =>
            $grandTotal,

        'payment_due' =>
            $validated['payment_due'] ?? 0,

        'notes' =>
            $validated['notes'] ?? null,
    ]);


    // Remove old items

    $purchase->items()->delete();


    // Add updated items

    foreach ($validated['items'] as $item) {

        $purchase->items()->create([

            'product_name' =>
                $item['product_name'],

            'quantity' =>
                $item['quantity'],

            'unit_cost' =>
                $item['unit_cost'],

            'subtotal' =>
                $item['quantity'] *
                $item['unit_cost'],
        ]);
    }


    return redirect()
        ->route('purchases.index')
        ->with(
            'success',
            'Purchase updated successfully.'
        );
}


    // Delete Purchase
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();

        return redirect()
            ->route('purchases.index')
            ->with(
                'success',
                'Purchase deleted successfully.'
            );
    }
}