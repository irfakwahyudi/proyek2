    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?= $adminCount ?></h3>

                <p>Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-code"></i>
              </div>
              <a href="<?= base_url("admin/admin") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $calonCount ?></h3>

                <p>Calon</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="<?= base_url("admin/calon") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $pemilihCount ?></h3>

                <p>Jumlah Pemilih</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?= base_url("admin/pemilih") ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  <span>Hasil Pemilihan</span>
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" href="<?= base_url("admin/hasil") ?>" >Detail</a>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content p-0">
                  <!-- Morris chart - Sales -->
                  <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;">
                    <canvas id="chart-canvas" height="300" style="height: 300px;"></canvas>
                  </div>
                </div>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->


          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
      /* Chart.js Charts */
	// hasil chart
	var hasilChartCanvas = document
		.getElementById("chart-canvas")
    .getContext("2d");
  
  let dataCalon = <?php echo json_encode($dataCalon) ?>
    
  let namaCalon = [],
      jmlVote = []

  dataCalon.map(data => {
    namaCalon.push(data.nama)
    jmlVote.push(data.jml_vote)
  })

	// This will get the first returned node in the jQuery collection.
	var hasilChart = new Chart(hasilChartCanvas, {
		type: "pie",
		data: {
			labels: namaCalon,
			datasets: [
				{
					label: "Pemilih",
					data: jmlVote,
					backgroundColor: [
						"rgba(255, 99, 132, 0.5)",
						"rgba(54, 162, 235, 0.2)",
						"rgba(255, 206, 86, 0.2)",
					],
					borderColor: [
						"rgba(255,99,132,1)",
						"rgba(54, 162, 235, 1)",
						"rgba(255, 206, 86, 1)",
					],
				},
			],
		},
		options: {
			maintainAspectRatio: false,
			responsive: true,
			legend: {
				display: true,
			},
		},
	});
    </script>