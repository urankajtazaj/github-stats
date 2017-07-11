<?php
    function get_release($user, $repo) {
        $DOMAIN = "https://api.github.com/repos/";
        $RELEASE = "/releases";
        $URL = $DOMAIN . $user . $repo . $RELEASE;    

        $ch = curl_init();

        $t_ver = curl_version();

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',                                                                          
            'Content-Type: application/json'
        ));
        curl_setopt($ch, CURLOPT_USERAGENT, $t_ver['version']);
        curl_setopt($ch, CURLOPT_URL, $URL);

        $result = curl_exec($ch);

        curl_close($ch);

        // $result = file_get_contents($URL);
        $api = json_decode($result, true);

        return $api;
    }
?>