@extends('layouts.header')
@section('content')
<div class="homepage mb-80">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <h4 class="card-title text-right"><a href="{{route('affiliate.notes')}}">Notes From Affiliates</a>  <b class="btn btn-sm btn-success">{{$notes->where('status',0)->count()}}</b></h4> <br><br>
    </div>
    </div>
    <div class="row">   
    <div class="col-lg-4 col-4">
    <div class="small-box bg-info">
         <div class="inner">
         <h3 class="text-center">{{$notes->where('status',0)->count()}}</h3>

           <h6><a href="{{route('affiliate.notes')}}" style="color:white;">Notes From Affiliates</a></h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
    </div>

    <div class="col-lg-4 col-4">
    <div class="small-box" style="background-color:#A1E84F;">
         <div class="inner">
         <h3 class="text-center">{{$affiliates}}</h3>

           <h6>Registered Affiliates</h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
    </div>
     <div class="col-lg-4 col-4">
       <!-- small box -->
       <div class="small-box" style="background-color:#002343;">
         <div class="inner">
         <h3 class="text-center text-white">{{$products}}</h3>

           <h6 class="text-white">Products Added</h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
     </div>
     </div>
         
        <h2 class="text-center" style="color:#cccccc;">SchoolRevo Details</h2>
     <div class="row">   
     <div class="col-lg-4 col-4">
     <div class="small-box bg-warning">
         <div class="inner">
         <h3 class="text-center">{{$schoolrevos->count()}}</h3>

           <h6>Schools Involved</h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
     
     </div>

    <div class="col-lg-4 col-4">
    <div class="small-box bg-danger">
         <div class="inner">
         <h3 class="text-center">{{$schoolrevos->where('completed', 1)->count()}}</h3>

           <h6>Closed Deals</h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
    </div>
     <div class="col-lg-4 col-4">
       <!-- small box -->
       <div class="small-box" style="background-color:#33E899;">
         <div class="inner">
         <h3 class="text-center">{{$schoolrevos->where('completed', 0)->count()}}</h3>

           <h6>Open Deals</h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
     </div>
     </div>
         
     <h2 class="text-center" style="color:#cccccc;">ATHR Details</h2>
     <div class="row">   

    <div class="col-lg-6 col-6">
    <div class="small-box" style="background-color:#33E899;">
         <div class="inner">
         <h3 class="text-center">{{$schoolrevos->where('completed', 0)->count()}}</h3>

           <h6>Open Deals</h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
    </div>
     <div class="col-lg-6 col-6">
       <!-- small box -->
       <div class="small-box bg-danger">
         <div class="inner">
         <h3 class="text-center">{{$schoolrevos->where('completed', 1)->count()}}</h3>

           <h6>Closed Deals</h6>
         </div>
         <div class="icon">
           <i class="ion ion-bag"></i>
         </div>
         
       </div>
     </div>
     </div>
         

                            
                    </div>
                </div>
            </div>
             
        </div>
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset('admins2/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admins2/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('admins2/plugins/chart.js/Chart.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admins2/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admins2/dist/js/demo.js') }}"></script>
<!-- page script -->
    <script>
      $(function () {
        
        //-------------
        //- DONUT CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
        

        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData        = donutData;
        var pieOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
          type: 'pie',
          data: pieData,
          options: pieOptions      
        })

        //-------------
        //- BAR CHART -
        //-------------
        var barChartCanvas = $('#barChart').get(0).getContext('2d')
        var barChartData = jQuery.extend(true, {}, areaChartData)
        var temp0 = areaChartData.datasets[0]
        var temp1 = areaChartData.datasets[1]
        barChartData.datasets[0] = temp1
        barChartData.datasets[1] = temp0

        var barChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas, {
          type: 'bar', 
          data: barChartData,
          options: barChartOptions
        })

        //---------------------
        //- STACKED BAR CHART -
        //---------------------
        var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
        var stackedBarChartData = jQuery.extend(true, {}, barChartData)

        var stackedBarChartOptions = {
          responsive              : true,
          maintainAspectRatio     : false,
          scales: {
            xAxes: [{
              stacked: true,
            }],
            yAxes: [{
              stacked: true
            }]
          }
        }

        var stackedBarChart = new Chart(stackedBarChartCanvas, {
          type: 'bar', 
          data: stackedBarChartData,
          options: stackedBarChartOptions
        })
      })
    </script>

<script>

  function amountPaid()
  {
var amt = document.getElementById("amount").value;
console.log(amt)
   var charges = (2.9 / 100) * amt;
   console.log(charges)
    var responseNode = document.getElementById("response");
    responseNode.append(`Stripe Charges: ${charges} `)
    // swal(`Stripe Charges: ${charges} `);

  }

 
</script>
 
          
       
@endsection
  
<script type="text/javascript">

  function yesnoCheck() {
      if (document.getElementById('yesCheck').checked) {
          document.getElementById('ifYes').style.display = 'block';
      }
      else document.getElementById('ifYes').style.display = 'none';
        
  }
  
  </script>

 