@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">File Upload</div>

        <div class="page-subtitle">
            Upload and manage purchase-related files
        </div>
    </div>

</div>


<div class="card">

    <h5 class="fw-bold mb-4">
        Upload Purchase File
    </h5>

    <form method="POST"
          action="{{ route('purchase-files.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="row g-4">

            <div class="col-md-6">

                <label class="form-label">
                    Purchase
                </label>

                <select name="purchase_id"
                        class="form-select"
                        required>

                    <option value="">
                        Select Purchase
                    </option>

                    @foreach($purchases as $purchase)

                        <option value="{{ $purchase->id }}">

                            {{ $purchase->reference_no }}

                        </option>

                    @endforeach

                </select>

            </div>


            <div class="col-md-6">

                <label class="form-label">
                    Select File
                </label>

                <input type="file"
                       name="file"
                       class="form-control"
                       required>

            </div>

        </div>


        <div class="mt-4">

            <button type="submit"
                    class="btn btn-primary px-4">

                Upload File

            </button>

        </div>

    </form>

</div>


<div class="card">

    <h5 class="fw-bold mb-4">
        Uploaded Files
    </h5>

    <div class="table-responsive">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>#</th>
                    <th>File Name</th>
                    <th>Purchase</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Action</th>
                </tr>

            </thead>

            <tbody>

            @forelse($files as $file)

                <tr>

                    <td>{{ $file->id }}</td>

                    <td>
                        {{ $file->file_name }}
                    </td>

                    <td>
                        {{ $file->purchase->reference_no ?? 'N/A' }}
                    </td>

                    <td>
                        {{ $file->file_type }}
                    </td>

                    <td>
                        {{ number_format($file->file_size / 1024, 2) }} KB
                    </td>

                    <td>

                        <a href="{{ route('purchase-files.download', $file) }}"
                           class="btn btn-sm btn-outline-primary">
                            Download
                        </a>

                        <form method="POST"
                              action="{{ route('purchase-files.destroy', $file) }}"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('Delete this file?')">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center py-5 text-muted">

                        No files uploaded yet.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection