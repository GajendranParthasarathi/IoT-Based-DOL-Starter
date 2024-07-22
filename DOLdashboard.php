<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
      Integration of IoT with Direct Online Starter

  </title>
  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.7" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is an easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <style>
    @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css");
    .single-column {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }
    .card {
      width: 100%;
      max-width: 600px;
      margin-bottom: 20px;
    }
    .numbers {
      text-align: center;
    }
  </style>
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
  <script>
    function updateAfter10Seconds() {
      setTimeout(function() {
        document.getElementById('resetForm').submit();
      }, 10000); // 10000 milliseconds = 10 seconds
    }
  </script>
</head>

<body class="g-sidenav-show bg-gray-100" onload="updateAfter10Seconds()">
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row single-column">
        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <h5 class="font-weight-bolder mb-0" style="padding-top: 10px;">
                      Integration of IoT with Direct Online Starter

                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="bi bi-fan"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12">
                  <div class="numbers">
                    <h5 style="padding-top: 10px;">
                      <form action="" method="POST">
                        <div class="wrapper">
                          <button class="btn btn-success" type="submit" name="ON1">ON</button>
                        </div>
                      </form>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12">
                  <div class="numbers">
                    <h5 class="font-weight-bolder mb-0" style="padding-top: 10px;">
                      <form action="" method="POST">
                        <div class="wrapper">
                          <button class="btn btn-danger" type="submit" name="OFF1">OFF</button>
                        </div>
                      </form>
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Hidden form to reset ON and OFF to 0 after 10 seconds -->
        <form id="resetForm" action="" method="POST" style="display: none;">
          <input type="hidden" name="reset" value="1">
        </form>
      </div>
    </div>
  </main>
</body>
</html>

<?php
$server = "localhost";
$username = "pgcresearch_gaja";
$password = "Gaja@123";
$DB = "pgcresearch_newiot";

$update = new mysqli($server, $username, $password, $DB);

if ($update->connect_error) {
    die("Connection failed: " . $update->connect_error);
}

if (isset($_POST['ON1'])) {
    $sql = "UPDATE DOLIoT SET `ON` = 1, `OFF` = 0";
    if ($update->query($sql) === TRUE) {
        // Optionally, you can add a success message or further actions here
    } else {
        // Optionally, handle the error here
        echo "Error: " . $sql . "<br>" . $update->error;
    }
}

if (isset($_POST['OFF1'])) {
    $sql = "UPDATE DOLIoT SET `OFF` = 1, `ON` = 0";
    if ($update->query($sql) === TRUE) {
        // Optionally, you can add a success message or further actions here
    } else {
        // Optionally, handle the error here
        echo "Error: " . $sql . "<br>" . $update->error;
    }
}

if (isset($_POST['reset'])) {
    $sql = "UPDATE DOLIoT SET `OFF` = 0, `ON` = 0";
    if ($update->query($sql) === TRUE) {
        // Optionally, you can add a success message or further actions here
    } else {
        // Optionally, handle the error here
        echo "Error: " . $sql . "<br>" . $update->error;
    }
}
?>
