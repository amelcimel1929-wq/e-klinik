<div class="booking-page">
    <div class="booking-container">
        <h1 class="booking-title">Booking Janji Temu</h1>
        <p class="booking-subtitle">Pilih dokter spesialis sesuai kebutuhan Anda dan atur tanggal berobat</p>

        <form method="POST" action="index.php?page=booking">

            <!-- Pilihan Dokter -->
            <div class="doctor-grid">

                <!-- Dokter 1 -->
                <label class="doctor-card" onclick="selectDoctor(this)">
                    <input type="radio" name="dokter_id" value="1" required>
                    <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&q=80&w=300" alt="dr. Andi Pratama">
                    <h3>dr. Andi Pratama</h3>
                    <span class="badge-spesialis">Dokter Umum</span>
                    <p>Melayani konsultasi kesehatan umum, keluhan ringan, pemeriksaan rutin, dan rujukan medis.</p>
                </label>

                <!-- Dokter 2 -->
                <label class="doctor-card" onclick="selectDoctor(this)">
                    <input type="radio" name="dokter_id" value="2" required>
                    <img src="pasien/template-pasien/img/team-2.jpg" alt="drg. Siti Rahma">
                    <h3>drg. Siti Rahma</h3>
                    <span class="badge-spesialis">Spesialis Gigi</span>
                    <p>Ahli perawatan kesehatan mulut, pembersihan karang gigi (scaling), penambalan, dan perawatan gigi.</p>
                </label>

                <!-- Dokter 3 -->
                <label class="doctor-card" onclick="selectDoctor(this)">
                    <input type="radio" name="dokter_id" value="3" required>
                    <img src="https://images.unsplash.com/photo-1537368910025-700350fe46c7?auto=format&fit=crop&q=80&w=300" alt="dr. Budi Santoso">
                    <h3>dr. Budi Santoso, Sp.A</h3>
                    <span class="badge-spesialis">Spesialis Anak</span>
                    <p>Fokus pada tumbuh kembang anak, imunisasi, konsultasi nutrisi bayi, dan penanganan penyakit anak.</p>
                </label>

            </div>

            <!-- Form Detail Booking -->
            <div class="booking-form">
                <div class="form-group">
                    <label for="tanggal">Tanggal Berobat</label>
                    <input type="date" id="tanggal" name="tanggal_berobat" class="form-control" min="<?= date('Y-m-d') ?>" required>
                </div>

                <div class="form-group">
                    <label for="keluhan">Keluhan Utama / Alasan Berobat</label>
                    <textarea id="keluhan" name="keluhan" class="form-control" rows="3" placeholder="Contoh: Demam sejak kemarin, sakit gigi sebelah kanan..." required></textarea>
                </div>

                <button type="submit" class="btn-submit">Konfirmasi Booking</button>
            </div>

        </form>
    </div>
</div>