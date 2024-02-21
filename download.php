<?php
    $file = rawurlencode(htmlspecialchars($_GET["file"]));
    $title = rawurlencode(htmlspecialchars($_GET["title"]));
    $url = 'http://IP:PORT/api/documents/' . $file . '/download/';
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "Authorization: Token <KEY>"
        ]
    ];
    $context = stream_context_create($opts);
    $file = file_get_contents($url, false, $context);
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $title . '"');
    echo $file;
?>;