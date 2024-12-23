@extends('layouts.template')

@section('title', 'Ormas')

@section('content')
<section id="ormas-section" class="ormas section">
<div class="container section-title mt-5" data-aos="fade-up">
  <p>Daftar Ormas</p>
</div>
<div class="container mt-3">
  <table id="ormasTable" class="table table-striped table-bordered">
    <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Tahun</th>
      </tr>
    </thead>
    <tbody>
      @foreach($ormass as $index => $ormas)
      <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $ormas->nama }}</td>
        <td>{{ $ormas->alamat }}</td>
        <td>{{ $ormas->tahun }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</section>
<script>
$(document).ready(function() {
  var table = $('#ormasTable').DataTable({
    "ordering": true,
    "searching": true,
    "paging": true,
    "language": {
      "search": "Cari Ormas:",
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