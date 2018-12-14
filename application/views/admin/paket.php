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
						<li class="current"><a href="<?php echo site_url('DataPaket/show') ?>"><i class="glyphicon glyphicon-lock"></i> Paket</a></li>
						<li><a href="<?php echo site_url('DataPengirim/show') ?>"><i class="glyphicon glyphicon-user"></i> Pengirim</a></li>
                        <li><a href="<?php echo site_url('DataPengiriman') ?>"><i class="glyphicon glyphicon-envelope"></i> Pengiriman</a></li>
                	
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
                            <div class="panel-title"><b>Admin / Data Paket</b></div>
                        </div>

						<div class="content-box-large box-with-header">

							<div class="panel-body">
                                <div class="row">
                                    <form class="form-inline" action="<?php echo site_url('DataPaket/show') ?>" method="post">
                                    <div class="col-md-6">
                                        <label for="Cari">Pencarian : </label>
                                        <select class="form-control" id="kolom" name="kolom">
                                            <option value="nama">Nama</option>
                                            <option value="jenis_kelamin">Jenis Kelamin</option>
                                            <option value="hp">HP</option>
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
										<th>Nama Paket</th>
                                        <th>Berat</th>
                                        <th>ID Pengirim</th>
                                        <th>ID Pengiriman</th>
										<th>
                                            <!-- Tombol Modal Tambah-->
                                            <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-plus" data-toggle="modal" data-target="#ModalTambah"> Tambah</button>

<!-- Modal Tambah -->
<div id="ModalTambah" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><legend>Tambah Paket</legend></h4>
            </div>
            <div class="modal-body">
    <?php echo form_open('DataPaket/store') ?>
                <fieldset>
                    <div class="form-group">
                        <label for="Name">Nama Paket :</label>
                        <input type="text" class="form-control" id="nama" name="nama"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
                            placeholder="Masukkan nama ...">  
                    </div>
                    <div class="form-group">
                        <label for="Name">Jenis Kelamin :</label>
		                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
							<option value="Laki - Laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
		            </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat :</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat"
                            pattern="{1,1000}" required title="Harap diisi"
                            placeholder="Masukkan alamat ...">
						</textarea>
                    </div>
                    <div class="form-group">
                        <label for="hp">No. HP :</label>
                        <input type="number" class="form-control" id="hp" name="hp"
                            pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
                            placeholder="Masukkan nomer handphone ...">  
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            </div>
<?php echo form_close() ?>
        </div>

    </div>
</div>
<!-- Tutup Modal Tambah -->

										</th>
									</thead>
<?php if(isset($data)) { ?>
									<tbody>
										<?php foreach($data as $row) { ?>
										<tr>
										<td>
											<?php echo $row->id_paket ?>
										</td>
										<td>
											<?php echo $row->nama_paket ?>
										</td>
                                        <td>
											<?php echo $row->berat ?> kg
										</td>
                                        <td>
											<?php echo $row->id_pengirim ?>
										</td>
                                        <td>
											<?php echo $row->id_pengiriman ?>
										</td>
										<td>
                                            <!-- Tombol Modal Ubah-->
                                            <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ModalUbah<?php echo $row->id_pengirim ?>"></button>

<!-- Modal Ubah -->
<div id="ModalUbah<?php echo $row->id_pengirim ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><legend>Edit Paket</legend></h4>
            </div>
            <div class="modal-body">
<?php echo form_open('DataPaket/update/'.$row->id_pengirim); echo form_hidden('id', $row->id_pengirim); ?>
                <fieldset>
                    <div class="form-group">
                        <label for="Name">Nama Paket :</label>
                        <input type="text" class="form-control" id="name" name="name"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
                            placeholder="Masukkan nama ...">  
                    </div>
                    <div class="form-group">
                        <label for="Name">Jenis Kelamin :</label>
		                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
							<option value="Laki - Laki">Laki - Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
		            </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat :</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat"
                            pattern="{1,1000}" required title="Harap diisi"
                            placeholder="Masukkan alamat ...">  
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="hp">No. HP :</label>
                        <input type="text" class="form-control" id="hp" name="hp"
                            pattern="[0-9]{1,15}" required title="Harap diisi dengan angka"
                            placeholder="Masukkan nomer handphone ...">  
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" id="ubah">Ubah</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
            </div>
<?php echo form_close() ?>
        </div>

    </div>
</div>
<!-- Tutup Modal Ubah -->

											<a href="<?php echo site_url('DataPaket/destroy/'.$row->id_pengirim) ?>" type="button" class="btn btn-danger btn-sm glyphicon glyphicon-trash"
												onclick="return confirm('Apakah anda yakin?')"></a>
										</td>
										</tr>
<?php } ?>
									</tbody>
								</table>
							</div>

							<div class="panel-footer">

							</div>

<?php } else {echo "<center>Tidak Ada Data!</center>";} ?>

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