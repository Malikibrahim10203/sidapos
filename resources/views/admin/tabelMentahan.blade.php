<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/dashboardAdmin.css')}}">
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="sidebar p-4" id="sidebar">
        <h3 class="mb-5 text-black">Sidapos</h3>
        <h5 class="mt-5">Menu</h5>
        <li>
            <a href="">
                <i class="bi bi-list mr-2"></i>
                Daftar Posyandu  
            </a>
        </li>
        <li>
            <a href="tambahkader">
                <i class="bi bi-person-plus mr-2"></i>
                Tambah data Kader  
            </a>
        </li>
    </div>

    <section class="p-4" id="nav-content">
        
        <nav class="navbar navbar-expand-lg">
            <button class="btn btn-light" id="button-toggle">
                <i class="bi bi-three-dots"></i>
            </button>
        </nav>
        
    </section>

    <section class="p-4" id="main-content">
        <div class="card mt-5">
            <div class="card-body">
                <a href="" class="btn btn-info">Cetak</a>
                <table class="table mt-2">
                    <tr>
                        <th>Nama Balita</th>
                        <th>Alamat</th>
                        <th>Umur</th>
                        <th>Status Imunisasi</th>
                    </tr>
                    <tr>
                        <td>Malik Ibrahim</td>
                        <td>Surabaya, jl.sutomo</td>
                        <td>2</td>
                        <td>Sudah</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
</body>
</html>