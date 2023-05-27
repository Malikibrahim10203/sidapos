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
    <link rel="stylesheet" href="{{asset('css/tabelBalita.css')}}">
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
    <title>Dashboard</title>
</head>
<body>

    <div class="sidebar p-4" id="sidebar">
        <h3 class="mb-5 text-black"><a href="/dashboardadmin">Sidapos</a></h3>
        <h5 class="mt-5">Menu</h5>
        <li>
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Posyandu Anggrek
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/tabelkaderanggrek">Lihat data Kader</a></li>
                    <li><a class="dropdown-item" href="/tabelbalitaadmin/{{ $parameter = 1 }}">Lihat data Balita</a></li>
                    <li><a class="dropdown-item" href="/tabelibuhamiladmin/{{ $parameter = 1 }}">Lihat data Ibu Hamil</a></li>
                </ul>
            </div>
        </li>

        <li>
            <div class="dropdown">
                <a class="btn btn-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Posyandu Mawar
                </a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/tabelkadermawar">Lihat data Kader</a></li>
                    <li><a class="dropdown-item" href="/tabelbalitaadmin/{{ $parameter = 2 }}">Lihat data Balita</a></li>
                    <li><a class="dropdown-item" href="/tabelibuhamiladmin/{{ $parameter = 2 }}">Lihat data Ibu Hamil</a></li>
                </ul>
            </div>
        </li>
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

                <p>
                    <a href="{{url('logout')}}"><i class="bi bi-box-arrow-right"></i>Keluar</a>
                </p>
            </div>
        </nav>
        
    </section>

    <section class="p-4" id="main-content">
    
        <div class="card mt-5">
            <div class="card-body">
                <?php 
                                
                    if ($nama == 1) {
                        echo "<h2>Posyandu Anggrek Balita</h2>";
                    } else if($nama == 2) {
                        echo "<h2>Posyandu Mawar Balita</h2>";
                    }
                ?>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <a href="" class="btn btn-info">Cetak</a>
                <table class="table mt-3">
                    <tr>
                        <th rowspan="2">Nama Lengkap</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">Umur</th>
                        <th colspan="5" style="text-align: center;">IMUNISASI</th>
                    </tr>
                    <tr>
                        <th>BCG</th>
                        <th>Campak</th>
                        <th>DPT HB HIB</th>
                        <th>Hepatitis B</th>
                        <th>Polio</th>
                    </tr>
                    
                    @foreach($tabelbalita as $d)
                    <tr>
                        <td>{{ $d->namalengkap }}</td>
                        <td>{{ $d->alamat }}</td>
                        
                        <?php 
                        
                            $tanggallahir = new DateTime( $d->tanggal_lahir );
                            $sekarang     = new DateTime("today");

                            if($tanggallahir > $sekarang)
                            {
                                $thn = 0;
                                $bln = 0;
                                $hr = 0;
                            }

                            $thn = $sekarang->diff($tanggallahir)->y;
                            $bln = $sekarang->diff($tanggallahir)->m;
                            $hr = $sekarang->diff($tanggallahir)->d;
                        ?>
                        
                        <td><?php echo $thn." tahun ".$bln." bulan ".$hr." hari"; ?></td>
                        <td>
                            <?php
                            
                                if($d->imunisasi_bcg == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>Success</span>";
                                } else if($d->imunisasi_bcg == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_campak == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>Success</span>";
                                } else if($d->imunisasi_campak == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_dpt_hb_hib == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>Success</span>";
                                } else if($d->imunisasi_dpt_hb_hib == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_hepatitis_b == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>Success</span>";
                                } else if($d->imunisasi_hepatitis_b == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_polio == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>Success</span>";
                                } else if($d->imunisasi_polio == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </section>
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
</body>
</html>