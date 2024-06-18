@extends('layouts.main')
@section('title', 'Edit')    
@section('content')
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="/update/{{ $em->id }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label> Nomer Surat</label>
                        <input type="text" name="title" class="form-control" value="{{ $em->nosurat }}" required  >
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" class="form-control" value="{{ $em->tgl}}" required>

                    </div>
                    <div class="form-group">
                        <label >Pengirim</label>
                        <input type="text" name="kirim" class="form-control" value="{{ $em->kirim }}" required>
                    </div>
                    <div class="form-group">
                        <label >Berkas</label>
                        <img src="{{ asset('/storage/'.$em->brkas) }}" alt="{{ $em->brkas }}" style="width: 10px; height:10px">
                        <input type="file" name="brkas" accept="image/*" class="form-control-file" value="{{ $em->brkas }}">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Edit Data</button>
                    </div>
                </form>
            </div>
        </div>
@endsection