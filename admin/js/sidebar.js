// ===== JS SIDEBAR =====
// Efek spotlight: cahaya mengikuti posisi kursor di atas tombol menu
document.querySelectorAll('.nav-btn').forEach(function(tombol) {
    tombol.addEventListener('mousemove', function(e) {
        var kotak = tombol.getBoundingClientRect();
        tombol.style.setProperty('--mouse-x', (e.clientX - kotak.left) + 'px');
        tombol.style.setProperty('--mouse-y', (e.clientY - kotak.top) + 'px');
    });
});