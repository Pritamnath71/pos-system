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


    {{-- Purchase Information --}}
    <div class="card">

        <h5 class="fw-bold mb-4">
            Purchase Information
        </h5>

        <div class="row g-4">

            {{-- Reference No --}}
            <div class="col-md-6">

                <label class="form-label">
                    Reference No
                </label>

                <input type="text"
                       name="reference_no"
                       class="form-control"
                       value="{{ old('reference_no', 'PUR-' . date('YmdHis')) }}"
                       required>

            </div>


            {{-- Supplier --}}
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


            {{-- Purchase Date --}}
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


            {{-- Status --}}
            <div class="col-md-6">

                <label class="form-label">
                    Status
                </label>

                <select name="status"
                        class="form-select"
                        required>

                    <option value="Pending"
                        {{ old('status', 'Pending') == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Received"
                        {{ old('status') == 'Received' ? 'selected' : '' }}>
                        Received
                    </option>

                    <option value="Cancelled"
                        {{ old('status') == 'Cancelled' ? 'selected' : '' }}>
                        Cancelled
                    </option>

                </select>

            </div>


            {{-- Payment Status --}}
            <div class="col-md-6">

                <label class="form-label">
                    Payment Status
                </label>

                <select name="payment_status"
                        class="form-select"
                        required>

                    <option value="Unpaid"
                        {{ old('payment_status', 'Unpaid') == 'Unpaid' ? 'selected' : '' }}>
                        Unpaid
                    </option>

                    <option value="Paid"
                        {{ old('payment_status') == 'Paid' ? 'selected' : '' }}>
                        Paid
                    </option>

                    <option value="Partial"
                        {{ old('payment_status') == 'Partial' ? 'selected' : '' }}>
                        Partial
                    </option>

                </select>

            </div>


            {{-- Grand Total --}}
            <div class="col-md-6">

                <label class="form-label">
                    Grand Total
                </label>

                <input type="number"
                       step="0.01"
                       min="0"
                       name="grand_total"
                       id="grand_total"
                       class="form-control"
                       value="{{ old('grand_total', 0) }}"
                       readonly>

            </div>


            {{-- Payment Due --}}
            <div class="col-md-6">

                <label class="form-label">
                    Payment Due
                </label>

                <input type="number"
                       step="0.01"
                       min="0"
                       name="payment_due"
                       class="form-control"
                       value="{{ old('payment_due', 0) }}">

            </div>


            {{-- Notes --}}
            <div class="col-12">

                <label class="form-label">
                    Notes
                </label>

                <textarea name="notes"
                          rows="4"
                          class="form-control"
                          placeholder="Enter purchase notes...">{{ old('notes') }}</textarea>

            </div>

        </div>

    </div>


    {{-- Purchase Items --}}
    <div class="card">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h5 class="fw-bold mb-0">
                Purchase Items
            </h5>

            <button type="button"
                    id="add-item"
                    class="btn btn-outline-primary">
                + Add Item
            </button>

        </div>


        <div id="items-container">

            {{-- First Item --}}
            <div class="row g-3 item-row mb-3">

                {{-- Product Name --}}
                <div class="col-md-5">

                    <label class="form-label">
                        Product Name
                    </label>

                    <input type="text"
                           name="items[0][product_name]"
                           class="form-control"
                           placeholder="Enter product name"
                           required>

                </div>


                {{-- Quantity --}}
                <div class="col-md-2">

                    <label class="form-label">
                        Quantity
                    </label>

                    <input type="number"
                           name="items[0][quantity]"
                           class="form-control item-quantity"
                           value="1"
                           min="1"
                           required>

                </div>


                {{-- Unit Cost --}}
                <div class="col-md-2">

                    <label class="form-label">
                        Unit Cost
                    </label>

                    <input type="number"
                           name="items[0][unit_cost]"
                           class="form-control item-cost"
                           value="0"
                           min="0"
                           step="0.01"
                           required>

                </div>


                {{-- Subtotal --}}
                <div class="col-md-2">

                    <label class="form-label">
                        Subtotal
                    </label>

                    <input type="number"
                           name="items[0][subtotal]"
                           class="form-control item-subtotal"
                           value="0"
                           step="0.01"
                           readonly>

                </div>


                {{-- Remove --}}
                <div class="col-md-1 d-flex align-items-end">

                    <button type="button"
                            class="btn btn-danger remove-item"
                            title="Remove item">
                        ×
                    </button>

                </div>

            </div>

        </div>

    </div>


    {{-- Buttons --}}
    <div class="text-end mb-4">

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


{{-- JavaScript --}}
<script>

let itemIndex = 1;


/*
|--------------------------------------------------------------------------
| Add New Item
|--------------------------------------------------------------------------
*/

document.getElementById('add-item').addEventListener('click', function () {

    const container = document.getElementById('items-container');

    const row = document.createElement('div');

    row.className = 'row g-3 item-row mb-3';

    row.innerHTML = `

        <div class="col-md-5">

            <label class="form-label">
                Product Name
            </label>

            <input type="text"
                   name="items[${itemIndex}][product_name]"
                   class="form-control"
                   placeholder="Enter product name"
                   required>

        </div>


        <div class="col-md-2">

            <label class="form-label">
                Quantity
            </label>

            <input type="number"
                   name="items[${itemIndex}][quantity]"
                   class="form-control item-quantity"
                   value="1"
                   min="1"
                   required>

        </div>


        <div class="col-md-2">

            <label class="form-label">
                Unit Cost
            </label>

            <input type="number"
                   name="items[${itemIndex}][unit_cost]"
                   class="form-control item-cost"
                   value="0"
                   min="0"
                   step="0.01"
                   required>

        </div>


        <div class="col-md-2">

            <label class="form-label">
                Subtotal
            </label>

            <input type="number"
                   name="items[${itemIndex}][subtotal]"
                   class="form-control item-subtotal"
                   value="0"
                   step="0.01"
                   readonly>

        </div>


        <div class="col-md-1 d-flex align-items-end">

            <button type="button"
                    class="btn btn-danger remove-item"
                    title="Remove item">
                ×
            </button>

        </div>

    `;

    container.appendChild(row);

    itemIndex++;

});


/*
|--------------------------------------------------------------------------
| Remove Item
|--------------------------------------------------------------------------
*/

document.addEventListener('click', function (event) {

    if (event.target.classList.contains('remove-item')) {

        const rows = document.querySelectorAll('.item-row');

        if (rows.length > 1) {

            event.target.closest('.item-row').remove();

            calculateGrandTotal();

        }

    }

});


/*
|--------------------------------------------------------------------------
| Calculate Item Subtotal
|--------------------------------------------------------------------------
*/

document.addEventListener('input', function (event) {

    if (
        event.target.classList.contains('item-quantity') ||
        event.target.classList.contains('item-cost')
    ) {

        const row = event.target.closest('.item-row');

        const quantity =
            parseFloat(
                row.querySelector('.item-quantity').value
            ) || 0;

        const cost =
            parseFloat(
                row.querySelector('.item-cost').value
            ) || 0;

        const subtotal = quantity * cost;

        row.querySelector('.item-subtotal').value =
            subtotal.toFixed(2);

        calculateGrandTotal();

    }

});


/*
|--------------------------------------------------------------------------
| Calculate Grand Total
|--------------------------------------------------------------------------
*/

function calculateGrandTotal() {

    let total = 0;

    document.querySelectorAll('.item-subtotal').forEach(function (input) {

        total += parseFloat(input.value) || 0;

    });

    document.getElementById('grand_total').value =
        total.toFixed(2);

}

</script>

@endsection