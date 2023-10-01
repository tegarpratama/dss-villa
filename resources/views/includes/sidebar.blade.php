<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li>
                    <a href="{{ route('admin.index') }}" aria-expanded="false">
                        <i class="icon-user menu-icon"></i><span class="nav-text">List User</span>
                    </a>
                </li>
            @endif
            <li>
                <a href="{{ route('penginapan.index') }}" aria-expanded="false">
                    <i class="icon-home menu-icon"></i><span class="nav-text">List Penginapan</span>
                </a>
            </li>
            @if (auth()->user()->role == 'admin')
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-settings menu-icon"></i><span class="nav-text">Konfigurasi Kriteria</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route('penerimaan.index') }}">Master Kriteria</a></li>
                        <li><a href="{{ route('harga.index') }}">Harga Sewa</a></li>
                        <li><a href="{{ route('lokasi.index') }}">Lokasi</a></li>
                        <li><a href="{{ route('fasilitas.index') }}">Fasilitas</a></li>
                        <li><a href="{{ route('kebersihan.index') }}">Kebersihan</a></li>
                        <li><a href="{{ route('keamanan.index') }}">Keamanan</a></li>
                    </ul>
                </li>
            @endif
            <li>
                <a href="{{ route('nilai.index') }}" aria-expanded="false">
                    <i class="icon-calculator menu-icon"></i><span class="nav-text">Perhitungan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('hasil.index') }}" aria-expanded="false">
                    <i class="icon-star menu-icon"></i><span class="nav-text">Hasil Perhitungan</span>
                </a>
            </li>
        </ul>
    </div>
</div>
