<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseReturn;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    /**
     * Display purchase returns.
     */
    public function index(Request $request)
    {
        $query = PurchaseReturn::with([
            'purchase.supplier'
        ]);

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where(
                    'reference_no',
                    'like',
                    '%' . $search . '%'
                )

                ->orWhereHas('purchase', function ($purchaseQuery) use ($search) {

                    $purchaseQuery->where(
                        'reference_no',
                        'like',
                        '%' . $search . '%'
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

        $returns = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view(
            'purchase-returns.index',
            compact('returns')
        );
    }


    /**
     * Show create form.
     */
    public function create()
    {
        $purchases = Purchase::with('supplier')
            ->latest()
            ->get();

        return view(
            'purchase-returns.create',
            compact('purchases')
        );
    }


    /**
     * Store purchase return.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'purchase_id' => [
                'required',
                'exists:purchases,id'
            ],

            'return_date' => [
                'required',
                'date'
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1'
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'reason' => [
                'nullable',
                'string'
            ],

            'status' => [
                'required',
                'string',
                'max:50'
            ],

        ]);


        // Generate return reference number
        $referenceNo =
            'RET-' .
            now()->format('YmdHis') .
            '-' .
            random_int(100, 999);


        PurchaseReturn::create([

            'purchase_id' => $validated['purchase_id'],

            'reference_no' => $referenceNo,

            'return_date' => $validated['return_date'],

            'quantity' => $validated['quantity'],

            'amount' => $validated['amount'],

            'reason' => $validated['reason'] ?? null,

            'status' => $validated['status'],

        ]);


        return redirect()
            ->route('purchase-returns.index')
            ->with(
                'success',
                'Purchase return created successfully.'
            );
    }


    /**
     * Display one purchase return.
     */
    public function show(PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->load([
            'purchase.supplier'
        ]);

        return view(
            'purchase-returns.show',
            compact('purchaseReturn')
        );
    }


    /**
     * Show edit form.
     */
    public function edit(PurchaseReturn $purchaseReturn)
    {
        $purchases = Purchase::with('supplier')
            ->latest()
            ->get();

        return view(
            'purchase-returns.edit',
            compact(
                'purchaseReturn',
                'purchases'
            )
        );
    }


    /**
     * Update purchase return.
     */
    public function update(
        Request $request,
        PurchaseReturn $purchaseReturn
    ) {
        $validated = $request->validate([

            'purchase_id' => [
                'required',
                'exists:purchases,id'
            ],

            'return_date' => [
                'required',
                'date'
            ],

            'quantity' => [
                'required',
                'integer',
                'min:1'
            ],

            'amount' => [
                'required',
                'numeric',
                'min:0'
            ],

            'reason' => [
                'nullable',
                'string'
            ],

            'status' => [
                'required',
                'string',
                'max:50'
            ],

        ]);


        $purchaseReturn->update($validated);


        return redirect()
            ->route('purchase-returns.index')
            ->with(
                'success',
                'Purchase return updated successfully.'
            );
    }


    /**
     * Delete purchase return.
     */
    public function destroy(PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->delete();

        return redirect()
            ->route('purchase-returns.index')
            ->with(
                'success',
                'Purchase return deleted successfully.'
            );
    }
}