<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.index') }}" aria-expanded="false">
                    <i class="icon-user menu-icon"></i><span class="nav-text">Admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pelamar.index') }}" aria-expanded="false">
                    <i class="icon-people menu-icon"></i><span class="nav-text">Pelamar</span>
                </a>
            </li>
            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-settings menu-icon"></i><span class="nav-text">Kriteria</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('penerimaan.index') }}">Penerimaan</a></li>
                    <li><a href="{{ route('jurusan.index') }}">Jurusan</a></li>
                    <li><a href="{{ route('pendidikan.index') }}">Pendidikan</a></li>
                    <li><a href="{{ route('pengalaman.index') }}">Pengalaman</a></li>
                    <li><a href="{{ route('wawancara.index') }}">Wawancara</a></li>
                </ul>
            </li>
            <li>
                <a href="{{ route('nilai.index') }}" aria-expanded="false">
                    <i class="icon-calculator menu-icon"></i><span class="nav-text">Nilai</span>
                </a>
            </li>
            <li>
                <a href="{{ route('hasil.index') }}" aria-expanded="false">
                    <i class="icon-star menu-icon"></i><span class="nav-text">Hasil</span>
                </a>
            </li>
        </ul>
    </div>
</div>
