@extends('layouts.app')

@section('title', 'Purchase Return Details')

@section('content')

<div class="container-fluid py-4">

    {{-- Header --}}

    <div class="d-flex justify-content-between
                align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Purchase Return Details
            </h2>

            <p class="text-muted mb-0">
                {{ $purchaseReturn->reference_no }}
            </p>

        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route(
                    'purchase-returns.edit',
                    $purchaseReturn
                ) }}"
                class="btn btn-warning"
            >
                Edit
            </a>

            <a
                href="{{ route(
                    'purchase-returns.index'
                ) }}"
                class="btn btn-secondary"
            >
                Back
            </a>

        </div>

    </div>


    {{-- Return Information --}}

    <div class="card shadow-sm border-0 mb-4">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Return Information
            </h5>

        </div>


        <div class="card-body">

            <div class="row g-4">


                {{-- Reference --}}

                <div class="col-md-4">

                    <small class="text-muted">
                        Return Reference No.
                    </small>

                    <div class="fw-semibold mt-1">

                        {{ $purchaseReturn->reference_no }}

                    </div>

                </div>


                {{-- Purchase --}}

                <div class="col-md-4">

                    <small class="text-muted">
                        Purchase Reference
                    </small>

                    <div class="fw-semibold mt-1">

                        {{
                            $purchaseReturn
                                ->purchase
                                ->reference_no
                            ?? 'N/A'
                        }}

                    </div>

                </div>


                {{-- Supplier --}}

                <div class="col-md-4">

                    <small class="text-muted">
                        Supplier
                    </small>

                    <div class="fw-semibold mt-1">

                        {{
                            $purchaseReturn
                                ->purchase
                                ->supplier
                                ->name
                            ?? 'N/A'
                        }}

                    </div>

                </div>


                {{-- Return Date --}}

                <div class="col-md-4">

                    <small class="text-muted">
                        Return Date
                    </small>

                    <div class="fw-semibold mt-1">

                        {{
                            $purchaseReturn->return_date
                                ? $purchaseReturn
                                    ->return_date
                                    ->format('d M Y')
                                : 'N/A'
                        }}

                    </div>

                </div>


                {{-- Quantity --}}

                <div class="col-md-4">

                    <small class="text-muted">
                        Quantity
                    </small>

                    <div class="fw-semibold mt-1">

                        {{ $purchaseReturn->quantity }}

                    </div>

                </div>


                {{-- Amount --}}

                <div class="col-md-4">

                    <small class="text-muted">
                        Return Amount
                    </small>

                    <div class="fw-semibold mt-1">

                        ৳ {{ number_format(
                            $purchaseReturn->amount,
                            2
                        ) }}

                    </div>

                </div>


                {{-- Status --}}

                <div class="col-md-4">

                    <small class="text-muted">
                        Status
                    </small>

                    <div class="mt-1">

                        @if(
                            $purchaseReturn->status
                            == 'Completed'
                        )

                            <span class="badge bg-success">
                                Completed
                            </span>

                        @elseif(
                            $purchaseReturn->status
                            == 'Approved'
                        )

                            <span class="badge bg-primary">
                                Approved
                            </span>

                        @elseif(
                            $purchaseReturn->status
                            == 'Cancelled'
                        )

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


                {{-- Reason --}}

                <div class="col-md-12">

                    <small class="text-muted">
                        Reason
                    </small>

                    <div class="mt-2">

                        @if($purchaseReturn->reason)

                            {{ $purchaseReturn->reason }}

                        @else

                            <span class="text-muted">
                                No reason provided.
                            </span>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- Original Purchase --}}

    @if($purchaseReturn->purchase)

        <div class="card shadow-sm border-0">

            <div class="card-header bg-white">

                <h5 class="mb-0">
                    Original Purchase
                </h5>

            </div>

            <div class="card-body">

                <div class="row g-3">

                    <div class="col-md-4">

                        <small class="text-muted">
                            Purchase Reference
                        </small>

                        <div class="fw-semibold">
                            {{
                                $purchaseReturn
                                    ->purchase
                                    ->reference_no
                            }}
                        </div>

                    </div>


                    <div class="col-md-4">

                        <small class="text-muted">
                            Supplier
                        </small>

                        <div class="fw-semibold">

                            {{
                                $purchaseReturn
                                    ->purchase
                                    ->supplier
                                    ->name
                                ?? 'N/A'
                            }}

                        </div>

                    </div>


                    <div class="col-md-4">

                        <small class="text-muted">
                            Purchase Total
                        </small>

                        <div class="fw-semibold">

                            ৳ {{ number_format(
                                $purchaseReturn
                                    ->purchase
                                    ->grand_total,
                                2
                            ) }}

                        </div>

                    </div>

                </div>

            </div>

        </div>

    @endif

</div>

@endsection