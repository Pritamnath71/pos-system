@extends('layouts.app')

@section('title', 'Purchase Details')

@section('page-title', 'Purchase Details')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h2 class="fw-bold mb-1">
                Purchase Details
            </h2>

            <p class="text-muted mb-0">
                {{ $purchase->reference_no }}
            </p>
        </div>

        <div class="d-flex gap-2">

            <a href="{{ route('purchases.edit', $purchase) }}"
               class="btn btn-warning">

                Edit

            </a>

            <a href="{{ route('purchases.index') }}"
               class="btn btn-secondary">

                Back

            </a>

        </div>

    </div>


    {{-- Purchase Information --}}

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Purchase Information
            </h5>

        </div>

        <div class="card-body">

            <div class="row g-4">

                <div class="col-md-4">

                    <small class="text-muted">
                        Reference No.
                    </small>

                    <div class="fw-semibold mt-1">
                        {{ $purchase->reference_no }}
                    </div>

                </div>


                <div class="col-md-4">

                    <small class="text-muted">
                        Supplier
                    </small>

                    <div class="fw-semibold mt-1">
                        {{ $purchase->supplier->name ?? 'N/A' }}
                    </div>

                </div>


                <div class="col-md-4">

                    <small class="text-muted">
                        Purchase Date
                    </small>

                    <div class="fw-semibold mt-1">

                        {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}

                    </div>

                </div>


                <div class="col-md-4">

                    <small class="text-muted">
                        Status
                    </small>

                    <div class="mt-1">

                        @if($purchase->status == 'Completed')

                            <span class="badge bg-success">
                                Completed
                            </span>

                        @elseif($purchase->status == 'Cancelled')

                            <span class="badge bg-danger">
                                Cancelled
                            </span>

                        @else

                            <span class="badge bg-warning text-dark">
                                Pending
                            </span>

                        @endif

                    </div>

                </div>


                <div class="col-md-4">

                    <small class="text-muted">
                        Payment Status
                    </small>

                    <div class="mt-1">

                        @if($purchase->payment_status == 'Paid')

                            <span class="badge bg-success">
                                Paid
                            </span>

                        @elseif($purchase->payment_status == 'Partial')

                            <span class="badge bg-warning text-dark">
                                Partial
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Unpaid
                            </span>

                        @endif

                    </div>

                </div>


                <div class="col-md-4">

                    <small class="text-muted">
                        Payment Due
                    </small>

                    <div class="fw-semibold mt-1">

                        ৳ {{ number_format($purchase->payment_due, 2) }}

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Purchase Items --}}

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Purchase Items
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-light">

                        <tr>

                            <th>#</th>

                            <th>Product Name</th>

                            <th>Quantity</th>

                            <th>Unit Cost</th>

                            <th class="text-end">
                                Subtotal
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($purchase->items as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->product_name }}
                                </td>

                                <td>
                                    {{ $item->quantity }}
                                </td>

                                <td>
                                    ৳ {{ number_format($item->unit_cost, 2) }}
                                </td>

                                <td class="text-end">
                                    ৳ {{ number_format($item->subtotal, 2) }}
                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5"
                                    class="text-center text-muted py-4">

                                    No purchase items found.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                    <tfoot>

                        <tr>

                            <th colspan="4"
                                class="text-end">

                                Grand Total

                            </th>

                            <th class="text-end">

                                ৳ {{ number_format($purchase->grand_total, 2) }}

                            </th>

                        </tr>

                    </tfoot>

                </table>

            </div>

        </div>

    </div>


    {{-- Notes --}}

    @if($purchase->notes)

        <div class="card shadow-sm border-0 mb-4">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    Notes
                </h5>

            </div>

            <div class="card-body">

                {{ $purchase->notes }}

            </div>

        </div>

    @endif


    {{-- Files --}}

    @if($purchase->files->count())

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    Attached Files
                </h5>

            </div>

            <div class="card-body">

                @foreach($purchase->files as $file)

                    <div class="d-flex justify-content-between
                                align-items-center
                                border-bottom py-2">

                        <span>
                            {{ $file->original_name }}
                        </span>

                        <a
                            href="{{ route('purchase-files.download', $file) }}"
                            class="btn btn-sm btn-outline-primary"
                        >
                            Download
                        </a>

                    </div>

                @endforeach

            </div>

        </div>

    @endif

</div>

@endsection