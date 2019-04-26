<?php session_start(); ?>
<link rel="stylesheet" href="asset/css/bootstrap.min.css" />
<link rel="stylesheet" href="asset/css/style.css" />
<link rel="stylesheet" type="text/css" href="asset/css/jquery.dataTables.min.css">
<script src="asset/js/jquery-3.3.1.slim.min.js"></script>
<script src="asset/js/bootstrap2.min.js"></script>

<?php include('header.php'); ?>
<body>
	<div class="container" style="margin-top: 80px;">
		<div class="row">
			<div class="col-md-12">
				<h1 class="center">Silahkan Diisi</h1>
			</div>
		</div>
		<div class="row" style="height:55px;">
			<div class="col-md-12">
				<div>
				<?php 
					if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
					echo '<div id="pesan" class="alert alert-success" style="display:none;" ;">'.$_SESSION['pesan'].'</div>';
					}
					$_SESSION['pesan'] = '';
				?>
				</div>
				<div>
					<?php
					if (isset($_SESSION['hapus']) && $_SESSION['hapus'] <> '') {
					echo '<div id="hapus" class="alert alert-danger" style="display:none;" ;">'.$_SESSION['hapus'].'</div>';
					}
					$_SESSION['hapus'] = '';
					?>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top: 30px;">
			<div class="col-md-4">
				<form method="post" action="tambah-aksi.php">
					<div class="form-group">
						<label>Nama :</label>
						<input type="text" class="form-control" name="nama" required="required">
					</div>
					<div class="form-group">
						<label>Email :</label>
						<input type="text" class="form-control" name="email" required="required">
					</div>
					<div>
						<label>Jenis Kelamin :</label>
					</div>
					<div>
						<label><input type="radio" name="kelamin" value="L">Laki-laki</label>
					</div>
					<div>
						<label><input type="radio" name="kelamin" value="P">Perempuan</label>
					</div>
					<div class="form-group">
						<label>Comment :</label>
						<textarea class="form-control" rows="5" name="comment"></textarea>
					</div>
					<div>
						<input type="submit" name="simpan" value="simpan" class="btn btn-success">
					</div>
				</form>
			</div>
			<div class="col-md-8">
				<table class="table table-stripped table-hover datatab">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama</th>
							<th>Email</th>
							<th>Jenis Kelamin</th>
							<th>Comment</th>
							<th>Action</th>                         
						</tr>
					</thead>  
					<tbody>
						<?php 
						$query = mysqli_query($conn, "SELECT * FROM `formulir` ORDER BY `no` DESC");
						$no = 1;
						while ($data = mysqli_fetch_assoc($query)) 
						{
						?>
							<tr>
								<td><?php echo $no++; ?></td>
								<td><?php echo $data['nama']; ?></td>
								<td><?php echo $data['email']; ?></td>
								<td>
									<?php if($data['kelamin'] == "L"){ echo 'Laki-Laki';}else{ echo 'Perempuan';}?>
								</td>
								<td><?php echo $data['comment']; ?></td>
								<td>
									<a href="#" type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal<?php echo $data['no']; ?>">Edit</a>
									|
									<a href="hapus.php?no=<?php echo $data['no']; ?>" type="button" onclick="return confirm('Yakin Hapus?')" class="btn btn-danger btn-md">HAPUS</a>
								</td>
							</tr>
							<div class="modal fade" id="myModal<?php echo $data['no']; ?>" role="dialog">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal">&times;</button>
											<h4 class="modal-title">Update Data Mahasiswa</h4>
										</div>
										<div class="modal-body">
											<form role="form" action="edit.php" method="get">
												

													<input type="hidden" name="no" value="<?php echo $data['no']; ?>">

													<div class="form-group">
														<label>Nama</label>
														<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>">      
													</div>

													<div class="form-group">
														<label>Email</label>
														<input type="text" name="email" class="form-control" value="<?php echo $data['email']; ?>">      
													</div>

													<div class="form-group">
														<label>Kelamin</label>
														<input type="radio" name="kelamin" value="L" <?php if($data['kelamin'] == "L"){ echo 'checked';}?> > Laki-Laki
														<input type="radio" name="kelamin" value="P" <?php if($data['kelamin'] == "P"){ echo 'checked';}?> >Perempuan
													</div>

													<div class="form-group">
														<label>Comment</label>
														<input type="text" name="comment" class="form-control" value="<?php echo $data['comment']; ?>">      
													</div>

													<div class="modal-footer">  
														<button type="submit" class="btn btn-success">Update</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>

												     
											</form>
										</div>
									</div>
								</div>
							</div>
						<?php               
						} 
						?>
					</tbody>
				</table> 
			</div>
		</div>
	</div>
</body>
<link rel="stylesheet" href="asset/css/bootstrap.css">
<script type="text/javascript" src="asset/js/jquery.js"></script>
<script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
<script type="text/javascript" src="asset/js/jquery.min.js"></script>
<script src="asset/js/jquery-1.12.0.min.js"></script>
<script src="asset/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
$('.datatab').DataTable();
} );
</script>
<script type="text/javascript">
	$(document).ready(function(){setTimeout(function(){$("#pesan").fadeIn('slow');}, 500);});
    setTimeout(function(){$("#pesan").fadeOut('slow');}, 2000);
</script>
<script type="text/javascript">
	$(document).ready(function(){setTimeout(function(){$("#hapus").fadeIn('slow');}, 500);});
    setTimeout(function(){$("#hapus").fadeOut('slow');}, 2000);
</script>
<?php include('footer.php'); ?>