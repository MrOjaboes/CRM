@extends('layouts.header')
@section('content')
<div class="homepage mb-80">
    <div class="container">
         
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="card-title">Recent Added Products</h4>
            
                    </div>

                    <div class="card-body">
                    @if(Auth::check() AND Auth::user()->user_type == 1)
                    <br>
                    <h5 class="card-title"><a class="btn btn-secondary" href="{{route('create-product')}}"><i class="fas fa-plus"></i> New Product</a></h5>
                        <br><br>
                        @endif
                        <div class="transaction-table">
                            <div class="table-responsive">
                              <table class="table mb-0 table-responsive-sm">
                                <thead>                                     
                                    <th scope="col">Title</th>
                                    <th scope="col">Date</th>
                                    @if(Auth::check() AND Auth::user()->user_type == 1)
                                    <th scope="col">Action</th>
                                    @endif
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                  <tr>
                                    <td>
                                      @if($product->id == 1)
                                    <a href="{{route('admin.schools')}}">{{$product->title}}</a>
                                      @endif
                                      @if($product->id == 3)
                                    <a href="#">{{$product->title}}</a>
                                    @endif                                     
                                      
                                  </td>
                                    <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d/m/Y')}}</td>
                                    @if(Auth::check() AND Auth::user()->user_type == 1)
                                    <td>
                                <div class="dropdown">
                                    <button style="background-color:#3A3A80;color:white;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                     
                                    <!-- <a class="dropdown-item btn btn-info" href="{{route('view-note', $product->id)}}">Details</a> -->
                                    <a class="dropdown-item" href="{{route('edit-product', $product->id)}}">Edit Product</a>
                                    <form action="{{route('delete-product', $product->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-default">Delete</button>
                                    </form>
                                   
                                    
                                    </div>
                                  </div>
                             </td>
                             @endif
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                            <div>
                              
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
         //reate pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
         

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

 