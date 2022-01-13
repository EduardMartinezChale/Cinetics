<?php 
    require_once("./lib/controlUsuari.php");
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['user']) && isset($_POST['pass'])){
            //Protecció contra Injecció a través d'input fields
            $userPOST = filter_input(INPUT_POST, 'user');
            $passPOST = filter_input(INPUT_POST, 'pass');

            //Comprovem les credencials
            $usuari=verificaUsuari($userPOST,$passPOST);
            if($usuari){
                session_start();
                //setcookie('usuario',"$usuari['name']",time() + 3600*24);
                $_SESSION['usuario'] = $usuari['name'];
                header("Location: mainPage.php");
                exit;
            }
            else{
                $errorLogin = true;
                $user = $userPOST;
            }           
        }
    }else{
        //Si la sessió ja està iniciada redirigeix dins la pàgina
        if(isset($_COOKIE[session_name()])){
            header("Location: mainPage.php");
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
                <div class="d-flex align-items-center px-5">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="width: 23rem;">

                    <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
                    <?php 
                        if(isset($errorLogin) && $errorLogin == TRUE){
                            echo '<p class="error">Revisa l'. "'". 'adreça de correu i/o la contrasenya</p>';
                        }
                    ?>
                    <div class="form-outline mb-4">
                    <input type="text" name="user" id="form2Example18" class="form-control form-control-lg" value="<?php if(isset($user)) echo $user;?>"/>
                    <label class="form-label" for="form2Example18">Email address</label>
                    </div>

                    <div class="form-outline mb-4">
                    <input type="password" id="form2Example28" name="pass" class="form-control form-control-lg" />
                    <label class="form-label" for="form2Example28">Password</label>
                    </div>

                    <div class="pt-1 mb-4">
                    <button class="btn btn-info btn-lg btn-block" type="submit">Login</button>
                    </div>

                    <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                    <p>Don't have an account? <a href="./register.php" class="link-info">Register here</a></p>

                </form>

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
