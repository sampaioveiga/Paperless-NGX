<!DOCTYPE html>
<html>
<head>
    <title>Manual de Certifica&ccedil;&atilde;o DGS 2024</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        #title {
            margin-top:75px;
        }
        #content {
            margin-top:50px;
            margin-bottom:100px;
        }
    </style>
</head>
<body>
<!-- nav bar -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/img/Logo_ULSNordeste2024_Small.png" alt="Avatar Logo" style="width:200px;" class="rounded-pill"> 
        </a>
        
        <!-- Search -->
        <form class="d-flex" action="search.php">
            <input class="form-control me-2" id="q" name="q" type="search" placeholder="Pesquisar" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Pesquisar</button>
        </form>
    </div>
</nav>
<!-- Content -->
<div class="container">
    <h1 class="display-1" id="title">Manual de Certifica&ccedil;&atilde;o DGS 2024</h1>
<!--    <form action="search.php">
        <div class="mb-3">
            <input type="text" class="form-control" id="q" value="<?php echo htmlspecialchars($_GET["q"]); ?>" name="q">
        </div>
        <button type="submit" class="btn btn-primary">Procurar</button>
    </form>-->
</div>
<!-- Search results content -->
<div class="container" id="content"></div>
<!-- Footer -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom">
    <div class="container-fluid">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link disabled" href="#">2024</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Search script -->
<script>
$(document).ready(function(){
    // Get API data into response
    let response = <?php
        $param = rawurlencode($_GET["q"]);
        $opts = [
            "http" => [
                "method" => "GET",
                "header" => "Authorization: Token 1a82dd4d2d9dcd78bfca63afb1f24d3837d0c675"
            ]
        ];
        $context = stream_context_create($opts);
        $file = file_get_contents('http://192.168.1.175:8000/api/tags/', false, $context);
        echo $file;
    ?>;
    
    if (response.count == 0) {
        $("#content").html('<h1 class="display-2">0 resultados</h1>');
    } else {
        $("#content").append('<div class="row" id="listItens">');
        for (result of response.results) {
            let txt = '<div class="col-6"><h3><a href="./tag.php?q=%22' + result.name + '%22">' + result.name + '</a></h3></div>';
            $("#listItens").append(txt);
        }
        $("#content").append('</div>');
    }

});
</script>
</body>
</html>
