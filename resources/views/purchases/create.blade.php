@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">Add Purchase</div>

        <div class="page-subtitle">
            Create a new purchase transaction
        </div>
    </div>

    <a href="{{ route('purchases.index') }}"
       class="btn btn-outline-secondary">
        ← Back
    </a>

</div>


<form method="POST"
      action="{{ route('purchases.store') }}">

    @csrf

    <div class="card">

        <h5 class="fw-bold mb-4">
            Purchase Information
        </h5>

        <div class="row g-4">

            <div class="col-md-6">

                <label class="form-label">
                    Reference No
                </label>

                <input type="text"
                       name="reference_no"
                       class="form-control"
                       value="{{ old('reference_no') }}"
                       required>

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Supplier
                </label>

                <select name="supplier_id"
                        class="form-select"
                        required>

                    <option value="">
                        Select Supplier
                    </option>

                    @foreach($suppliers as $supplier)

                        <option value="{{ $supplier->id }}"
                            {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>

                            {{ $supplier->name }}

                        </option>

                    @endforeach

                </select>

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Purchase Date
                </label>

                <input type="date"
                       name="purchase_date"
                       class="form-control"
                       value="{{ old('purchase_date', date('Y-m-d')) }}"
                       required>

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Payment Status
                </label>

                <select name="payment_status"
                        class="form-select">

                    <option value="Unpaid">
                        Unpaid
                    </option>

                    <option value="Paid">
                        Paid
                    </option>

                </select>

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Grand Total
                </label>

                <input type="number"
                       step="0.01"
                       name="grand_total"
                       class="form-control"
                       value="{{ old('grand_total', 0) }}">

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Payment Due
                </label>

                <input type="number"
                       step="0.01"
                       name="payment_due"
                       class="form-control"
                       value="{{ old('payment_due', 0) }}">

            </div>


            <div class="col-12">

                <label class="form-label">
                    Notes
                </label>

                <textarea name="notes"
                          rows="4"
                          class="form-control">{{ old('notes') }}</textarea>

            </div>

        </div>

    </div>


    <div class="text-end">

        <a href="{{ route('purchases.index') }}"
           class="btn btn-secondary">
            Cancel
        </a>

        <button type="submit"
                class="btn btn-primary px-4">
            Save Purchase
        </button>

    </div>

</form>

@endsection