<!-- use App\Models\Sopir;

$sopir = Sopir::where('no_ktp', Auth::user()->nip)
->select('sopir.*')
->first();

if ($sopir == null) {
$foto = asset('dist/images/user.png');
$jabatan = 'User';
} else {
$foto = asset('images/'.$sopir->foto);
$jabatan = 'User';
} -->
@php
use App\Models\Karyawan;
use App\Models\Sopir;

$karyawan = Karyawan::where('nip', Auth::user()->nip)
->join('jabatan', 'jabatan.id_jabatan', '=', 'karyawan.kd_jabatan')
->select('karyawan.*', 'jabatan.nm_jabatan')
->first();

$sopir = Sopir::where('no_ktp', Auth::user()->nip)->first();


if ($karyawan == null) {
$foto = asset('dist/images/user.png');
$jabatan = 'User';
} else {
$foto = asset('images/'.$karyawan->foto);
$jabatan = $karyawan->nm_jabatan;
}
@endphp
<!-- BEGIN: Top Bar -->
<div class="top-bar-boxed h-[70px] z-[51] relative border-b border-white/[0.08] -mt-7 md:-mt-5 -mx-3 sm:-mx-8 px-3 sm:px-8 md:pt-0 mb-12">
    <div class="h-full flex items-center">
        <!-- BEGIN: Logo -->
        <a href="" class="-intro-x hidden md:flex mr-auto">
            <img class="w-8" src="{{ asset('dist/images/logoh.png') }}">
            <span class="text-white text-lg ml-3">
                Bread Smile
            </span>
        </a>
        <!-- END: Logo -->
        <!-- BEGIN: Breadcrumb -->
        {{-- <nav aria-label="breadcrumb" class="-intro-x h-full mr-auto">
            <ol class="breadcrumb breadcrumb-light">
                <li class="breadcrumb-item"><a href="#">Application</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav> --}}
        <!-- END: Breadcrumb -->
        <!-- BEGIN: Search -->
        <!-- agar search tampil hanya pada saat di halaman index -->
        @if (Request::is('resep *') || Request::is('produkMasuk *') || Request::is('produkKeluar *') || Request::is('produk *') || Request::is('bahanBaku *') || Request::is('karyawan *') || Request::is('sopir *') || Request::is('jabatan *') || Request::is('produkMasuk *') || Request::is('produkkeluar *') || Request::is('bahanMasuk *') || Request::is('bahanKeluar *') || Request::is('laporan *') || Request::is('dashboard *'))
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <input type="text" class="search__input form-control border-transparent" placeholder="Search...">
                <i data-feather="search" class="search__icon dark:text-slate-500"></i>
            </div>
            <a class="notification notification--light sm:hidden" href="">
                <i data-feather="search" class="notification__icon dark:text-slate-500"></i>
            </a>
            <div class="search-result">
                <div class="search-result__content">
                    <div class="search-result__content__title">Pages</div>
                    <div class="mb-5">
                        <a href="" class="flex items-center">
                            <div class="w-8 h-8 bg-success/20 dark:bg-success/10 text-success flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-feather="inbox"></i>
                            </div>
                            <div class="ml-3">Mail Settings</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-pending/10 text-pending flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-feather="users"></i>
                            </div>
                            <div class="ml-3">Users & Permissions</div>
                        </a>
                        <a href="" class="flex items-center mt-2">
                            <div class="w-8 h-8 bg-primary/10 dark:bg-primary/20 text-primary/80 flex items-center justify-center rounded-full">
                                <i class="w-4 h-4" data-feather="credit-card"></i>
                            </div>
                            <div class="ml-3">Transactions Report</div>
                        </a>
                    </div>
                    <div class="search-result__content__title">Users</div>
                    <div class="mb-5">
                    </div>
                    <div class="search-result__content__title">Products</div>
                    @foreach (array_slice($fakers, 0, 4) as $faker)
                    <a href="" class="flex items-center mt-2">
                        <div class="w-8 h-8 image-fit">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="{{ $faker['products'][0]['category'] }}">
                        </div>
                        <div class="ml-3">{{ $faker['products'][0]['name'] }}</div>
                        <div class="ml-auto w-48 truncate text-slate-500 text-xs text-right">{{ $faker['products'][0]['category'] }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- END: Search -->
        @endif
        <!-- BEGIN: Notifications -->
        <!-- <div class="intro-x dropdown mr-4 sm:mr-6">
            <div class="dropdown-toggle notification notification--bullet cursor-pointer" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <i data-feather="bell" class="notification__icon dark:text-slate-500"></i>
            </div>
            <div class="notification-content pt-2 dropdown-menu">
                <div class="notification-content__box dropdown-content">
                    <div class="notification-content__title">Notifications</div>
                    @foreach (array_slice($fakers, 0, 5) as $key => $faker)
                    <div class="cursor-pointer relative flex items-center {{ $key ? 'mt-5' : '' }}">
                        <div class="w-12 h-12 flex-none image-fit mr-1">
                            <img alt="Icewall Tailwind HTML Admin Template" class="rounded-full" src="{{ asset('dist/images/' . $faker['photos'][0]) }}">
                            <div class="w-3 h-3 bg-success absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                        </div>
                        <div class="ml-2 overflow-hidden">
                            <div class="flex items-center">
                                <a href="javascript:;" class="font-medium truncate mr-5">{{ $faker['users'][0]['name'] }}</a>
                                <div class="text-xs text-slate-400 ml-auto whitespace-nowrap">{{ $faker['times'][0] }}</div>
                            </div>
                            <div class="w-full truncate text-slate-500 mt-0.5">{{ $faker['news'][0]['short_content'] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div> -->
        <!-- END: Notifications -->
        <!-- BEGIN: Account Menu -->
        <div class="intro-x dropdown w-8 h-8">
            <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg bg-no-repeat bg-local bg-top zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
                <img alt="User Profile" src="{{ $foto }}">
            </div>
            <div class="dropdown-menu w-56">
                <ul class="dropdown-content bg-primary/80 before:block before:absolute before:bg-black before:inset-0 before:rounded-md before:z-[-1] text-white">
                    <li class="p-2">
                        <div class="font-medium">{{ auth()->user()->name }}</div>
                        <!-- agar huruf depan role bisa kapital -->
                        <div class="text-xs text-white/60 mt-0.5 dark:text-slate-500">{{ $jabatan }} | {{ auth()->user()->role }}</div>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li>

                    @if ($karyawan !== null || $sopir !== null)
                    <li>
                        <a href="{{ route('UserProfile.index') }}" class="dropdown-item hover:bg-white/5">
                            <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                        </a>
                    </li>
                    @endif

                    <!-- 
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-feather="lock" class="w-4 h-4 mr-2"></i> Reset Password
                        </a>
                    </li>
                    <li>
                        <a href="" class="dropdown-item hover:bg-white/5">
                            <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider border-white/[0.08]">
                    </li> -->
                    <li>
                        @if (Auth::check())
                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="w-full h-full dropdown-item overflow-hidden hover:bg-white/5">
                                <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i>
                                Logout
                            </button>
                        </form>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
        <!-- END: Account Menu -->
    </div>
</div>
<!-- END: Top Bar -->