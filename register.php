<?php
require_once './lib/addUser.php';
require_once './lib/verifyUser.php';

$errpass = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errpass = false;
    if (isset($_POST["pass"]) && isset($_POST["passConf"])) {
        if ($_POST["pass"] == $_POST["passConf"]) {
            if (isset($_POST['user']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['mail'])) {

                //Protecció contra Injecció a través d'input fields
                $userPOST = filter_input(INPUT_POST, 'user');
                $passPOST = filter_input(INPUT_POST, 'pass');
                $passConfPOST = filter_input(INPUT_POST, 'passConf');
                $fnamePOST = filter_input(INPUT_POST, 'fname');
                $lnamePOST = filter_input(INPUT_POST, 'lname');
                $mailPOST = filter_input(INPUT_POST, 'mail');

                $verificat = verifyUserDataBase($mailPOST, $userPOST);
                //El registre ha funcionat
                if ($verificat == 1) {
                    crearUser($mailPOST, $userPOST, $passPOST, $fnamePOST, $lnamePOST);
                    echo ('Record Entered Successfully');
                }
            }
        } else { $errpass = true;}
    }
}else{
    if(isset($_COOKIE[session_name()])){
        header("Location: mainPage.php");
        exit;
    }
}
?>

<!DOCTYPE HTML>
<html>
    <head>
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
    </head>
    <body>
        <section class="vh-100">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6 text-black">

                    <div class="px-5 ms-xl-4">
                    <img src="./img/favicon.png" alt="Login image">
                    <span class="h1 fw-bold mb-0">Cinetics</span>
                    </div>

                    <div class="d-flex align-items-center  px-5 ms-xl-4">
                    <form style="width: 23rem;" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register</h3>

                        <div class="form-outline mb-4">
                        <input type="text" id="user" name="user" class="form-control form-control-lg" required="required" />
                        <label class="form-label" for="user">User Name</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="text" id="fname" name="fname" class="form-control form-control-lg" required="required" />
                        <label class="form-label" for="fname">First Name</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="text" id="lname" name="lname" class="form-control form-control-lg" required="required" />
                        <label class="form-label" for="lname">Second Name</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="email" id="mail" name="mail" class="form-control form-control-lg" required="required" />
                        <label class="form-label" for="mail">Email address</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="password" id="pass" name="pass" class="form-control form-control-lg" required="required" />
                        <label class="form-label" for="pass">Password</label>
                        </div>

                        <div class="form-outline mb-4">
                        <input type="password" id="passConf" name="passConf" class="form-control form-control-lg" required="required" />
                        <label class="form-label" for="passConf">Confirm Password</label>
                        </div>
                        <div class="pt-1 mb-4">
                        <button class="btn btn-info btn-lg btn-block" type="submit">Sign up</button>
                        </div>
                        <?php
                        if ($errpass == true) {
                            echo '<p class="error">La contraseñas no coinciden</p>';
                        }
                        ?>
                        <p>Do you already have an account? <a href="./index.php" class="link-info">Login here</a></p>


                    </form>
                </div>
                </div>
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="./img/backGround2.jpg" alt="Login image" class="w-100 " style="object-fit: cover; object-position: left;">
                </div>
                </div>
            </div>
        </section>
    </body>
</html>