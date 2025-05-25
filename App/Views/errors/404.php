<?php global $twig; ?>
<?php if (!isset($username)) $username = null; ?>
<!DOCTYPE html>
<html lang="en">
    <?php echo $twig->render('head-base.twig'); ?>
    <body class="sb-nav-fixed sb-sidenav-toggled">
        <?php
            echo $twig->render(
                'header.twig',
                array(
                'topmenu'   => true,
                'username'  => $username,
                'debug'     => $debug,
                'maintitle' => $maintitle,
                'search'    => false
                )
            );
        ?>
        <div id="layoutSidenav">
            <?php
                if ($username) {
                    echo $twig->render(
                        'sidebar.twig',
                        array(
                        'topmenu'   => true,
                        'username'  => $username,
                        'debug'     => $debug,
                        'maintitle' => $maintitle
                        )
                    );
                }
            ?>
            <div id="layoutSidenav_content">
                <main class="p-4">
                    <h1>404 PAGE NOT FOUND</h1>
                </main>
                <?php
                    echo $twig->render(
                        'footer.twig',
                        array(
                        'topmenu'   => true,
                        'username'  => $username,
                        'debug'     => $debug,
                        'maintitle' => $maintitle
                        )
                    );
                ?>
            </div>
            <?php echo $twig->render('head-js.twig'); ?>
        </div>
    </body>
</html>