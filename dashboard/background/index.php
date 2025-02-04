<?php
include "../database.php";
include "../session.php";
$title = 'Dashboard Desa Parigi';
$header = 'Background Image Dashboard';
$data->setTable("background");
$data_table = $data->read($conn);
ob_start();
?>

<table class="table table-dark table-striped table-hover text-center">
    <thead>
        <th>id</th>
        <th>Foto</th>
        <th>Edit</th>
    </thead>
    <tbody>
        <?php 
            $count = 1;
            foreach ($data_table as $key => $value) { 
        ?>
        <tr>
            <td><?php echo $count ?></td>
            <td><img src="../../assets/img/background/<?php echo $value["foto"] ?>" width="250px"></td>
            <td> 
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $count ?>"> Edit </button> 
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
						<label for="background_picture" class="col-form-label">Input Background File:</label>
						<input type="file" value="<?php echo $value['foto'] ?>" name="background_picture" class="form-control" id="background_picture" accept="image/*">
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

<?php
$content = ob_get_clean();

require '../base2.php';
?>

<script>
    console.log("Halo Niece and Nephew");
    
</script>