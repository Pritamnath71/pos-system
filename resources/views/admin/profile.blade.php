@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">
            Admin Profile
        </div>

        <div class="page-subtitle">
            Manage your administrator profile information.
        </div>
    </div>

</div>


<div class="card">

    <div class="row">

        <div class="col-md-3 text-center">

            <div class="admin-circle mx-auto mb-3"
                 style="width:90px;height:90px;font-size:30px;">

                A

            </div>

            <h5>
                Admin
            </h5>

            <p class="text-muted">
                Administrator
            </p>

        </div>


        <div class="col-md-9">

            <div class="mb-3">

                <label class="form-label">
                    Name
                </label>

                <input type="text"
                       class="form-control"
                       value="Admin">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Email
                </label>

                <input type="email"
                       class="form-control"
                       value="admin@example.com">

            </div>


            <div class="mb-3">

                <label class="form-label">
                    Role
                </label>

                <input type="text"
                       class="form-control"
                       value="Administrator"
                       readonly>

            </div>


            <button class="btn btn-primary">

                Save Changes

            </button>

        </div>

    </div>

</div>

@endsection