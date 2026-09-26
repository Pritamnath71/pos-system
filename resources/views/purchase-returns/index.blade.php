@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">
            Purchase Returns
        </div>

        <div class="page-subtitle">
            Manage returned purchases
        </div>
    </div>

    <a href="{{ route('purchase-returns.create') }}"
       class="btn btn-primary">

        + Add Purchase Return

    </a>

</div>


@if(session('success'))

    <div class="alert alert-success">
        {{ session('success') }}
    </div>

@endif


<div class="card">

    <div class="table-responsive">

        <table class="table">

            <thead>

                <tr>

                    <th>Reference</th>

                    <th>Purchase</th>

                    <th>Supplier</th>

                    <th>Return Date</th>

                    <th>Quantity</th>

                    <th>Amount</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($returns as $return)

                    <tr>

                        <td>
                            <strong>
                                {{ $return->reference_no }}
                            </strong>
                        </td>

                        <td>
                            {{ $return->purchase->reference_no ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $return->purchase->supplier->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $return->return_date->format('d/m/Y') }}
                        </td>

                        <td>
                            {{ $return->quantity }}
                        </td>

                        <td>
                            ৳ {{ number_format($return->amount, 2) }}
                        </td>

                        <td>

                            <span class="badge bg-secondary">
                                {{ $return->status }}
                            </span>

                        </td>

                        <td>

                            <a href="{{ route(
                                'purchase-returns.show',
                                $return->id
                            ) }}"
                               class="btn btn-sm btn-outline-primary">

                                View

                            </a>

                            <a href="{{ route(
                                'purchase-returns.edit',
                                $return->id
                            ) }}"
                               class="btn btn-sm btn-outline-secondary">

                                Edit

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center py-4">

                            No purchase returns found.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="mt-3">

        {{ $returns->links() }}

    </div>

</div>

@endsection