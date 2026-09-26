@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">List Purchases</div>

        <div class="page-subtitle">
            Manage and view all purchase transactions
        </div>
    </div>

    <a href="{{ route('purchases.create') }}"
       class="btn-primary-custom">
        ＋ Add Purchase
    </a>

</div>


<div class="card">

    <form method="GET"
          action="{{ route('purchases.index') }}"
          class="row g-3 mb-4">

        <div class="col-md-4">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   class="form-control"
                   placeholder="Search reference or supplier...">
        </div>

        <div class="col-md-3">

            <select name="status" class="form-select">

                <option value="">All Status</option>

                <option value="Pending"
                    {{ request('status') == 'Pending' ? 'selected' : '' }}>
                    Pending
                </option>

                <option value="Completed"
                    {{ request('status') == 'Completed' ? 'selected' : '' }}>
                    Completed
                </option>

            </select>

        </div>

        <div class="col-md-3">

            <select name="payment_status" class="form-select">

                <option value="">All Payment Status</option>

                <option value="Paid"
                    {{ request('payment_status') == 'Paid' ? 'selected' : '' }}>
                    Paid
                </option>

                <option value="Unpaid"
                    {{ request('payment_status') == 'Unpaid' ? 'selected' : '' }}>
                    Unpaid
                </option>

            </select>

        </div>

        <div class="col-md-2">

            <button class="btn btn-primary w-100">
                Search
            </button>

        </div>

    </form>


    <div class="table-responsive">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>#</th>
                    <th>Reference</th>
                    <th>Supplier</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Payment</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($purchases as $purchase)

                <tr>

                    <td>{{ $purchase->id }}</td>

                    <td>
                        <strong>{{ $purchase->reference_no }}</strong>
                    </td>

                    <td>
                        {{ $purchase->supplier->name ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $purchase->purchase_date }}
                    </td>

                    <td>
                        <span class="badge bg-warning-subtle text-warning-emphasis">
                            {{ $purchase->status }}
                        </span>
                    </td>

                    <td>
                        <span class="badge bg-info-subtle text-info-emphasis">
                            {{ $purchase->payment_status }}
                        </span>
                    </td>

                    <td>
                        ৳ {{ number_format($purchase->grand_total, 2) }}
                    </td>

                    <td>

                        <a href="{{ route('purchases.show', $purchase) }}"
                           class="btn btn-sm btn-outline-primary">
                            View
                        </a>

                        <a href="{{ route('purchases.edit', $purchase) }}"
                           class="btn btn-sm btn-outline-secondary">
                            Edit
                        </a>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="8"
                        class="text-center py-5 text-muted">

                        No purchases found.

                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-4">
        {{ $purchases->links() }}
    </div>

</div>

@endsection