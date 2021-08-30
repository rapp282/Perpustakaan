<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Website Perpustakaan</title>
    <style>
        body{
            background-color: whitesmoke
        }
        #left-bar{
            position: sticky;
            background-color: #6059f7;
            height: 595px;
            width: 205px;
            margin-left: -12px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            z-index: 100;
        }
        #nav-bar{
            position: absolute;
            margin-top: -600px;
            margin-left: 194px;
            height: 70px;
            width: 1070px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
            z-index: 1;
        }
        #bar{
            background-color: whitesmoke;
            position: absolute;
            margin-top: -515px;
            height: 170px;
            width: 330px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            z-index: 1;
            border-radius: 10px
        }
        #bar-bot{
            background-color: whitesmoke;
            position: absolute;
            margin-top: -515px;
            height: 500px;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            z-index: 0;
            border-radius: 10px;
            width: 1025px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div id="left-bar" class="container-fluid text-light">
            <h4 class="fw-bold" style="padding-top:10px; padding-left:11px;">Perpustakaan</h4>
            <hr class="my-4">
            <a href="/dashboard" class="fw-bold text-light" style="text-decoration: none;padding-left:11px;">&#9751; Dashboard</a><br>
            <hr class="my-4">
            <a href="/table" class="fw-bold text-light" style="text-decoration: none;padding-left:11px;">&#9780; Table</a><br><br>
            <a href="/info" class="fw-bold text-light" style="text-decoration: none;padding-left:11px;">&#128712; Info</a><br>
        </div>
        <div id="nav-bar" class="container-fluid bg-light">
            <a href="#" class="fw-bold text-dark" style="position:absolute; text-decoration:none; margin-left:980px;font-size:20px;margin-top:15px; font-size:30px">&#9993;</a>
        </div>
        <div id="bar-bot" class="container-fluid bg-light" style=" margin-left: 220px;">
            <h4 class="fw-bold" style="padding-top:10px;padding-left:10px">Daftar buku</h4>
            <a class="btn btn-primary mb-2" style="margin-left:95%;margin-top:-50px" href="/tambah"><b>&#10010;</b></a>
            <table class="table table-responsive table-hover table-striped">
                <thead>
                    <th>Nama Buku</th>
                    <th>Penerbit</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Masuk</th>
                    <th><center>Opsi</center></th>
                </thead>
                <tbody>
                    @foreach ($buku as $b)
                        <tr>
                            <td>{{$b -> nama_buku}}</td>
                            <td>{{$b -> penerbit}}</td>
                            <td>{{$b -> deskripsi}}</td>
                            <td>{{$b -> created_at}}</td>
                            <td>
                                <center><a href="/edit/{{$b->id}}" class="btn btn-warning">Edit</a>
                                <a href="/hapus/{{$b->id}}" class="btn btn-danger">Hapus</a></center>
                            </td>
                        </tr>
                    @endforeach
        </div>
    </div>
</body>
</html>
