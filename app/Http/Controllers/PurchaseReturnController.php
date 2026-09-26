<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PurchaseReturn;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    public function index(Request $request)
    {
        $query = PurchaseReturn::with('purchase.supplier');

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('reference_no', 'like', "%{$search}%")

                  ->orWhereHas('purchase', function ($purchaseQuery) use ($search) {

                      $purchaseQuery
                          ->where('reference_no', 'like', "%{$search}%");

                  });

            });
        }


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
            'purchase_returns.index',
            compact('returns')
        );
    }


    public function create()
    {
        $purchases = Purchase::with('supplier')
            ->latest()
            ->get();

        return view(
            'purchase_returns.create',
            compact('purchases')
        );
    }


    public function store(Request $request)
    {
        // Next step
    }


    public function show(PurchaseReturn $purchaseReturn)
    {
        $purchaseReturn->load(
            'purchase.supplier'
        );

        return view(
            'purchase_returns.show',
            compact('purchaseReturn')
        );
    }


    public function edit(PurchaseReturn $purchaseReturn)
    {
        $purchases = Purchase::with('supplier')
            ->latest()
            ->get();

        return view(
            'purchase_returns.edit',
            compact(
                'purchaseReturn',
                'purchases'
            )
        );
    }


    public function update(
        Request $request,
        PurchaseReturn $purchaseReturn
    ) {
        // Next step
    }


    public function destroy(
        PurchaseReturn $purchaseReturn
    ) {

        $purchaseReturn->delete();

        return redirect()
            ->route('purchase-returns.index')
            ->with(
                'success',
                'Purchase return deleted successfully.'
            );
    }
}