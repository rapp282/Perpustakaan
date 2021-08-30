<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Tambah Data</title>
    <style>
        .body{
            background-color: #eeeeee !important;
        }
        #container1{
            margin-top: 50px;
            max-width: 50%;
            padding: 5%;
            height: 500px;
            padding-left: 6%;
            padding-right: 6%;
            padding-bottom: 30%;
        }
    </style>
</head>
<body class="body">
    <div class="container">
        <div class="container-fluid">
        <div id="container1" style="border-radius: 20px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;" class="container bg-white">
        <a href="/table" style="color : grey; text-decoration: none; position:absolute; padding: 15px; margin-top: -45px; margin-left: 400px" class="close"><span><h3>&times;</h3></span></a>
           <center> <h2><b>Edit Data</b></h2></center>
            <form action="/update/{{$buku -> id}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
                <label for="" class="form-label mt-3 mb-1">Nama Buku</label>
                <input type="text" placeholder="Masukan nama buku.." name="nama_buku" class="form-control" required>
                @if ($errors->has('nama_buku'))
                    <div class="text-danger">
                        {{$errors->first('nama_buku')}}
                    </div>
                @endif
                <label for="" class="form-label mt-3 mb-1">Penerbit</label>
                <input type="text" placeholder="Masukan penerbit.." name="penerbit" class="form-control" required>
                @if ($errors->has('penerbit'))
                    <div class="text-danger">
                        {{$errors->first('penerbit')}}
                    </div>
                @endif
                <label for="" class="form-label mt-3 mb-1">Deskripsi</label>
                <input type="text" placeholder="Masukan deskripsi.." name="deskripsi" class="form-control" required>
                @if ($errors->has('deskripsi'))
                    <div class="text-danger">
                        {{$errors->first('deskripsi')}}
                    </div>
                @endif
                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary mt-4" style="padding-left: 181px; padding-right: 181px;">
            </form>
        </div>
        </div>
    </div>
</body>
</html>
