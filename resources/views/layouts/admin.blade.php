<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bina Darma Admin')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'sidebar-bg': '#0A1D37',
                        'sidebar-active': '#F7C325',
                        'navbar-bg': '#FFFFFF',
                        'content-bg': '#F4F6F9',
                        'card-green': '#28A745',
                        'card-blue': '#007BFF',
                        'card-red': '#DC3545',
                        'card-orange': '#FD7E14',
                        'notification-bg': '#343A40',
                        'text-light': '#FFFFFF',
                        'text-dark': '#333333',
                        'text-muted': '#6C757D',
                        'text-secondary': '#4A5568',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #888; border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: #555; }

        .donut-chart {
            width: 200px; height: 200px; border-radius: 50%;
            background: conic-gradient(#4CAF50 0% 30%, #FFC107 30% 70%, #F44336 70% 100%);
            display: flex; justify-content: center; align-items: center; color: white; font-weight: bold;
        }

    </style>
    @stack('styles')
</head>
<body class="bg-content-bg font-sans">
    <div class="flex h-screen overflow-hidden">
        
        <aside id="sidebar"
            class="absolute left-0 top-0 z-50 flex h-screen w-72 flex-col overflow-y-auto
                   bg-gradient-to-r from-[#1E3A8A] to-[#1865B3] 
                   text-white duration-300 ease-linear lg:static lg:translate-x-0 -translate-x-full">
        
            <div class="flex items-center justify-between lg:justify-center gap-2 px-6 h-[56px] bg-white shadow-lg">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center">
                    <img src="{{ asset('storage/images/logo-binadarma.png') }}" alt="Logo Bina Darma" class="mr-2 h-14 w-auto">
                </a>
                <button class="block lg:hidden text-[#1E3A8A]" onclick="toggleSidebar()"> 
                    <i class="fas fa-times p-2"></i>
                </button>
            </div>
        
            <div class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear">
                <nav class="mt-4 py-4 px-0">
                    <div>
                        <h6 class="mb-2 px-8 text-sm font-semibold text-white/75">
                            Menu Utama
                        </h6>
                        <ul class="text-sm text-white">
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('admin.dashboard') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('admin.dashboard') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('admin.dashboard') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-tachometer-alt {{ Request::routeIs('admin.dashboard') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Dashboard</span> 
                                </a>
                            </li>
                        <h6 class="mb-2 px-8 text-sm font-semibold text-white/75">
                            Perekrutan
                        </h6>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('pelamar.index') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('pelamar.index') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('pelamar.index') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-users {{ Request::routeIs('pelamar.index') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Pelamar</span> 
                                </a>
                            </li>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('wawancara.index') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('wawancara.index') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('wawancara.index') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-comments {{ Request::routeIs('wawancara.index') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Wawancara</span> 
                                </a>
                            </li>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('psikologi.index') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('psikologi.index') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('psikologi.index') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-brain {{ Request::routeIs('psikologi.index') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Psikologi</span> 
                                </a>
                            </li>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('pelamar.validasi') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('pelamar.validasi') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('pelamar.validasi') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-check-circle {{ Request::routeIs('pelamar.validasi') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Validasi</span> 
                                </a>
                            </li>
                            <h6 class="mb-2 px-8 text-sm font-semibold text-white/75 pt-3"> 
                                Update
                            </h6>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('dosen.index') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('dosen.index') }}"
                                class="flex items-center space-x-3 font-semibold {{ Request::routeIs('dosen.index') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-graduation-cap {{ Request::routeIs('dosen.index') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Dosen</span>
                                </a>
                            </li>

                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('karyawan.index') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('karyawan.index') }}"
                                class="flex items-center space-x-3 font-semibold {{ Request::routeIs('karyawan.index') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-id-card {{ Request::routeIs('karyawan.index') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Karyawan</span>
                                </a>
                            </li>
                             <h6 class="mb-2 px-8 text-sm font-semibold text-white/75 pt-3">
                                Informasi Data
                            </h6>

                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('cuti.admin') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('cuti.admin') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('cuti.admin') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-check-circle {{ Request::routeIs('cuti.admin') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Validasi Cuti</span>
                                </a>
                            </li>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('surat-tugas.index') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('surat-tugas.index') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('surat-tugas.index') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-file-alt {{ Request::routeIs('surat-tugas.index') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Surat Tugas</span>
                                </a>
                            </li>
                           <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('admin.telepon') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('admin.telepon') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('admin.telepon') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-address-book {{ Request::routeIs('admin.telepon') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Daftar Telepon</span>
                                </a>
                            </li>
                             <h6 class="mb-2 px-8 text-sm font-semibold text-white/75 pt-3">
                                Lainnya
                            </h6>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('roles.index') || Request::routeIs('roles.create') || Request::routeIs('roles.edit') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('roles.index') }}"
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('roles.index') || Request::routeIs('roles.create') || Request::routeIs('roles.edit') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-users-cog {{ Request::routeIs('roles.index') || Request::routeIs('roles.create') || Request::routeIs('roles.edit') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Manajemen Role</span>
                                </a>
                            </li>
                            <li class="animation py-3 hover:text-white/50 {{ Request::routeIs('admin.profile.edit') ? 'border-l-8 border-yellow-300 bg-gradient-to-l from-[#FCD34D]/80 to-[#1865B3]' : '' }}">
                                <a href="{{ route('admin.profile.edit') }}" 
                                   class="flex items-center space-x-3 font-semibold {{ Request::routeIs('admin.profile.edit') ? 'px-6 text-white' : 'px-8 text-white/90' }}">
                                    <i class="fas fa-user {{ Request::routeIs('admin.profile.edit') ? 'text-white' : 'text-white/75' }} h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Profil</span>
                                </a>
                            </li>
                            <li class="animation py-3 hover:text-white/50">
                                <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="flex items-center space-x-3 font-semibold px-8 text-white/90">
                                    <i class="fas fa-sign-out-alt text-white/75 h-5 w-5 inline-flex items-center justify-center"></i>
                                    <span>Keluar</span>
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                @csrf
                            </form> 
                        </ul>
                    </div>
                </nav>
            </div>
        </aside>
        
        <div class="relative flex flex-1 flex-col overflow-y-auto overflow-x-hidden">
            
            <header class="sticky top-0 z-40 flex w-full bg-navbar-bg shadow mb-8">
                <div class="flex flex-grow items-center justify-between py-4 px-4 shadow-2 md:px-6 2sm:px-11">
                    <div id="navbar_left_spacer" class="hidden" style="transition: width 0.3s ease-linear;"></div>
                    <div class="flex items-center gap-2 sm:gap-4 lg:gap-3">
                        <button id="sidebarToggleButton" onclick="toggleSidebar()" aria-label="Toggle sidebar" class="text-text-dark hover:text-sidebar-active focus:outline-none focus:ring-2 focus:ring-sidebar-active rounded-md p-1 md:p-2 mr-2 sm:mr-4">
                            <i class="fas fa-bars lg:hidden text-lg md:text-sm"></i>
                        </button>
                        <div>
                            <h1 class="text-2xl font-semibold text-text-dark">Sistem Informasi Sumber Daya Manusia</h1>
                        </div>
                    </div>
            
                    <div class="relative">
                        <button id="userMenuButton" onclick="toggleUserDropdown()" class="flex items-center gap-2 rounded-md hover:bg-gray-100">
                            <span class="hidden text-right lg:block">
                                <span class="block text-sm font-medium text-text-dark">{{ Auth::user()->name ?? 'Admin' }}</span>
                            </span>
                            <img src="{{ Auth::user() && Auth::user()->profile_photo ? asset('storage/'.Auth::user()->profile_photo) : asset('images/profil.png') }}" alt="User" class="rounded-full h-12 w-12 object-cover">
                            <i class="fas fa-chevron-down text-gray-500 hidden sm:block"></i>
                        </button>
            
                        <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 hidden ring-1 ring-black ring-opacity-5">
                            <a href="{{ route('admin.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-user-circle mr-2"></i>Profile
                            </a>
                            <a href="" 
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                <i class="fas fa-sign-out-alt mr-2"></i>Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto overflow-x-hidden">
                <div class="mx-auto max-w-screen-2sm px-4 md:px-6 2sm:px-10 pt-0 pb-0">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        const sidebar = document.getElementById('sidebar'); 
        const sidebarMini = document.getElementById('sidebar-mini');
        const navbarLeftSpacer = document.getElementById('navbar_left_spacer'); 

        function toggleSidebar() {
            if (!sidebar) { 
                console.warn('Sidebar element not found.');
                return;
            }

            const isSidebarHidden = sidebar.classList.contains('-translate-x-full');

            if (isSidebarHidden) { 
                sidebar.classList.remove('-translate-x-full');
                sidebar.classList.add('translate-x-0');
                if (sidebarMini) sidebarMini.classList.add('hidden');

                if (navbarLeftSpacer && window.innerWidth >= 1024) {
                    navbarLeftSpacer.style.width = sidebar.offsetWidth + 'px';
                    navbarLeftSpacer.classList.remove('hidden');
                }
            } else { 
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('-translate-x-full');
                if (sidebarMini) sidebarMini.classList.remove('hidden'); 

                if (navbarLeftSpacer && window.innerWidth >= 1024) {
                    navbarLeftSpacer.style.width = '0px';
                    navbarLeftSpacer.classList.add('hidden');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            if (navbarLeftSpacer && sidebar && window.innerWidth >= 1024 && !sidebar.classList.contains('-translate-x-full')) {
                navbarLeftSpacer.style.width = sidebar.offsetWidth + 'px';
                navbarLeftSpacer.classList.remove('hidden');
            } else if (navbarLeftSpacer) {
                navbarLeftSpacer.style.width = '0px'; 
                navbarLeftSpacer.classList.add('hidden');
            }
        });

        function toggleUserDropdown() {
            const menu = document.getElementById('userDropdown'); 
            if (menu) {
                menu.classList.toggle('hidden');
            } else {
                console.warn('User dropdown element not found.');
            }
        }

        window.addEventListener('click', function(event) {
            const userMenuButton = document.querySelector('button[onclick="toggleUserDropdown()"]');
            const userDropdown = document.getElementById('userDropdown');

            const isClickOutside = userMenuButton && !userMenuButton.contains(event.target) &&
                                   userDropdown && !userDropdown.contains(event.target);

            if (isClickOutside && userDropdown && !userDropdown.classList.contains('hidden')) {
                userDropdown.classList.add('hidden');
            }
        });
    </script>
    @stack('scripts')
</body>
</html>