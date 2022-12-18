@extends('master')
@section('title','SDN KARAWANG I')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: green;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Data Guru</h2>
                <p>Masukkan data dengan lengkap</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('guru.update', ['guru' => $guru->id])}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-4">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" placeholder="Masukkan NIP" class="form-control" value="{{old('nip') ?? $guru->nip}}">
                        @error('nip')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru" placeholder="Masukkan Nama Guru" class="form-control" value="{{old('nama_guru') ?? $guru->nama_guru}}">
                        @error('nama_guru')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="walikelas" class="form-label">Walikelas</label>
                        <select name="walikelas" id="walikelas" class="form-control">
                            <option selected disabled>Pilih walikelas</option>
                            <option value="Kelas 1" {{old('walikelas') ?? $guru->walikelas == "Kelas 1" ? "selected" : ""}}>Kelas 1</option>
                            <option value="Kelas 2" {{old('walikelas') ?? $guru->walikelas == "Kelas 2" ? "selected" : ""}}>Kelas 2</option>
                            <option value="Kelas 3" {{old('walikelas') ?? $guru->walikelas == "Kelas 3" ? "selected" : ""}}>Kelas 3</option>
                            <option value="Kelas 4" {{old('walikelas') ?? $guru->walikelas == "Kelas 4" ? "selected" : ""}}>Kelas 4</option>
                            <option value="Kelas 5" {{old('walikelas') ?? $guru->walikelas == "Kelas 5" ? "selected" : ""}}>Kelas 5</option>
                            <option value="Kelas 6" {{old('walikelas') ?? $guru->walikelas == "Kelas 6" ? "selected" : ""}}>Kelas 6</option>
                        </select>
                        @error('walikelas')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bg-maroon">Edit</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
