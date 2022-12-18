@extends('master')
@section('title','SDN KARAWANG I')
@section('menu1','active')

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
                    <h2>Data Murid</h2>
                    <a href="{{route('murid.create')}}" class="btn bg-maroon">Tambah</a>
                </div>
                <p>Dibawah ini merupakan semua data murid</p>
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
                                <th align="center" class="align-middle" rowspan="2">NISN</th>
                                <th align="center" class="align-middle" rowspan="2">Nama Murid</th>
                                <th align="center" class="align-middle" rowspan="2">Jenis Kelamin</th>
                                <th align="center" class="align-middle" rowspan="2">Kelas</th>
                                <th align="center" class="align-middle" rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($murids as $murid)
                                <tr>
                                    <td align="center">{{$loop->iteration}}</td>
                                    <td align="center">{{$murid->nisn}}</td>
                                    <td align="center">{{$murid->nama_murid}}</td>
                                    <td align="center">{{$murid->jenis_kelamin}}</td>
                                    <td align="center">
                                        @forelse ($murid->gurus as $item)
                                            <ul>
                                                <li>
                                                    {{$item->walikelas}}
                                                </li>
                                            </ul>
                                        @empty
                                            Tidak ada walikelas
                                        @endforelse
                                    </td>
                                    <td align="center "class="text-center">
                                        <form action="{{ route('murid.destroy',$murid->id) }}" method="POST">
                                            <a href="{{ route('murids.take',$murid->id) }}" class="btn btn-info">Kelas</a>
                                            <a href="{{ route('murid.edit',$murid->id) }}" class="btn btn-warning">Edit</a>
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
