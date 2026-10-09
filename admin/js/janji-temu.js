// js/janji-temu.js

let currentFilter = 'all';

// Class CSS Tailwind untuk Status Aktif (Hijau seperti Gambar) & Inaktif (Abu-abu)
const ACTIVE_CLASSES = ['bg-emerald-50', 'text-emerald-700', 'border-emerald-300', 'font-semibold', 'border'];
const INACTIVE_CLASSES = ['bg-slate-100/80', 'text-slate-600', 'border-transparent', 'hover:bg-slate-200/70', 'font-medium', 'border'];

// Mapping Status Badge untuk Tabel
const STATUS_LABEL = {
    'menunggu antrian': {
        text: 'Menunggu',
        badge: 'bg-amber-50 text-amber-700 border border-amber-200'
    },
    'terkonfirmasi': {
        text: 'Terkonfirmasi',
        badge: 'bg-teal-50 text-teal-700 border border-teal-200 font-medium'
    },
    'selesai di periksa': {
        text: 'Selesai',
        badge: 'bg-emerald-100 text-emerald-800 font-semibold'
    },
    'dibatalkan': {
        text: 'Dibatalkan',
        badge: 'bg-rose-50 text-rose-700 border border-rose-200'
    }
};

// Fungsi Klik Filter
function filterAppointments(statusKey) {
    currentFilter = statusKey;

    // Loop semua tombol filter & perbarui class warnanya
    document.querySelectorAll('.filter-appt-btn').forEach(btn => {
        const btnStatus = btn.getAttribute('data-status');

        if (btnStatus === statusKey) {
            btn.classList.remove(...INACTIVE_CLASSES);
            btn.classList.add(...ACTIVE_CLASSES);
        } else {
            btn.classList.remove(...ACTIVE_CLASSES);
            btn.classList.add(...INACTIVE_CLASSES);
        }
    });

    // Render ulang tabel sesuai status filter
    renderAppointmentsTable();
}

// Render Tabel
function renderAppointmentsTable() {
    const body = document.getElementById('appointments-table-body');
    if (!body) return;

    const q = (document.getElementById('search-appt') ? .value || '').toLowerCase().trim();

    // Filter data
    const rows = appointmentsData.filter(a => {
        const statusVal = (a.status || '').toLowerCase();

        // Cek status filter
        let okStatus = false;
        if (currentFilter === 'all') {
            okStatus = true;
        } else {
            okStatus = statusVal === currentFilter;
        }

        // Cek pencarian teks
        const okSearch = !q ||
            (a.patientName || '').toLowerCase().includes(q) ||
            (a.doctorName || '').toLowerCase().includes(q) ||
            (a.poly || '').toLowerCase().includes(q) ||
            String(a.nik || '').toLowerCase().includes(q) ||
            String(a.phone || '').toLowerCase().includes(q);

        return okStatus && okSearch;
    });

    if (rows.length === 0) {
        body.innerHTML = `
            <tr>
                <td colspan="6" class="py-8 text-center text-xs text-slate-400">
                    Tidak ditemukan data janji temu
                </td>
            </tr>`;
        return;
    }

    body.innerHTML = rows.map(a => {
                const stKey = (a.status || '').toLowerCase();
                const st = STATUS_LABEL[stKey] || {
                    text: a.status || 'Terkonfirmasi',
                    badge: 'bg-slate-100 text-slate-700'
                };

                return `
        <tr class="hover:bg-slate-50/80 transition-colors">
            <td class="py-4 px-4 align-top text-xs text-slate-600 font-mono">
                ${esc(a.nik || '-')}
            </td>
            <td class="py-4 px-4 align-top">
                <div class="font-bold text-slate-900 text-sm leading-tight">${esc(a.patientName)}</div>
                ${a.phone ? `
                    <div class="flex items-center gap-1.5 text-xs text-slate-400 mt-1">
                        <i class="fa-brands fa-whatsapp text-emerald-500"></i>
                        <span>${esc(a.phone)}</span>
                    </div>
                ` : ''}
            </td>
            <td class="py-4 px-4 align-top">
                <div class="text-xs font-semibold text-slate-800">${esc(a.doctorName)}</div>
                ${a.poly ? `<div class="text-xs text-slate-500 mt-0.5">(${esc(a.poly)})</div>` : ''}
            </td>
            <td class="py-4 px-4 align-top">
                <div class="font-bold text-slate-800 text-xs">${esc(a.date)}</div>
            </td>
            <td class="py-4 px-4 align-top text-xs text-slate-600 max-w-xs leading-relaxed">
                ${esc(a.complaint || '-')}
            </td>
            <td class="py-4 px-4 align-top">
                <span class="inline-block px-3 py-1 rounded-full text-xs ${st.badge}">
                    ${esc(st.text)}
                </span>
            </td>
        </tr>`;
    }).join('');
}

function esc(s) {
    if (s === null || s === undefined) return '';
    return String(s).replace(/[&<>"']/g, c => ({
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#39;'
    }[c]));
}

// Inisialisasi awal saat halaman dimuat
document.addEventListener('DOMContentLoaded', () => {
    filterAppointments('all');
});