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
        #subtitle {
            margin-bottom:50px;
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
                "header" => "Authorization: Token KEY"
            ]
        ];
        $context = stream_context_create($opts);
        $file = file_get_contents('http://192.168.1.175:8000/api/documents/?ordering=-created&query=tag:' . $param, false, $context);
        echo $file;
    ?>;
    
    if (response.count == 0) {
        $("#content").html('<div class="container"><h1>Sem resultados</h1></div>');
    } else {
        $("#content").append('<h1 class="display-1" id="title">Manual de Certifica&ccedil;&atilde;o DGS 2024</h1>');
        $("#content").append('<h2 class="display-2" id="subtitle"><?php echo substr(htmlspecialchars($_GET["q"]),6,-6); ?></h2>');
        
        //$("#content").append('<ul id="results" class="list-group">');
        //for (result of response.results) {
        //    let txt = '<li class="list-group-item"><a href="./download.php?file=' + result.id + '&title=' + result.title + '"><p class="h3">' + result.title + ' ' + result.created_date + '</p></a><p>' + result.__search_hit__.highlights + '</p></li>';
        //    $("#results").append(txt);
        //}
        //$("#content").append('</ul>');

        $("#content").append('<dl id="results" class="row">');
        for (result of response.results) {
            let txt = '<dt class="col-sm-2"><p class="h4">' + result.created_date + '</p></dt><dd class="col-sm-10"><p class="h3"><a href="./download.php?file=' + result.id + '&title=' + result.title + '">' + result.title + '</a></p></dd>';
            $("#results").append(txt);
        }
        $("#content").append('</dl>');
    }

});
</script>
</body>
</html>
