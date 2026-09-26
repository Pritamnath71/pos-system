<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>POS App</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f5f7fb;
            font-family: Arial, sans-serif;
            color: #102a43;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {
            width: 249px;
            background: #172033;
            color: white;
            min-height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .logo-area {
            height: 80px;
            display: flex;
            align-items: center;
            padding: 0 18px;
            border-bottom: 1px solid #293348;
        }

        .logo-icon {
            width: 38px;
            height: 38px;
            background: #1268f3;
            border-radius: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            color: white;
            font-size: 18px;
        }

        .logo-title {
            font-size: 16px;
            font-weight: bold;
        }

        .logo-subtitle {
            font-size: 14px;
            color: #b5bfd0;
        }


        /* =====================================================
           SIDEBAR MENU
        ===================================================== */

        .menu {
            padding: 32px 12px;
        }

        .menu-title {
            font-size: 11px;
            font-weight: bold;
            letter-spacing: 1px;
            color: #8c98ae;
            margin-bottom: 12px;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #e7ebf2;
            text-decoration: none;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .menu-item:hover,
        .menu-item.active {
            background: #1d427c;
            color: white;
        }

        .menu-item i {
            width: 18px;
            text-align: center;
            font-size: 15px;
        }


        /* =====================================================
           MAIN AREA
        ===================================================== */

        .main-area {
            margin-left: 249px;
            min-height: 100vh;
        }


        /* =====================================================
           TOP NAVBAR
        ===================================================== */

        .topbar {
            height: 66px;
            background: #6358b8;
            display: flex;
            align-items: center;
            padding: 0 20px;
            color: white;
        }

        .hamburger {
            width: 52px;
            height: 66px;
            margin-left: -20px;
            margin-right: 10px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: rgba(0, 0, 0, .08);

            font-size: 20px;
        }


        /* =====================================================
           TOP NAVIGATION BUTTONS
        ===================================================== */

        .top-button {
            height: 32px;
            min-width: 42px;

            margin-right: 8px;
            padding: 0 10px;

            background: #ffa500;

            display: flex;
            align-items: center;
            justify-content: center;

            color: white;

            font-weight: bold;

            text-decoration: none;

            border: none;

            cursor: pointer;

            transition: 0.2s;
        }

        .top-button:hover {
            background: #f39a00;
            color: white;
        }

        .top-button i {
            font-size: 18px;
        }

        .top-button.pos-button {
            min-width: 70px;
            gap: 6px;
        }

        .top-button.pos-button span {
            font-size: 14px;
        }


        /* =====================================================
           TOP RIGHT
        ===================================================== */

        .top-right {
            margin-left: auto;

            display: flex;
            align-items: center;

            gap: 18px;
        }

        .admin-circle {
            width: 38px;
            height: 38px;

            background: white;
            color: #6358b8;

            border-radius: 50%;

            display: flex;
            align-items: center;
            justify-content: center;

            font-weight: bold;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {
            padding: 24px;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {
            background: white;

            border: 1px solid #e0e5ec;
            border-radius: 16px;

            padding: 22px 24px;

            display: flex;
            justify-content: space-between;
            align-items: center;

            margin-bottom: 20px;
        }

        .page-title {
            font-size: 25px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: #718096;
            font-size: 14px;
        }


        /* =====================================================
           CARD
        ===================================================== */

        .card {
            background: white;

            border: 1px solid #e0e5ec;
            border-radius: 16px;

            padding: 20px;

            margin-bottom: 20px;
        }


        /* =====================================================
           PRIMARY BUTTON
        ===================================================== */

        .btn-primary-custom {
            background: #1268f3;

            border: none;

            color: white;

            padding: 10px 18px;

            border-radius: 7px;

            text-decoration: none;
        }

        .btn-primary-custom:hover {
            background: #0959d5;
            color: white;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #f7f9fc;

            color: #637083;

            font-size: 12px;

            text-transform: uppercase;

            border-bottom: 1px solid #e0e5ec;
        }

        .table tbody td {
            vertical-align: middle;

            font-size: 14px;
        }


        /* =====================================================
           STATUS BADGE
        ===================================================== */

        .badge-status {
            padding: 6px 10px;

            border-radius: 20px;

            font-size: 11px;
        }


        /* =====================================================
           SEARCH
        ===================================================== */

        .search-box {
            border: 1px solid #dce2ea;

            border-radius: 7px;

            padding: 9px 12px;

            width: 250px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {

            .sidebar {
                width: 220px;
            }

            .main-area {
                margin-left: 220px;
            }

            .top-right {
                gap: 10px;
            }

            .top-right > div:last-child {
                display: none;
            }

        }

        @media (max-width: 700px) {

            .sidebar {
                display: none;
            }

            .main-area {
                margin-left: 0;
            }

            .topbar {
                padding: 0 10px;
            }

            .top-button {
                margin-right: 4px;
            }

            .top-right strong {
                display: none;
            }

            .content {
                padding: 15px;
            }

        }

    </style>
</head>


<body>


{{-- =========================================================
     SIDEBAR
========================================================= --}}

<div class="sidebar">

    {{-- Logo --}}

    <div class="logo-area">

        <div class="logo-icon">
            <i class="bi bi-shop"></i>
        </div>

        <div>

            <div class="logo-title">
                POS APP
            </div>

            <div class="logo-subtitle">
                Point of Sale
            </div>

        </div>

    </div>


    {{-- Menu --}}

    <div class="menu">

        {{-- Main --}}

        <div class="menu-title">
            MAIN
        </div>


        {{-- Dashboard --}}

        <a href="{{ route('dashboard') }}"
           class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-speedometer2"></i>

            <span>
                Dashboard
            </span>

        </a>


        <br>


        {{-- Purchases --}}

        <div class="menu-title">
            PURCHASES
        </div>


        {{-- List Purchases --}}

        <a href="{{ route('purchases.index') }}"
           class="menu-item {{ request()->routeIs('purchases.index') ? 'active' : '' }}">

            <i class="bi bi-list-ul"></i>

            <span>
                List Purchases
            </span>

        </a>


        {{-- Add Purchase --}}

        <a href="{{ route('purchases.create') }}"
           class="menu-item {{ request()->routeIs('purchases.create') ? 'active' : '' }}">

            <i class="bi bi-plus-square"></i>

            <span>
                Add Purchase
            </span>

        </a>


        {{-- List Purchase Return --}}

        <a href="{{ route('purchase-returns.index') }}"
           class="menu-item {{ request()->routeIs('purchase-returns.*') ? 'active' : '' }}">

            <i class="bi bi-arrow-return-left"></i>

            <span>
                List Purchase Return
            </span>

        </a>


        {{-- File Upload --}}

        <a href="{{ route('purchase-files.index') }}"
           class="menu-item {{ request()->routeIs('purchase-files.*') ? 'active' : '' }}">

            <i class="bi bi-upload"></i>

            <span>
                File Upload
            </span>

        </a>

    </div>

</div>



{{-- =========================================================
     MAIN AREA
========================================================= --}}

<div class="main-area">

{{-- =========================================================
     TOPBAR
========================================================= --}}

<div class="topbar">

    {{-- Hamburger --}}
    <div class="hamburger">
        ☰
    </div>


    {{-- =================================================
         BUTTON 1 - ADD PURCHASE
    ================================================== --}}

    <a href="{{ route('purchases.create') }}"
       class="top-button"
       title="Add Purchase">

        <i class="bi bi-plus-circle"></i>

    </a>


    {{-- =================================================
         BUTTON 2 - CALCULATOR
    ================================================== --}}

    <button type="button"
            class="top-button"
            title="Calculator"
            onclick="openCalculator()">

        <i class="bi bi-calculator"></i>

    </button>


    {{-- =================================================
         BUTTON 3 - POS DASHBOARD
    ================================================== --}}

    <a href="{{ route('dashboard') }}"
       class="top-button pos-button"
       title="POS Dashboard">

        <i class="bi bi-grid-3x3-gap-fill"></i>

        <span>
            POS
        </span>

    </a>


    {{-- =================================================
         BUTTON 4 - LIST PURCHASES
    ================================================== --}}

    <a href="{{ route('purchases.index') }}"
       class="top-button"
       title="List Purchases">

        <i class="bi bi-wallet2"></i>

    </a>


    {{-- =================================================
         RIGHT SIDE
    ================================================== --}}

    <div class="top-right">

        {{-- Date --}}
        <strong>
            {{ now()->format('d/m/Y') }}
        </strong>


        {{-- User Icon --}}
        <span>
            <i class="bi bi-person-fill"></i>
        </span>


        {{-- Admin Circle --}}
        <div class="admin-circle">
            A
        </div>


        {{-- Admin Information --}}
        <div>

            <strong>
                Admin
            </strong>

            <br>

            <small>
                Administrator
            </small>

        </div>

    </div>

</div>


    {{-- =====================================================
         PAGE CONTENT
    ====================================================== --}}

    <div class="content">


        {{-- Success Message --}}

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif


        {{-- Error Message --}}

        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif


        {{-- Validation Errors --}}

        @if($errors->any())

            <div class="alert alert-danger">

                <strong>
                    Please fix the following errors:
                </strong>

                <ul class="mb-0 mt-2">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        {{-- Page Content --}}

        @yield('content')


    </div>

</div>


{{-- Bootstrap JavaScript --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>
<script>

    let calculatorValue = '';


    function openCalculator()
    {
        calculatorValue = '';

        document.getElementById('calculatorDisplay').value = '0';


        const calculatorModal =
            new bootstrap.Modal(
                document.getElementById('calculatorModal')
            );


        calculatorModal.show();
    }


    function calculatorInput(value)
    {
        calculatorValue += value;

        document.getElementById('calculatorDisplay').value =
            calculatorValue;
    }


    function calculatorClear()
    {
        calculatorValue = '';

        document.getElementById('calculatorDisplay').value = '0';
    }


    function calculatorResult()
    {
        if (calculatorValue === '') {
            return;
        }


        try {

            const result = Function(
                '"use strict"; return (' +
                calculatorValue +
                ')'
            )();


            calculatorValue = result.toString();


            document.getElementById('calculatorDisplay').value =
                calculatorValue;

        } catch (error) {

            document.getElementById('calculatorDisplay').value =
                'Error';

            calculatorValue = '';
        }
    }

</script>
{{-- =========================================================
     CALCULATOR MODAL
========================================================= --}}

<div class="modal fade"
     id="calculatorModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog modal-sm">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title">
                    Calculator
                </h5>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal">
                </button>

            </div>


            <div class="modal-body">

                <input type="text"
                       id="calculatorDisplay"
                       class="form-control form-control-lg text-end mb-3"
                       value="0"
                       readonly>


                <div class="row g-2">

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('7')">
                            7
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('8')">
                            8
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('9')">
                            9
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-warning w-100"
                                onclick="calculatorInput('/')">
                            ÷
                        </button>
                    </div>


                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('4')">
                            4
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('5')">
                            5
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('6')">
                            6
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-warning w-100"
                                onclick="calculatorInput('*')">
                            ×
                        </button>
                    </div>


                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('1')">
                            1
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('2')">
                            2
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('3')">
                            3
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-warning w-100"
                                onclick="calculatorInput('-')">
                            −
                        </button>
                    </div>


                    <div class="col-3">
                        <button class="btn btn-danger w-100"
                                onclick="calculatorClear()">
                            C
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-secondary w-100"
                                onclick="calculatorInput('0')">
                            0
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-success w-100"
                                onclick="calculatorResult()">
                            =
                        </button>
                    </div>

                    <div class="col-3">
                        <button class="btn btn-warning w-100"
                                onclick="calculatorInput('+')">
                            +
                        </button>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
</body>
</html>