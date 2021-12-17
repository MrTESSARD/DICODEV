<?php
const DB_HOST = "localhost";
const DB_NAME = "dicodev";
const DB_USER = "root";
const DB_PASSWORD = "";

const DB_FULL_HOST = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8";


function JSRedirect($href)
    {
        echo "<script>window.location.href='".$href."'</script>";
    }