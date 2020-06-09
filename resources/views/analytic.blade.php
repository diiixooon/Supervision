@extends('layouts.app')

@section('graph')
<script>
    var array = [];
</script>
@foreach ($student as $item)
    <script> array.push({{$item->name}})</script>
@endforeach
{{-- <div class="col-sm-6 col-md-6 col-lg-6">
    <div class="chart-container-pop">
    <canvas id="popchart"></canvas>
    <script>
      var ctx = document.getElementById('popchart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'doughnut',
          
          data: {
              labels: ['Male', 'Female'],
              datasets: [{
                  label: [],
                  data: [1,2],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)'
                  ],
                  borderWidth: 1
              }]
          },
          options: {
            title:{
              display: true,
              text: 'Population of Victim'
          },
          legend:
                {
                    display: true,
                    position: 'bottom',
                    fontColor: "#000080",
                }
            //   scales: {
            //       yAxes: [{
            //           ticks: {
            //               beginAtZero: true
            //           }
            //       }]
            //   }
          }
      });
      </script>
    </div>
</div> --}}
@endsection

@section('content')
    <table>
        @foreach ($student as $item)
            <tr>
                <th>{{$item->name}}</th>
                <th>First Upload Time</th>
                <th>Next Attempt Upload Time</th>
            </tr>
            
        @endforeach
    </table>
@endsection