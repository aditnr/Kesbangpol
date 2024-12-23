@extends('layouts.app')

@section('title', 'Tambah Daftar Informasi Publik')

@section('content')
<div class="container">
    <a href="/daftar_informasi_publiks" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('daftar_informasi_publiks.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label for="nama">Nama File</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama File" id="nama-input" readonly>
                            @error('nama')
                            <small style="color: red;">Nama File harus diisi.</small>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="file">File</label>
                            <input type="file" class="form-control" name="file" accept=".pdf,.doc,.docx" id="file-input">
                            @error('file')
                            <small style="color: red;">File harus diisi.</small>
                            @enderror
                            <div id="file-preview" class="mt-2"></div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tahun">Tahun</label>
                            <input type="number" class="form-control" name="tahun" id="tahun-input" value="{{ old('tahun') }}">
                            @error('tahun')
                            <small style="color: red;">Tahun harus diisi dan valid.</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel">Pratinjau File</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="file-preview-frame" src="" style="width: 100%; height: 400px;" frameborder="0"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <a id="download-link" class="btn btn-primary" href="#" target="_blank">Unduh File</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('file-input').addEventListener('change', function() {
        const filePreview = document.getElementById('file-preview');
        const file = this.files[0];
        const namaInput = document.getElementById('nama-input');
        const tahunInput = document.getElementById('tahun-input');
        const fileModal = new bootstrap.Modal(document.getElementById('fileModal'));
        const filePreviewFrame = document.getElementById('file-preview-frame');
        const downloadLink = document.getElementById('download-link');

        if (file) {
            filePreview.innerHTML = `<strong>Nama File:</strong> <a href="#" id="file-link" onclick="fileModal.show();">${file.name}</a>`;
            namaInput.value = file.name;

            const fileUrl = URL.createObjectURL(file);
            filePreviewFrame.src = fileUrl;

            downloadLink.href = '#';

            const yearMatch = file.name.match(/(\d{4})/);
            if (yearMatch) {
                const year = parseInt(yearMatch[0]);
                const currentYear = new Date().getFullYear();
                if (year >= 1900 && year <= currentYear) {
                    tahunInput.value = year;
                } else {
                    tahunInput.value = '';
                    alert('Tahun yang ditemukan tidak valid. Pastikan tahun berada antara 1900 dan ' + currentYear + '.');
                }
            } else {
                tahunInput.value = '';
                alert('Tidak ada tahun yang ditemukan dalam nama file. Silakan isi tahun secara manual.');
            }
        } else {
            filePreview.innerHTML = '';
            namaInput.value = '';
            tahunInput.value = '';
        }
    });
    document.getElementById('fileModal').addEventListener('shown.bs.modal', function() {
        const file = document.getElementById('file-input').files[0];
        if (file) {
            const fileUrl = URL.createObjectURL(file);
            document.getElementById('download-link').href = fileUrl;
        }
    });
</script>
@endsection