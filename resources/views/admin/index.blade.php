
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
        <div class="col-md-3">
            <a href="{{ route('blotter.index') }}">
                <div class="d-card">
                    <h6>Active blotters:</h6>
                    <h1>{{ $countUnder18 }}</h1>
                </div>
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('blotter.index') }}">
                <div class="d-card">
                    <h6>Settled blotters:</h6>
                    <h1>{{ $count31to50 }}</h1>
                </div>
            </a>
        </div>
                             
    </div>
    <div><br>
        <h4>Requests</h4>
        <canvas id="myBarChart" width="100" height="30"></canvas>
    </div><br>
    <div>
        <h4>Blotters</h4>
        <canvas id="blotterPieChart" width="300" height="300"></canvas>

    </div>
    <div>
        <canvas id="myPieChart" width="400" height="400"></canvas>

        <canvas id="myChart" width="200" height="50"></canvas>
    </div>

</div>

</div>
@include('admin.includes.footer');
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myBarChart').getContext('2d');

    // Define the data
    var data = {
        labels: ["Pending Requests", "Completed Requests"],
        datasets: [{
            label: 'Requests',
            // data: [{{ $pendingRequests }}, {{ $completedRequests }}],
            data: [{{ 10 }}, {{ 12 }}],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)', // Color for pending requests
                'rgba(75, 192, 192, 0.2)'  // Color for completed requests
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    };

    // Define the options
    var options = {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Create the bar chart
    var myBarChart = new Chart(ctx, {
        type: 'bar', // Change to 'bar' for a bar chart
        data: data,
        options: options
    });
</script>

<script>
    // Get the counts from your server-side variables
    // var activeBlottersCount = {{ $activeBlotters }};
    // var settledBlottersCount = {{ $settledBlotters }};

    var activeBlottersCount = {{ 12 }};
    var settledBlottersCount = {{ 10 }};

    // Calculate percentages
    var totalBlotters = activeBlottersCount + settledBlottersCount;
    var activeBlottersPercentage = (activeBlottersCount / totalBlotters) * 100;
    var settledBlottersPercentage = (settledBlottersCount / totalBlotters) * 100;

    // Set up data for the pie chart
    var data = {
        labels: ['Active blotters', 'Settled blotters'],
        datasets: [{
            data: [activeBlottersPercentage, settledBlottersPercentage],
            backgroundColor: ['#FF6384', '#36A2EB'], // You can use different colors
            hoverBackgroundColor: ['#FF6384', '#36A2EB'],
        }]
    };

    // Get the canvas element
    var ctx = document.getElementById('blotterPieChart').getContext('2d');

    // Create the pie chart
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
    });
</script>
<script>
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
  </script>
   <script>
       var ctx = document.getElementById('myChart').getContext('2d');
       var myChart = new Chart(ctx, {
           type: 'bar',
           data: {
               labels: ['18 and Under ', '18 to 30', '31 to 50', 'Above 50'],
               datasets: [{
                   label: 'Count',
                   data: [{{ $countUnder18 }}, {{ $count18to30 }}, {{ $count31to50 }}, {{ $countAbove50 }}],
                   backgroundColor: 'rgba(75, 192, 192, 0.2)',
                   borderColor: 'rgba(75, 192, 192, 1)',
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
  


