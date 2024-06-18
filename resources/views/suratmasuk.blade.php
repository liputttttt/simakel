@extends('layouts.main')

@section('title', 'Halaman Surat')    
@section('content')
 <div class="card">
    <div class="card-header">
        <a href="/tambahsurat" class="btn btn-primary">Tambah Surat</a>
    </div>
    <div class="card-body">
        @if(session('alert'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('alert') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    <div class="card-body">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Pengirim</th> 
                <th>Berkas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($suratmasuk as $idx => $m)
            <tr>
                <td>{{ $idx + 1}}</td>
                <td>{{ $m->nosurat }}</td>
                <td>{{  $m->tgl }}</td>
                <td>{{  $m->kirim }}</td>      
                <td><img src="{{ asset('/storage/'.$m->brkas) }}" alt="{{ $m->brkas }}"style="width: 70px; height:70px"></td>
                <td><a href="/movies/edit/{{ $m->id }}" class="btn btn-primary">Edit</a>
                    <a href="/delete/{{ $m->id }}" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            @endforeach

        </tbody>

        <tfoot>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal</th>
                <th>Pengirm</th>
                <th>Berkas</th>
                <th>Aksi</th>
            </tr>
            
        </tfoot>
    </table>
    </div>
 </div>
@endsection