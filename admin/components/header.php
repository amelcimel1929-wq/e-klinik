        <header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between flex-shrink-0 z-20">
            <div class="flex items-center gap-4">
                <button onclick="toggleSidebar()" class="md:hidden text-slate-600 hover:text-slate-900 p-2 rounded-lg bg-slate-100">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <div class="relative w-64 md:w-80">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
                    <input type="text" id="global-search" onkeyup="handleGlobalSearch(this.value)" placeholder="Cari pasien, no. RM, dokter..." class="w-full bg-slate-100 border border-transparent focus:border-teal-500 focus:bg-white text-sm rounded-xl pl-9 pr-4 py-2 outline-none transition-all">
                </div>
            </div>

            <!-- Topbar Right Actions -->
            <div class="flex items-center gap-3">
                <!-- Status Indikator Server -->
                <div class="hidden lg:flex items-center gap-2 bg-emerald-50 text-emerald-700 border border-emerald-200 px-3 py-1.5 rounded-full text-xs font-semibold">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <span>Sistem Medis Online</span>
                </div>

                <!-- Notifikasi Icon Popover -->
                <div class="relative">
                    <button onclick="toggleNotifications()" class="w-10 h-10 rounded-xl hover:bg-slate-100 flex items-center justify-center text-slate-600 relative transition-colors">
                        <i class="fa-regular fa-bell text-lg"></i>
                        <span class="absolute top-2.5 right-2.5 w-2 h-2 rounded-full bg-rose-500"></span>
                    </button>
                    <!-- Notif Dropdown -->
                    <div id="notif-dropdown" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-100 p-4 z-50">
                        <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                            <span class="font-bold text-sm text-slate-800">Notifikasi Terkini</span>
                            <span class="text-xs text-teal-600 font-semibold cursor-pointer hover:underline" onclick="showToast('Semua notifikasi ditandai dibaca')">Tandai Dibaca</span>
                        </div>
                        <div class="space-y-3 pt-3 text-xs">
                            <div class="flex gap-3 p-2 bg-blue-50/60 rounded-xl">
                                <i class="fa-solid fa-calendar-plus text-blue-600 mt-0.5 text-sm"></i>
                                <div>
                                    <p class="font-semibold text-slate-800">Janji Temu Baru</p>
                                    <p class="text-slate-500">Rizky Firmansyah - Spesialis Jantung</p>
                                    <span class="text-[10px] text-slate-400">10 menit yang lalu</span>
                                </div>
                            </div>
                            <div class="flex gap-3 p-2 bg-emerald-50/60 rounded-xl">
                                <i class="fa-solid fa-circle-check text-emerald-600 mt-0.5 text-sm"></i>
                                <div>
                                    <p class="font-semibold text-slate-800">Pemeriksaan Selesai</p>
                                    <p class="text-slate-500">Antrean A-04 telah diproses dokter</p>
                                    <span class="text-[10px] text-slate-400">25 menit yang lalu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Action Button -->
                <button onclick="openModal('modal-add-appointment')" class="flex items-center gap-2 bg-gradient-to-r from-teal-600 to-teal-700 hover:from-teal-700 hover:to-teal-800 text-white text-xs font-semibold px-4 py-2.5 rounded-xl shadow-md shadow-teal-700/20 transition-all">
                    <i class="fa-solid fa-plus"></i>
                    <span class="hidden sm:inline">Daftar Janji Temu</span>
                </button>
            </div>
        </header>
