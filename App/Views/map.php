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
            'mainmenu' => false,
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
            <form class="form-actions" method="POST" action="#">
                <div class="container mt-3">
                    <div class="row">
                        <div class="col">
                            <?php if ((isset($mode) && $mode == "live") || (is_null($mode))) {
                                echo $twig->render(
                                    'map/map-data-live.twig'
                                );
                            } else if (isset($mode) && $mode == "search") {
                                echo $twig->render(
                                    'map/map-data-search.twig'
                                );
                            }
                            ?>
                        </div>
                        <div class="col" style="margin-left: 250px;">
                            <div class="d-flex justify-content-start align-items-center gap-2">
                                <input type="submit" class="btn btn-primary" id="viewLive" name="viewLive" value="Live" />
                                <input type="submit" class="btn btn-primary" id="viewSearch" name="viewSearch" value="Search" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php if (isset($msg)) { ?>
                <h2><?php echo $msg; ?></h2>
            <?php } ?>
            <div id="map" style="margin-top: 5px;"></div>
        </div>
</body>
<?php
if (isset($dataLocation) && !is_null($dataLocation)) { ?>
    <script>
        window.dataFromPhp = <?php echo json_encode($dataLocation); ?>;
    </script>
<?php } ?>
<?php echo $twig->render('head-js.twig'); ?>

</html>