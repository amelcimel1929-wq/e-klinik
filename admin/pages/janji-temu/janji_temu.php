<?php
// admin/pages/janji-temu/janji_temu.php

include __DIR__ . '/../../database/connection.php'; // koneksi database

// Penanganan kompatibilitas jika connection.php menggunakan $koneksi
if (!isset($conn) && isset($koneksi)) {
    $conn = $koneksi;
}

// ====================== AKSI AJAX (POST) ======================
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    while (ob_get_level()) ob_end_clean(); // buang output HTML sebelumnya
    header('Content-Type: application/json');
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $aksi = $_POST['aksi'] ?? '';

    try {
        // ---- Tambah janji baru ----
        if ($aksi === 'tambah') {
            $nik      = trim($_POST['nik'] ?? '');
            $dokterId = (int)($_POST['doctor_id'] ?? 0);
            $tanggal  = $_POST['date'] ?? '';
            $keluhan  = trim($_POST['complaint'] ?? '');

            $stmt = $conn->prepare("SELECT id FROM users WHERE nik = ? AND role = 'pasien' LIMIT 1");
            $stmt->bind_param("s", $nik);
            $stmt->execute();
            $pasien = $stmt->get_result()->fetch_assoc();

            if (!$pasien) {
                echo json_encode(['ok' => false, 'msg' => 'Pasien dengan NIK tersebut tidak ditemukan']);
                exit;
            }
            if ($dokterId <= 0 || $tanggal === '') {
                echo json_encode(['ok' => false, 'msg' => 'Dokter dan tanggal wajib diisi']);
                exit;
            }

            $stmt = $conn->prepare("INSERT INTO appointments (pasien_id, dokter_id, tanggal_berobat, keluhan, status_antrean)
                                    VALUES (?, ?, ?, ?, 'menunggu antrian')");
            $stmt->bind_param("iiss", $pasien['id'], $dokterId, $tanggal, $keluhan);
            $stmt->execute();
            echo json_encode(['ok' => true]);
            exit;
        }

        echo json_encode(['ok' => false, 'msg' => 'Aksi tidak dikenal']);
    } catch (Throwable $e) {
        echo json_encode(['ok' => false, 'msg' => 'Gagal: ' . $e->getMessage()]);
    }
    exit;
}

// ====================== AMBIL DATA JANJI TEMU ======================
$sql = "SELECT a.id, a.tanggal_berobat, a.keluhan, a.status_antrean,
               p.nama AS pasien, p.no_hp, p.nik,
               du.nama AS dokter, d.spesialis
        FROM appointments a
        JOIN users p   ON p.id  = a.pasien_id
        JOIN doctors d ON d.id  = a.dokter_id
        JOIN users du  ON du.id = d.user_id
        ORDER BY a.tanggal_berobat DESC, a.id DESC";
$result = $conn->query($sql);

$appointments = [];
if ($result) {
    while ($r = $result->fetch_assoc()) {
        $appointments[] = [
            'dbId'        => (int)$r['id'],
            'nik'         => $r['nik'],
            'patientName' => $r['pasien'],
            'phone'       => $r['no_hp'],
            'doctorName'  => $r['dokter'],
            'poly'        => $r['spesialis'],
            'date'        => $r['tanggal_berobat'],
            'complaint'   => $r['keluhan'],
            'status'      => $r['status_antrean'],
        ];
    }
}

// ====================== DAFTAR DOKTER UNTUK DROPDOWN ======================
$doctorList = $conn->query("SELECT d.id, u.nama, d.spesialis
                            FROM doctors d JOIN users u ON u.id = d.user_id
                            ORDER BY u.nama");
?>

<!-- Tailwind, FontAwesome, dan CSS halaman ini -->
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="css/janji-temu.css">

<div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-slate-50 font-sans text-slate-800 antialiased">

    <!-- Header / Navbar Top -->
    <header class="bg-white border-b border-slate-200 px-6 py-3 flex items-center justify-between gap-4">
        <div class="relative w-full max-w-xs">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
            <input type="text" placeholder="Cari pasien, no. RM, dokter..." class="w-full bg-slate-100/80 rounded-xl text-xs pl-8 pr-3 py-2 outline-none focus:bg-white focus:ring-1 focus:ring-teal-500">
        </div>

        <div class="flex items-center gap-3">
            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600 border border-emerald-100">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                Sistem Medis Online
            </span>
            <button class="relative p-2 text-slate-400 hover:text-slate-600 rounded-xl hover:bg-slate-100 transition-colors">
                <i class="fa-regular fa-bell text-sm"></i>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-red-500"></span>
            </button>
            <button onclick="openModal('modal-add-appointment')" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-3.5 py-2 rounded-xl flex items-center gap-1.5 transition-colors shadow-sm">
                <i class="fa-solid fa-plus"></i>
                <span>Daftar Janji Temu</span>
            </button>
        </div>
    </header>

    <!-- Main Workspace -->
    <main class="flex-1 overflow-y-auto p-6 space-y-6">

        <section id="view-appointments" class="space-y-6">
            <!-- Title Header -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                <div>
                    <h2 class="text-xl font-bold text-slate-800">Manajemen Janji Temu (Reservasi Website)</h2>
                    <p class="text-xs text-slate-500">Permintaan janji temu pasien yang masuk dari template web klinik</p>
                </div>
                <div class="flex items-center gap-2">
                    <button onclick="openModal('modal-add-appointment')" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 transition-colors shadow-sm">
                        <i class="fa-solid fa-plus"></i>
                        <span>Buat Janji Baru</span>
                    </button>
                </div>
            </div>

            <!-- Filter Controls & Search Bar (Dengan Kotak/Border Button Lengkap) -->
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-wrap items-center justify-between gap-3">
                <div class="flex flex-wrap items-center gap-2">
                    <span class="text-xs font-medium text-slate-500 mr-1">Filter Status:</span>
                    <button onclick="filterAppointments('all')" class="filter-appt-btn px-3 py-1.5 rounded-lg text-xs font-semibold border transition-all">Semua</button>
                    <button onclick="filterAppointments('menunggu antrian')" class="filter-appt-btn px-3 py-1.5 rounded-lg text-xs font-medium border transition-all">Menunggu Antrian</button>
                    <button onclick="filterAppointments('selesai di periksa')" class="filter-appt-btn px-3 py-1.5 rounded-lg text-xs font-medium border transition-all">Selesai Di Periksa</button>
                </div>
                <div class="relative w-full sm:w-64">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                    <input type="text" id="search-appt" onkeyup="renderAppointmentsTable()" placeholder="Cari nama pasien/dokter/NIK..." class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs pl-8 pr-3 py-2 outline-none focus:border-teal-500 focus:bg-white">
                </div>
            </div>

            <!-- Tabel Janji Temu (Kolom NIK & Nama Pasien Terpisah) -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold">
                            <tr>
                                <th class="py-3.5 px-4">NIK</th>
                                <th class="py-3.5 px-4">NAMA PASIEN</th>
                                <th class="py-3.5 px-4">DOKTER & POLI</th>
                                <th class="py-3.5 px-4">JADWAL TANGGAL</th>
                                <th class="py-3.5 px-4">KELUHAN PASIEN</th>
                                <th class="py-3.5 px-4">STATUS</th>
                            </tr>
                        </thead>
                        <tbody id="appointments-table-body" class="divide-y divide-slate-100 text-slate-700">
                            <!-- Diisi oleh js/janji-temu.js -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>
</div>

<!-- Modal Buat Janji Baru -->
<div id="modal-add-appointment" class="hidden fixed inset-0 z-50 bg-slate-900/40 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-sm">Buat Janji Temu Baru</h3>
            <button onclick="closeModal('modal-add-appointment')" class="text-slate-400 hover:text-slate-600 text-xs">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        <form onsubmit="handleFormSubmit(event)" class="p-6 space-y-4">
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">NIK Pasien</label>
                <input type="text" id="input-nik" required maxlength="16" placeholder="Pasien harus sudah terdaftar" class="w-full border border-slate-200 rounded-xl text-xs px-3 py-2 outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Dokter</label>
                <select id="input-doctor" required class="w-full border border-slate-200 rounded-xl text-xs px-3 py-2 outline-none focus:border-teal-500">
                    <option value="">-- Pilih dokter --</option>
                    <?php if ($doctorList): ?>
                        <?php while ($d = $doctorList->fetch_assoc()): ?>
                            <option value="<?= (int)$d['id'] ?>">
                                <?= htmlspecialchars($d['nama']) ?> - <?= htmlspecialchars($d['spesialis']) ?>
                            </option>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Tanggal Berobat</label>
                <input type="date" id="input-date" required class="w-full border border-slate-200 rounded-xl text-xs px-3 py-2 outline-none focus:border-teal-500">
            </div>
            <div>
                <label class="block text-xs font-medium text-slate-600 mb-1">Keluhan Pasien</label>
                <textarea id="input-complaint" rows="2" class="w-full border border-slate-200 rounded-xl text-xs px-3 py-2 outline-none focus:border-teal-500"></textarea>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeModal('modal-add-appointment')" class="px-4 py-2 rounded-xl text-xs font-semibold text-slate-600 hover:bg-slate-100 transition-colors">Batal</button>
                <button type="submit" class="px-4 py-2 rounded-xl text-xs font-semibold bg-teal-600 text-white hover:bg-teal-700 transition-colors shadow-sm">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Data dari database -->
<script>
    const appointmentsData = <?= json_encode($appointments, JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) ?>;
</script>

<script src="js/janji-temu.js"></script>