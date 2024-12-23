<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::withCount(['comments' => function ($query) {
            $query->where(function ($query) {
                $query->whereNull('user_id')
                    ->orWhere('user_id', '=', 0)
                    ->orWhereNotNull('user_id');
            });
        }])->get();
        return view('berita.index', compact('beritas'));
    }
    public function create()
    {
        return view('berita.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'nullable|image',
        ]);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            try {
                $gambar = $request->file('gambar');
                $imageName = strtolower(str_replace(' ', '_', $input['judul'])) . '_' . time() . '.' . $gambar->getClientOriginalExtension();
                $filePath = 'images/berita/' . $imageName;
                $gambar->storeAs('public', $filePath);
                $input['gambar'] = 'storage/' . $filePath;
            } catch (\Exception $e) {
                return redirect()->back()->withErrors(['gambar' => 'Gagal mengunggah gambar: ' . $e->getMessage()]);
            }
        }

        Berita::create($input);
        return redirect()->route('beritas.index')->with('message', 'Berita berhasil ditambahkan');
    }
    public function show($id)
    {
        $berita = Berita::with('comments')->findOrFail($id);
        $comments_count = $berita->comments()->where(function ($query) {
            $query->whereNull('user_id')
                ->orWhere('user_id', '=', 0)
                ->orWhereNotNull('user_id');
        })->count();
        return view('berita.show', compact('berita', 'comments_count'));
    }
    public function edit(Berita $berita)
    {
        return view('berita.edit', compact('berita'));
    }
    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            'gambar' => 'image',
        ]);
        $input = $request->all();
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $imageName = strtolower(str_replace(' ', '_', $input['judul'])) . '_' . time() . '.' . $gambar->getClientOriginalExtension();
            $filePath = 'images/berita/' . $imageName;
            $gambar->storeAs('public', $filePath);
            $input['gambar'] = 'storage/' . $filePath;
            if ($berita->gambar && Storage::exists(str_replace('storage/', 'public/', $berita->gambar))) {
                Storage::delete(str_replace('storage/', 'public/', $berita->gambar));
            }
        } else {
            $input['gambar'] = $berita->gambar;
        }
        $berita->update($input);
        return redirect()->route('beritas.index')->with('message', 'Berita berhasil diedit');
    }
    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::delete(str_replace('storage/', 'public/', $berita->gambar));
        }
        $berita->delete();
        return redirect()->route('beritas.index')->with('message', 'Berita berhasil dihapus');
    }
    public function like($id)
    {
        $berita = Berita::findOrFail($id);
        if (!session()->has("liked_$id")) {
            $berita->increment('likes');
            session(["liked_$id" => true]);
        }
        return back();
    }
    public function dislike($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->increment('dislikes');
        return back();
    }
    public function storeComment(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:255',
        ]);
        $comment = new Comment();
        $comment->content = $validated['content'];
        $comment->berita_id = $id;
        $comment->user_id = Auth::check() ? Auth::id() : null;
        $comment->save();
        return redirect()->route('berita.show', ['id' => $id]);
    }
    public function destroyComment(Berita $berita, Comment $comment)
    {
        if ($comment->berita_id == $berita->id) {
            $comment->delete();
            return back()->with('message', 'Komentar berhasil dihapus.');
        }
        return back()->with('message', 'Komentar tidak ditemukan.');
    }
}
