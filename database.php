<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$dbname = 'praktikum_11';

$conn = mysqli_connect($hostname, $username, $password, $dbname) or die('Gagal terhubung dengan database');
