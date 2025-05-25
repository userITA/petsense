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
    <div class="container mt-3">
        <form method="POST" action="#">
            <h1><i class="fa fa-paw" aria-hidden="true"></i> <?php echo $maintitle ?></h1>
            <div class="container mt-5">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header text-center bg-primary text-white">
                        <h1><?php echo $title ?></h1>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">Nombre</label>
                                    <input type="text" name="firstName" class="form-control" id="firstName" placeholder="Nombre">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Apellido</label>
                                    <input type="text" name="lastName" class="form-control" id="lastName" placeholder="Apellido">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Teléfono</label>
                                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Número de teléfono">
                                </div>
                                <div class="col-md-6">
                                    <label for="device" class="form-label">Dispositivo</label>
                                    <input type="text" name="device" class="form-control" id="device" placeholder="Dispostivo">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Dirección</label>
                                <input type="text" name="direction" class="form-control" id="direction" placeholder="Dirección completa">
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" name="emailUser" class="form-control" id="email" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="passUser" class="form-control" id="password" placeholder="Password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="namePet" class="form-label">Nombre de mascota</label>
                                    <input type="text" name="namePet" class="form-control" id="namePet" placeholder="Nombre de la mascota">
                                </div>
                                <div class="col-md-6">
                                    <label for="yearsPet" class="form-label">Edad de la mascota</label>
                                    <input type="number" name="yearsPet" class="form-control" id="yearsPet" placeholder="Edad de la mascota">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="razas" class="form-label">Selecciona una raza de perro grande de pelo corto:</label>
                                <select class="form-select" id="razas" name="razas">
                                    <option value="">-- Elige una raza --</option>
                                    <option value="doberman">Doberman</option>
                                    <option value="gran_danes">Gran Danés</option>
                                    <option value="boxer">Boxer</option>
                                    <option value="dogo_argentino">Dogo Argentino</option>
                                    <option value="mastin_napolitano">Mastín Napolitano</option>
                                    <option value="weimaraner">Weimaraner</option>
                                    <option value="pointer_aleman">Pointer Alemán</option>
                                    <option value="vizsla">Vizsla (Braco Húngaro)</option>
                                    <option value="galgo">Galgo</option>
                                    <option value="bullmastiff">Bullmastiff</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <input type="submit" id="buttonSaveData" name="buttonSaveData" class="btn btn-primary px-4" value="Añadir datos">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
<?php echo $twig->render('head-js.twig'); ?>

</html>