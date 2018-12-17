<!DOCTYPE>
<html>
	<head>
		<title>Halaman Admin</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- jQuery UI -->
		<link href="<?php echo base_url()?>assets/admin/css/jquery-ui.css" rel="stylesheet" media="screen">
		<!-- Bootstrap -->
		<link href="<?php echo base_url()?>assets/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<!-- styles -->
		<link href="<?php echo base_url()?>assets/admin/css/styles.css" rel="stylesheet">

		<!-- CSS Editor -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin/')?>vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"></link>

		<!-- CSS Form -->
		<link href="<?php echo base_url('assets/admin/')?>css/fontawesome.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/admin/')?>vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/admin/')?>vendors/select/bootstrap-select.min.css" rel="stylesheet">
		<link href="<?php echo base_url('assets/admin/')?>vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

		<link href="<?php echo base_url('assets/admin/')?>css/forms.css" rel="stylesheet">
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
						<li><a href="<?php echo site_url('admin/') ?>"><i class="glyphicon glyphicon-home"></i> Beranda</a></li>
		                <li><a href="<?php echo site_url('DataKategori/show') ?>"><i class="glyphicon glyphicon-list"></i> Kategori</a></li>
						<li><a href="<?php echo site_url('DataPaket/show') ?>"><i class="glyphicon glyphicon-lock"></i> Paket</a></li>
						<li><a href="<?php echo site_url('DataPengirim/show') ?>"><i class="glyphicon glyphicon-user"></i> Pengirim</a></li>
                        <li class="current"><a href="<?php echo site_url('DataPengiriman/show') ?>"><i class="glyphicon glyphicon-envelope"></i> Pengiriman</a></li>   	
                    </ul>
				</div>
				<div class="sidebar content-box" style="display: block;">
					<ul class="nav">
                        <li><a href="<?php echo site_url('admin/report') ?>"><i class="glyphicon glyphicon-book"></i> Laporan</a></li>
                    </ul>
				</div>
			</div>

			<div class="col-md-10">
				<div class="row">
					<div class="col-md-12">

                        <div class="content-box-header">
                            <div class="panel-title"><b>Admin / Data Pengiriman</b></div>
                        </div>

						<div class="content-box-large box-with-header">

							<div class="panel-body">
								<div class="row">
									<form class="form-inline" action="<?php echo site_url('DataPengiriman/show') ?>" method="post">
									<div class="col-md-6">
										<label for="Cari">Pencarian : </label>
										<select class="form-control" id="kolom" name="kolom">
											<option value="id_pengiriman">ID Transaksi</option>
											<option value="nama_user">User</option>
											<option value="bayar">Dibayar</option>
											<option value="status">Diverifikasi</option>
										</select>
										<input class="form-control" type="text" id="search" name="search" value="" placeholder="Search...">
										<button class="btn btn-default" type="submit" name="tombol" value="filter">Go</button>
                                    </div>
									<div class="col-md-6" align="right">
                                        <button class="btn btn-default" type="submit" name="tombol" value="print"><span class="glyphicon glyphicon-print"></span></button>
                                    </div>
                                    </form>
                                </div>

								<table class="table table-striped">
									<thead>
										<th>No</th>
										<th class="text-center">ID Pengiriman</th>
										<th class="text-center">Tanggal Masuk</th>
										<th class="text-center">Tanggal Keluar</th>
										<th>Nama Penerima</th>
										<th>Alamat Penerima</th>
                                        <th class="text-center">Total Pembayaran</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Jenis Kategori</th>
										<th>Nama Pengirim</th>
										<th class="text-center">Action</th>
									</thead>
<?php if(isset($data)) { ?>
									<tbody>
										<?php $start = 0; foreach($data as $row) { ?>
										<tr>
											<td><?php echo $start+=1 ?></td>
											<td align="center"><?php echo $row->id_pengiriman ?></td>
											<td align="center"><?php echo date('j F Y', strtotime($row->tgl_masuk)) ?></td>
											<td align="center"><?php echo date('j F Y', strtotime($row->tgl_keluar)) ?></td>
											<td><?php echo $row->nama_penerima ?></td>
											<td><?php echo $row->alamat_penerima ?></td>
											<td align="right">
												Rp. <?php echo number_format( $row->total_harga ,0,",","."); ?>,-
											</td>
											<td><?php echo $row->status ?></td>
											<td><?php echo $row->jenis ?></td>
											<td><?php echo $row->nama ?></td>
											<td align="center">
												<a href="<?php echo site_url('DataPengiriman/destroy/'.$row->id_pengiriman) ?>" type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"
													onclick="return confirm('Apakah anda yakin?')"></a>
											</td>
										</tr>
<?php } ?>
									</tbody>
								</table>
							</div>

							<div class="panel-footer">
							</div>

<?php } else {echo "<tr><td colspan='7'><center>Tidak Ada Data!</center></td></tr>";} ?>

						</div>
					</div>
				</div>
			</div>

		</div>
	</div>

<?php $this->load->view('admin/footer') ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url('assets/admin/')?>js/jquery.js"></script>
<script src="<?php echo base_url('assets/admin/js/jquery-3.3.1.min.js') ?>"></script>
<!-- jQuery UI -->
<script src="<?php echo base_url('assets/admin/')?>js/jquery-ui.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/admin/')?>bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/admin/')?>js/custom.js"></script>

<!-- JS Form -->
<script src="<?php echo base_url('assets/admin/')?>vendors/select/bootstrap-select.min.js"></script>

<script src="<?php echo base_url('assets/admin/')?>vendors/tags/js/bootstrap-tags.min.js"></script>

<script src="<?php echo base_url('assets/admin/')?>vendors/mask/jquery.maskedinput.min.js"></script>

<script src="<?php echo base_url('assets/admin/')?>vendors/moment/moment.min.js"></script>

<script src="<?php echo base_url('assets/admin/')?>vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

<link href="<?php echo base_url('assets/admin/')?>css/bootstrap-editable.css" rel="stylesheet"/>
<script src="<?php echo base_url('assets/admin/')?>js/bootstrap-editable.min.js"></script>

<script src="<?php echo base_url('assets/admin/')?>js/forms.js"></script>
</body>
</html>