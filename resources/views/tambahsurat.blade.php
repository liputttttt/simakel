@extends('layouts.main')

@section('title', 'Tambah Surat')    
@section('content')
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <form action="/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Nomor surat</label>
                        <input type="text" name="nosurat" class="form-control" placeholder="Masukan Nomor Surat" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tgl" class="form-control" placeholder="Masukan Tanggal Surat Masuk" required>

                    </div>
                    <div class="form-group">
                        <label >Pengirim</label>
                        <input type="text" name="kirim" class="form-control" placeholder="Masukan Pengirim" required>
                    </div>
                    <div class="form-group">
                        <label >Berkas</label>
                        <input type="file" name="brkas" accept="image/*" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
@endsection