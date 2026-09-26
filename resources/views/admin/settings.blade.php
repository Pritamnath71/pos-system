@extends('layouts.app')

@section('content')

<div class="page-header">

    <div>
        <div class="page-title">
            Settings
        </div>

        <div class="page-subtitle">
            Manage POS application settings.
        </div>
    </div>

</div>


<div class="card">

    <h5 class="mb-4">
        General Settings
    </h5>


    <div class="mb-3">

        <label class="form-label">
            Application Name
        </label>

        <input type="text"
               class="form-control"
               value="POS APP">

    </div>


    <div class="mb-3">

        <label class="form-label">
            Currency
        </label>

        <select class="form-select">

            <option selected>
                BDT (৳)
            </option>

            <option>
                USD ($)
            </option>

        </select>

    </div>


    <div class="mb-3">

        <label class="form-label">
            Date Format
        </label>

        <select class="form-select">

            <option selected>
                DD/MM/YYYY
            </option>

            <option>
                MM/DD/YYYY
            </option>

            <option>
                YYYY-MM-DD
            </option>

        </select>

    </div>


    <button class="btn btn-primary">

        Save Settings

    </button>

</div>

@endsection