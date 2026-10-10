<!DOCTYPE html>
<html lang="en">

<!-- head -->
<?php include 'partials/head.php'; ?>
<!-- head end -->
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include 'components/sidebar.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <?php
            // Tangkap parameter ?page= dari URL, kalau kosong default ke dashboard
            $page = isset($_GET['page']) ? $_GET['page'] : "dashboard";

            switch ($page) {
                // Dashboard
                case 'dashboard':
                    include 'pages/dashboard.php';
                    break;

                // Halaman lain nanti tinggal tambah case di sini
                // case 'pasien':
                //     include 'pages/pasien/pasien.php';
                //     break;
                
                //janji temu
                case 'janji-temu':
                    include 'pages/janji-temu/janji_temu.php';
                    break;      


                case 'antrean-klinik':
                include 'pages/antrean-klinik/antrean_klinik.php';
                break;
                // Kalau page tidak ditemukan
                default:
                    echo '<div class="container-fluid"><h4 class="text-gray-800">Halaman tidak ditemukan</h4></div>';
                break;

                //janji temu
                case 'janji-temu':
                    include 'pages/janji-temu/janji_temu.php';
                    break;      

                //antrean
          
                   
            }
            ?>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include 'components/footer.php'; ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <?php include 'partials/script.php'; ?>

</body>

</html>