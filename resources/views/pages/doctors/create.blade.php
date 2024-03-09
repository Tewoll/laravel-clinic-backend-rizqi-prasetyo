@extends('layouts.app')

@section('title', 'Create Data Form')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}" />
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Create Data Form</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Doctors</a></div>
                    <div class="breadcrumb-item">Create</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Doctor Create</h2>
                <div class="card">
                    <form id="formCreateDoctor" action="{{ route('doctor.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Form</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama Dokter</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    placeholder="Masukkan Nama Dokter">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Spesialisasi Dokter</label>
                                                <select
                                                    class="form-control select2 @error('specialization') is-invalid @enderror"
                                                    name="specialization" style="width: 100%;"
                                                    data-placeholder="Pilih Spesialisasi Dokter">
                                                    <option value="" disabled selected>Pilih Spesialisasi Dokter
                                                    </option>
                                                    <option value="Dokter Umum">Dokter Umum</option>
                                                    <option value="Dokter Spesialis Anak">Dokter Spesialis Anak</option>
                                                    <option value="Dokter Spesialis Penyakit Dalam">Dokter Spesialis
                                                        Penyakit Dalam
                                                    </option>
                                                    <option value="Dokter Spesialis Bedah Umum">Dokter Spesialis Bedah Umum
                                                    </option>
                                                    <option value="Dokter Spesialis Bedah Saraf">Dokter Spesialis Bedah
                                                        Saraf
                                                    </option>
                                                    <option value="Dokter Spesialis Bedah Plastik">Dokter Spesialis Bedah
                                                        Plastik
                                                    </option>
                                                    <option value="Dokter Spesialis Kardiologi">Dokter Spesialis Kardiologi
                                                    </option>
                                                    <option value="Dokter Spesialis Mata">Dokter Spesialis Mata</option>
                                                    <option value="Dokter Spesialis THT">Dokter Spesialis THT</option>
                                                    <option value="Dokter Spesialis Gigi">Dokter Spesialis Gigi</option>
                                                </select>
                                                @error('specialization')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Telepon</label>
                                                <input type="number"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    placeholder="Masukkan Nomor Telepon">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    placeholder="Masukkan Alamat Email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                                                    placeholder="Masukkan Alamat Dokter"></textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label>Shift</label>
                                                <input type="text"
                                                    class="form-control @error('shift') is-invalid @enderror" name="shift"
                                                    placeholder="Masukkan Shift Dokter">
                                                @error('shift')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customFile">Foto</label>
                                        <div class="custom-file">
                                            <input type="file" name="photo" class="custom-file-input" id="customFile"
                                                accept="image/*">
                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        </div>
                                    </div>
                                    <div id="imagePreview" class="mt-3 w-25"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-footer border-top text-right mx-3">
                        <button class="btn btn-primary" id="simpanData">Simpan Data</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- library Select2 -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <!-- library SweetAlert2 -->
    <script src="{{ asset('library/sweetalert/dist/sweetalert.min.js') }}"></script>

    <!-- Pages Specific Scripts -->
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Select an specialization',
                allowClear: true
            });
            $('#simpanData').click(function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menyimpan data?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Simpan!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#formCreateDoctor').submit();
                    }
                });
            });
        });
    </script>

    <script>
        // Mendapatkan elemen input file
        var input = document.getElementById('customFile');

        // Mendengarkan event saat file diubah
        input.addEventListener('change', function(event) {
            // Mendapatkan file yang dipilih
            var file = event.target.files[0];

            // Validasi jika file yang dipilih adalah gambar
            if (file && file.type.match('image.*')) {
                // Membuat objek FileReader
                var reader = new FileReader();

                // Mendengarkan event saat proses pembacaan file selesai
                reader.onload = function(e) {
                    // Menampilkan preview gambar
                    var imagePreview = document.getElementById('imagePreview');
                    imagePreview.innerHTML = '<img src="' + e.target.result +
                        '" class="img-fluid" alt="Preview">';
                };

                // Membaca isi file sebagai URL data
                reader.readAsDataURL(file);
            } else {
                // Jika file yang dipilih bukan gambar, tampilkan pesan kesalahan
                alert('Harap pilih file gambar.');
                // Mengosongkan input file
                input.value = '';
                // Menghapus preview gambar
                var imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML = '';
            }
        });
    </script>
@endpush
