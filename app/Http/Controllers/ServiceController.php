<?php

namespace App\Http\Controllers;

use App\Models\Service;
// use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $service = Service::all();
        return view('service.index', [
            'service' => $service
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
            'service.create', [
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
           
            'nama_service' => 'required',
            'deskripsi' => 'required',
            'foto' => ' required|image|file|max:2048'
            ]);
            $array = $request->only([
           
            'nama_service',
            'deskripsi',
            'foto'
            
           
                          
            ]);

        $array['foto'] = $request->file('foto')->store('Foto');
        $tambah=Service::create($array);
        if($tambah) $request->file('foto')->store('Foto');
            return redirect()->route('service.index')
            ->with('success_message', 'Berhasil Menambah service Baru');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $service = service::find($id);
        if (!$service) return redirect()->route('service.index');
 return view('service.edit', [ 
 'service' => $service,
//  'kategoriberita' => KategoriBerita::all() ]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fields = ['nama_service', 'deskripsi'];
        $service = Service::findOrFail($id);
    
        foreach ($fields as $f) {
            if ($f == 'foto' || $f == 'nama_service') {
                continue;
            }
    
            if ($request->has($f)) {
                $request->validate([$f => 'required']);
                $service->$f = $request->input($f);
            }
        }
    
        if ($request->hasFile('foto')) {
            if ($request->oldfoto) {
                Storage::delete($request->oldfoto);
            }
            $service->foto = $request->file('foto')->store('Foto');
        }
    
        $service->save();
    
        return redirect()->route('service.index')->with('success_message', 'Berhasil Mengubah service');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */

     
    public function destroy($id)
    {
        // dd($id->all());
        //
        $service = Service::find($id);
        if ($service->foto) {
            Storage::delete($service->foto);
        }
        if ($service) $service->delete();
        return redirect()->route('service.index') ->with('success_message', 'Berhasil menghapus service "' . $service->nama_service . '" !');
    }
}