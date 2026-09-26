@extends('layouts.app')

@section('title', 'Purchases')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">
            Purchases
        </div>

        <div class="page-subtitle">
            Manage purchase transactions
        </div>
    </div>

    <a href="{{ route('purchases.create') }}"
       class="btn btn-primary">

        + Add Purchase

    </a>

</div>


{{-- Success Message --}}
@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif


{{-- Error Message --}}
@if(session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

@endif


{{-- Validation Errors --}}
@if($errors->any())

    <div class="alert alert-danger">

        <strong>Please fix the following errors:</strong>

        <ul class="mb-0">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="card">

    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>Reference</th>

                    <th>Supplier</th>

                    <th>Purchase Date</th>

                    <th>Grand Total</th>

                    <th>Payment Due</th>

                    <th>Payment Status</th>

                    <th>Action</th>

                </tr>

            </thead>


            <tbody>

                @forelse($purchases as $purchase)

                    <tr>

                        {{-- Reference --}}
                        <td>

                            <strong>
                                {{ $purchase->reference_no }}
                            </strong>

                        </td>


                        {{-- Supplier --}}
                        <td>

                            {{ $purchase->supplier->name ?? 'N/A' }}

                        </td>


                        {{-- Purchase Date --}}
                        <td>

                            {{ $purchase->purchase_date?->format('d/m/Y') ?? 'N/A' }}

                        </td>


                        {{-- Grand Total --}}
                        <td>

                            ৳ {{ number_format($purchase->grand_total, 2) }}

                        </td>


                        {{-- Payment Due --}}
                        <td>

                            ৳ {{ number_format($purchase->payment_due, 2) }}

                        </td>


                        {{-- Payment Status --}}
                        <td>

                            @if($purchase->payment_status === 'Paid')

                                <span class="badge bg-success">
                                    Paid
                                </span>

                            @elseif($purchase->payment_status === 'Partial')

                                <span class="badge bg-warning text-dark">
                                    Partial
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    {{ $purchase->payment_status ?? 'Unpaid' }}
                                </span>

                            @endif

                        </td>


                        {{-- Actions --}}
                        <td>

                            <a href="{{ route('purchases.show', $purchase->id) }}"
                               class="btn btn-sm btn-outline-primary">

                                View

                            </a>


                            <a href="{{ route('purchases.edit', $purchase->id) }}"
                               class="btn btn-sm btn-outline-secondary">

                                Edit

                            </a>


                            <form action="{{ route('purchases.destroy', $purchase->id) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf

                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-sm btn-outline-danger"
                                        onclick="return confirm('Are you sure you want to delete this purchase?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-4">

                            No purchases found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}
    @if($purchases->hasPages())

        <div class="mt-3">

            {{ $purchases->links() }}

        </div>

    @endif

</div>

@endsection