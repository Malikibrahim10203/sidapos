<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('css/dashboardAdmin.css')}}">
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
    
    <title>{{ $head }}</title>
</head>
<body>
    <div class="sidebar p-4" id="sidebar">
        <h3 class="mb-5 text-black"><a href="/dashboardadmin">Sidapos</a></h3>
        <div class="menu">
            <h5 class="mt-5"> <i class="bi bi-list"></i> Menu</h5>
        </div>
        <li>
            <a href="tampiltambahkader" class="btn btn-light">
                <i class="bi bi-person-plus mr-2"></i>
                Tambah data Kader  
            </a>
        </li>
    </div>

    <section class="p-4" id="nav-content">
        
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="btn btn-light" id="button-toggle">
                    <i class="bi bi-three-dots"></i>
                </button>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Keluar
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Peringatan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <a href="{{url('logout')}}" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i>Keluar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="p-4" id="main-content">

        <div class="container mt-2 salam">
            <div class="card">
                <div class="card-body">
                    <div class="judul-atas">
                        <div class="judul-dashboard">
                            <h2><strong>SELAMAT DATANG</strong>, {{ $data }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="menu-atas">

                <div class="card mt-3">
                    <div class="card-body status">
                        <div class="card item menu-kader" style="width: 18rem;">
                            <div class="card-body jarak">
                                <div class="icon">
                                    <h5 class="card-title">Kader Posyandu Anggrek</h5>
                                    <img src="{{ asset('img/member.png') }}" class="mt-3 icon">
                                    <h1 class="mt-3">{{ $kaderanggrek }}</h1>
                                </div>
                                <br>
                            </div>
                        </div>

                        <div class="card item menu-kader" style="width: 18rem;">
                            <div class="card-body jarak">
                                <div class="icon">
                                    <h5 class="card-title">Kader Posyandu Mawar</h5>
                                    <img src="{{ asset('img/member.png') }}" class="mt-3 icon">
                                    <h1 class="mt-3"> {{ $kadermawar }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body status">
                    <div class="card item menu-posyandu" style="width: 18rem;">
                        <div class="card-body jarak">
                            <div class="box-posyandu">
                                <h5 class="card-title">Kader Posyandu Anggrek</h5>
                                <div class="dropdown">
                                    <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-hospital"></i>
                                        Posyandu Anggrek
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/tabelkaderadmin/{{ $parameter = 1}}"> <i class="bi bi-eye"></i> Lihat data Kader</a></li>
                                        <li><a class="dropdown-item" href="/tabelbalitaadmin/{{ $parameter = 1 }}"> <i class="bi bi-eye"></i> Lihat data Balita</a></li>
                                        <li><a class="dropdown-item" href="/tabelibuhamiladmin/{{ $parameter = 1 }}"> <i class="bi bi-eye"></i> Lihat data Ibu Hamil</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card item menu-posyandu" style="width: 18rem;">
                        <div class="card-body jarak">
                            <div class="box-posyandu">
                                <h5 class="card-title">Kader Posyandu Mawar</h5>
                                <div class="dropdown">
                                    <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-hospital"></i>
                                        Posyandu Mawar
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="/tabelkaderadmin/{{ $parameter = 2}}"> <i class="bi bi-eye"></i> Lihat data Kader</a></li>
                                        <li><a class="dropdown-item" href="/tabelbalitaadmin/{{ $parameter = 2 }}"> <i class="bi bi-eye"></i> Lihat data Balita</a></li>
                                        <li><a class="dropdown-item" href="/tabelibuhamiladmin/{{ $parameter = 2 }}"> <i class="bi bi-eye"></i> Lihat data Ibu Hamil</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
</body>
</html>