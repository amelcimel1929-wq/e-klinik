(function() {
    var toast = document.getElementById('toastPanggil');
    var toastText = document.getElementById('toastText');
    var toastTimer;

    function tampilToast(pesan) {
        toastText.textContent = pesan;
        toast.classList.add('show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function() {
            toast.classList.remove('show');
        }, 4000);
    }

    function suara(pesan) {
        if (!('speechSynthesis' in window)) return;
        window.speechSynthesis.cancel();
        var u = new SpeechSynthesisUtterance(pesan);
        u.lang = 'id-ID';
        window.speechSynthesis.speak(u);
    }

    // Perbarui kartu ringkasan dan jumlah menunggu
    function refreshRingkasan() {
        var rows = document.querySelectorAll('.antrean-table tbody tr');
        var menunggu = 0;

        document.querySelectorAll('.kartu[data-poli]').forEach(function(kartu) {
            var poli = kartu.getAttribute('data-poli');
            var nomor = '-',
                info = 'Belum ada pasien';
            rows.forEach(function(r) {
                if (r.dataset.poli === poli && r.dataset.status === 'Diperiksa') {
                    nomor = r.dataset.no;
                    info = r.dataset.nama + ' (' + r.dataset.dokter + ')';
                }
            });
            kartu.querySelector('.kartu-nomor').textContent = nomor;
            kartu.querySelector('.kartu-info').textContent = info;
        });

        rows.forEach(function(r) {
            if (r.dataset.status === 'Menunggu') menunggu++;
        });
        document.getElementById('totalMenunggu').textContent = menunggu;
    }

    document.querySelectorAll('.btn-aksi').forEach(function(btn) {
        btn.addEventListener('click', function() {
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