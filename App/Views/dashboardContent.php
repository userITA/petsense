<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Bienvenido a PetSense, <strong><?php echo $userName; ?></strong></h1>
        </div>
    </main>
    <div id="videoCarousel" class="carousel slide custom-carousel" data-bs-ride="carousel" style="width: 100%;max-width: 1400px;border-radius: 20px;overflow: hidden;">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#videoCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#videoCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#videoCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style="height: 70vh;min-height: 500px;">
            <div class="carousel-item active" data-bs-interval="20000" style="height: 70vh;min-height: 500px;">
                <video autoplay loop muted playsinline style="width: 100%;height: 100%;object-fit: cover;display: block;">
                    <source src="https://videos.pexels.com/video-files/2849936/2849936-uhd_2560_1440_24fps.mp4" type="video/mp4">
                </video>
            </div>
            <div class="carousel-item" data-bs-interval="20000" style="height: 70vh;min-height: 500px;">
                <video autoplay loop muted playsinline style="width: 100%;height: 100%;object-fit: cover;display: block;">
                    <source src="https://videos.pexels.com/video-files/3191251/3191251-uhd_2732_1440_25fps.mp4" type="video/mp4">
                </video>
            </div>
            <div class="carousel-item" data-bs-interval="20000" style="height: 70vh;min-height: 500px;">
                <video autoplay loop muted playsinline style="width: 100%;height: 100%;object-fit: cover;display: block;">
                    <source src="https://videos.pexels.com/video-files/854383/854383-hd_1920_1080_30fps.mp4" type="video/mp4">
                </video>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    <div class="container mt-5">
        <?php if ($userName != "Admin") {
            echo $twig->render(
                'dashboard/dashboard-view-users.twig'
            );
        } else {
            echo $twig->render(
                'dashboard/dashboard-view-admin.twig'
            );
        }
        ?>
    </div>
</div>