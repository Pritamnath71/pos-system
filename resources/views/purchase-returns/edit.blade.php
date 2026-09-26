@extends('layouts.app')

@section('title', 'Edit Purchase Return')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">
            Edit Purchase Return
        </div>

        <div class="page-subtitle">
            Update purchase return information
        </div>
    </div>

    <a href="{{ route('purchase-returns.index') }}"
       class="btn btn-outline-secondary">
        ← Back
    </a>

</div>


@if($errors->any())

    <div class="alert alert-danger">

        <strong>Please fix the following errors:</strong>

        <ul class="mb-0 mt-2">

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="card">

    <h5 class="fw-bold mb-4">
        Return Information
    </h5>


    <form
        action="{{ route(
            'purchase-returns.update',
            $purchaseReturn->id
        ) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <div class="row g-4">


            {{-- Purchase --}}

            <div class="col-md-6">

                <label class="form-label">
                    Purchase
                    <span class="text-danger">*</span>
                </label>

                <select
                    name="purchase_id"
                    class="form-select"
                    required
                >

                    <option value="">
                        Select Purchase
                    </option>

                    @foreach($purchases as $purchase)

                        <option
                            value="{{ $purchase->id }}"
                            {{ old(
                                'purchase_id',
                                $purchaseReturn->purchase_id
                            ) == $purchase->id
                                ? 'selected'
                                : ''
                            }}
                        >

                            {{ $purchase->reference_no }}

                            -

                            {{ $purchase->supplier->name ?? 'N/A' }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- Return Date --}}

            <div class="col-md-6">

                <label class="form-label">
                    Return Date
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="date"
                    name="return_date"
                    class="form-control"
                    value="{{ old(
                        'return_date',
                        $purchaseReturn->return_date
                            ? $purchaseReturn->return_date->format('Y-m-d')
                            : ''
                    ) }}"
                    required
                >

            </div>


            {{-- Quantity --}}

            <div class="col-md-6">

                <label class="form-label">
                    Return Quantity
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="number"
                    name="quantity"
                    class="form-control"
                    min="1"
                    value="{{ old(
                        'quantity',
                        $purchaseReturn->quantity
                    ) }}"
                    required
                >

            </div>


            {{-- Amount --}}

            <div class="col-md-6">

                <label class="form-label">
                    Return Amount
                    <span class="text-danger">*</span>
                </label>

                <input
                    type="number"
                    name="amount"
                    class="form-control"
                    min="0"
                    step="0.01"
                    value="{{ old(
                        'amount',
                        $purchaseReturn->amount
                    ) }}"
                    required
                >

            </div>


            {{-- Status --}}

            <div class="col-md-6">

                <label class="form-label">
                    Status
                </label>

                <select
                    name="status"
                    class="form-select"
                    required
                >

                    <option
                        value="Pending"
                        {{ old(
                            'status',
                            $purchaseReturn->status
                        ) == 'Pending'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Pending
                    </option>

                    <option
                        value="Approved"
                        {{ old(
                            'status',
                            $purchaseReturn->status
                        ) == 'Approved'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Approved
                    </option>

                    <option
                        value="Completed"
                        {{ old(
                            'status',
                            $purchaseReturn->status
                        ) == 'Completed'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Completed
                    </option>

                    <option
                        value="Cancelled"
                        {{ old(
                            'status',
                            $purchaseReturn->status
                        ) == 'Cancelled'
                            ? 'selected'
                            : ''
                        }}
                    >
                        Cancelled
                    </option>

                </select>

            </div>


            {{-- Reason --}}

            <div class="col-12">

                <label class="form-label">
                    Reason
                </label>

                <textarea
                    name="reason"
                    class="form-control"
                    rows="4"
                    placeholder="Enter reason for purchase return..."
                >{{ old(
                    'reason',
                    $purchaseReturn->reason
                ) }}</textarea>

            </div>

        </div>


        {{-- Buttons --}}

        <div class="d-flex justify-content-end gap-2 mt-4">

            <a
                href="{{ route('purchase-returns.index') }}"
                class="btn btn-outline-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-primary px-4"
            >
                Update Return
            </button>

        </div>

    </form>

</div>

@endsection