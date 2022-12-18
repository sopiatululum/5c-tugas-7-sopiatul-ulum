@extends('master')
@section('title','SDN KARAWANG I')
@section('menu1','active')

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
                <h2>Tambah Data Murid</h2>
                <p>Silahkan masukkan data dengan benar dan lengkap!</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <form action="{{route('murid.store')}}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nisn" class="form-label">NISN</label>
                        <input type="text" name="nisn" id="nisn" placeholder="Masukkan nisn" class="form-control" value="{{old('nisn')}}">
                        @error('nisn')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="nama_murid" class="form-label">Nama Murid</label>
                        <input type="text" name="nama_murid" id="nama_murid" placeholder="Masukkan Nama murid" class="form-control" value="{{old('nama_murid')}}">
                        @error('nama_murid')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" {{old('jenis_kelamin') == "Laki-laki" ? "selected" : ""}}>Laki-laki</option>
                            <option value="Perempuan" {{old('jenis_kelamin') == "Perempuan" ? "selected" : ""}}>Perempuan</option>
                        </select>
                        @error('jenis_kelamin')
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
