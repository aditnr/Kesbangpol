<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\DaftarInformasiPublik;
use App\Models\Galeri;
use App\Models\Ikm;
use App\Models\InformasiBerkala;
use App\Models\InformasiDikecualikan;
use App\Models\Kontak;
use App\Models\Lkip;
use App\Models\Ormas;
use App\Models\Parpol;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\PengajuanKeberatan;
use App\Models\PermohonanInformasi;
use App\Models\Renja;
use App\Models\Renstra;
use App\Models\Struktur;
use App\Models\Tentang;
use App\Models\Tugas;
use App\Models\Visi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $beritas = Berita::all();
        $tentang = Tentang::all();
        $struktur = Struktur::all();
        $tugas = Tugas::all();
        $visi = Visi::all();

        return view('home.index', compact('beritas', 'tentang', 'struktur', 'tugas', 'visi'));
    }

    public function tentang()
    {
        return view('home.tentang');
    }

    public function contact()
    {
        return view('home.contact');
    }

    public function visi()
    {
        $visi = Visi::first(); // Ambil data visi pertama dari tabel Visi
        return view('home.visi', compact('visi'));
    }

    public function galeri()
    {
        $galeris = Galeri::all();
        return view('home.galeri', compact('galeris'));
    }
    public function ormas()
    {
        $ormass = Ormas::orderBy('created_at', 'desc')->get();

        return view('home.ormas', compact('ormass'));
    }
    public function parpol()
    {
        $parpols = Parpol::orderBy('created_at', 'desc')->get();

        return view('home.parpol', compact('parpols'));
    }

    public function pegawai()
    {
        $pegawais = Pegawai::all();
        return view('home.pegawai', compact('pegawais'));
    }
    public function pengaduans()
    {
        $pengaduan = Pengaduan::all();
        return view('home.pengaduan', compact('home.pengaduan'));
    }
    public function ikm()
    {
        $ikms = Ikm::all();
        return view('home.ikm', compact('ikms'));
    }
    public function lkip()
    {
        $lkips = Lkip::all();
        return view('home.lkip', compact('lkips'));
    }
    public function renja()
    {
        $renjas = Renja::all();
        return view('home.renja', compact('renjas'));
    }
    public function renstra()
    {
        $renstras = Renstra::all();
        return view('home.renstra', compact('renstras'));
    }
    public function informasi_berkala()
    {
        // Ambil data dari tabel informasi berkala
        $informasi_ikms = DB::table('ikms')
            ->select('nama', 'tahun', 'file')
            ->get();
        $informasi_lkips = DB::table('lkips')
            ->select('nama', 'tahun', 'file')
            ->get();
        $informasi_renjas = DB::table('renjas')
            ->select('nama', 'tahun', 'file')
            ->get();
        $informasi_renstras = DB::table('renstras')
            ->select('nama', 'tahun', 'file')
            ->get();
        $informasi_berkalas = $informasi_ikms->concat($informasi_lkips)->concat($informasi_renjas)->concat($informasi_renstras);

        return view('home.informasi_berkala', compact('informasi_berkalas'));
    }
    public function informasi_dikecualikan()
    {
        $informasi_dikecualikans = InformasiDikecualikan::all();
        return view('home.informasi_dikecualikan', compact('informasi_dikecualikans'));
    }
    public function daftar_informasi_publik()
    {
        $daftar_informasi_publiks = DaftarInformasiPublik::all();
        return view('home.daftar_informasi_publik', compact('daftar_informasi_publiks'));
    }
    public function permohonan_informasi()
    {
        $permohonan_informasi = PermohonanInformasi::all();
        return view('home.permohonan_informasi', compact('permohonan_informasi'));
    }
    public function pengajuan_keberatan()
    {
        $pengajuan_keberatan = PengajuanKeberatan::all();
        return view('home.pengajuan_keberatan', compact('pengajuan_keberatan'));
    }

    public function testimonials()
    {
        return view('home.testimonials');
    }

    public function berita()
    {
        // Ambil 2 berita terbaru
        $beritas = Berita::orderBy('created_at', 'desc')->take(2)->get();

        // Ambil berita lainnya (5 berita terbaru yang tidak sama)
        $recentBeritas = Berita::orderBy('created_at', 'desc')->skip(2)->take(5)->get();

        return view('home.berita', compact('beritas', 'recentBeritas'));
    }

    public function home()
    {
        $kontak = Kontak::first(); // Ambil data Kontak
        return view('home', compact('kontak'));
    }
}
