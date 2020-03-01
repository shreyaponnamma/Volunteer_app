<?php
include('../config/config.php');
session_start();
$usn = $_SESSION['email'];
$sql ="select * from volunteer_details where email =$usn;";
mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    volunteer page
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.4.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="register-page sidebar-mini ">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
    <div class="container-fluid">
      <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">Register Page</a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
        <span class="navbar-toggler-bar navbar-kebab"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="now-ui-icons design_app"></i> Home
            </a>
          </li>
          <li class="nav-item  active ">
            <a href="#" class="nav-link">
              <i class="now-ui-icons tech_mobile"></i> My Profile
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="now-ui-icons users_circle-08"></i> History
            </a>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link">
              <i class="now-ui-icons now-ui-icons business_money-coins"></i> logout
            </a>
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  <div class="wrapper wrapper-full-page ">
    <div class="full-page register-page section-image" filter-color="black" data-image="../assets/img/bg16.jpg">
      <div class="content">
        <div class="container">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"> Request</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <?php echo"<table class='table'>
                      <thead class='text-primary'>
                      <th>
                        Name
                      </th>
                      <th>
                        DropLocation
                      </th>
                      <th>
                        Time
                      </th>
                      <th>
                        Date
                      </th>
                      <th>

                      </th>
                      </thead>";

                                 $sql1 = "select a.*, c.c_name from temp a, customer_details c where a.v_id =12 and a.c_id = c.c_id and  a.c_id=1;";
                                 $row1 = mysqli_query($connect, $sql1);
                                 while ($result = mysqli_fetch_assoc($row1)) {
                                     $id1 = $result['email'];

                                     echo "<tr>
                                        <td>" . $result['c_name'] . "</td>
                                        <td>" . $result['d_loc'] . "</td>
                                        <td>" . $result['service_time'] . "</td>
                                        <td>" . $result['date'] . "</td>
                                        <td class=\"text-right\">
                                             <button id='".$id1."' onClick ='accept(this.id)' type=\"button\" rel=\"tooltip\" class=\"btn btn-info btn-icon btn-sm \">
                                                <i class=\"now-ui-icons ui-1_simple-add\"></i>
                                             </button>
                                            </td>
                                            <td class=\"text-right\">
                                             <button id='".$id1."' onClick ='reject(this.id)' type=\"button\" rel=\"tooltip\" class=\"btn btn-danger btn-icon btn-sm \">
                                                <i class=\"now-ui-icons ui-1_simple-remove\"></i>
                                             </button>
                                            </td>

                                    </tr>";
                                 }
                             ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <script type ="text/javascript">

      function accept(clicked_id) {


              window.location.href = ("start_vol.php?email="+clicked_id);

      }
      function reject(clicked_id) {


          window.location.href = ("reject.php?email="+clicked_id);

      }

  </script>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for Sweet Alert -->
  <script src="../assets/js/plugins/sweetalert2.min.js"></script>
  <!-- Forms Validations Plugin -->
  <script src="../assets/js/plugins/jquery.validate.min.js"></script>
  <!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
  <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js"></script>
  <!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
  <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.4.1" type="text/javascript"></script>
  <!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>


</body>

</html>