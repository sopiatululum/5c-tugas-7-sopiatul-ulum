<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(){
        $gurus = Guru::get();
        return view('guru.index', compact('gurus'));
    }

    public function create(){
        return view('guru.create');
    }

    public function store(Request $request){
        $validate = $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required',
            'walikelas' => 'required'
        ]);

        Guru::create($validate);
        return redirect() -> route('guru.index') -> with('message', "Data Guru {$validate['nama_guru']} berhasil ditambahkan");
    }

    public function destroy(Guru $guru){
        $guru->delete();
        return redirect()->route('guru.index') -> with('message', "Data Guru {$guru->nama_guru} berhasil dihapus");
    }

    public function edit(Guru $guru){
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, Guru $guru){
        $validate = $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required',
            'walikelas' => 'required'
        ]);

        $guru -> update($validate);

        return redirect() -> route('guru.index') -> with('message', "Data guru {$guru->nama_guru} berhasil diubah");
    }

    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }
}
