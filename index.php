<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca Digital ULS Nordeste</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        #title {
            /*text-align: center;*/
            padding-bottom: 50px;
        }
        .container {
            padding-top:150px;
        }
    </style>
</head>
<body>
<!-- nav bar -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/img/Logo_ULSNordeste2024_Small.png" alt="Logo" style="width:200px;" class="rounded-pill"> 
        </a>
        
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="tags.php">Etiquetas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Intranet</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Content -->
<div class="container">
    <h1 class="display-1" id="title">Biblioteca de Documentos <small>pesquisa</small></h1>
    <form action="search.php">
        <div class="mb-3">
            <input type="text" class="form-control" id="q" placeholder="Pesquisar" name="q">
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Procurar</button>
        </div>
    </form>
</div>
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
</div>
</body>
</html>