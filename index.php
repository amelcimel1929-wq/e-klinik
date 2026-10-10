<?php
// Tangkap parameter ?page= dari URL, default ke home
// Didefinisikan di atas supaya bisa dipakai navbar untuk menandai menu aktif
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>
<!DOCTYPE html>
<html lang="id">

<!-- Head Start -->
<?php include 'pasien/partials/head.php'; ?>
<!-- Head End -->

<body>
    <!-- Spinner -->
    <?php include 'pasien/components/spinner.php'; ?>

    <!-- Topbar -->
    <?php include 'pasien/components/topbar.php'; ?>

    <!-- Navbar -->
    <?php include 'pasien/components/navbar.php'; ?>

    <!-- Main Content -->
    <?php
    switch ($page) {
        case 'home':
            include 'pasien/components/header.php';
            include 'pasien/pages/about.php';
            include 'pasien/pages/service.php';
            include 'pasien/pages/feature.php';
            include 'pasien/pages/team.php';
            include 'pasien/pages/appointment.php';
            include 'pasien/pages/location.php';
            break;

        case 'booking':
            include 'pasien/pages/booking/booking.php';
            break;

        case 'feature':
            include 'pasien/pages/feature.php';
            break;

        case 'team':
            include 'pasien/pages/team.php';
            break;

        case 'appointment':
            include 'pasien/pages/appointment.php';
            break;

        case 'location':
            include 'pasien/pages/location.php';
            break;

        default:
            echo '<div class="container py-5 text-center"><h4>Halaman tidak ditemukan</h4></div>';
            break;
    }
    ?>

    <!-- Footer (cukup satu kali) -->
    <?php include 'pasien/components/footer.php'; ?>

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <?php include 'pasien/partials/script.php'; ?>
</body>

</html>