<?php
require "../connection.php";
include "../dashboard/database.php";
$api = $data->searchPublikasi($conn, $_POST["search"]);

?>

<?php foreach ($api as $key => $value) { ?>
    <a href="details.php?id=<?php echo $value["id"] ?>">
        <div class="card rounded my-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-2">
                        <img src="../assets/img/blog/<?php echo $value["foto"] ?>" alt="" class="img-fluid w-100 h-100">
                    </div>
                    <div class="col-10">
                        <p><?php echo $value["judul"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </a>
<?php } ?>