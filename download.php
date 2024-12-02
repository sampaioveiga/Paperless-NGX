<?php
    $file = rawurlencode(htmlspecialchars($_GET["file"]));
    $title = rawurlencode(htmlspecialchars($_GET["title"]));
    $url = 'http://192.168.1.175:8000/api/documents/' . $file . '/download/';
    $opts = [
        "http" => [
            "method" => "GET",
            "header" => "Authorization: Token dc40ac0885827d22b8f9fb49b2044f62d732dcc2"
        ]
    ];
    $context = stream_context_create($opts);
    $file = file_get_contents($url, false, $context);
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $title . '.pdf"');
    echo $file;
?>;
