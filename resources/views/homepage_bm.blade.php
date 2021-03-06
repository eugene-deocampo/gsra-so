<?php
use App\Http\Controllers\ChartbrController;
$tot = ChartbrController::totalcustomer();
$totnow = ChartbrController::totalnow();
$totout = ChartbrController::totalout();
$available = ChartbrController::avail();
$loc = ChartbrController::location();
$male = ChartbrController::male();
$female = ChartbrController::female();

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- add icon library -->
    <link rel="stylesheet" href="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--chart-->
    <script type = "text/javascript" src = "https://www.gstatic.com/charts/loader.js"></script>

    <!-- Bar chart -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js" integrity="sha512-vBmx0N/uQOXznm/Nbkp7h0P1RfLSj0HQrFSzV8m7rOGyj30fYAOKHYvCNez+yM8IrfnW0TCodDEjRqf6fodf/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>



<!-- for pie chart 1 -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gender','Total Count'],
          <?php echo $gendercount; ?>
        ]);

        var options = {
          title: 'Total Number of Customers by Gender'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>


<!-- for treemap -->
    <script type="text/javascript">

      google.charts.load('current', {'packages':['treemap']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart()
      {
        var data = google.visualization.arrayToDataTable([
          ['Location', 'Parent', 'Market trade volume (size)'],
          ['Nasugbu',    null,                 0],
          <?php echo $cadds; ?>
        ]);

        tree = new google.visualization.TreeMap(document.getElementById('chart_div'));

        tree.draw(data, {
          minColor: '#f00',
          midColor: '#ddd',
          maxColor: '#0572EE',
          headerHeight: 15,
          fontColor: 'black',
          showScale: true
        });

      }

    </script>
@extends('layouts.app')

@section('content')
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

    <li class="nav-item active">
    <hr class="sidebar-divider my-0">
        <a class="nav-link collapsed" href="homepage_bm" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <hr class="sidebar-divider my-0">
        <a class="nav-link collapsed" href="hof" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Reports</span>
        </a>
        <hr class="sidebar-divider my-0">

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

  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Main Content -->
        <div id="content">
            <div class="col"> <!-- Search -->
                        <div class="row">
                            <div class="card text-right" style="width: 100%; margin-left:15px; margin-right:15px;"><br>
                            <h5 ><b>
                            <?php echo date("F j, Y l"); ?></b></h5>
                        </div>
             </div>
            <div class="card" style="padding-right: 32px; padding-left:32px;">
                <div class="row"><div class="col"><br></div></div>
                <div class="row">
                    <div class="col d-flex align-items-stretch">
                        <div class="card border-dark mb-3 text-center" style="width:100%; background-color: cornsilk">
                        <div class="card-body">
                            <h6 class="card-title">Total No. of Customer Today</h6>
                            <h4 class="card-text"><?php echo ' ' . $totnow; ?></h4>
                        </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-stretch">
                        <div class="card border-dark mb-3 text-center" style="width:100%; background-color: cornsilk">
                        <div class="card-body">
                            <h6 class="card-title">Current No. of Customer Inside the Store</h6>
                            <h4 class="card-text"><?php echo ' ' . $tot; ?></h4>
                        </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-stretch">
                        <div class="card border-dark mb-3 text-center" style="width:100%; background-color: cornsilk">
                        <div class="card-body">
                            <h6 class="card-title">No. of Customer who have left the Store</h6>
                            <h4 class="card-text"><?php echo ' ' . $totout; ?></h4>
                        </div>
                        </div>
                    </div>
                    <div class="col d-flex align-items-stretch">
                        <div class="card border-dark mb-3 text-center" style="width:100%; background-color: cornsilk">
                        <div class="card-body">
                            <h6 class="card-title">Available No. of Customer that can still enter the Store</h6>
                            <h4 class="card-text"><?php echo ' ' . $available; ?>/{{{ Auth::user()->maximum_cust}}}</h4>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col"> <!-- Stats-->
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><b>Statistics</b></h5>
                            </div>

                                <div class="col-md-11">
                                    <div style="margin:auto;">
                                        <canvas id="barChart"><canvas>
                                    </div>

                                </div>
                                </div>

                        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <div id="piechart"></div>
                </div>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <div id="piechart"></div>
                </div>
            </div>
            </div>
        </div>
<!-- Treemap Chart -->

        <div class="row">
            <div class="col">
            <div class="card">
                <div class="card-body">
                    <div id="chart_div"></div>
                </div>
            </div>
            </div>
        </div>





{!! Charts::scripts() !!}
    <!-- !! $profchart->script() !! -->
    <!-- tinanggal ko curly braces sa taas para di muna mag appear error -->

<!-- Script for barchart -->

<script>
        $(function(){
            var datas = <?php echo json_encode($datas); ?>;
            var barCanvas = $("#barChart");
            var barChart = new Chart(barCanvas,
            {
                type: 'bar',
                data:{
                    labels:['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
                    datasets:[
                        {
                            label:'No. of Customer',
                            data:datas,
                            backgroundColor:['red','orange','yellow','green','blue','indigo','violet','purple','pink','silver','gold','brown']
                        }
                    ]
                },
                options:{
                    title:{
                        display:true,
                        text:'Customer per Month',
                    },
                    legend:{
                        position:'bottom',
                        labels:{
                            fontColor:'#000'
                        }
                    },
                    tooltips:{
                        enabled:true
                    }
                }

            })
        })
</script>





@endsection




</body>





</html>
