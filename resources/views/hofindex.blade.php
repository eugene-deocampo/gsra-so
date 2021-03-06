<?php
use App\Http\Controllers\hofcontroller;
$tot = hofcontroller::totalamount();
//$prof = bmcontroller::profit();
//$exp = bmcontroller::expenses();
//$save = bmcontroller::savings();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reports</title>

    <!-- Custom fonts for this template -->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="js/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

@extends('layouts.app')

@section('content')
@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<body id= "page-top">

<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">  <sup>Store Owner</sup></div>
    </a>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider my-0"> -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <center><img src="/img/{{ Auth::user()->Image }}" class="img-thumbnail rounded-circle border-0"><br>{{{ Auth::user()->StoreOwner}}}<br>{{ __('Owner') }}</center>
        </a>

    </li>
    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <div class="sidebar-heading">
    </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <hr class="sidebar-divider my-0">
 <li class="nav-item">
        <a class="nav-link collapsed" href="homepage_bm" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Dashboard</span>
        </a>
        <hr class="sidebar-divider my-0">
    </li>
        <li class="nav-item active">
            <a class="nav-link collapsed" href="hof" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Reports</span>
        </a>
        <hr class="sidebar-divider my-0">
    </li>
    <li class="nav-item">
            <a class="nav-link collapsed" href="homepage_hof" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Settings</span>
        </a>
        <hr class="sidebar-divider my-0">

</li>
</ul>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column"  style="background-color: cornsilk">

            <!-- Main Content -->
            <div id="content">
 <!-- Begin Page Content -->
 <div class="container-fluid">



<!-- DataTales Example -->
<div class="card shadow mb-4">


<div class="card-body">
<form action='hof' method="GET">
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <div class="form-group row">
                    <label for="date" class="col-form-label">Date from</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control input-sm" id="fromDate" name="fromDate" required/>
                    </div>
                    <label for="date" class="col-form-label">Date to</label>
                    <div class="col-sm-3">
                        <input type="date" class="form-control input-sm" id="toDate" name="toDate" required/>
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-primary" name="search" titke="Search">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



    <br>
<div>
<h6 class="collapse-header">Overall Number of Customers:
    <?php echo ' ' . $tot ?><br></h6>
</div>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead>
        <tr>
            <th>Customer ID</th>
            <th>Date/Time In </th>
            <th>Date/Time Out </th>
            <th>Action</th>


            <!--<th>Action</th>-->
        </tr></thead>
        @foreach ($data as $sh)
        <tr>

        <td>{{$sh->AccountID}}</td>
        <td>{{$sh->time_in}}</td>
        <td>{{$sh->time_out}}</td>
      <td><a href="/hofindex/{{$sh->AccountID}}">View</a></td>

        </tr>
        @endforeach
    </table>
    </div></div>
    </div>
                </div>
            </div>
        </div>
     </div>
    </div>
    </div>
    </div>
</div>
@endsection

</body>

</html>