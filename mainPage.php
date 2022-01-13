<?php
if (!isset($_COOKIE[session_name()])) {
    header("Location: index.php");
    exit;
} else {
    session_start();
    if (!isset($_SESSION['usuario'])) {
        //Hi ha la sessió però no les variables de sessió!! Hasta la vista baby!
        header("Location: logout.php");
        exit;
    }
}

?>

<!DOCTYPE HTML>
<html>
    <header>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="author" content="Mario, Eduard & Junyao" />
        <title>CINETICS</title>
        <link rel="stylesheet" type="text/css" href="./css/style.css" media="screen" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
        <link href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/css/mdb5/3.10.1/compiled.min.css" rel="stylesheet">
        <link href="https://mdbootstrap.com/api/snippets/static/download/MDB5-Pro-Advanced_3.3.0/plugins/css/all.min.css" rel="stylesheet">
        <link href="https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5" rel="stylesheet">
    </header>
    <body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
            <div class="col-sm-6 text-black">
                <div class="px-5 ms-xl-4">
                <img src="./img/favicon.png" alt="Login image">
                <span class="h1 fw-bold mb-0">Cinetics</span>
                </div>
                <div class="align-bottom">
                    <?php
                        echo "<h3>Welcome " . $_SESSION['usuario'] . "</h3>";
                    ?>
                    <a href="logout.php"><button class="btn btn-secondary"><span>Logout</span></button></a>
                </div>
                    
                </div>
            <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="./img/backGround2.jpg" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
            </div>
            </div>
        </div>
        </section>
    </body>
</html>
