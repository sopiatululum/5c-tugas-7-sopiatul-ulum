@extends('master')
@section('title','SDN KARAWANG I')
@section('menu','active')

@section('content')
<div class="container pt-4 bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="card p-4">
                <h3 class="fw-bold">Pilih Kelas</h3>
                <div class="card-body">
                    <form action="{{route('murids.takeStore',['murid' => $murid->id])}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="guru_id" class="form-label">Pilih Kelas</label>
                            <div class="form-group">
                                @foreach ($gurus as $item)
                                <div class="form-check
                                form-check-inline">
                                    <input type="checkbox" name="guru_id[]" id="{{$item->id}}" class="form-check-input" value="{{$item->id}}">
                                    <label for="{{$item->id}}" class="form-check-label">{{$item->nama_guru}} - {{$item->walikelas}}</label>
                                </div>
                                @endforeach
                            </div>
                            <p></p>
                            <button type="submit" class="btn btn-info">Pilih Kelas</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
