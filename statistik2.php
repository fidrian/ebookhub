<?php
  require_once("templates/header.php");
?>

<?php
	session_start();
	function connectDB() {
		$servername = "sql12.freesqldatabase.com";
		$username = "sql12313869";
		$password = "qy1jlUjdiy";
		$dbname = "sql12313869";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
			die("Connection failed: " + mysqli_connect_error());
		}
		return $conn;
	}

  function getStatus($bulan, $status){
      $conn = connectDB();

      $sql = "SELECT count(*) as jumlah from unggah where MONTH(upload_date)='$bulan' AND status = '".$status."'";

      if(!$result = mysqli_query($conn, $sql)) {
        die("Error: $sql");
      }
      mysqli_close($conn);

      $query = $result;
      $row = $query->fetch_array();
      $jumlah[] = $row['jumlah'];
      return $jumlah;
  }

  function getSoldFiksi($bulan){
    $conn = connectDB();

    $sql = "SELECT count(*) as terjual from book where MONTH(publish_date)='$bulan' AND (category = 'Fiksi' OR category = 'Novel' OR category = 'Cerpen' OR category = 'Puisi' OR category = 'Drama' OR category = 'Komik' OR category = 'Dongeng' OR category = 'Fabel' OR category = 'Mitos')";

    if(!$result = mysqli_query($conn, $sql)) {
      die("Error: $sql");
    }
    mysqli_close($conn);

    $query = $result;
    $row = $query->fetch_array();
    $jumlah[] = $row['terjual'];
    return $jumlah;
}

function getSoldNonFiksi($bulan){
  $conn = connectDB();

  $sql = "SELECT count(*) as terjual from book where MONTH(publish_date)='$bulan' AND (category != 'Fiksi' AND category != 'Novel' AND category != 'Cerpen' AND category != 'Puisi' AND category != 'Drama' AND category != 'Komik' AND category != 'Dongeng' AND category != 'Fabel' AND category != 'Mitos')";

  if(!$result = mysqli_query($conn, $sql)) {
    die("Error: $sql");
  }
  mysqli_close($conn);

  $query = $result;
  $row = $query->fetch_array();
  $jumlah[] = $row['terjual'];
  return $jumlah;
}

  function getpenulis() {
		$conn = connectDB();

		$sql = "SELECT count(*) FROM user WHERE role = 'penulis'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}

		mysqli_close($conn);
		return $result;
	}

	function getpembaca() {
		$conn = connectDB();

		$sql = "SELECT count(*) FROM user WHERE role = 'user'";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}

		mysqli_close($conn);
		return $result;
  }

  function statusPenjualan() {
		$conn = connectDB();

		$sql = "SELECT count(quantity) FROM book";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}

		mysqli_close($conn);
		return $result;
  }

  function getKategori() {
		$conn = connectDB();

		$sql = "SELECT count(*) FROM category";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}

		mysqli_close($conn);
		return $result;
  }

	function getbook() {
		$conn = connectDB();

		$sql = "SELECT count(*) FROM book";

		if(!$result = mysqli_query($conn, $sql)) {
			die("Error: $sql");
		}

		mysqli_close($conn);
		return $result;
	}

?>

<div class="shop">
  <div class="container">

    <div class="row">
      <div class="col-sm-12">
        <h1>Statistik</h1>
      </div>

      <div class='col-lg-3 col-md-6'>
        <div class='panel panel-primary'>
          <div class='panel-heading'>
            <div class='row'>
              <div class='col-xs-3'>
                <i class='fa fa-pencil fa-4x'></i>
              </div>
              <div class='col-xs-9 text-right'>
                <div id="leadmonth"></div>
                <div>Total Penulis</div>
                <?php
                  $countuser = getpenulis();
                  while ($row = mysqli_fetch_row($countuser)) {
                    echo '<h2 class="text-white">'.$row[0].'</h2>';
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class='col-lg-3 col-md-6'>
        <div class='panel panel-primary'>
          <div class='panel-heading'>
            <div class='row'>
              <div class='col-xs-3'>
                <i class='fa fa-book fa-4x'></i>
              </div>
              <div class='col-xs-9 text-right'>
                <div id="leadmonth"></div>
                <div>Total Buku Terbit</div>
                <?php
                  $countuser = getbook();
                  while ($row = mysqli_fetch_row($countuser)) {
                    echo '<h2 class="text-white">'.$row[0].'</h2>';
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class='col-lg-3 col-md-6'>
        <div class='panel panel-primary'>
          <div class='panel-heading'>
            <div class='row'>
              <div class='col-xs-3'>
                <i class='fa fa-user fa-4x'></i>
              </div>
              <div class='col-xs-9 text-right'>
                <div id="leadmonth"></div>
                <div>Total Pembaca</div>
                <?php
                  $countuser = getpembaca();
                  while ($row = mysqli_fetch_row($countuser)) {
                    echo '<h2 class="text-white">'.$row[0].'</h2>';
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class='col-lg-3 col-md-6'>
        <div class='panel panel-primary'>
          <div class='panel-heading'>
            <div class='row'>
              <div class='col-xs-3'>
                <i class='fa fa-tasks fa-4x'></i>
              </div>
              <div class='col-xs-9 text-right'>
                <div id="leadmonth"></div>
                <div>Total Kategori Buku</div>
                <?php
                  $countuser = getKategori();
                  while ($row = mysqli_fetch_row($countuser)) {
                    echo '<h2 class="text-white">'.$row[0].'</h2>';
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>



    </div>

    <div class="row section-mini-margin">
      <div class="content-grafik">

          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Penjualan</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                  </div>

                  <br>
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2 text-tiny">
                      <i class="fa fa-square text-primary" style="color:#007bff"></i> Non Fiksi &nbsp;&nbsp;
                    </span>

                    <span class="text-tiny">
                      <i class="fa fa-square text-gray" style="color:#ced4da"></i> Fiksi
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                <div class="card-header border-0">
                  <div class="d-flex justify-content-between">
                    <h3 class="card-title">Pengajuan</h3>
                  </div>
                </div>
                <div class="card-body">
                  <div class="position-relative mb-4">
                    <canvas id="sales-chart" height="200"></canvas>
                  </div>
                  <br>
                  <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2 text-tiny">
                      <i class="fa fa-square text-primary" style="color:#007bff"></i> Dalam proses review &nbsp;&nbsp;
                    </span>

                    <span class="text-tiny">
                      <i class="fa fa-square text-gray" style="color:#ced4da"></i> Sudah diterbitkan
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>

    </div>

  </div>

</div>

<script src="js/jquery-3.1.0.min.js"> </script>
<!-- <script src="bootstrap/dist/js/bootstrap.min.js"></script> -->

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.js"></script>
<script src="js/Chart.min.js"></script>
<?php
   $label = ['AGUSTUS', 'SEPTEMBER', 'OKTOBER', 'NOVEMBER', 'DESEMBER'];
?>
<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : <?php echo json_encode($label); ?>,
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
      data           : <?php
                        for($bulan=8;$bulan<=12;$bulan++){
                          $jumlah_proses[] = getStatus($bulan, "Dalam Proses Review");
                        }
                       echo json_encode($jumlah_proses); ?>
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
		  data           : <?php
                        for($bulan=8;$bulan<=12;$bulan++){
                          $jumlah_diterima[] = getStatus($bulan, "Sudah Diterbitkan");
                        }
                       echo json_encode($jumlah_diterima); ?>
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      // labels  : ['September', 'Oktober', 'November'],
      labels  : <?php echo json_encode($label); ?>,
      datasets: [{
        type                : 'line',
        // data                : [12, 10, 12, 17,10],


        data                : <?php
                                for($bulan=8;$bulan<=12;$bulan++){
                                  $jumlah_nf[] = getSoldNonFiksi($bulan);
                                }
                              echo json_encode($jumlah_nf);
                             ?>,
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
      },
        {
          type                : 'line',
          data                : <?php
                                  for($bulan=8;$bulan<=12;$bulan++){
                                    $jumlah_f[] = getSoldFiksi($bulan);
                                  }
                                  echo json_encode($jumlah_f);
                                ?>,
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
        }]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})
</script>


<?php
  require_once("templates/footer.php");
?>

<!-- <!DOCTYPE html>
<html lang="en">
	<body>


	</body>
	<footer>
		<hr>
		<h4>&copy; 2019 Litehub Inc. All rights reserved</h4>
	</footer>
</html>
