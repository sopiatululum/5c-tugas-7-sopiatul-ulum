@extends('master')
@section('title','SDN KARAWANG I')
@section('menu','active')

@section('content')
    <style>
        .bg-maroon {
            background-color: green;
            color: white;
        }
        .text-maroon {
            color: green;
            font-weight: bold
        }
    </style>
    <div class="container pt-4 bg-white">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between">
                    <h2>Data Guru</h2>
                    <a href="{{route('guru.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data guru</p>
                @if (session()->has('message'))
                    <div class="my-3">
                        <div class="alert alert-success">
                            {{session()->get('message')}}
                        </div>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" align="center">
                        <thead>
                            <tr align="center">
                                <th align="center" class="align-middle" rowspan="2">#</th>
                                <th align="center" class="align-middle" rowspan="2">NIP</th>
                                <th align="center" class="align-middle" rowspan="2">Nama Guru</th>
                                <th align="center" class="align-middle" rowspan="2">Walikelas</th>
                                <th align="center" class="align-middle" rowspan="2">Murid</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($gurus as $guru)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$guru->nip}}</td>
                                    <td align="center">{{$guru->nama_guru}}</td>
                                    <td align="center">{{$guru->walikelas}}</td>
                                    <td align="center">
                                        @forelse ($guru->murids as $item)
                                            <ul>
                                                <li>
                                                    {{$item->nama_murid}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada murid
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('guru.destroy',$guru->id) }}" method="POST">
                                            <a href="{{ route('guru.edit',$guru->id) }}" class="btn btn-warning">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="11">Tidak ada data...</td>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
