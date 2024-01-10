
@include('admin.includes.nav_bar', ['active' => 'dashboard', 'title' => 'Dashboard'])


<style>
    .d-card {
        padding: 20px;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        color: black; /* Add this line to set text color to black */
    }

    .d-card h6 {
        font-weight: 600;
        margin-bottom: 10px;
        color: black; /* Add this line to set text color to black */
    }

    .d-card h1 {
        font-weight: 600;
        color: black; /* Add this line to set text color to black */
    }

    .col-md-3 {
        margin-bottom: 15px;
    }

    /* Add this style to make the pie chart smaller */
    canvas {
        max-width: 100%;
        height: auto;
    }

    /* Add this style to create a row layout */
    .chart-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    /* Adjust the width of the columns based on your preference */
    .chart-container .chart-column {
        width: 100%; /* Requests and Ages span full width */
        margin-bottom: 15px;
    }

    /* Adjust the width of the columns based on your preference */
    .chart-container .half-width-column {
        width: calc(40% - 10px); /* Blotters and Sex share the row */
        margin-bottom: 15px;
    }
</style>


<div class="container">
    <div class="row justify-content-between align-items-center">
        <div class="col-lg-6">
            <h5>Dashboard</h5>

        </div>

    </div>
</div>
<br>


<div class="container">

    <div class="row">
        <div class="col-md-3">
            <a href="{{ route('users.index')}}">
                <div class="d-card">
                    <h6>Residents:</h6>
                    <h1>{{ $users }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('request') }}">
                <div class="d-card">
                    <h6>Pending Request:</h6>
                    <h1>{{ $pendingRequests }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('request') }}">
                <div class="d-card">
                    <h6>Completed Requests:</h6>
                    <h1>{{ $completedRequests }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('officials.index')}}">
                <div class="d-card">
                    <h6>Officials:</h6>
                    <h1>{{ $officials }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('newsfeed') }}">
                <div class="d-card">
                    <h6>News:</h6>
                    <h1>{{ $news }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('post')}}">
                <div class="d-card">
                    <h6>Post:</h6>
                    <h1>{{ $feeds }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('blotter.index') }}">
                <div class="d-card">
                    <h6>Active blotters:</h6>
                    <h1>{{ $activeBlotters }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('blotter.index') }}">
                <div class="d-card">
                    <h6>Settled blotters:</h6>
                    <h1>{{ $settledBlotters }}</h1>
                </div>
            </a>
        </div>                     
    </div>

    <br>

    <div class="chart-container">
        <div class="chart-column">
            <h4>Requests</h4>
            <canvas id="myBarChart" width="100" height="30"></canvas>
        </div>

        <div class="half-width-column">
            <h4>Blotters</h4>
            <canvas id="blotterPieChart" width="300" height="300"></canvas>
        </div>

        <div class="half-width-column">
            <h4>Sex</h4>
            <canvas id="myPieChart" width="400" height="400"></canvas>
        </div>

        <div class="chart-column">
            <h4>Ages</h4>
            <canvas id="myChart" width="200" height="50"></canvas>
        </div>
    </div>

</div>

</div>
@include('admin.includes.footer');
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>

    //REQUESTS

    var ctx = document.getElementById('myBarChart').getContext('2d');

    var data = {
        labels: ["Pending Requests", "Completed Requests"],
        datasets: [{
            label: 'Requests',
            // data: [{{ $pendingRequests }}, {{ $completedRequests }}],
            // sample data lnag kasi wala data
            data: [{{ 10 }}, {{ 12 }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(75, 192, 192, 0.2)' 
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    };

    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
    });

    //BLOTTERS

    // sample data lnag kasi wala data
    var activeBlottersCount = {{ 12 }};
    var settledBlottersCount = {{ 10 }};

    // var activeBlottersCount = {{ $activeBlotters }};
    // var settledBlottersCount = {{ $settledBlotters }};

    // Calculate percentages
    var totalBlotters = activeBlottersCount + settledBlottersCount;
    var activeBlottersPercentage = (activeBlottersCount / totalBlotters) * 100;
    var settledBlottersPercentage = (settledBlottersCount / totalBlotters) * 100;


    var data = {
        labels: ['Active blotters', 'Settled blotters'],
        datasets: [{
            data: [activeBlottersPercentage, settledBlottersPercentage],
            backgroundColor: ['#FF6384', '#36A2EB'], // You can use different colors
            hoverBackgroundColor: ['#FF6384', '#36A2EB'],
        }]
    };


    var ctx = document.getElementById('blotterPieChart').getContext('2d');


    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });

    //GENDER

    var maleCount = {{ $male_users }};
    var femaleCount = {{ $female_users }};
  
    var data = {
      labels: ["Male", "Female"],
      datasets: [{
        data: [maleCount, femaleCount],
        backgroundColor: ["blue", "pink"], 
      }]
    };
  
    var ctx = document.getElementById('myPieChart').getContext('2d');
  

    var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: data,
    });

    //AGE

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['17 and Below', '18 to 30', '31 to 50', 'Above 50'],
            datasets: [{
                label: 'Count',
                data: [{{ $countUnder18 }}, {{ $count18to30 }}, {{ $count31to50 }}, {{ $countAbove50 }}],
                backgroundColor: ['rgba(0, 255, 0, 0.2)', 'rgba(0, 0, 255, 0.2)', 'rgba(255, 255, 0, 0.2)', 'rgba(255, 0, 0, 0.2)'],
                borderColor: ['rgba(0, 255, 0, 1)', 'rgba(0, 0, 255, 1)', 'rgba(255, 255, 0, 1)', 'rgba(255, 0, 0, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
   </script>
  


