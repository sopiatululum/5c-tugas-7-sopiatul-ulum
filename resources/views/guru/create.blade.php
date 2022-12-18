@extends('master')
@section('title','SDN KARYAMAKMUR III')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: green;
            color: white;
        }
        .bt-maroon{
            background-color: green;
            color: white;
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <h2>Tambah Data Guru</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('guru.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nip" class="form-label">NIP</label>
                        <input type="text" name="nip" id="nip" placeholder="Masukkan NIP" class="form-control" value="{{old('nip')}}">
                        @error('nip')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_guru" class="form-label">Nama Guru</label>
                        <input type="text" name="nama_guru" id="nama_guru" placeholder="Masukkan Nama Guru" class="form-control" value="{{old('nama_guru')}}">
                        @error('nama_guru')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="walikelas" class="form-label">Walikelas</label>
                        <select name="walikelas" id="walikelas" class="form-control">
                            <option selected disabled>Pilih Walikelas</option>
                            <option value="Kelas 1" {{old('walikelas') == "Kelas 1" ? "selected" : ""}}>Kelas 1</option>
                            <option value="Kelas 2" {{old('walikelas') == "Kelas 2" ? "selected" : ""}}>Kelas 2</option>
                            <option value="Kelas 3" {{old('walikelas') == "Kelas 3" ? "selected" : ""}}>Kelas 3</option>
                            <option value="Kelas 4" {{old('walikelas') == "Kelas 4" ? "selected" : ""}}>Kelas 4</option>
                            <option value="Kelas 5" {{old('walikelas') == "Kelas 5" ? "selected" : ""}}>Kelas 5</option>
                            <option value="Kelas 6" {{old('walikelas') == "Kelas 6" ? "selected" : ""}}>Kelas 6</option>
                        </select>
                        @error('walikelas')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn bt-maroon">Tambah</button>
                    <p></p>
                </form>
            </div>
        </div>
    </div>
@endsection
