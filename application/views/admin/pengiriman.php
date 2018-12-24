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
									<div class="col-md-12">
										<label for="Cari">Pencarian : </label>
										<select class="form-control" id="kolom" name="kolom">
											<option value="pengiriman.id_pengiriman">ID Pengiriman</option>
											<option value="nama_penerima">Penerima</option>
											<option value="alamat_penerima">Tujuan</option>
											<option value="status">Status</option>
                                            <option value="jenis">Jenis Pengiriman</option>
                                            <option value="nama">Pengirim</option>
										</select>
										<input class="form-control" type="text" id="search" name="search" value="" placeholder="Search...">
										<button class="btn btn-default" type="submit" name="tombol" value="filter">Go</button>
                                    </div>
                                    </form>
                                </div>

								<table class="table table-striped">
									<thead>
										<th>No</th>
										<th class="text-center">ID Pengiriman</th>
                                        <th>Nama Pengirim</th>
                                        <th class="text-center">Detail</th>
										<th>Nama Penerima</th>
										<th>Alamat Penerima</th>
                                        <th class="text-center">Status</th>
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
                <h4 class="modal-title"><legend>Tambah Pengiriman</legend></h4>
            </div>
            <div class="modal-body">
    <?php echo form_open('DataPengiriman/store') ?>
                <fieldset>
                    <div class="form-group">
                        <label for="Name">Nama Penerima :</label>
                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf"
                            placeholder="Masukkan nama ...">  
                    </div>
                    <div class="form-group">
                        <label for="Alamat">Alamat Pnerima :</label>
                        <textarea type="text" class="form-control" id="alamat_penerima" name="alamat_penerima"
                            pattern="{1,1000}" required title="Harap diisi"
                            placeholder="Masukkan alamat ..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="ID">Kategori :</label>
		                <select class="form-control" id="id_kategori" name="id_kategori">
                        <?php foreach ($dataKat as $dk) { ?>
                            <option value="<?php echo $dk->id_kategori ?>"><?php echo $dk->jenis ?></option>
                        <?php } ?>
						</select>
		            </div>
                    <div class="form-group">
                        <label for="ID">Pengirim :</label>
		                <select class="form-control" id="id_pengirim" name="id_pengirim">
                        <?php foreach ($dataPengirim as $dp) { ?>
                            <option value="<?php echo $dp->id_pengirim ?>"><?php echo $dp->nama ?></option>
                        <?php } ?>
						</select>
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
										<?php $start = 0; foreach($data as $row) { ?>
										<tr>
											<td><?php echo $start+=1 ?></td>
											<td align="center"><?php echo $row->id_pengiriman ?></td>
                                            <td><?php echo $row->nama ?></td>
                                            <td>
												<!--Tombol Modal Detail-->
												<a href="#bannerformmodal" data-toggle="modal" data-target="#modalDetail<?php echo $row->id_pengiriman ?>">Detail</a>
										
<!-- Modal Detail -->
<div id="modalDetail<?php echo $row->id_pengiriman ?>" class="modal fade" role="dialog">
<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">Detail Pengiriman</h4>
		</div>
		<div class="modal-body">
            <b>Tanggal Masuk :</b> <?php echo date('j F Y', strtotime($row->tgl_masuk)) ?>
            <br>
            <b>Tanggal Keluar :</b> <?php if ($row->tgl_keluar=="0000-00-00") { echo "Belum diterima"; } else { echo date('j F Y', strtotime($row->tgl_keluar)); } ?>
            <br>
            <b>Paket :</b>
            <?php foreach ($dataDetail as $dd) { if ($row->id_pengiriman == $dd->id_pengiriman) { ?>
                <br>- <?php echo $dd->nama_paket ?>
            <?php } } ?>
            <br>
            <b>Jenis Pengiriman :</b> <?php echo $row->jenis ?>
		</div>
		<div class="modal-footer">
			<div class="col-md-9" align='left'>
                <b>Total Biaya :</b> Rp. <?php echo number_format( $row->total_harga ,0,",","."); ?>,-
			</div>
			<div class="col-md-3">
				<button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
			</div>
		</div>
	</div>

</div>
</div>
<!-- Tutup Modal Detail-->

											</td>
											<td><?php echo $row->nama_penerima ?></td>
											<td><?php echo $row->alamat_penerima ?></td>
											<td><?php echo $row->status ?></td>
											<td>
                                            
                                            <?php if ($row->status != 'Diterima' ) { ?>
                                            <!-- Tombol Modal Ubah-->
                                            <button type="button" class="btn btn-info btn-sm glyphicon glyphicon-pencil" data-toggle="modal" data-target="#ModalUbah<?php echo $row->id_pengiriman ?>"></button>
                                            <?php } ?>

<!-- Modal Ubah -->
<div id="ModalUbah<?php echo $row->id_pengiriman ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><legend>Edit Pengiriman</legend></h4>
            </div>
            <div class="modal-body">
<?php echo form_open('DataPengiriman/update/'); echo form_hidden('id_pengiriman', $row->id_pengiriman); ?>
                <?php $ro=''; if ($row->status == 'Dikirim') { $ro='readonly'; } ?>
                <fieldset>
                    <div class="form-group">
                        <label for="Status">Status :</label>
		                <select class="form-control" id="status" name="status">
                            <option value="Dikemas" <?php echo $s = ($row->status == 'Dikemas') ? 'selected' : ''; ?>>Dikemas</option>
                            <option value="Dikirim" <?php echo $s = ($row->status == 'Dikirim') ? 'selected' : ''; ?>>Dikirim</option>
                            <option value="Diterima" <?php echo $s = ($row->status == 'Diterima') ? 'selected' : ''; ?>>Diterima</option>
						</select>
		            </div>
                    <hr style="height:1.5px;border:none;color:#333;background-color:#333;" />
                    <div class="form-group">
                        <label for="Name">Nama Penerima :</label>
                        <input type="text" class="form-control" id="nama_penerima" name="nama_penerima"
                            pattern="^[^-\s][a-zA-Z_\s-]{1,50}" required title="Harap diisi dengan huruf" <?php echo $ro; ?>
                            placeholder="Masukkan nama ..." value="<?php echo $row->nama_penerima ?>">
                    </div> 
                    <div class="form-group">
                        <label for="Alamat">Alamat Penerima :</label>
                        <textarea type="text" class="form-control" id="alamat_penerima" name="alamat_penerima"
                            pattern="{1,1000}" required title="Harap diisi" <?php echo $ro; ?>
                            placeholder="Masukkan alamat ..."><?php echo $row->alamat_penerima ?></textarea>
                    </div>

                    <?php if (empty($ro)) { ?>

                    <div class="form-group">
                        <label for="ID">Kategori :</label>
		                <select class="form-control" id="id_kategori" name="id_kategori">
                        <?php foreach ($dataKat as $dk) { $s=''; if ($dk->id_kategori == $row->id_kategori) { $s='selected'; } ?>
                            <option value="<?php echo $dk->id_kategori ?>" <?php echo $s ?>><?php echo $dk->jenis ?></option>
                        <?php } ?>
						</select>
		            </div>
                    <div class="form-group">
                        <label for="ID">Pengirim :</label>
		                <select class="form-control" id="id_pengirim" name="id_pengirim">
                        <?php foreach ($dataPengirim as $dp) { $s=''; if ($dp->id_pengirim == $row->id_pengirim) { $s='selected'; } ?>
                            <option value="<?php echo $dp->id_pengirim ?>" <?php echo $s ?>><?php echo $dp->nama ?></option>
                        <?php } ?>
						</select>
		            </div>

                    <?php } else { ?>

                    <div class="form-group">
                        <label for="ID">Kategori :</label>
                        <input type="hidden" id="id_kategori" name="id_kategori" value="<?php echo $row->id_kategori ?>">
                        <input type="text" class="form-control" value="<?php echo $row->jenis ?>" readonly >
		            </div>
                    <div class="form-group">
                        <label for="ID">Pengirim :</label>
                        <input type="hidden" id="id_pengirim" name="id_pengirim" value="<?php echo $row->id_pengirim ?>">
                        <input type="text" class="form-control" value="<?php echo $row->nama ?>" readonly >
		            </div>

                    <?php } ?>

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