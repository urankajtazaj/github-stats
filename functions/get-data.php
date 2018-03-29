<?php
    require 'release_stats.php';

    $USER = $_GET["user"] . "/";
    $REPO = $_GET["repository"];
  
    $Json = get_release($USER, $REPO);

    $total_downloads = 0;

    for ($i = 0; $i < sizeof($Json); $i++) {
        $json = $Json[$i];
        $total_downloads += $json['assets']['0']['download_count'];
    }

    echo "<p align='center'>Total downloads<br><span class='txt-lg'>{$total_downloads}</span></p>";

    echo "<div class=\"flexbox\">";    

    for ($i = 0; $i < sizeof($Json); $i++) {
        $json = $Json[$i];
        $name = $json['name'];
        $created = $json['assets']['0']['created_at'];
        $updated = $json['assets']['0']['updated_at'];  
        $download_count = $json['assets']['0']['download_count'];  
        $url = $json['html_url'];
        $file_url = $json['assets']['0']['browser_download_url'];
        $uploader = $json['author']['login'];
        $uploader_url = $json['author']['html_url'];        
        $files = $json['assets'][0]['name'];

        $date_created = date_format(date_create($created), 'd-m-Y');
        $date_updated = date_format(date_create($updated), 'd-m-Y');

        $hour_created = date_format(date_add(date_create($created), date_interval_create_from_date_string("2 hours")), 'H:i');
        $hour_updated = date_format(date_add(date_create($updated), date_interval_create_from_date_string("2 hours")), 'H:i');       

        ?>
        <div class="rect">
            <h1><?= "<a href='{$url}' target='_blank'>{$name}</a>"; ?></h1>
            <p>Uploaded by 
                <?= "<a href='{$uploader_url}' target='_blank'><span>{$uploader}</span></a> on <span>{$date_created}</span> at <span>{$hour_created}</span>"; ?></p>
            <p>Last updated on <?= "<span>{$date_updated}</span> at <span>{$hour_updated}</span>"?></p>
            <p><img src="photo/download-arrow.png" alt="Download">
            Downloaded <span><?= $download_count ?></span> times</p>
            <a href="<?= $file_url; ?>"><img src="photo/file.png" alt="Files"> <?= $files; ?></a>
        </div>
        <?php
    }
    echo "</div>";
?>