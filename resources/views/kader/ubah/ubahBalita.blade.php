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
    <link rel="stylesheet" href="{{asset('css/tambahBalita.css')}}">
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="sidebar p-4" id="sidebar">
        <h3 class="mb-5 text-black">Sidapos</h3>
        <h5 class="mt-5">Menu</h5>
        <li>
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Tambah Data
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tambahbalita">Tambah data Balita</a></li>
                    <li><a class="dropdown-item" href="tambahibuhamil">Tambah data Ibu Hamil</a></li>
                </ul>
            </div>
        </li>

        <li>
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Lihat Data
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="tabelbalita">Lihat data Balita</a></li>
                    <li><a class="dropdown-item" href="tabelibuhamil">Lihat data Ibu Hamil</a></li>
                </ul>
            </div>
        </li>
    </div>

    <section class="p-4" id="nav-content">
        
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <button class="btn btn-light" id="button-toggle">
                    <i class="bi bi-three-dots"></i>
                </button>

                <p>
                    <a href="{{url('logout')}}"><i class="bi bi-box-arrow-right"></i>Keluar</a>
                </p>
            </div>
        </nav>
        
    </section>

    <section class="p-4" id="main-content">
        <div class="container">
            <div class="card mt-5">
                <form action="/updatebalita/{{ $data->idbalita }}" method="POST">
                    <h1 class="h1b">Ubah Balita</h1>
                    @csrf
                    <label for="namalengkap">Nama Lengkap</label>
                    <input type="text" name="namalengkap" placeholder="nama lengkap" class="isian" value="{{ $data->namalengkap }}" required>
                    <br>
                    <br>    
                    <label for="Alamat">Alamat</label>
                    <input type="text" name="alamat" placeholder="alamat" class="isian" value="{{ $data->alamat }}" required>
                    <br>
                    <br>
                    <label for="tanggallahir">Tanggal Lahir</label>
                    <input type="date" name="tanggallahir" placeholder="tanggallahir" class="isian" value="{{ $data->tanggal_lahir }}" required>
                    <br>    
                    <br>     
                    <label for="imunisasi_bcg">Imunisasi BCG</label>
                    <select name="imunisasi_bcg" id="imunisasi_bcg" class="isian">
                        
                            <option value="belum" {{ $data->imunisasi_bcg == 'belum'? 'selected': '' }}>Belum Vaksin</option>
                            <option value="sudah" {{ $data->imunisasi_bcg == 'sudah'? 'selected': '' }}>Sudah Vaksin</option>
                            
                        
                    </select>
                    <br>
                    <br>
                    <label for="imunisasi_campak">Imunisasi Campak</label>
                    <select name="imunisasi_campak" id="imunisasi_campak" class="isian">
                        
                            <option value="belum" {{ $data->imunisasi_campak == 'belum'? 'selected': '' }}>Belum Vaksin</option>
                            <option value="sudah" {{ $data->imunisasi_campak == 'sudah'? 'selected': '' }}>Sudah Vaksin</option>
                            
                        
                    </select>
                    <br>
                    <br>
                    <label for="imunisasi_dpt">imunisasi DPT HB HIB</label>
                    <select name="imunisasi_dpt" id="imunisasi_dpt" class="isian">
                        
                            <option value="belum" {{ $data->imunisasi_dpt_hb_hib == 'belum'? 'selected': '' }}>Belum Vaksin</option>
                            <option value="sudah" {{ $data->imunisasi_dpt_hb_hib == 'sudah'? 'selected': '' }}>Sudah Vaksin</option>
                            
                        
                    </select>
                    <br>
                    <br>
                    <label for="imunisasi_hepatitis">Imunisasi Hepatitis B</label>
                    <select name="imunisasi_hepatitis" id="imunisasi_hepatitis" class="isian">
                        
                            <option value="belum" {{ $data->imunisasi_hepatitis_b == 'belum'? 'selected': '' }}>Belum Vaksin</option>
                            <option value="sudah" {{ $data->imunisasi_hepatitis_b == 'sudah'? 'selected': '' }}>Sudah Vaksin</option>
                            
                        
                    </select>
                    <br>
                    <br>
                    <label for="imunisasi_polio">Imunisasi Polio</label>
                    <select name="imunisasi_polio" id="imunisasi_polio" class="isian">
                        
                            <option value="belum" {{ $data->imunisasi_polio == 'belum'? 'selected': '' }}>Belum Vaksin</option>
                            <option value="sudah" {{ $data->imunisasi_polio == 'sudah'? 'selected': '' }}>Sudah Vaksin</option>
                            
                        
                    </select>
                    <br>
                    <br>
                    <p>
                        <button type="submit" class="btn btn-success mt-3 isian">Ubah Balita</button>
                        <a href="/dashboardkader" class="btn btn-info isian">Kembali</a>
                    </p>
                </form>
            
                
            </div>
        </div>
    </section>
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
</body>
</html>
