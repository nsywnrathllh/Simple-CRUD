<?php

namespace App\Http\Controllers;

use App\Models\Blog;
// use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blog = Blog::all();
        return view('blog.index', [
            'blog' => $blog
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view(
            'blog.create', [
            // 'kategoriberita' => kategoriberita::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
           
            'judul' => 'required',
            'isi' => 'required',
            'tglpost'  => 'required',
            'foto' => ' required|image|file|max:2048'
            ]);
            $array = $request->only([
           
            'judul',
            'isi',
            'tglpost',
            'foto'
            
           
                          
            ]);
        $array['foto'] = $request->file('foto')->store('Foto');
        $tambah=Blog::create($array);
        if($tambah) $request->file('foto')->store('Foto');
            return redirect()->route('blog.index')
            ->with('success_message', 'Berhasil Menambah blog Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = Blog::find($id);
        if (!$blog) return redirect()->route('blog.index')->with('error_message', 'Standar Kompetensi dengan id = '.$id.'tidak ditemukan');
 return view('blog.edit', [ 
 'blog' => $blog ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $fields = ['judul','isi','tglpost'];

            $blog = Blog::findOrFail($id);

            foreach ($fields as $f) {
                if ($f == ['foto','judul'] ) {
                    continue;
                }
               

                if ($request->has ($f)) {
                    $request->validate([$f => 'required']);
                    $request->validate(['foto' => 'image']);
                    $blog[$f] = $request[$f];
                }
               
    
            }

            if ($request->has('foto')) {
                if ($request->oldfoto) {
                    Storage::delete($request->oldfoto);
                }
                $blog->foto = $request->file('foto')->store('Foto');
            }

            $blog->save(); 
            return redirect()->route('blog.index') ->with('success_message', 'Berhasil Mengubah blog'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Cek apakah blog dengan ID yang diberikan ada
        $blog = Blog::find($id);
    
        // Pastikan blog ditemukan sebelum melanjutkan
        if ($blog) {
            if ($blog->foto) {
                Storage::delete($blog->foto);
            }
    
            // Hapus blog
            $blog->delete();
    
            return redirect()->route('blog.index')->with('success_message', 'Berhasil menghapus blog "' . $blog->judul . '" !');
        }
    
        // Jika blog tidak ditemukan, lakukan penanganan kesalahan yang sesuai di sini
        // Contoh: tampilkan pesan kesalahan, redirect ke halaman lain, dll.
    }
    
}