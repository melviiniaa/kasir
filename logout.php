<?php
 session_start();
 session_destroy();

echo "<script>alert('Anda Telah Keluar dari Sistem !!');
	location.href='login.php';</script>";
?>