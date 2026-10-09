        
        <?php include 'components/header.php'; ?>
        <main class="flex-1 overflow-y-auto p-4 md:p-6 custom-scroll">
            
            <!-- ================= VIEW 1: DASHBOARD UTAMA ================= -->
            <section id="view-dashboard" class="space-y-6">
                <!-- Welcome Banner -->
                <div class="bg-gradient-to-r from-teal-700 via-teal-600 to-blue-700 rounded-3xl p-6 md:p-8 text-white relative overflow-hidden shadow-xl shadow-teal-900/10">
                    <div class="relative z-10 max-w-2xl">
                        <span class="inline-block bg-white/20 backdrop-blur-md px-3 py-1 rounded-full text-xs font-semibold tracking-wide uppercase mb-3">Layanan Poliklinik Terpadu</span>
                        <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight mb-2">Selamat Datang di Backoffice Klinika!</h2>
                        <p class="text-teal-100 text-sm md:text-base">Pantau reservasi pasien website, jalankan panggilan antrean, perbarui status dokter spesialis, dan kelola pesan kontak secara real-time.</p>
                    </div>
                    <i class="fa-solid fa-stethoscope absolute -right-6 -bottom-8 text-white/10 text-9xl pointer-events-none"></i>
                </div>

                <!-- 4 KPI Metrics Card -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
                    <!-- KPI 1 -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Pasien Hari Ini</span>
                            <div class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
                                <i class="fa-solid fa-hospital-user text-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-black text-slate-800" id="stat-total-patients">48</span>
                            <span class="text-xs font-semibold text-emerald-600 flex items-center"><i class="fa-solid fa-arrow-trend-up mr-1"></i>+12.5%</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">28 Poli Umum, 20 Spesialis</p>
                    </div>

                    <!-- KPI 2 -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Janji Temu Menunggu</span>
                            <div class="w-10 h-10 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
                                <i class="fa-solid fa-clock-rotate-left text-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-black text-slate-800" id="stat-pending-appt">7</span>
                            <span class="text-xs font-medium text-amber-700 bg-amber-50 px-2 py-0.5 rounded-full">Perlu Konfirmasi</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">Berasal dari form appointment.html</p>
                    </div>

                    <!-- KPI 3 -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Dokter Bertugas</span>
                            <div class="w-10 h-10 rounded-xl bg-teal-50 text-teal-600 flex items-center justify-center">
                                <i class="fa-solid fa-user-doctor text-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-black text-slate-800">6 / 8</span>
                            <span class="text-xs font-semibold text-teal-700">75% Hadir</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">2 Dokter izin operasi & cuti</p>
                    </div>

                    <!-- KPI 4 -->
                    <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider">Estimasi Billing Hari Ini</span>
                            <div class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                <i class="fa-solid fa-money-bill-wave text-lg"></i>
                            </div>
                        </div>
                        <div class="flex items-baseline gap-2">
                            <span class="text-2xl font-black text-slate-800">Rp 14.8M</span>
                            <span class="text-xs font-semibold text-emerald-600 flex items-center"><i class="fa-solid fa-check mr-1"></i>92% Lunas</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">Konsultasi, Lab, & Resep Farmasi</p>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Line Chart Kunjungan -->
                    <div class="lg:col-span-2 bg-white p-5 md:p-6 rounded-2xl border border-slate-200 shadow-sm">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <h3 class="font-bold text-slate-800 text-base">Tren Kunjungan Pasien & Booking</h3>
                                <p class="text-xs text-slate-500">Statistik pengunjung harian selama 7 hari terakhir</p>
                            </div>
                            <span class="text-xs bg-slate-100 text-slate-600 px-3 py-1 rounded-lg font-medium">Minggu Ini</span>
                        </div>
                        <div class="h-64">
                            <canvas id="patientTrendChart"></canvas>
                        </div>
                    </div>

                    <!-- Doughnut Chart Poli -->
                    <div class="bg-white p-5 md:p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <h3 class="font-bold text-slate-800 text-base">Spesialisasi Terpopuler</h3>
                                <i class="fa-solid fa-chart-pie text-slate-400"></i>
                            </div>
                            <p class="text-xs text-slate-500 mb-4">Distribusi pasien per departemen medis</p>
                            <div class="h-52 flex items-center justify-center">
                                <canvas id="departmentChart"></canvas>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-2 text-xs pt-3 border-t border-slate-100 mt-2">
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-teal-500"></span> Gigi & Mulut (35%)</div>
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span> Kardiologi (25%)</div>
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span> Anak (20%)</div>
                            <div class="flex items-center gap-2"><span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span> Lainnya (20%)</div>
                        </div>
                    </div>
                </div>

                <!-- Antrean Live Cepat di Dashboard -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-5 border-b border-slate-200 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-3">
                            <div class="w-3 h-3 rounded-full bg-emerald-500 animate-ping"></div>
                            <div>
                                <h3 class="font-bold text-slate-800 text-base">Papan Antrean Langsung Poliklinik</h3>
                                <p class="text-xs text-slate-500">Status antrean live di ruang tunggu klinik saat ini</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <button onclick="callNextQueue()" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-3 py-2 rounded-xl flex items-center gap-2 transition-colors">
                                <i class="fa-solid fa-bullhorn"></i>
                                <span>Panggil Antrean Berikutnya</span>
                            </button>
                            <button onclick="switchTab('queue')" class="text-teal-600 hover:bg-teal-50 border border-teal-200 text-xs font-semibold px-3 py-2 rounded-xl transition-colors">
                                Kelola Penuh
                            </button>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold">
                                <tr>
                                    <th class="py-3.5 px-4">No. Antrean</th>
                                    <th class="py-3.5 px-4">Nama Pasien</th>
                                    <th class="py-3.5 px-4">Poli / Dokter</th>
                                    <th class="py-3.5 px-4">Waktu Kedatangan</th>
                                    <th class="py-3.5 px-4">Status</th>
                                    <th class="py-3.5 px-4 text-center">Aksi Cepat</th>
                                </tr>
                            </thead>
                            <tbody id="dashboard-queue-table" class="divide-y divide-slate-100 text-slate-700">
                                <!-- Populated dynamically by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW 2: MANAJEMEN JANJI TEMU ================= -->
            <section id="view-appointments" class="hidden space-y-6">
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

                <!-- Filter Controls -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-wrap items-center justify-between gap-3">
                    <div class="flex flex-wrap items-center gap-2">
                        <span class="text-xs font-medium text-slate-500 mr-1">Filter Status:</span>
                        <button onclick="filterAppointments('all')" class="filter-appt-btn active px-3 py-1.5 rounded-lg text-xs font-semibold bg-teal-50 text-teal-700 border border-teal-200">Semua</button>
                        <button onclick="filterAppointments('Menunggu')" class="filter-appt-btn px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 text-slate-600 hover:bg-slate-200">Menunggu</button>
                        <button onclick="filterAppointments('Terkonfirmasi')" class="filter-appt-btn px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 text-slate-600 hover:bg-slate-200">Terkonfirmasi</button>
                        <button onclick="filterAppointments('Selesai')" class="filter-appt-btn px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 text-slate-600 hover:bg-slate-200">Selesai</button>
                        <button onclick="filterAppointments('Dibatalkan')" class="filter-appt-btn px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 text-slate-600 hover:bg-slate-200">Dibatalkan</button>
                    </div>
                    <div class="relative w-full sm:w-64">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" id="search-appt" onkeyup="renderAppointmentsTable()" placeholder="Cari nama pasien/dokter..." class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs pl-8 pr-3 py-2 outline-none focus:border-teal-500 focus:bg-white">
                    </div>
                </div>

                <!-- Tabel Janji Temu -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold">
                                <tr>
                                    <th class="py-3.5 px-4">ID & Pasien</th>
                                    <th class="py-3.5 px-4">Dokter & Poli</th>
                                    <th class="py-3.5 px-4">Jadwal Tanggal & Jam</th>
                                    <th class="py-3.5 px-4">Keluhan Pasien</th>
                                    <th class="py-3.5 px-4">Status</th>
                                    <th class="py-3.5 px-4 text-center">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody id="appointments-table-body" class="divide-y divide-slate-100 text-slate-700">
                                <!-- Populated dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW 3: ANTREAN POLIKLINIK ================= -->
            <section id="view-queue" class="hidden space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">Manajemen Antrean Langsung</h2>
                        <p class="text-xs text-slate-500">Kendali alur nomor antrean pasien dari registrasi, konsultasi, hingga farmasi</p>
                    </div>
                    <button onclick="openModal('modal-add-queue')" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 transition-colors">
                        <i class="fa-solid fa-ticket"></i>
                        <span>Terbitkan Tiket Antrean</span>
                    </button>
                </div>

                <!-- Display Nomor Antrean Sedang Dilayani -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gradient-to-br from-teal-500 to-teal-700 text-white p-6 rounded-2xl shadow-lg shadow-teal-500/20 text-center">
                        <span class="text-xs uppercase font-bold tracking-wider opacity-90">Sedang Diperiksa (Poli Gigi)</span>
                        <div class="text-5xl font-black my-2" id="current-serving-1">A-02</div>
                        <p class="text-xs font-medium text-teal-100" id="current-patient-1">Budi Setiawan (drg. Sarah)</p>
                    </div>

                    <div class="bg-gradient-to-br from-blue-600 to-indigo-700 text-white p-6 rounded-2xl shadow-lg shadow-blue-500/20 text-center">
                        <span class="text-xs uppercase font-bold tracking-wider opacity-90">Sedang Diperiksa (Kardiologi)</span>
                        <div class="text-5xl font-black my-2" id="current-serving-2">B-05</div>
                        <p class="text-xs font-medium text-blue-100" id="current-patient-2">Hj. Siti Rohmah (dr. Hendra, Sp.JP)</p>
                    </div>

                    <div class="bg-gradient-to-br from-slate-700 to-slate-900 text-white p-6 rounded-2xl shadow-lg shadow-slate-700/20 text-center">
                        <span class="text-xs uppercase font-bold tracking-wider opacity-90">Total Menunggu di Ruang Tunggu</span>
                        <div class="text-5xl font-black my-2" id="total-waiting-queue">6</div>
                        <p class="text-xs text-slate-300">Estimasi waktu tunggu rata-rata: 14 menit</p>
                    </div>
                </div>

                <!-- Daftar Tabel Antrean Lengkap -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-4 border-b border-slate-200 flex justify-between items-center">
                        <h3 class="font-bold text-slate-800 text-sm">Daftar Urutan Pasien Hari Ini</h3>
                        <span class="text-xs text-slate-500">Auto-refresh aktif</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold">
                                <tr>
                                    <th class="py-3.5 px-4">No. Antrean</th>
                                    <th class="py-3.5 px-4">Nama Pasien</th>
                                    <th class="py-3.5 px-4">Dokter Tujuan</th>
                                    <th class="py-3.5 px-4">Waktu Check-In</th>
                                    <th class="py-3.5 px-4">Status Antrean</th>
                                    <th class="py-3.5 px-4 text-center">Kontrol Status</th>
                                </tr>
                            </thead>
                            <tbody id="full-queue-table" class="divide-y divide-slate-100 text-slate-700">
                                <!-- Loaded dynamically -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW 4: DOKTER & JADWAL ================= -->
            <section id="view-doctors" class="hidden space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">Direktori Tenaga Medis & Jadwal Praktik</h2>
                        <p class="text-xs text-slate-500">Kelola spesialisasi dokter, ketersediaan tugas, dan jam operasional konsultasi</p>
                    </div>
                    <button onclick="openModal('modal-add-doctor')" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 transition-colors">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Tambah Dokter Baru</span>
                    </button>
                </div>

                <!-- Grid Kartu Dokter -->
                <div id="doctors-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    <!-- Populated by JS -->
                </div>
            </section>

            <!-- ================= VIEW 5: DATA REKAM MEDIS PASIEN ================= -->
            <section id="view-patients" class="hidden space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">Direktori Rekam Medis Pasien (EHR Ringkas)</h2>
                        <p class="text-xs text-slate-500">Data identitas pasien, riwayat diagnosis, resep, dan alergi obat</p>
                    </div>
                    <button onclick="openModal('modal-add-patient')" class="bg-teal-600 hover:bg-teal-700 text-white text-xs font-semibold px-4 py-2.5 rounded-xl flex items-center gap-2 transition-colors">
                        <i class="fa-solid fa-address-card"></i>
                        <span>Registrasi Pasien Baru</span>
                    </button>
                </div>

                <!-- Search and Filter Bar -->
                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-wrap items-center justify-between gap-3">
                    <div class="flex items-center gap-2">
                        <span class="text-xs text-slate-500 font-medium">Total Terdata:</span>
                        <span id="patient-count-badge" class="bg-slate-100 text-slate-700 font-bold px-2.5 py-1 rounded-lg text-xs">8 Pasien</span>
                    </div>
                    <div class="relative w-full sm:w-72">
                        <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                        <input type="text" id="search-patients" onkeyup="renderPatientsTable(this.value)" placeholder="Cari No. RM / Nama Pasien..." class="w-full bg-slate-50 border border-slate-200 rounded-xl text-xs pl-8 pr-3 py-2 outline-none focus:border-teal-500 focus:bg-white">
                    </div>
                </div>

                <!-- Patient Table -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-50 text-slate-500 text-xs uppercase font-semibold">
                                <tr>
                                    <th class="py-3.5 px-4">No. Rekam Medis</th>
                                    <th class="py-3.5 px-4">Nama Lengkap & Usia</th>
                                    <th class="py-3.5 px-4">No. Telepon / WA</th>
                                    <th class="py-3.5 px-4">Gol. Darah</th>
                                    <th class="py-3.5 px-4">Kunjungan Terakhir</th>
                                    <th class="py-3.5 px-4 text-center">Rekam Klinis</th>
                                </tr>
                            </thead>
                            <tbody id="patients-table-body" class="divide-y divide-slate-100 text-slate-700">
                                <!-- Populated by JS -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

            <!-- ================= VIEW 6: KOTAK PESAN MASUK WEBSITE ================= -->
            <section id="view-inbox" class="hidden space-y-6">
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-bold text-slate-800">Inquiry Pesan Masuk (contact.html)</h2>
                        <p class="text-xs text-slate-500">Pesan dan pertanyaan dari form kontak publik situs web klinik</p>
                    </div>
                    <button onclick="markAllMessagesRead()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-semibold px-3 py-2 rounded-xl transition-colors">
                        <i class="fa-solid fa-check-double mr-1"></i> Tandai Semua Terbaca
                    </button>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Inbox List -->
                    <div class="lg:col-span-1 bg-white rounded-2xl border border-slate-200 shadow-sm p-4 space-y-3 h-[580px] flex flex-col">
                        <div class="flex items-center justify-between pb-2 border-b border-slate-100">
                            <span class="text-xs font-bold uppercase text-slate-500">Semua Percakapan</span>
                            <span id="unread-inbox-badge" class="bg-rose-100 text-rose-700 text-[11px] font-bold px-2 py-0.5 rounded-full">2 Baru</span>
                        </div>
                        <div id="inbox-list" class="space-y-2 overflow-y-auto flex-1 custom-scroll pr-1">
                            <!-- Populated by JS -->
                        </div>
                    </div>

                    <!-- Message Detail Viewer -->
                    <div class="lg:col-span-2 bg-white rounded-2xl border border-slate-200 shadow-sm p-6 flex flex-col justify-between h-[580px]" id="message-detail-pane">
                        <!-- Loaded dynamically -->
                    </div>
                </div>
            </section>

        </main>