<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Login</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="/tampilsearchmovies" method="POST">
                @csrf
                <div class="input-group mt-4">
                    <input type="text" class="form-control" name="cari" placeholder="Masukkan pencarian">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </div>
      
            </form>
        </div>
    </div>
</div>

@if(isset($suratmasuk) && count($suratmasuk) > 0)
<div class="container mt-4">
    <div class="row">
        @foreach ($suratmasuk as $suratmasuks)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('/storage/'. $suratmasuks->brkas) }}" class="card-img-top" alt="{{ $suratmasuks->poster }}" height="200">
                <div class="card-body">
                    <h5 class="card-title">{{ $suratmasuks->nosurat }}</h5>
                    <p class="card-text">{{ $suratmasuks->tgl }}</p>
                    <p class="card-text">{{ $suratmasuks->kirim }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@elseif(isset($suratmasuk))
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <p>No surat found.</p>
        </div>
    </div>
</div>
@endif

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
