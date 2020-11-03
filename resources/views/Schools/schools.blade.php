@extends('layouts.users')
@section('content')
<div class="homepage mb-80">
    <div class="container">
         
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
            <div class="row">
            <div class="col-md-4">
            <div class="small-box bg-default">
         <div class="inner">
         
           <h3 class="text-center">&#8358; {{$deals}}</h3>

           <b>Balance</b>
         </div>        
       </div>
       </div>
<div class="col-md-4">
       <div class="small-box bg-warning">
         <div class="inner">
         
           <h3 class="text-center">{{$schools->where('completed',0)->count()}}</h3>

           <b>Open Deals</b>
         </div>        
       </div>
</div>
<div class="col-md-4">
       <div class="small-box bg-danger">
         <div class="inner">
         
           <h3 class="text-center">{{$schools->where('completed',1)->count()}}</h3>

           <b>Closed Deals</b>
         </div>        
       </div>
       </div>
       </div>
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="card-title">Recent Added Schools</h4>
            
                    </div>

                    <div class="card-body">
                     <div class="row">
                     <div class="col-md-12">
                   
          @if(session()->has('message'))
                <span class="alert alert-success">{{session()->get('message')}}</span>
                 
                @endif
                     
                    <h6 class="card-title"><a class="btn btn-secondary" href="{{route('create-school')}}"><i class="fas fa-plus"></i> New School</a></h6>
                        <br><br>
                        <div class="transaction-table">
                            <div class="table-responsive" style="height:300px;overflow-y:scroll;">
                              <table class="table mb-0 table-responsive-sm">
                                <thead>                                     
                                    <th scope="col">Names</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contacts</th>
                                    <th scope="col">Deals</th>
                                    <th scope="col">Payment Status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </thead>
                                <tbody>
                                @foreach($schools as $school)
                                @foreach($payments as $payment)
                                  <tr>
                                    <td>{{$school->name}}</td>
                                    <td>{{$school->email}}</td>
                                    <td>{{$school->phone}}</td>
                                    <td>
                                    
                                    @if($school->completed == 0)
                                  <span class="btn btn-success">Open</span>                                   
                                  @endif 
                                  @if($school->completed == 1)
                                  <span class="btn btn-danger">Closed</span>                                   
                                  @endif                                     
                                    </td>
                                    
                                    <td>                                   
                                    @if($payment->paid == 1)
                                    <span class="btn btn-warning">Paid</span>
                                    @endif
                                    @if($payment->paid == 0)
                                    <span class="btn btn-success">Pending</span>
                                    @endif                                    
                                    </td>
                                     
                                    <td>{{ \Carbon\Carbon::parse($school->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                <div class="dropdown">
                                    <button style="background-color:#3A3A80;color:white;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Actions
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @if($school->completed == 1)
                                      <a class="dropdown-item btn btn-info" title="School Details" href="{{route('view-school', $school->id)}}">Details</a>
                                   @endif
                                      @if($school->completed == 0)
                                      <a class="dropdown-item btn btn-danger" title="Close Deal" href="{{route('close-deal', $school->id)}}">Close Deal</a>
                                    <a class="dropdown-item btn btn-info" title="Add Note" href="{{route('add-school-note', $school->id)}}">Add Note</a>
                                    <a class="dropdown-item" title="Edit School Details" href="{{route('edit-school', $school->id)}}">Edit School</a>
                                    <form action="{{route('delete-school', $school->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-default">Delete</button>
                                    </form>
                                    @endif
                                     
                                    </div>
                                  </div>
                             </td>
                                  </tr>
                                  @endforeach
                                  @endforeach
                                </tbody>
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
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData        = {
          labels: [
              'Savings',              
                
          ],
          datasets: [
            { 
              data: "{{Auth::user()->wallet->balance}}",
              backgroundColor : ['#00a65a'],
            }
          ]
        }
        var donutOptions     = {
          maintainAspectRatio : false,
          responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
          type: 'doughnut',
          data: donutData,
          options: donutOptions      
        })

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

 