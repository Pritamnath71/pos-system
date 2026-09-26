@extends('layouts.app')

@section('title', 'Add Purchase Return')

@section('page-title', 'Add Purchase Return')

@section('content')

<div class="container-fluid p-0">

    <form
        action="{{ route('purchase-returns.store') }}"
        method="POST"
    >

        @csrf


        {{-- Errors --}}

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>Please fix the following:</strong>

                <ul class="mb-0">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Return Information --}}

        <div class="content-card mb-4">

            <h5 class="content-card-title">
                Return Information
            </h5>

            <div class="row g-3">


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
                                {{ old('purchase_id') == $purchase->id ? 'selected' : '' }}
                            >

                                {{ $purchase->reference_no }}

                                -

                                {{ $purchase->supplier->name ?? 'N/A' }}

                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Date --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Return Date
                        <span class="text-danger">*</span>
                    </label>

                    <input
                        type="date"
                        name="return_date"
                        class="form-control"
                        value="{{ old('return_date', date('Y-m-d')) }}"
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
                        value="{{ old('quantity', 1) }}"
                        min="1"
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
                        value="{{ old('amount', 0) }}"
                        min="0"
                        step="0.01"
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
                    >

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Approved">
                            Approved
                        </option>

                        <option value="Completed">
                            Completed
                        </option>

                        <option value="Cancelled">
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
                    >{{ old('reason') }}</textarea>

                </div>

            </div>

        </div>


        {{-- Buttons --}}

        <div class="d-flex justify-content-end gap-2">

            <a
                href="{{ route('purchase-returns.index') }}"
                class="btn btn-outline-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-dark"
            >
                <i class="bi bi-check-lg"></i>
                Save Return
            </button>

        </div>

    </form>

</div>

@endsection