<?php
include "../database.php";
include "../session.php";
$title = 'Dashboard Desa Parigi';
$header = 'Foto Desa Dashboard';
$data->setTable("foto_desa");
$data_table = $data->read($conn);
ob_start();
?>
<button class="btn btn-primary mb-3 fs-3" data-bs-toggle="modal" data-bs-target="#addModal"> + Add</button> 

<table class="table table-dark table-striped table-hover text-center">
    <thead>
        <th>id</th>
        <th>Judul</th>
        <th>Deskripsi</th>
        <th>Foto</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php 
            $count = 1;
            foreach ($data_table as $key => $value) { 
        ?>
        <tr>
            <td><?php echo $count ?></td>
            <td><?php echo $value["judul"] ?></td>
            <td><?php echo $value["deskripsi"] ?></td>
            <td><img src="../../assets/img/foto-desa/<?php echo $value["foto"] ?>" width="250px"></td>
			<td>
				<div style="display: flex; gap: 8px; align-items: center; justify-content: center;">
					<button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $count ?>"> Edit </button>
					<form action="remove.php" method="post" style="margin: 0;">
						<input type="hidden" value="<?php echo $value["id"] ?>" name="id">
						<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
						<button type="submit" class="btn btn-danger"> Remove </button>
					</form>
				</div>
			</td>
        </tr>
        <?php 
           $count++; } 
        ?>
    </tbody>
</table>

<?php 
    $count = 1;
    foreach ($data_table as $key => $value) { 
?>
<div class="modal fade" id="editModal<?php echo $count ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="edit.php" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<!-- Include CSRF token -->
					<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
					<input type="hidden" value="<?php echo $value['id'] ?>" name="id">
                    <div class="mb-3">
						<label for="judul" class="col-form-label">Judul:</label>
						<input type="text" name="judul" class="form-control" value="<?php echo $value['judul'] ?>" id="judul">
					</div>
                    <div class="mb-3">
						<label for="deskripsi" class="col-form-label">Deskripsi:</label>
						<input type="text" name="deskripsi" class="form-control" value="<?php echo $value['deskripsi'] ?>" id="deskripsi">
					</div>
					<div class="mb-3">
						<label for="foto_pegawai" class="col-form-label">Input Foto Desa:</label>
						<input type="file" name="foto_pegawai" class="form-control" value="<?php echo $value['foto'] ?>" id="foto_pegawai" accept="image/*">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit Edit</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php 
    $count++; 
} 
?>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="addModalLabel">New message</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="add.php" method="POST" enctype="multipart/form-data">
				<div class="modal-body">
					<!-- Include CSRF token -->
					<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                    <div class="mb-3">
						<label for="judul" class="col-form-label">Judul:</label>
						<input type="text" name="judul" class="form-control" id="judul">
					</div>
                    <div class="mb-3">
						<label for="deskripsi" class="col-form-label">Deskripsi:</label>
						<input type="text" name="deskripsi" class="form-control" id="deskripsi">
					</div>
					<div class="mb-3">
						<label for="foto_pegawai" class="col-form-label">Input Foto Pegawai:</label>
						<input type="file" name="foto_pegawai" class="form-control" id="foto_pegawai" accept="image/*">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Add Data</button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
$content = ob_get_clean();
require '../base2.php';
?>

<script>
    console.log("Halo Niece and Nephew");
    
</script>