<?php 
    require 'includes/header.php';
    require 'includes/search-form.php';
    if (isset($_GET['user']) && isset($_GET['repository'])) {
        if ($_GET['user'] != '' && $_GET['repository'] != '') {
            include 'functions/get-data.php';
            ?>
            
            <script>
                document.getElementById("name").value = "<?= $_GET['user'];?>";
                document.getElementById("repo").value = "<?= $_GET['repository']; ?>";
            </script>

            <?php
        }
    }
    require 'includes/footer.php'; 
 ?>