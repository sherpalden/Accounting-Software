<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8" />
  <!-- <link rel="apple-touch-icon" sizes="76x76" href="{{asset('material-dashboard/assets/img/apple-icon.png')}}"> -->
  <!-- <link rel="icon" type="image/png" href="{{asset('material-dashboard/assets/img/favicon.png')}}"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    GNMP Board
  </title>
  <link rel="icon" type="image/ico" href="{{asset('images/GNMPlogo/GNMPlogo.png')}}" />
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="{{asset('material-dashboard/assets/css/FontFamilyRoboto.css')}}" />
  <!-- <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" /> -->
  <!-- <link rel="stylesheet" href="{{asset('material-dashboard/assets/css/BootstrapFontawesome.css')}}"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="{{asset('material-dashboard/assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{asset('material-dashboard/assets/demo/demo.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="{{asset('css/boardCustom.css')}}">
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="{{asset('material-dashboard/assets/img/sidebar-1.jpg')}}">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          GNMP
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item {!! request()->is('board')?'active':'' !!}">
            <a class="nav-link" href="{{route('board.dashboard')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/leader')?'active':'' !!}">
            <a class="nav-link" href="{{route('board.leader')}}">
              <i class="material-icons">person</i>
              <p>Leader</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/dealer')?'active':'' !!}">
            <a class="nav-link" href="{{route('board.dealer')}}">
              <i class="material-icons">store_mall_directory</i>
              <p>Dealer</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/purchase')?'active':'' !!}">
            <a class="nav-link" href="{{route('board.accounting.purchasePage')}}">
              <i class="material-icons">account_balance</i>
              <p>Purchase Entry</p>
            </a>
          </li>
           <!-- <ul class="purchaseCat" style="display: none;">
             <li class="purchaseList">Entry 1</li>
             <li class="purchaseList">Entry 2</li>
             <li class="purchaseList">Entry 3</li>
             <li class="purchaseList">Entry 4</li>
           </ul> -->
          <li class="nav-item {!! request()->is('board/accounting/sales')?'active':'' !!}">
            <a class="nav-link" href="{{route('board.accounting.salesPage')}}">
              <i class="material-icons">account_balance</i>
              <p>Sales Entry</p>
            </a>
          </li>

          <li class="nav-item {!! request()->is('board/accounting/payment')?'active':'' !!}">
            <a class="nav-link" href="{{route('board.accounting.paymentPage')}}">
              <i class="material-icons">attach_money</i>
              <p>Payment Entry</p>
            </a>
          </li>

          <li class="nav-item {!! request()->is('board/accounting/receipt')?'active':'' !!}">
            <a class="nav-link" href="{{route('board.accounting.receiptPage')}}">
              <i class="material-icons">attach_money</i>
              <p>Receipt Entry</p>
            </a>
          </li>

          <li class="nav-item {!! request()->is('board/accounting/expenses')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.expensesPage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Expenses</p>
            </a>
          </li>

          <li class="nav-item {!! request()->is('board/accounting/income')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.incomePage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Income</p>
            </a>
          </li>

          <li class="nav-item {!! request()->is('board/accounting/payroll')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.payrollPage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Payroll</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/bankTransactions')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.bankTransactionsPage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Banking Transactions</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/billsReceivable')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.billsReceivablePage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Bills Receivable</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/billsPayable')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.billsPayablePage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Bills Payable</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/journal')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.journalPage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Journal Entries</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/ledger')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.ledgerPage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Ledger Accounts</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/trialBalance')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.trialBalancePage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Trial Balance</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/incomeStatement')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.incomeStatementPage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Income Statement</p>
            </a>
          </li>
          <li class="nav-item {!! request()->is('board/accounting/balanceSheet')?'active':'' !!}">
            <a class="nav-link" href="{{ route('board.accounting.balanceSheetPage') }}">
              <i class="material-icons">store_mall_directory</i>
              <p>Balance Sheet</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">
              {!! request()->is('board')?'Dashboard':'' !!}
              {!! request()->is('board/leader')?'Leader':'' !!}
              {!! request()->is('board/dealer')?'Dealer':'' !!}
              {!! request()->is('board/vat')?'VAT':'' !!}
            </a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#pablo">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('board.logout') }}">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>