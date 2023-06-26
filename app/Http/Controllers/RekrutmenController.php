<?php

namespace App\Http\Controllers;

use App\Models\Rekrutmen;
use Illuminate\Http\Request;

class RekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rekrutmen = Rekrutmen::all();
        return view('rekrutmen.index', [
            'rekrutmen' => $rekrutmen
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
            'rekrutmen.create', [
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
           
            'variasi' => 'required',
            'deskripsi' => 'required',
            'responsibilities'  => 'required',
            'persyaratan' => ' required'
            ]);
            $array = $request->only([
           
            'variasi',
            'deskripsi',
            'responsibilities',
            'persyaratan'
            
           
                          
            ]);
        Rekrutmen::create($array);
            return redirect()->route('rekrutmen.index')
            ->with('success_message', 'Berhasil Menambah Rekrutmen');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekrutmen  $rekrutmen
     * @return \Illuminate\Http\Response
     */
    public function show(rekrutmen $rekrutmen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekrutmen  $rekrutmen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $rekrutmen = Rekrutmen::find($id);
        if (!$rekrutmen) return redirect()->route('rekrutmen.index')->with('error_message', 'Rekrutmen dengan id = '.$id.'tidak ditemukan');
        return view('rekrutmen.edit', [ 
        'rekrutmen' => $rekrutmen]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekrutmen  $rekrutmen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([  
            'variasi' => 'required', 
            'deskripsi' => 'required', 
            'responsibilities' => 'required', 
            'persyaratan' => 'required' 
            ]); 
            $rekrutmen = Rekrutmen::find($id); 
            $rekrutmen->variasi = $request->variasi; 
            $rekrutmen->deskripsi = $request->deskripsi;  
            $rekrutmen->responsibilities = $request->responsibilities; 
            $rekrutmen->persyaratan = $request->persyaratan; 
            $rekrutmen->save(); 
            return redirect()->route('rekrutmen.index') ->with('success_message', 'Berhasil Mengubah rekrutmen'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekrutmen  $rekrutmen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $rekrutmen = Rekrutmen::find($id);
        if ($rekrutmen->foto) {
            Storage::delete($rekrutmen->foto);
        }
        if ($rekrutmen) $rekrutmen->delete();
        return redirect()->route('rekrutmen.index') ->with('success_message', 'Berhasil menghapus rekrutmen "' . $rekrutmen->variasi . '" !');
    }
}
