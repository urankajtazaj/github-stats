<?php 
    require 'includes/header.php';
    require 'includes/search-form.php';
    if (isset($_GET['user']) && isset($_GET['repository'])) {
        if ($_GET['user'] != '' && $_GET['repository'] != '') {
            include 'functions/get-data.php';
        }
    }
    require 'includes/footer.php'; 
 ?>