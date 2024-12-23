@extends('layouts.template')

@section('title', 'Buat Pengaduan')

@section('content')
    <div class="container">
        <h2>Buat Pengaduan</h2>
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Form Pengaduan -->
        <form action="{{ route('pengaduan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama_pelapor">Nama Pelapor</label>
                <input type="text" class="form-control" id="nama_pelapor" name="nama_pelapor" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <!-- Input form lainnya seperti alamat_pelapor, kontak_pelapor, dsb. -->

            <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
        </form>

        <!-- Toast notification (akan muncul ketika pengaduan berhasil disubmit) -->
        <div id="toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: absolute; top: 20px; right: 20px; z-index: 1050;">
            <div class="toast-header">
                <strong class="mr-auto">Sukses</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                Pengaduan Anda telah berhasil dikirim!
            </div>
        </div>
    </div>

    <!-- Tambahkan Script untuk Toast Notification -->
    <div id="toast" data-success="{{ session('success') }}"></div>


@endsection
