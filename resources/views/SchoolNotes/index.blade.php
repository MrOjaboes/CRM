@extends('layouts.users')
@section('content')
<div class="homepage mb-80">
    <div class="container">
         
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header border-0 pb-0">
                        <h4 class="card-title">Recent Added Notes</h4>
            
                    </div>

                    <div class="card-body">
             
                        <div class="transaction-table">
                            <div class="table-responsive">
                              <table class="table mb-0 table-responsive-sm">
                                <thead>                                     
                                    <th scope="col">Activity</th>
                                    <th scope="col">Added By</th>
                                    <th scope="col">Date Added</th>                                     
                                </thead>
                                <tbody>
                                 @foreach($school_notes as $note)
                                  <tr>
                                    <td>{{substr($note->subject ,0,40)}}.....</td>
                                    <td>
                                    @php
                        $name = $note->user_id;
                      @endphp

                        
                          {{App\Http\Controllers\UserController::GetUserById($name)}}
                        
                         
                            </td>
                                     
                                    <td>{{ \Carbon\Carbon::parse($note->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                    <div class="dropdown">
                                    <button style="background-color:#3A3A80;color:white;" class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Actions
                                    </button> 
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">                                    
                                      <a class="dropdown-item btn btn-info" title="note Details" href="{{route('view-school_note', $note->id)}}">Details</a>

                                    <a class="dropdown-item" title="Edit note Details" href="{{route('edit-school_note', $note->id)}}">Edit Note</a>
                                  
                                    <form action="{{route('delete-school-note', $note->id)}}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-default">Delete</button>
                                    </form>
                                     
                                    </div>
                                  </div>
                                    </td>
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
                <a href="{{route('schools')}}" class="btn btn-warning"><i class="fas fa-arrow-left"></i> Home</a>
            
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

 