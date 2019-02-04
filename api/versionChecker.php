<?php

    if (isset($_POST["check"])) {
        $JSON = json_encode("Version 1.0");
        echo $JSON;
    }