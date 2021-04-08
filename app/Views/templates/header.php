<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../public/assets/css/style.css"
</head>
<body>
<?php
    $uri = service('uri');

?>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #81A2AC;">
    <div class="container">
            <a class="navbar-brand" href="/dashboard">De Spiegel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <?php if(session()->get('isLoggedIn')): ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?($uri->getSegment(1)=='dashboard' ? 'active' : null) ?> ">
                        <a class="nav-link" href="/dashboard" >Dashboard</a>
                    </li>
                    <li class="nav-item <?($uri->getSegment(1)=='register' ? 'active' : null)?> ">
                        <a class="nav-link" href="/register" >register</a>
                    </li>
                </ul>
                <ul class="navbar-nav my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
                <?php else: ?>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?($uri->getSegment(1)=='' ? 'active' : null )?>">
                        <a class="nav-link" href="/" >Login</a>
                    </li>

                </ul>
               <?php endif; ?>
            </div>

    </div>
</nav>