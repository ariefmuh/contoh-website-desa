<?php
$title = 'Dashboard Desa Parigi';
$header = 'Admin Dashboard';
ob_start();
?>
<p>Welcome to the admin dashboard!</p>
<?php
$content = ob_get_clean();
include 'base.php';
?>