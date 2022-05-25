<head>
   <script src="../assets/vendor/js/node_modules/chart.js/dist/chart.js"></script>
</head>
<?php
$email=$_SESSION['email_address'];
$sql1="SELECT admin_full_name FROM tbladmin WHERE email_address='$email'";
  $res1= $conn->query($sql1); 
  if($res1->num_rows > 0)
  
   ($data=$res1->fetch_assoc())
   	?>
<body>
<div class='content-box'>
    <h1 class="welcome-text">
        <?php 
    switch ($time = date("G")) {
        case $time < 12:
            $timeOfDay = "Morning";
            break;
        case $time < 19:
            $timeOfDay = "Afternoon";
            break;
        case $time < 24:
            $timeOfDay = "Evening";
            break;
        
        default:
        $timeOfDay = "Day";
            break;
    }
    
    echo "Good ".$timeOfDay.", " ?> <span class="login-name"> <?php echo explode(" " , $data['admin_full_name'])[0] ?> </span></h1>
    <div class="card-body">
        <div class="d-sm-flex justify-content-between align-items-start">
        <div>
            <h4 class="card-title card-title-dash">Pending Orders</h4>
        </div>
         </div>
        <div class="table-responsive  mt-1">
        <table class="table select-table">
            <thead>
            <tr>
               
                <th>Customer</th>
                <th>Company</th>
                <th>Progress</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                
                <td>
                <div class="d-flex ">

                    <div>
                    <h6>Brandon Washington</h6>
                    <p>Head admin</p>
                    </div>
                </div>
                </td>
                <td>
                <h6>Company name 1</h6>
                <p>company type</p>
                </td>
                <td>
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                    <p class="text-success">79%</p>
                    <p>85/162</p>
                    </div>
                    <div class="progress progress-md">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                </td>
                <td><div class="badge badge-opacity-warning">In progress</div></td>
            </tr>
            <tr>
                <td>
                <div class="d-flex">
                    <div>
                    <h6>Laura Brooks</h6>
                    <p>Head admin</p>
                    </div>
                </div>
                </td>
                <td>
                <h6>Company name 1</h6>
                <p>company type</p>
                </td>
                <td>
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                    <p class="text-success">65%</p>
                    <p>85/162</p>
                    </div>
                    <div class="progress progress-md">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                </td>
                <td><div class="badge badge-opacity-warning">In progress</div></td>
            </tr>
            <tr>
              
                <td>
                <div class="d-flex">
                    <div>
                    <h6>Wayne Murphy</h6>
                    <p>Head admin</p>
                    </div>
                </div>
                </td>
                <td>
                <h6>Company name 1</h6>
                <p>company type</p>
                </td>
                <td>
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                    <p class="text-success">65%</p>
                    <p>85/162</p>
                    </div>
                    <div class="progress progress-md">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                </td>
                <td><div class="badge badge-opacity-warning">In progress</div></td>
            </tr>
            <tr>
                <td>
                <div class="d-flex">
                    <div>
                    <h6>Matthew Bailey</h6>
                    <p>Head admin</p>
                    </div>
                </div>
                </td>
                <td>
                <h6>Company name 1</h6>
                <p>company type</p>
                </td>
                <td>
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                    <p class="text-success">65%</p>
                    <p>85/162</p>
                    </div>
                    <div class="progress progress-md">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                </td>
                <td><div class="badge badge-opacity-danger">Pending</div></td>
            </tr>
            <tr>
                <td>
                <div class="d-flex">
                    <img src="images/faces/face5.jpg" alt="">
                    <div>
                    <h6>Katherine Butler</h6>
                    <p>Head admin</p>
                    </div>
                </div>
                </td>
                <td>
                <h6>Company name 1</h6>
                <p>company type</p>
                </td>
                <td>
                <div>
                    <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                    <p class="text-success">65%</p>
                    <p>85/162</p>
                    </div>
                    <div class="progress progress-md">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                </td>
                <td><div class="badge badge-opacity-success">Completed</div></td>
            </tr>
            </tbody>
        </table>
        </div>
    </div>
    <div class="row text-center">
        <div class='col-12'>

        <!-- start foreach loop to display numbers of vendors/ customer/ orders from db  -->
        <?php
//  echo values in here //
 $dataPoints = array(
     array("y" => 50, "label" => "Sunday"),
     array("y" => 15, "label" => "Monday"),
     array("y" => 25, "label" => "Tuesday"),
     array("y" => 5, "label" => "Wednesday"),
     array("y" => 10, "label" => "Thursday"),
     array("y" => 0, "label" => "Friday"),
     array("y" => 20, "label" => "Saturday")
 );
//   end foreach loop
 ?>
 <script>
 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
     title: {
         text: "Push-ups Over a Week"
     },
     axisY: {
         title: "Number of Push-ups"
     },
     data: [{
         type: "line",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
  
 }
 </script>
 <body>
 <div id="chartContainer" style="height: 370px; width: 100%;"></div>
 <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
 </body>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://write.corbpie.com/wp-content/litespeed/localres/aHR0cHM6Ly9jZG5qcy5jbG91ZGZsYXJlLmNvbS8=ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
</body>