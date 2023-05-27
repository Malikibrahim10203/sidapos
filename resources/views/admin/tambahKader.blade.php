<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('css/tambahKader.css')}}" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Sidapos</title>
</head>
<body>
    <div class="container mt-3">
        <div class="right">
            <h1 class="h1a">Sidapos</h1>
            <img src="{{asset('img/tambahkader.png')}}" alt="">
            @if( session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="login">
            <h1 class="h1b">Tambah Kader</h1>
            <form action="simpan" method="post">
                @csrf
                <label for="namalengkap">Nama Lengkap</label>
                <input type="text" name="namalengkap" placeholder="nama lengkap" class="isian">
                <br>    
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="example" class="isian">
                <br>
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="example@exam.com" class="isian">
                <br>         
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="password" class="isian">
                <br>
                <label for="pos">Pos</label>
                <select name="pos" id="po" class="isian">
                    @foreach($dataposyandu as $data)
                        <option value="{{ $data->idposyandu }}">{{ $data->pos }}</option>
                    @endforeach
                </select>
                <br>
                <p>
                    <button type="submit" class="btn btn-success mt-3 isian">Tambah Kader</button>
                    <a href="dashboardadmin" class="btn btn-info isian">Kembali</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>