<nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0 wow fadeIn" data-wow-delay="0.1s">
    <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
        <h1 class="m-0 text-primary"><i class="far fa-hospital me-3"></i>Klinika Care</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="index.php" class="nav-item nav-link <?= ($page == 'home') ? 'active' : '' ?>">Home</a>
            <a href="index.php?page=booking" class="nav-item nav-link <?= ($page == 'booking') ? 'active' : '' ?>">Booking</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle <?= in_array($page, ['feature', 'team', 'appointment']) ? 'active' : '' ?>" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu rounded-0 rounded-bottom m-0">
                    <a href="index.php?page=feature" class="dropdown-item">Feature</a>
                    <a href="index.php?page=team" class="dropdown-item">Our Doctor</a>
                    <a href="index.php?page=appointment" class="dropdown-item">Appointment</a>
                </div>
            </div>
            <a href="index.php?page=location" class="nav-item nav-link <?= ($page == 'location') ? 'active' : '' ?>">Lokasi</a>
        </div>
        <a href="index.php?page=booking" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Booking<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>