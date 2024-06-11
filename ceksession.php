<?php

if (!isset($_SESSION['login'])){
	echo "<script>alert('Silahkan Login Kembali!');
	location.href='login.php';</script>";
}
?>