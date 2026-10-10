<?php
/*
 * SIDEBAR
 * File ini hanya berisi HTML + sedikit PHP untuk menandai menu aktif.
 * CSS ada di  : css/sidebar.css
 * JS ada di   : js/sidebar.js
 *
 * CARA MENAMBAH MENU BARU:
 * 1. Copy salah satu blok <a> di bawah
 * 2. Ganti 'nama-halaman' (di href dan di aktif()), ikon, dan teksnya
 * 3. Tambahkan case dengan nama yang sama di index.php
 */

// Halaman yang sedang dibuka (diambil dari URL ?page=...)
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

// Fungsi kecil: kalau halaman sama dengan menu, hasilnya "active" (hijau)
function aktif($nama)
{
    global $page;
    return ($page == $nama) ? 'active' : '';
}
?>

<!-- Library yang dipakai sidebar -->
<script src="https://cdn.tailwindcss.com"></script>
<script>tailwind.config = { corePlugins: { preflight: false } };</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/sidebar.css">

<aside id="sidebar" class="bg-clinic-navy text-slate-300 w-64 flex-shrink-0 flex flex-col justify-between transition-all duration-300 z-30 fixed inset-y-0 left-0 md:static md:translate-x-0 -translate-x-full border-r border-slate-800/60">
    <div>

        <!-- ===== LOGO KLINIK ===== -->
        <div class="h-20 flex items-center px-6 gap-3.5">
            <div class="w-11 h-11 rounded-2xl bg-gradient-to-tr from-emerald-500 to-cyan-500 flex items-center justify-center text-white shadow-lg shadow-teal-500/20">
                <i class="fa-solid fa-hospital text-xl"></i>
            </div>
            <div>
                <h1 class="font-bold text-white tracking-wide text-base leading-tight">KLINIKA CARE</h1>
                <span class="text-xs text-emerald-400 font-medium tracking-wide">Sistem Backoffice</span>
            </div>
        </div>

        <!-- ===== MENU ===== -->
        <nav class="px-4 py-2 space-y-1">

            <!-- Grup: Menu Utama -->
            <p class="menu-title mt-2">Menu Utama</p>

            <a href="index.php?page=dashboard" class="nav-btn <?= aktif('dashboard') ?> menu-item">
                <i class="fa-solid fa-chart-pie menu-icon"></i>
                <span>Dashboard Utama</span>
            </a>

            <a href="index.php?page=janji-temu" class="nav-btn <?= aktif('janji-temu') ?> menu-item justify-between">
                <div class="flex items-center gap-3.5">
                    <i class="fa-solid fa-calendar-check menu-icon"></i>
                    <span>Janji Temu</span>
                </div>
                <span class="badge-count bg-teal-500/20 text-emerald-400">1</span>
            </a>

            <a href="index.php?page=antrean-klinik" class="nav-btn <?= aktif('antrean-klinik') ?> menu-item">
                <i class="fa-solid fa-users-line menu-icon"></i>
                <span>Antrean Klinik</span>
            </a>

            <!-- Grup: Klinikal & Medis -->
            <p class="menu-title pt-5">Klinikal &amp; Medis</p>

            <a href="index.php?page=dokter" class="nav-btn <?= aktif('dokter') ?> menu-item">
                <i class="fa-solid fa-user-doctor menu-icon"></i>
                <span>Dokter &amp; Jadwal</span>
            </a>

            <a href="index.php?page=pasien" class="nav-btn <?= aktif('pasien') ?> menu-item">
                <i class="fa-solid fa-bed-pulse menu-icon"></i>
                <span>Rekam Medis Pasien</span>
            </a>

            <!-- Grup: Komunikasi Publik -->
            <p class="menu-title pt-5">Komunikasi Publik</p>

            <a href="index.php?page=pesan" class="nav-btn <?= aktif('pesan') ?> menu-item justify-between">
                <div class="flex items-center gap-3.5">
                    <i class="fa-solid fa-envelope-open-text menu-icon"></i>
                    <span>Pesan Website</span>
                </div>
                <span class="badge-count bg-rose-500 text-white">2</span>
            </a>

        </nav>
    </div>

    <!-- ===== PROFIL OPERATOR ===== -->
    <div class="p-4 m-2 rounded-2xl bg-slate-900/40">
        <div class="flex items-center gap-3">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=100&auto=format&fit=crop&q=80" alt="Admin Avatar" class="w-10 h-10 rounded-full object-cover ring-2 ring-emerald-500/50">
            <div class="overflow-hidden">
                <h2 class="text-sm font-bold text-white truncate">drg. Amanda Putri</h2>
                <p class="text-xs text-slate-400 font-medium truncate">Kepala Administrasi</p>
            </div>
        </div>
    </div>
</aside>

<script src="js/sidebar.js"></script>