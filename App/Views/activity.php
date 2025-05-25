<!DOCTYPE html>
<html lang="es">
<?php echo $twig->render('head-base.twig', array('title' => $title)); ?>

<body class="text-center">
    <?php echo $twig->render(
        'header.twig',
        array(
            'title' => $title,
            'topmenu' => false,
            'maintitle' => $maintitle,
            'search'    => true
        )
    ); ?>
    <div id="layoutSidenav">
        <?php
        echo $twig->render(
            'sidebar.twig',
            array(
                'topmenu'   => true,
                'username'  => $username,
                'debug'     => $debug,
                'maintitle' => $maintitle
            )
        );
        ?>
        <div id="layoutSidenav_content">
            <?php
            echo $twig->render(
                'activity.twig'
            );
            ?>
        </div>
    </div>
</body>
<?php echo $twig->render('head-js.twig'); ?>
</html>
