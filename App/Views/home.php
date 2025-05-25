<!DOCTYPE html>
<html lang="en">
<?php echo $twig->render('head-base.twig', array('title' => $title)); ?>

<body class="text-center">
    <?php echo $twig->render(
        'header.twig',
        array(
            'title' => $title,
            'topmenu' => false,
            'maintitle' => $maintitle,
            'mainmenu' => false,
            'search'    => false
        )
    ); ?>
    <form method="POST" action="/home">
        <div class="container-fluid ps-md-0">
            <div class="row g-0">
                <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
                <div class="col-md-8 col-lg-6">
                    <div class="login d-flex align-items-center py-5">
                        <div class="container">
                            <div class="sb-nav-link-icon" style="text-align: center; font-size: 50px; margin-bottom: 15px;"><i class="fa fa-paw" aria-hidden="true"></i></div>
                            <div id="sessionOms" class="row">
                                <div class="col-md-9 col-lg-8 mx-auto">
                                    <h3 class="login-heading mb-4">Datos de acceso</h3>
                                    <!-- Sign In Form -->
                                    <form method="POST" action="/home">
                                        <label for="inputEmail" class="sr-only">Correo electrónico</label>
                                        <input name="email" id="inputEmail" class="form-control" placeholder="Email address"><!--type="email" required autofocus-->
                                        <label for="inputPassword" class="sr-only">Contraseña</label>
                                        <input name="pass" type="password" style="margin-top: 5px;" id="inputPassword" class="form-control" placeholder="Password"><!--required-->
                                        <input name="session" type="submit" id="buttonSession" class="btn btn-lg btn-primary btn-block" style="margin-top: 10px;" value="Login">
                                        <input name="newUser" type="submit" id="buttonNewUser" class="btn btn-lg btn-primary btn-block" style="margin-top: 10px;" value="New User">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<?php echo $twig->render('head-js.twig'); ?>

</html>