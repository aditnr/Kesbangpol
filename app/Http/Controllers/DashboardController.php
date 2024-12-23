<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kontak;
use App\Models\Pegawai;
use App\Models\PengajuanKeberatan;
use App\Models\PermohonanInformasi;
use App\Models\Tentang;
use App\Models\Visi;
use App\Models\Struktur;
use App\Models\Tugas;
use Illuminate\Http\Request;

class DashboardController extends Controller

{
    public function index()
    {
        $jumlahBerita = Berita::count();
        $jumlahGaleri = Galeri::count();
        $jumlahPegawai = Pegawai::count();
        $jumlahPermohonanInformasi = PermohonanInformasi::count();
        $jumlahPengajuanKeberatan = PengajuanKeberatan::count();
        $tentang = Tentang::first();
        $struktur = Struktur::first();
        $tugas = Tugas::first();
        $visi = Visi::first();
        $kontak = Kontak::first();
    
        return view('dashboard', compact('jumlahBerita', 'jumlahGaleri', 'jumlahPegawai', 'jumlahPermohonanInformasi', 'jumlahPengajuanKeberatan', 'tentang', 'struktur', 'tugas', 'visi', 'kontak'));
    }
}