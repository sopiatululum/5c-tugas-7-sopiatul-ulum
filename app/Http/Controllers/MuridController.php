<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    public function index(){
        $murids = Murid::get();
        return view('murid.index', compact('murids'));
    }

    public function create(){
        return view('murid.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nisn' => 'required|numeric',
            'nama_murid' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        Murid::create($validate);
        return redirect() -> route('murid.index') -> with('message', "Data murid {$validate['nama_murid']} berhasil ditambahkan");
    }

    public function destroy(Murid $murid){
        $murid->delete();
        return redirect()->route('murid.index') -> with('message', "Data murid {$murid->nama_murid} berhasil dihapus");
    }

    public function edit(Murid $murid){
        return view('murid.edit', compact('murid'));
    }

    public function update(Request $request, Murid $murid){
        $validate = $request->validate([
            'nisn' => 'required|numeric',
            'nama_murid' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $murid -> update($validate);

        return redirect() -> route('murid.index') -> with('message', "Data murid {$murid->nama_murid} berhasil diubah");
    }

    public function show(Murid $murid)
    {
        return view('murid.show', compact('murid'));
    }

    public function take(Murid $murid){
        $gurus = Guru::get();
        return view('murid.take', compact('murid', 'gurus'));
    }

    public function takeStore(Request $request, Murid $murid){
        $gurus = Guru::find($request->guru_id);
        $murid -> gurus() -> sync($gurus);

        return redirect() -> route('murid.index') -> with('message', 'Berhasil menambahkan Kelas');
    }
}
