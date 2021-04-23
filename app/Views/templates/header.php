<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php
    $uri = service('uri');

?>

<?php if(session()->get('isLoggedIn')): ?>

    <nav class="navbar navbar-expand-lg navbar-dark header-navbar-top">
        <div class="container">
            <a href=/dashboard>
                <img class="header-logo" src="./assets/images/header/header_logo.svg" alt="header logo image"/>
            </a>

            <a href=/logout>
                <img class="header-logout" src="./assets/images/header/log_out.svg" alt="logout image"/>
            </a>
        </div>
    </nav>

<?php endif; ?>
