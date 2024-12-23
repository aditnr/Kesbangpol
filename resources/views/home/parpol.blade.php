@extends('layouts.template')

@section('title', 'Parpol')

@section('content')
<section id="parpol-section" class="parpol section">
    <div class="container section-title mt-5" data-aos="fade-up">
        <p>Daftar parpol</p>
    </div>
    <div class="container mt-3">
        <table id="parpolTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Logo</th>
                    <th>Nama Partai</th>
                    <th>Ketua</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parpols as $index => $parpol)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($parpol->logo)
                        <img src="{{ asset('storage/' . $parpol->logo) }}" alt="Logo parpol" class="img-fluid" style="width: 80px; height: 80px; object-fit: cover;">
                        @else
                        <span>Belum ada logo</span>
                        @endif
                    </td>
                    <td>{{ $parpol->partai }}</td>
                    <td>{{ $parpol->ketua }}</td>
                    <td>{{ $parpol->alamat }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<script>
    $(document).ready(function() {
        var table = $('#parpolTable').DataTable({
            "ordering": true,
            "searching": true,
            "paging": true,
            "language": {
                "search": "Cari parpol:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data tidak tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)"
            }
        });
        $('#searchInput').on('keyup', function() {
            table.search(this.value).draw();
        });
    });
</script>
@endsection