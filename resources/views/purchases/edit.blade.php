@extends('layouts.app')

@section('title', 'Edit Purchase')

@section('page-title', 'Edit Purchase')

@section('content')

<div class="container-fluid p-0">

    <form
        action="{{ route('purchases.update', $purchase) }}"
        method="POST"
        id="purchaseForm"
    >

        @csrf
        @method('PUT')


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


        {{-- Purchase Information --}}

        <div class="content-card mb-4">

            <h5 class="content-card-title">
                Purchase Information
            </h5>

            <div class="row g-3">

                {{-- Reference --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Reference No.
                    </label>

                    <input
                        type="text"
                        class="form-control"
                        value="{{ $purchase->reference_no }}"
                        readonly
                    >

                </div>


                {{-- Supplier --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Supplier
                    </label>

                    <select
                        name="supplier_id"
                        class="form-select"
                        required
                    >

                        @foreach($suppliers as $supplier)

                            <option
                                value="{{ $supplier->id }}"
                                {{ $purchase->supplier_id == $supplier->id ? 'selected' : '' }}
                            >
                                {{ $supplier->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Date --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Purchase Date
                    </label>

                    <input
                        type="date"
                        name="purchase_date"
                        class="form-control"
                        value="{{ $purchase->purchase_date->format('Y-m-d') }}"
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

                        <option
                            value="Pending"
                            {{ $purchase->status == 'Pending' ? 'selected' : '' }}
                        >
                            Pending
                        </option>

                        <option
                            value="Received"
                            {{ $purchase->status == 'Received' ? 'selected' : '' }}
                        >
                            Received
                        </option>

                        <option
                            value="Cancelled"
                            {{ $purchase->status == 'Cancelled' ? 'selected' : '' }}
                        >
                            Cancelled
                        </option>

                    </select>

                </div>


                {{-- Payment Status --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Payment Status
                    </label>

                    <select
                        name="payment_status"
                        class="form-select"
                    >

                        <option
                            value="Unpaid"
                            {{ $purchase->payment_status == 'Unpaid' ? 'selected' : '' }}
                        >
                            Unpaid
                        </option>

                        <option
                            value="Partial"
                            {{ $purchase->payment_status == 'Partial' ? 'selected' : '' }}
                        >
                            Partial
                        </option>

                        <option
                            value="Paid"
                            {{ $purchase->payment_status == 'Paid' ? 'selected' : '' }}
                        >
                            Paid
                        </option>

                    </select>

                </div>


                {{-- Payment Due --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Payment Due
                    </label>

                    <input
                        type="number"
                        name="payment_due"
                        class="form-control"
                        value="{{ $purchase->payment_due }}"
                        min="0"
                        step="0.01"
                    >

                </div>


                {{-- Notes --}}

                <div class="col-12">

                    <label class="form-label">
                        Notes
                    </label>

                    <textarea
                        name="notes"
                        class="form-control"
                        rows="3"
                    >{{ $purchase->notes }}</textarea>

                </div>

            </div>

        </div>


        {{-- Items --}}

        <div class="content-card mb-4">

            <div class="d-flex justify-content-between align-items-center mb-3">

                <h5 class="content-card-title mb-0">
                    Purchase Items
                </h5>

                <button
                    type="button"
                    class="btn btn-dark btn-sm"
                    id="addItem"
                >
                    <i class="bi bi-plus-lg"></i>
                    Add Item
                </button>

            </div>


            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>

                        <tr>

                            <th>Product</th>

                            <th>Quantity</th>

                            <th>Unit Cost</th>

                            <th>Subtotal</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody id="itemsContainer">

                        @foreach($purchase->items as $index => $item)

                            <tr class="item-row">

                                <td>

                                    <input
                                        type="text"
                                        name="items[{{ $index }}][product_name]"
                                        class="form-control product-name"
                                        value="{{ $item->product_name }}"
                                        required
                                    >

                                </td>

                                <td>

                                    <input
                                        type="number"
                                        name="items[{{ $index }}][quantity]"
                                        class="form-control quantity"
                                        value="{{ $item->quantity }}"
                                        min="1"
                                        required
                                    >

                                </td>

                                <td>

                                    <input
                                        type="number"
                                        name="items[{{ $index }}][unit_cost]"
                                        class="form-control unit-cost"
                                        value="{{ $item->unit_cost }}"
                                        min="0"
                                        step="0.01"
                                        required
                                    >

                                </td>

                                <td>

                                    <input
                                        type="text"
                                        class="form-control subtotal"
                                        value="{{ number_format($item->subtotal, 2) }}"
                                        readonly
                                    >

                                </td>

                                <td>

                                    <button
                                        type="button"
                                        class="btn btn-outline-danger btn-sm remove-item"
                                    >
                                        <i class="bi bi-trash"></i>
                                    </button>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>


        {{-- Total --}}

        <div class="content-card mb-4">

            <div class="row justify-content-end">

                <div class="col-md-4">

                    <div class="d-flex justify-content-between">

                        <strong>
                            Grand Total:
                        </strong>

                        <strong id="grandTotal">
                            ৳{{ number_format($purchase->grand_total, 2) }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>


        {{-- Buttons --}}

        <div class="d-flex justify-content-end gap-2">

            <a
                href="{{ route('purchases.index') }}"
                class="btn btn-outline-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="btn btn-dark"
            >
                <i class="bi bi-check-lg"></i>
                Update Purchase
            </button>

        </div>

    </form>

</div>

@endsection