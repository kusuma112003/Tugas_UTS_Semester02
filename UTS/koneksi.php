<?php

// definisikan variabel
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'db_kampus';
$SITE = 'http://localhost/tugas_uts_semester2';

// Koneksi ke database
$mysqli = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// start session
session_start();

// Memeriksa koneksi
if ($mysqli->connect_errno) {
    die("Failed to connect to MySQL: " . $mysqli->connect_error);
}