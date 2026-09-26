<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>POS Dashboard</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >


    <!-- Bootstrap Icons -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css"
        rel="stylesheet"
    >


    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;
            background: #f5f7fb;
            font-family: Arial, Helvetica, sans-serif;
            color: #10213f;
        }


        /* =====================================================
           SIDEBAR
        ===================================================== */

        .sidebar {

            position: fixed;

            left: 0;
            top: 0;

            width: 249px;
            height: 100vh;

            background: #151f34;

            color: white;

            overflow-y: auto;
        }


        /* =====================================================
           LOGO
        ===================================================== */

        .logo-area {

            height: 80px;

            padding: 18px 12px;

            border-bottom: 1px solid #263149;

            display: flex;

            align-items: center;
        }


        .logo-icon {

            width: 40px;
            height: 40px;

            border-radius: 10px;

            background: #0866f5;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-right: 10px;

            font-size: 20px;
        }


        .logo-title {

            font-size: 16px;

            font-weight: 700;
        }


        .logo-subtitle {

            font-size: 13px;

            color: #aeb8ca;

            margin-top: 2px;
        }


        /* =====================================================
           MENU
        ===================================================== */

        .menu {
            padding-bottom: 20px;
        }


        .menu-title {

            padding: 25px 12px 8px;

            color: #8290aa;

            font-size: 10px;

            font-weight: bold;

            letter-spacing: 1px;
        }


        .menu-item {

            display: flex;

            align-items: center;

            gap: 13px;

            color: #e3e8f1;

            text-decoration: none;

            padding: 11px 15px;

            margin: 2px 12px;

            border-radius: 8px;

            font-size: 14px;
        }


        .menu-item:hover {

            background: #1d3969;

            color: white;
        }


        .menu-item.active {

            background: #1c3e79;

            color: white;
        }


        .menu-item i {

            width: 16px;

            font-size: 15px;

            text-align: center;
        }


        /* =====================================================
           MAIN AREA
        ===================================================== */

        .main-area {

            margin-left: 249px;

            min-height: 100vh;
        }


        /* =====================================================
           TOPBAR
        ===================================================== */

        .topbar {

            height: 66px;

            background: #6259b7;

            display: flex;

            align-items: center;

            padding: 0 12px;

            color: white;
        }


        .hamburger {

            width: 40px;

            height: 66px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

            flex-shrink: 0;
        }


        /* =====================================================
           TOP BUTTONS
        ===================================================== */

        .top-button {

            height: 32px;

            min-width: 42px;

            margin-left: 9px;

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

            border-radius: 0;

            font-size: 15px;
        }


        .top-button:hover {

            background: #f39a00;

            color: white;
        }


        /* =====================================================
           POS BUTTON
        ===================================================== */

        .pos-button {

            width: 62px;

            min-width: 62px;

            gap: 6px;

            padding: 0 10px;
        }


        .pos-button i {

            font-size: 14px;
        }


        .pos-button span {

            font-size: 12px;

            font-weight: bold;

            line-height: 1;
        }


        /* =====================================================
           TOP RIGHT
        ===================================================== */

        .top-right {

            margin-left: auto;

            display: flex;

            align-items: center;

            gap: 18px;

            height: 66px;
        }


        .top-date {

            font-size: 13px;

            font-weight: 600;

            white-space: nowrap;
        }


        /* =====================================================
           NOTIFICATION
        ===================================================== */

        .notification-button {

            position: relative;

            width: 38px;

            height: 38px;

            border: none;

            background: transparent;

            color: white;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

            cursor: pointer;

            border-radius: 50%;

            padding: 0;
        }


        .notification-button:hover {

            background: rgba(255, 255, 255, 0.12);
        }


        .notification-dot {

            position: absolute;

            top: 6px;

            right: 6px;

            width: 7px;

            height: 7px;

            background: #ff4d5a;

            border-radius: 50%;

            border: 1px solid white;
        }


        /* =====================================================
           ADMIN BUTTON
        ===================================================== */

        .admin-button {

            border: none;

            background: transparent;

            color: white;

            display: flex;

            align-items: center;

            gap: 10px;

            padding: 4px 6px;

            cursor: pointer;

            border-radius: 8px;
        }


        .admin-button:hover {

            background: rgba(255, 255, 255, 0.10);

            color: white;
        }


        .admin-button::after {

            margin-left: 2px;

            vertical-align: middle;
        }


        .admin-circle {

            width: 39px;

            height: 39px;

            background: white;

            color: #6259b7;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            font-weight: bold;

            flex-shrink: 0;
        }


        .admin-info {

            min-width: 85px;

            text-align: left;
        }


        .admin-name {

            font-size: 14px;

            font-weight: 600;

            line-height: 18px;
        }


        .admin-role {

            font-size: 11px;

            color: #dddaf4;

            line-height: 16px;
        }


        /* =====================================================
           ADMIN DROPDOWN
        ===================================================== */

        .admin-dropdown {

            min-width: 210px;

            margin-top: 10px !important;

            border: 1px solid #e1e5ed;

            border-radius: 10px;

            padding: 7px;

            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }


        .admin-dropdown .dropdown-item {

            padding: 9px 10px;

            border-radius: 6px;

            font-size: 14px;
        }


        .admin-dropdown .dropdown-item:hover {

            background: #f3f6fb;
        }


        .admin-dropdown .dropdown-header {

            font-size: 12px;

            color: #7a8598;

            padding: 8px 10px;
        }


        /* =====================================================
           CONTENT
        ===================================================== */

        .content {

            padding: 24px;
        }


        /* =====================================================
           WELCOME CARD
        ===================================================== */

        .welcome-card {

            background: white;

            border: 1px solid #e1e5ed;

            border-radius: 15px;

            padding: 25px;

            display: flex;

            align-items: center;

            justify-content: space-between;

            margin-bottom: 24px;
        }


        .welcome-title {

            font-size: 27px;

            font-weight: 700;

            margin-bottom: 4px;
        }


        .welcome-text {

            color: #65718a;

            font-size: 14px;
        }


        .new-purchase-btn {

            background: #1469f5;

            color: white;

            border: none;

            padding: 13px 21px;

            border-radius: 7px;

            font-size: 15px;

            text-decoration: none;

            white-space: nowrap;
        }


        .new-purchase-btn:hover {

            background: #0757d8;

            color: white;
        }


        /* =====================================================
           STAT CARDS
        ===================================================== */

        .stat-card {

            background: white;

            border: 1px solid #e1e5ed;

            border-radius: 15px;

            min-height: 125px;

            padding: 20px;

            display: flex;

            align-items: center;
        }


        .stat-icon {

            width: 48px;

            height: 48px;

            border-radius: 12px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 21px;

            margin-right: 15px;

            flex-shrink: 0;
        }


        .blue-icon {

            background: #e8f1ff;

            color: #0866f5;
        }


        .green-icon {

            background: #e7f8ed;

            color: #19a15f;
        }


        .orange-icon {

            background: #fff2df;

            color: #ff8a00;
        }


        .purple-icon {

            background: #f1e9ff;

            color: #7140db;
        }


        .stat-title {

            color: #78839a;

            font-size: 13px;

            margin-bottom: 4px;
        }


        .stat-value {

            font-size: 23px;

            font-weight: 700;

            color: #0e1d36;
        }


        .stat-description {

            color: #64708a;

            font-size: 13px;

            margin-top: 4px;
        }


        .green-text {

            color: #00a866;
        }


        /* =====================================================
           SECTION CARD
        ===================================================== */

        .section-card {

            background: white;

            border: 1px solid #e1e5ed;

            border-radius: 15px;

            padding: 20px;
        }


        .section-title {

            font-size: 20px;

            font-weight: 600;

            margin-bottom: 4px;
        }


        .section-subtitle {

            color: #718098;

            font-size: 13px;
        }


        .divider {

            border-top: 1px solid #e4e7ed;

            margin: 17px 0;
        }


        /* =====================================================
           QUICK ACTIONS
        ===================================================== */

        .quick-action {

            border: 1px solid #dfe4ec;

            border-radius: 12px;

            padding: 15px;

            display: flex;

            align-items: center;

            text-decoration: none;

            color: #10213f;

            min-height: 74px;
        }


        .quick-action:hover {

            border-color: #9cbcff;

            background: #fafcff;

            color: #10213f;
        }


        .quick-icon {

            width: 40px;

            height: 40px;

            border-radius: 9px;

            background: #edf4ff;

            color: #0866f5;

            display: flex;

            align-items: center;

            justify-content: center;

            margin-right: 12px;

            flex-shrink: 0;
        }


        .quick-title {

            font-weight: 600;

            font-size: 14px;
        }


        .quick-description {

            color: #8290a7;

            font-size: 12px;

            margin-top: 3px;
        }


        .arrow {

            margin-left: auto;

            font-size: 18px;
        }


        /* =====================================================
           SYSTEM OVERVIEW
        ===================================================== */

        .system-row {

            display: flex;

            align-items: center;

            justify-content: space-between;

            padding: 16px 0;

            border-bottom: 1px solid #e5e8ee;

            font-size: 13px;
        }


        .system-left {

            display: flex;

            align-items: center;

            gap: 10px;
        }


        .online {

            color: #0a9b58;
        }


        .connected {

            color: #1268f4;
        }


        .low-stock {

            color: #ff9b00;
        }


        .pending {

            color: #14a9c8;
        }


        .system-value {

            font-weight: 600;
        }


        /* =====================================================
           RECENT PURCHASES
        ===================================================== */

        .recent-header {

            display: flex;

            justify-content: space-between;

            align-items: center;
        }


        .view-all {

            border: 1px solid #0d6efd;

            color: #0d6efd;

            background: white;

            padding: 7px 13px;

            border-radius: 6px;

            text-decoration: none;

            font-size: 13px;
        }


        .view-all:hover {

            background: #0d6efd;

            color: white;
        }


        .purchase-table {

            width: 100%;

            border-collapse: collapse;
        }


        .purchase-table th,
        .purchase-table td {

            padding: 12px 8px;

            border-bottom: 1px solid #edf0f4;

            text-align: left;

            font-size: 13px;
        }


        .purchase-table th {

            color: #78849b;

            font-weight: 600;
        }


        .badge-status {

            padding: 5px 9px;

            border-radius: 20px;

            font-size: 11px;
        }


        .badge-pending {

            background: #fff3cd;

            color: #856404;
        }


        .badge-paid {

            background: #d1e7dd;

            color: #0f5132;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media(max-width: 992px) {

            .sidebar {
                width: 220px;
            }


            .main-area {
                margin-left: 220px;
            }


            .content {
                padding: 15px;
            }

        }


        @media(max-width: 768px) {

            .sidebar {

                position: relative;

                width: 100%;

                height: auto;
            }


            .main-area {

                margin-left: 0;
            }


            .welcome-card {

                flex-direction: column;

                align-items: flex-start;

                gap: 15px;
            }


            .top-right {

                gap: 8px;
            }


            .top-date {

                display: none;
            }


            .admin-info {

                display: none;
            }

        }

    </style>

</head>


<body>


<!-- =========================================================
     SIDEBAR
========================================================= -->

<div class="sidebar">


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



    <div class="menu">


        <div class="menu-title">
            MAIN
        </div>


        <a href="{{ route('dashboard') }}"
           class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">

            <i class="bi bi-speedometer2"></i>

            <span>
                Dashboard
            </span>

        </a>



        <div class="menu-title">
            PURCHASES
        </div>



        <a href="{{ route('purchases.index') }}"
           class="menu-item {{ request()->routeIs('purchases.index') ? 'active' : '' }}">

            <i class="bi bi-list-ul"></i>

            <span>
                List Purchases
            </span>

        </a>



        <a href="{{ route('purchases.create') }}"
           class="menu-item {{ request()->routeIs('purchases.create') ? 'active' : '' }}">

            <i class="bi bi-plus-square"></i>

            <span>
                Add Purchase
            </span>

        </a>



        <a href="{{ route('purchase-returns.index') }}"
           class="menu-item {{ request()->routeIs('purchase-returns.*') ? 'active' : '' }}">

            <i class="bi bi-arrow-return-left"></i>

            <span>
                List Purchase Return
            </span>

        </a>



        <a href="{{ route('purchase-files.index') }}"
           class="menu-item {{ request()->routeIs('purchase-files.*') ? 'active' : '' }}">

            <i class="bi bi-upload"></i>

            <span>
                File Upload
            </span>

        </a>


    </div>

</div>



<!-- =========================================================
     MAIN AREA
========================================================= -->

<div class="main-area">


    <!-- =====================================================
         TOPBAR
    ====================================================== -->

    <div class="topbar">


        <!-- HAMBURGER -->

        <div class="hamburger">

            <i class="bi bi-list"></i>

        </div>



        <!-- ADD PURCHASE -->

        <a href="{{ route('purchases.create') }}"
           class="top-button"
           title="Add Purchase">

            <i class="bi bi-plus-circle"></i>

        </a>



        <!-- CALCULATOR -->

        <button type="button"
                class="top-button"
                title="Calculator"
                onclick="openCalculator()">

            <i class="bi bi-calculator"></i>

        </button>



        <!-- POS DASHBOARD -->

        <a href="{{ route('dashboard') }}"
           class="top-button pos-button"
           title="POS Dashboard">

            <i class="bi bi-grid-3x3-gap-fill"></i>

            <span>
                POS
            </span>

        </a>



        <!-- LIST PURCHASES -->

        <a href="{{ route('purchases.index') }}"
           class="top-button"
           title="List Purchases">

            <i class="bi bi-wallet2"></i>

        </a>



        <!-- =================================================
             TOP RIGHT
        ================================================== -->

        <div class="top-right">


            <!-- DATE -->

            <div class="top-date">

                {{ now()->format('d/m/Y') }}

            </div>



            <!-- NOTIFICATION -->

            <button type="button"
                    class="notification-button"
                    title="Notifications"
                    onclick="showNotifications()">

                <i class="bi bi-bell-fill"></i>

                <span class="notification-dot"></span>

            </button>



            <!-- ADMIN -->

            <div class="dropdown">


                <button type="button"
                        class="admin-button dropdown-toggle"
                        data-bs-toggle="dropdown"
                        aria-expanded="false">


                    <div class="admin-circle">

                        A

                    </div>


                    <div class="admin-info">

                        <div class="admin-name">

                            Admin

                        </div>


                        <div class="admin-role">

                            Administrator

                        </div>

                    </div>


                </button>



                <!-- ADMIN DROPDOWN -->

                <ul class="dropdown-menu dropdown-menu-end admin-dropdown">


                    <li>

                        <h6 class="dropdown-header">

                            Admin Account

                        </h6>

                    </li>


                    <li>

                        <a class="dropdown-item"
                           href="#">

                            <i class="bi bi-person me-2"></i>

                            Profile

                        </a>

                    </li>


                    <li>

                        <a class="dropdown-item"
                           href="#">

                            <i class="bi bi-gear me-2"></i>

                            Settings

                        </a>

                    </li>


                    <li>

                        <hr class="dropdown-divider">

                    </li>


                    <li>

                        <a class="dropdown-item text-danger"
                           href="#"
                           onclick="logoutUser(event)">

                            <i class="bi bi-box-arrow-right me-2"></i>

                            Logout

                        </a>

                    </li>


                </ul>

            </div>


        </div>

    </div>



    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <div class="content">


        <!-- WELCOME -->

        <div class="welcome-card">


            <div>

                <div class="welcome-title">

                    Welcome to POS Dashboard

                </div>


                <div class="welcome-text">

                    Manage your purchases, sales, products and inventory from one place.

                </div>

            </div>


            <a href="{{ route('purchases.create') }}"
               class="new-purchase-btn">

                <i class="bi bi-plus-lg"></i>

                &nbsp; New Purchase

            </a>


        </div>



        <!-- STATISTICS -->

        <div class="row g-3 mb-4">


            <div class="col-lg-3 col-md-6">

                <div class="stat-card">


                    <div class="stat-icon blue-icon">

                        <i class="bi bi-wallet2"></i>

                    </div>


                    <div>

                        <div class="stat-title">
                            Today's Sales
                        </div>


                        <div class="stat-value">
                            ৳ 0.00
                        </div>


                        <div class="stat-description green-text">
                            0% from yesterday
                        </div>

                    </div>


                </div>

            </div>



            <div class="col-lg-3 col-md-6">

                <div class="stat-card">


                    <div class="stat-icon green-icon">

                        <i class="bi bi-bag-check"></i>

                    </div>


                    <div>

                        <div class="stat-title">
                            Today's Purchases
                        </div>


                        <div class="stat-value">

                            ৳ {{ number_format($todayPurchaseAmount, 2) }}

                        </div>


                        <div class="stat-description">

                            {{ $todayPurchases }} purchases today

                        </div>

                    </div>


                </div>

            </div>



            <div class="col-lg-3 col-md-6">

                <div class="stat-card">


                    <div class="stat-icon orange-icon">

                        <i class="bi bi-box"></i>

                    </div>


                    <div>

                        <div class="stat-title">
                            Total Products
                        </div>


                        <div class="stat-value">
                            0
                        </div>


                        <div class="stat-description">
                            Products in inventory
                        </div>

                    </div>


                </div>

            </div>



            <div class="col-lg-3 col-md-6">

                <div class="stat-card">


                    <div class="stat-icon purple-icon">

                        <i class="bi bi-people"></i>

                    </div>


                    <div>

                        <div class="stat-title">
                            Customers
                        </div>


                        <div class="stat-value">
                            0
                        </div>


                        <div class="stat-description">
                            Registered customers
                        </div>

                    </div>


                </div>

            </div>


        </div>



        <!-- QUICK ACTIONS + SYSTEM OVERVIEW -->

        <div class="row g-4 mb-4">


            <div class="col-lg-8">

                <div class="section-card">


                    <div class="section-title">
                        Quick Actions
                    </div>


                    <div class="section-subtitle">
                        Frequently used POS operations
                    </div>


                    <div class="divider"></div>


                    <div class="row g-3">


                        <div class="col-md-6">

                            <a href="{{ route('purchases.index') }}"
                               class="quick-action">

                                <div class="quick-icon">

                                    <i class="bi bi-plus-circle"></i>

                                </div>


                                <div>

                                    <div class="quick-title">
                                        Purchase Data Manage
                                    </div>


                                    <div class="quick-description">
                                        Create or edit purchase data
                                    </div>

                                </div>


                                <i class="bi bi-chevron-right arrow"></i>

                            </a>

                        </div>



                        <div class="col-md-6">

                            <a href="{{ route('purchases.create') }}"
                               class="quick-action">

                                <div class="quick-icon">

                                    <i class="bi bi-file-earmark-plus"></i>

                                </div>


                                <div>

                                    <div class="quick-title">
                                        Purchase Order
                                    </div>


                                    <div class="quick-description">
                                        Create a new purchase order
                                    </div>

                                </div>


                                <i class="bi bi-chevron-right arrow"></i>

                            </a>

                        </div>



                        <div class="col-md-6">

                            <a href="#"
                               class="quick-action">

                                <div class="quick-icon">

                                    <i class="bi bi-cart-plus"></i>

                                </div>


                                <div>

                                    <div class="quick-title">
                                        New Sale
                                    </div>


                                    <div class="quick-description">
                                        Process a customer sale
                                    </div>

                                </div>


                                <i class="bi bi-chevron-right arrow"></i>

                            </a>

                        </div>



                        <div class="col-md-6">

                            <a href="#"
                               class="quick-action">

                                <div class="quick-icon">

                                    <i class="bi bi-box"></i>

                                </div>


                                <div>

                                    <div class="quick-title">
                                        Add Product
                                    </div>


                                    <div class="quick-description">
                                        Add a product to inventory
                                    </div>

                                </div>


                                <i class="bi bi-chevron-right arrow"></i>

                            </a>

                        </div>


                    </div>

                </div>

            </div>



            <div class="col-lg-4">

                <div class="section-card">


                    <div class="section-title">
                        System Overview
                    </div>


                    <div class="section-subtitle">
                        Current status
                    </div>


                    <div class="divider"></div>



                    <div class="system-row">

                        <div class="system-left">

                            <i class="bi bi-check-circle-fill online"></i>

                            Application

                        </div>


                        <div class="system-value">
                            Online
                        </div>

                    </div>



                    <div class="system-row">

                        <div class="system-left">

                            <i class="bi bi-database connected"></i>

                            Database

                        </div>


                        <div class="system-value">
                            Connected
                        </div>

                    </div>



                    <div class="system-row">

                        <div class="system-left">

                            <i class="bi bi-box low-stock"></i>

                            Low Stock

                        </div>


                        <div class="system-value">
                            0 items
                        </div>

                    </div>



                    <div class="system-row">

                        <div class="system-left">

                            <i class="bi bi-card-list pending"></i>

                            Pending Orders

                        </div>


                        <div class="system-value">
                            0
                        </div>

                    </div>


                </div>

            </div>


        </div>



        <!-- RECENT PURCHASES -->

        <div class="section-card">


            <div class="recent-header">


                <div>

                    <div class="section-title">
                        Recent Purchases
                    </div>


                    <div class="section-subtitle">
                        Latest purchase transactions will appear here.
                    </div>

                </div>


                <a href="{{ route('purchases.index') }}"
                   class="view-all">

                    View All

                </a>


            </div>


            <div class="divider"></div>



            @if($recentPurchases->count() > 0)


                <div class="table-responsive">


                    <table class="purchase-table">


                        <thead>

                            <tr>

                                <th>
                                    Reference
                                </th>

                                <th>
                                    Supplier
                                </th>

                                <th>
                                    Date
                                </th>

                                <th>
                                    Total
                                </th>

                                <th>
                                    Status
                                </th>

                            </tr>

                        </thead>


                        <tbody>


                            @foreach($recentPurchases as $purchase)


                                <tr>

                                    <td>
                                        {{ $purchase->reference_no }}
                                    </td>


                                    <td>
                                        {{ $purchase->supplier->name ?? 'N/A' }}
                                    </td>


                                    <td>
                                        {{ $purchase->purchase_date }}
                                    </td>


                                    <td>
                                        ৳ {{ number_format($purchase->grand_total, 2) }}
                                    </td>


                                    <td>


                                        <span class="badge-status
                                            {{ $purchase->status === 'Paid'
                                                ? 'badge-paid'
                                                : 'badge-pending' }}">

                                            {{ $purchase->status }}

                                        </span>


                                    </td>

                                </tr>


                            @endforeach


                        </tbody>

                    </table>


                </div>


            @else


                <div class="text-center py-4 text-muted">

                    No purchase transactions available.

                </div>


            @endif


        </div>


    </div>

</div>



<!-- =========================================================
     CALCULATOR MODAL
========================================================= -->

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



<!-- =========================================================
     BOOTSTRAP JS
========================================================= -->

<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
</script>



<script>

    /* =====================================================
       CALCULATOR
    ===================================================== */

    let calculatorValue = '';


    function openCalculator()
    {

        calculatorValue = '';

        document.getElementById('calculatorDisplay').value = '0';


        const calculatorElement =
            document.getElementById('calculatorModal');


        const calculatorModal =
            new bootstrap.Modal(calculatorElement);


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

        document.getElementById('calculatorDisplay').value =
            '0';

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


            calculatorValue =
                result.toString();


            document.getElementById('calculatorDisplay').value =
                calculatorValue;

        }

        catch (error) {

            calculatorValue = '';

            document.getElementById('calculatorDisplay').value =
                'Error';

        }

    }



    /* =====================================================
       NOTIFICATIONS
    ===================================================== */

    function showNotifications()
    {

        alert('No new notifications.');

    }



    /* =====================================================
       LOGOUT
    ===================================================== */

    function logoutUser(event)
    {

        event.preventDefault();


        alert(
            'Logout functionality will be connected when authentication is implemented.'
        );

    }

</script>


</body>

</html>