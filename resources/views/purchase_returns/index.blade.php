@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">List Purchase Return</div>

        <div class="page-subtitle">
            Manage returned purchase transactions
        </div>
    </div>

    <a href="{{ route('purchase-returns.create') }}"
       class="btn-primary-custom">
        ＋ Add Return
    </a>

</div>


<div class="card">

    <div class="table-responsive">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>#</th>
                    <th>Reference</th>
                    <th>Purchase</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

            @forelse($returns as $return)

                <tr>

                    <td>{{ $return->id }}</td>

                    <td>
                        <strong>
                            {{ $return->reference_no }}
                        </strong>
                    </td>

                    <td>
                        {{ $return->purchase->reference_no ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $return->return_date }}
                    </td>

                    <td>
                        {{ $return->quantity }}
                    </td>

                    <td>
                        ৳ {{ number_format($return->amount, 2) }}
                    </td>

                    <td>

                        <span class="badge bg-warning-subtle text-warning-emphasis">
                            {{ $return->status }}
                        </span>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="7"
                        class="text-center py-5 text-muted">

                        No purchase returns found.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection