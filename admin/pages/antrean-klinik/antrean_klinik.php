<?php
// Data dummy (sementara). Nanti ganti dengan query database.
$antrean = [
    ['no' => 'A-01', 'nama' => 'Ratna Kusuma',  'dokter' => 'drg. Sarah Maharani', 'poli' => 'Gigi', 'checkin' => '08:15', 'status' => 'Selesai'],
    ['no' => 'A-02', 'nama' => 'Budi Setiawan', 'dokter' => 'drg. Sarah Maharani', 'poli' => 'Gigi', 'checkin' => '08:45', 'status' => 'Diperiksa'],
    ['no' => 'B-04', 'nama' => 'Ahmad Ridwan',  'dokter' => 'dr. Hendra Wijaya',   'poli' => 'Umum', 'checkin' => '09:00', 'status' => 'Menunggu'],
    ['no' => 'B-05', 'nama' => 'Siti Rohmah',   'dokter' => 'dr. Hendra Wijaya',   'poli' => 'Umum', 'checkin' => '09:10', 'status' => 'Diperiksa'],
    ['no' => 'A-03', 'nama' => 'Dewi Lestari',  'dokter' => 'drg. Sarah Maharani', 'poli' => 'Gigi', 'checkin' => '09:20', 'status' => 'Menunggu'],
    ['no' => 'B-06', 'nama' => 'Agus Salim',    'dokter' => 'dr. Hendra Wijaya',   'poli' => 'Umum', 'checkin' => '09:30', 'status' => 'Menunggu'],
];

function sedang_diperiksa($data, $poli)
{
    foreach ($data as $p) {
        if ($p['poli'] === $poli && $p['status'] === 'Diperiksa') {
            return $p;
        }
    }
    return null;
}

$gigi = sedang_diperiksa($antrean, 'Gigi');
$umum = sedang_diperiksa($antrean, 'Umum');
$total_menunggu = count(array_filter($antrean, function ($p) {
    return $p['status'] === 'Menunggu';
}));
?>

<style>
.antrean-page { padding: 28px 32px; background: #f6f8fc; min-height: 100vh; }

.antrean-page .antrean-head { display: flex; justify-content: space-between; align-items: flex-start; gap: 16px; flex-wrap: wrap; margin-bottom: 24px; }
.antrean-page .antrean-head h2 { font-weight: 700; color: #1b2a3b; margin: 0 0 4px; font-size: 1.7rem; }
.antrean-page .antrean-head p { color: #6b7a8c; margin: 0; }
.antrean-page .btn-tiket { background: #0f8f86; color: #fff; border: 0; border-radius: 12px; padding: 12px 22px; font-weight: 600; box-shadow: 0 8px 18px rgba(15,143,134,.3); cursor: pointer; transition: transform .2s; }
.antrean-page .btn-tiket:hover { transform: translateY(-2px); }

.antrean-page .antrean-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 24px; margin-bottom: 28px; }
.antrean-page .kartu { color: #fff; border-radius: 20px; padding: 28px 20px; text-align: center; box-shadow: 0 14px 30px rgba(20,40,90,.18); }
.antrean-page .kartu-hijau { background: linear-gradient(135deg, #14b8a6, #0f766e); }
.antrean-page .kartu-biru  { background: linear-gradient(135deg, #2563eb, #4338ca); }
.antrean-page .kartu-gelap { background: linear-gradient(135deg, #1e293b, #0f172a); }
.antrean-page .kartu-label { font-weight: 700; font-size: 1rem; letter-spacing: .3px; }
.antrean-page .kartu-nomor { font-size: 4.2rem; font-weight: 800; line-height: 1.2; margin: 10px 0; }
.antrean-page .kartu-info { font-size: .95rem; opacity: .95; }

.antrean-page .antrean-box { background: #fff; border: 1px solid #e8edf4; border-radius: 18px; overflow: hidden; }
.antrean-page .antrean-box-head { display: flex; justify-content: space-between; align-items: center; padding: 20px 24px; border-bottom: 1px solid #e8edf4; }
.antrean-page .antrean-box-head h5 { margin: 0; font-weight: 700; color: #1b2a3b; }
.antrean-page .antrean-box-head span { color: #8794a5; font-size: .9rem; }

.antrean-page .antrean-table { width: 100%; border-collapse: collapse; margin: 0; }
.antrean-page .antrean-table th { background: #f6f8fc; padding: 14px 24px; font-size: .85rem; font-weight: 700; color: #5b6b7d; text-align: left; white-space: nowrap; border: 0; }
.antrean-page .antrean-table td { padding: 20px 24px; border: 0; border-top: 1px solid #eef2f7; color: #6b7a8c; vertical-align: middle; }
.antrean-page .antrean-table .col-no { color: #0f766e; font-weight: 700; font-size: 1.1rem; }
.antrean-page .antrean-table .col-nama { color: #1b2a3b; font-weight: 700; font-size: 1.05rem; }

.antrean-page .badge-status { display: inline-block; padding: 6px 16px; border-radius: 50px; font-weight: 600; font-size: .9rem; white-space: nowrap; }
.antrean-page .status-menunggu  { background: #ffe9d6; color: #c2570c; }
.antrean-page .status-dipanggil { background: #fff3c4; color: #a16207; }
.antrean-page .status-diperiksa { background: #e0e9ff; color: #3b4fd8; }
.antrean-page .status-selesai   { background: #d5f5e3; color: #15803d; }

.antrean-page .kontrol { display: flex; justify-content: center; gap: 8px; flex-wrap: wrap; }
.antrean-page .btn-aksi { border: 0; border-radius: 8px; padding: 8px 14px; font-weight: 600; font-size: .9rem; cursor: pointer; transition: filter .2s, transform .2s; }
.antrean-page .btn-aksi:hover { filter: brightness(.95); transform: translateY(-1px); }
.antrean-page .aksi-panggil { background: #e6f4f1; color: #0f766e; }
.antrean-page .aksi-periksa { background: #e6efff; color: #2563eb; }
.antrean-page .aksi-selesai { background: #e3f7ec; color: #15803d; }

.antrean-page .toast-panggil { position: fixed; right: 24px; bottom: 24px; max-width: 520px; display: flex; align-items: center; gap: 12px; background: #0f172a; color: #fff; padding: 16px 22px; border-radius: 14px; font-weight: 600; box-shadow: 0 14px 30px rgba(0,0,0,.3); opacity: 0; transform: translateY(20px); pointer-events: none; transition: opacity .3s, transform .3s; z-index: 2000; }
.antrean-page .toast-panggil.show { opacity: 1; transform: translateY(0); }
.antrean-page .toast-panggil i { color: #2dd4bf; font-size: 1.3rem; }

@media (max-width: 767px) {
    .antrean-page { padding: 18px 14px; }
    .antrean-page .kartu-nomor { font-size: 3.2rem; }
}
</style>

<div class="antrean-page">

    <!-- Header -->
    <div class="antrean-head">
        <div>
            <h2>Manajemen Antrean Langsung</h2>
            <p>Kendali alur nomor antrean pasien dari registrasi, konsultasi, hingga farmasi</p>
        </div>
        <button type="button" class="btn-tiket"><i class="fas fa-ticket-alt"></i> Terbitkan Tiket Antrean</button>
    </div>

    <!-- Kartu ringkasan -->
    <div class="antrean-cards">
        <div class="kartu kartu-hijau" data-poli="Gigi">
            <div class="kartu-label">SEDANG DIPERIKSA (POLI GIGI)</div>
            <div class="kartu-nomor"><?= $gigi ? htmlspecialchars($gigi['no']) : '-' ?></div>
            <div class="kartu-info"><?= $gigi ? htmlspecialchars($gigi['nama'] . ' (' . $gigi['dokter'] . ')') : 'Belum ada pasien' ?></div>
        </div>

        <div class="kartu kartu-biru" data-poli="Umum">
            <div class="kartu-label">SEDANG DIPERIKSA (POLI UMUM)</div>
            <div class="kartu-nomor"><?= $umum ? htmlspecialchars($umum['no']) : '-' ?></div>
            <div class="kartu-info"><?= $umum ? htmlspecialchars($umum['nama'] . ' (' . $umum['dokter'] . ')') : 'Belum ada pasien' ?></div>
        </div>

        <div class="kartu kartu-gelap">
            <div class="kartu-label">TOTAL MENUNGGU DI RUANG TUNGGU</div>
            <div class="kartu-nomor" id="totalMenunggu"><?= $total_menunggu ?></div>
            <div class="kartu-info">Estimasi waktu tunggu rata-rata: 14 menit</div>
        </div>
    </div>

    <!-- Tabel -->
    <div class="antrean-box">
        <div class="antrean-box-head">
            <h5>Daftar Urutan Pasien Hari Ini</h5>
            <span>Auto-refresh aktif</span>
        </div>

        <div class="table-responsive">
            <table class="antrean-table">
                <thead>
                    <tr>
                        <th>NO. ANTREAN</th>
                        <th>NAMA PASIEN</th>
                        <th>DOKTER TUJUAN</th>
                        <th>WAKTU CHECK-IN</th>
                        <th>STATUS ANTREAN</th>
                        <th class="text-center">KONTROL STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($antrean as $p): ?>
                        <tr data-no="<?= htmlspecialchars($p['no']) ?>"
                            data-nama="<?= htmlspecialchars($p['nama']) ?>"
                            data-dokter="<?= htmlspecialchars($p['dokter']) ?>"
                            data-poli="<?= htmlspecialchars($p['poli']) ?>"
                            data-status="<?= htmlspecialchars($p['status']) ?>">
                            <td class="col-no"><?= htmlspecialchars($p['no']) ?></td>
                            <td class="col-nama"><?= htmlspecialchars($p['nama']) ?></td>
                            <td class="col-dokter"><?= htmlspecialchars($p['dokter']) ?></td>
                            <td class="col-waktu"><?= htmlspecialchars($p['checkin']) ?> WIB</td>
                            <td><span class="badge-status status-<?= strtolower($p['status']) ?>"><?= htmlspecialchars($p['status']) ?></span></td>
                            <td>
                                <div class="kontrol">
                                    <button type="button" class="btn-aksi aksi-panggil" data-aksi="Dipanggil"><i class="fas fa-volume-up"></i> Panggil</button>
                                    <button type="button" class="btn-aksi aksi-periksa" data-aksi="Diperiksa">Periksa</button>
                                    <button type="button" class="btn-aksi aksi-selesai" data-aksi="Selesai">Selesai</button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Notifikasi panggilan -->
    <div class="toast-panggil" id="toastPanggil">
        <i class="fas fa-check-circle"></i>
        <span id="toastText"></span>
    </div>

</div>

<script>
(function () {
    var toast = document.getElementById('toastPanggil');
    var toastText = document.getElementById('toastText');
    var toastTimer;

    function tampilToast(pesan) {
        toastText.textContent = pesan;
        toast.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toast.classList.remove('show'); }, 4000);
    }

    function suara(pesan) {
        if (!('speechSynthesis' in window)) return;
        window.speechSynthesis.cancel();
        var u = new SpeechSynthesisUtterance(pesan);
        u.lang = 'id-ID';
        window.speechSynthesis.speak(u);
    }

    function refreshRingkasan() {
        var rows = document.querySelectorAll('.antrean-table tbody tr');
        var menunggu = 0;

        document.querySelectorAll('.kartu[data-poli]').forEach(function (kartu) {
            var poli = kartu.getAttribute('data-poli');
            var nomor = '-', info = 'Belum ada pasien';
            rows.forEach(function (r) {
                if (r.dataset.poli === poli && r.dataset.status === 'Diperiksa') {
                    nomor = r.dataset.no;
                    info = r.dataset.nama + ' (' + r.dataset.dokter + ')';
                }
            });
            kartu.querySelector('.kartu-nomor').textContent = nomor;
            kartu.querySelector('.kartu-info').textContent = info;
        });

        rows.forEach(function (r) {
            if (r.dataset.status === 'Menunggu') menunggu++;
        });
        document.getElementById('totalMenunggu').textContent = menunggu;
    }

    document.querySelectorAll('.antrean-page .btn-aksi').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var row = btn.closest('tr');
            var status = btn.getAttribute('data-aksi');

            row.dataset.status = status;
            var badge = row.querySelector('.badge-status');
            badge.textContent = status;
            badge.className = 'badge-status status-' + status.toLowerCase();

            if (status === 'Dipanggil') {
                var pesan = 'Nomor antrean ' + row.dataset.no + ', ' + row.dataset.nama + ', silakan masuk ke ruang periksa.';
                tampilToast('Panggilan suara: "' + pesan + '"');
                suara(pesan);
            }

            refreshRingkasan();
        });
    });
})();
</script>