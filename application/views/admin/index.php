<!DOCTYPE php>
<html>
  	<head>
		<title>Admin | ExpressDelivery</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- Bootstrap -->
		<link href="<?php echo base_url()?>assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- styles -->
		<link href="<?php echo base_url()?>assets/css/css/styles.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
		<![endif]-->
		</head>
	<body>
  	
<?php $this->load->view('admin/header') ?>

    <div class="page-content">
    	<div class="row">

		  	<div class="col-md-2">
		  		<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
                    	<!-- Main menu -->
                    	<li class="current"><a href="<?php echo site_url('admin/') ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
						<li><a href="<?php echo site_url('DataKategori/show') ?>"><i class="glyphicon glyphicon-list"></i> Kategori</a></li>
						<li><a href="<?php echo site_url('DataPaket/show') ?>"><i class="glyphicon glyphicon-lock"></i> Paket</a></li>
						<li><a href="<?php echo site_url('DataPengirim/show') ?>"><i class="glyphicon glyphicon-user"></i> Pengirim</a></li>
						<li><a href="<?php echo site_url('DataPengiriman/show') ?>"><i class="glyphicon glyphicon-envelope"></i> Pengiriman</a></li>
                	</ul>
             	</div>
		  	</div>

		  	<div class="col-md-10">
		  		<div class="row">
		  			<div class="col-md-12">
					  	<div class="content-box-header">
			  				<div class="panel-title"><b>Admin / Beranda</b></div>
						</div>
						<div class="content-box-large box-with-header">
							<div class="panel-body">
								<h1><b>Selamat Datang, Admin!</b></h1>
								<br/>
							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<div class="year-calendar"></div>
					</div>
				</div>
			</div>

			<div class="row bg-dark m-l-0 m-r-0 box-shadow ">

				<!-- column -->
				<div class="col-lg-8">
						<div class="card">
							<div class="card-body">
								<div class="year-calendar"></div>
							</div>
						</div>
				</div>
				<!-- column -->
			</div>

		</div>
    </div>

<?php $this->load->view('admin/footer') ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url('assets/')?>js/jquery.js"></script>
	<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('assets/')?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/')?>js/custom.js"></script>
	
  	</body>
</html>