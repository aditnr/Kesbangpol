@extends('layouts.template')

@section('title', 'Buat Pengajuan')

@section('content')
<section id="berita" class="contact section">
    <div class="container section-title mt-5" data-aos="fade-up">
        <p>Form Pengajuan Keberatan</p>
    </div>
    <div class="container mt-3">
        <form action="{{ route('pengajuan_keberatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" required minlength="16" maxlength="16" inputmode="numeric" pattern="\d{16}" title="NIK harus 16 digit angka">
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM (Jika yang mengajukan adalah mahasiswa)</label>
                <input type="text" class="form-control" id="nim" name="nim" inputmode="numeric" pattern="\d*">
            </div>
            <div class="mb-3">
                <label for="perguruan_tinggi" class="form-label">Perguruan Tinggi (Jika yang mengajukan adalah mahasiswa)</label>
                <input type="text" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" required inputmode="numeric" pattern="\d*">
            </div>
            <div class="mb-3">
                <label for="pengajuan" class="form-label">Pengajuan</label>
                <textarea class="form-control" id="pengajuan" name="pengajuan" required></textarea>
            </div>
            <div class="mb-3">
                <label for="dokumen" class="form-label">Dokumen</label>
                <input type="file" class="form-control" id="dokumen" name="dokumen" accept="image/*,application/pdf">
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
        </form>
    </div>
    @if(session('success'))
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                </div>
                <div class="modal-body text-center">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 2rem;"></i>
                    <p class="mt-3">{{ session('success') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endif
</section>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var successMessage = "{{ session('success') }}";
        if (successMessage) {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        }
    });
</script>
@endsection