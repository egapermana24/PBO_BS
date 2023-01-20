@extends('../layout/' . $layout)

@section('subhead')
<title>Edit Data Karyawan - Bread Smile</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-xl font-medium mr-auto">Data Karyawan</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-9">
        <!-- BEGIN: Form Layout -->
        <div class="intro-y box px-10 py-5">
            <form class="" action="{{ route('karyawan.update', $karyawan->id_karyawan) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-3">
                    <label for="nip" class="form-label"> NIP </label>
                    <input name="nip" id="nip" type="number" class="form-control w-full @error('nip') border-danger @enderror" placeholder="Masukkan NIP" minlength="3" value="{{ old('nip', $karyawan->nip) }}">
                    @error('nip')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
               
                <div class="grid grid-cols-12 gap-4 mt-5">
                    <div class="col-span-6">
                        <label for="namaDepan" class="form-label"> Nama Depan </label>
                        <input name="namaDepan" id="namaDepan" type="text" class="form-control w-full @error('namaDepan') border-danger @enderror" placeholder="Masukkan Nama Depan" value="{{ old('namaDepan', $dataKaryawan['namaDepan']) }}">
                        @error('namaDepan')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="namaBelakang" class="form-label"> Nama Belakang </label>
                        <input name="namaBelakang" id="namaBelakang" type="text" class="form-control w-full @error('namaBelakang') border-danger @enderror" placeholder="Masukkan Nama Belakang" value="{{ old('namaBelakang', $dataKaryawan['namaBelakang']) }}">
                        @error('namaBelakang')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-4 mt-5">
                    <div class="col-span-6">
                        <label for="kd_jabatan">Jabatan</label>
                        <div class="mt-2">
                            <select data-placeholder="Silahkan pilih jabatan" class="tom-select w-full @error('kd_jabatan') border-danger @enderror" id="kd_jabatan" name="kd_jabatan">
                                {{-- <option value="0" hidden disabled selected>-- Silahkan Pilih --</option> --}}
                                @foreach ($jabatan as $jbtn)
                                    @if (old('kd_jabatan', $karyawan->kd_jabatan) == $jbtn->id_jabatan)
                                        <option value="{{ $jbtn->id_jabatan }}" selected>{{ $jbtn->nm_jabatan }}</option>
                                    @else
                                        <option value="{{$jbtn->id_jabatan }}">{{ $jbtn->nm_jabatan }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kd_jabatan')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-span-6">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <div class="mt-2">
                            <select data-placeholder="Silahkan pilih jenis kelamin" class="tom-select w-full @error('jenis_kelamin') border-danger @enderror" id="jenis_kelamin" name="jenis_kelamin">
                                @if (old('jenis_kelamin', $karyawan->jenis_kelamin) == $karyawan->jenis_kelamin)
                                    <option value="{{ $karyawan->jenis_kelamin }}" hidden selected>{{ $karyawan->jenis_kelamin }}</option>
                                @else
                                    <option value="{{ $karyawan->jenis_kelamin }}" hidden selected>{{ $karyawan->jenis_kelamin }}</option>
                                @endif
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('jenis_kelamin')
                                <div class="text-danger mt-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-12 gap-4 mt-5">
                    <div class="col-span-6">
                        <label for="tempat_lahir" class="form-label"> Tempat Lahir </label>
                        <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control w-full @error('tempat_lahir') border-danger @enderror" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir', $dataKaryawan['tempat_lahir']) }}">
                        @error('tempat_lahir')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-6">
                        <label for="tgl_lahir" class="form-label"> Tanggal Lahir </label>
                        <input type="text" class="datepicker form-control @error('tgl_lahir') border-danger @enderror" data-single-mode="true" value="{{ old('tgl_lahir', $dataKaryawan['tgl_lahir']) }}" name="tgl_lahir" id="tgl_lahir">
                        @error('tgl_lahir')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mt-5">
                    <label for="no_telp" class="form-label font-medium"> Nomor Telepon </label>
                    <div class="input-group">
                        <div id="no_telp" class="input-group-text">+62</div>
                        <input type="text" class="form-control @error('no_telp') border-danger @enderror" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon" value="{{ old('no_telp', $dataKaryawan['no_telp']) }}">
                    </div>
                    @error('no_telp')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="grid grid-cols-12 gap-4 mt-5 ">
                    <div class="col-span-4">
                        <label for="provinsi" class="form-label"> Provinsi </label>
                        <input name="provinsi" id="provinsi" type="text" class="form-control w-full @error('provinsi') border-danger @enderror"  minlength="3" value="{{ old('provinsi', $dataKaryawan['provinsi']) }}">
                        @error('provinsi')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-4">
                        <label for="kota" class="form-label"> Kota/Kabupaten </label>
                        <div class="input-group">
                            <select name="select_kota" id="kota" class="form-select form-select-md w-24 @error('select_kota') border-danger @enderror">
                                {{-- <option disabled hidden selected>Pilih</option> --}}
                                @if (old('select_kota', $dataKaryawan['select_kota']) == $dataKaryawan['select_kota'])
                                    <option value="{{ $dataKaryawan['select_kota'] }}" selected>{{ $dataKaryawan['select_kota'] }}</option>
                                @else
                                    <option value="{{ $dataKaryawan['select_kota'] }}" selected>{{ $dataKaryawan['select_kota'] }}</option>
                                @endif
                                <option value="Kab.">Kab.</option>
                                <option value="Kota">Kota</option>
                            </select>
                            <input type="text" class="form-control  @error('kota') border-danger @enderror" id="kota" name="kota" value="{{ old('kota', $dataKaryawan['kota']) }}">
                        </div>
                        @error('provinsi')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-span-4">
                        <label for="kecamatan" class="form-label"> Kecamatan </label>
                        <input name="kecamatan" id="kecamatan" type="text" class="form-control w-full @error('kecamatan') border-danger @enderror" minlength="3" value="{{ old('kecamatan', $dataKaryawan['kecamatan']) }}">
                        @error('kecamatan')
                            <div class="text-danger mt-1">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <label for="alamat_lengkap" class="form-label">
                        Alamat Lengkap
                    </label>
                    <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control @error('alamat_lengkap') border-danger @enderror" placeholder="Masukkan Alamat Lengkap">{{ old('alamat_lengkap', $dataKaryawan['alamat_lengkap']) }}</textarea>
                    @error('alamat_lengkap')
                        <div class="text-danger mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mt-5">
                    <label for="role" class="form-label"> Login Sebagai</label>
                    <div class="mt-1">
                        <select data-placeholder="Silahkan pilih role" class="tom-select w-full @error('role') border-danger @enderror" id="role" name="role">
                            @if (old('role', $karyawan->role) == $karyawan->role)
                                <option value="{{ $karyawan->role }}" hidden selected>{{ $karyawan->role }}</option>
                            @else
                                <option value="{{ $karyawan->role }}" hidden selected>{{ $karyawan->role }}</option>
                            @endif
                            <option value="backoffice">Backoffice</option>
                            <option value="gudang">Gudang</option>
                            <option value="produksi">Produksi</option>
                            <option value="distribusi">Distribusi</option>
                        </select>
                        @error('role')
                            <div class="text-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mt-5">
                    <label for="foto" class="form-label"> Foto </label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-fit border-2 border-gray-50 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 @error('foto') border-danger @enderror">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <img src="{{ asset('images/'.$karyawan->foto) }}" class="my-0 rounded-lg w-32" id="output">
                                {{-- <div class="flex flex-col items-center justify-center pt-5 pb-6" id="hilang">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span></p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div> --}}
                            </div>

                            <input id="dropzone-file" type="file" class="hidden" name="foto" accept="image/*" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" />

                        </label>
                    </div>
                    @error('foto')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="relative">
                    <div class="intro-y col-span-11 2xl:col-span-9">
                        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
                            <a href="/tampilsopir" type="button" class="btn py-3 border-slate-300 dark:border-darkmode-400 text-slate-500 w-full md:w-52">Cancel</a>
                            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ mix('dist/js/ckeditor-classic.js') }}"></script>

@endsection
