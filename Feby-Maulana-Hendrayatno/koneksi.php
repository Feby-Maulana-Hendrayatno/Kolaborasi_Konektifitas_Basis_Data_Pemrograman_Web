<?php
$koneksi = new mysqli ("localhost", "root", "", "angkringan-family");

if (!$koneksi) {
    die("Connection Failed");
}