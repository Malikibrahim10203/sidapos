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
        <div class="menu">
            <h5 class="mt-5"> <i class="bi bi-list"></i> Menu</h5>
        </div>
        <li>
            <a href="/dashboardadmin" class="btn btn-light">
                <i class="bi bi-house"></i>
                Halaman Utama
            </a>
        </li>
        <li>
            <a href="/tampiltambahkader" class="btn btn-light">
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
                    <a href="{{url('logout')}}" class="btn btn-danger"><i class="bi bi-box-arrow-right"></i>Keluar</a>
                </p>
            </div>
        </nav>
        
    </section>

    <section class="p-4" id="main-content">
    
        <div class="card mt-5">
            <div class="card-body">
                <?php 
                                
                    if ($nama == 1) {
                        echo "<h2 style='color: #27374D;'>Posyandu Anggrek Balita</h2>";
                    } else if($nama == 2) {
                        echo "<h2 style='color: #27374D;'>Posyandu Mawar Balita</h2>";
                    }
                ?>
            </div>
        </div>

        <div class="card mt-2">
            <div class="card-body">

                <?php 

                    $date = date('m');
                    $bulan = $date;
                ?>

                <?php 
                // $temp = $_COOKIE['kirim'];

                if(isset($_GET['bulan'])) {
                    $bulan = $_GET['bulan'];
                } else {
                    $bulan = 01;
                }
                ?>

                <div class="menu-filter">
                    <select id="filterbulan" class="form-select d-flex me-2">
                        <option value="01" {{ $bulan == '01'? 'selected': '' }}>
                            
                            Januari
                        </option>
                        <option value="02" {{ $bulan == '02'? 'selected': '' }}>
                            
                            Februari
                        </option>
                        <option value="03" {{ $bulan == '03'? 'selected': '' }}>
                            
                            Maret
                        </option>
                        <option value="04" {{ $bulan == '04'? 'selected': '' }}>
                            
                            April
                        </option>
                        <option value="05" {{ $bulan == '05'? 'selected': '' }}>
                            
                            Mei
                        </option>
                        <option value="06" {{ $bulan == '06'? 'selected': '' }}>
                            
                            Juni
                        </option>
                        <option value="07" {{ $bulan == '07'? 'selected': '' }}>
                            
                            Juli
                        </option>
                        <option value="08" {{ $bulan == '08'? 'selected': '' }}>
                            
                            Agustus
                        </option>
                        <option value="09" {{ $bulan == '09'? 'selected': '' }}>
                            
                            September
                        </option>
                        <option value="10" {{ $bulan == '10'? 'selected': '' }}>
                            
                            Oktober
                        </option>
                        <option value="11" {{ $bulan == '11'? 'selected': '' }}>
                            
                            November
                        </option>
                        <option value="12" {{ $bulan == '12'? 'selected': '' }}>
                            
                            Desember
                        </option>
                    </select>
                    <a href="/exportbalita/{{ $nama }}/{{ $bulan }}" id="kirim" class="btn btn-info cetak"> <i class="bi bi-printer"></i> Cetak</a>
                </div>

                <script>

                    document.getElementById('filterbulan').addEventListener('change', function() {
                        var isi = this.value;
                        location.replace(window.location.href.split('?')[0]+'?bulan='+isi);
                    });
                </script>

                <table class="table mt-3 table-bordered">
                    <tr class="judul">
                        <th rowspan="2">Nama Lengkap</th>
                        <th rowspan="2">Alamat</th>
                        <th rowspan="2">Umur</th>
                        <th colspan="5" style="text-align: center;">IMUNISASI</th>
                        <th rowspan="2">Jenis Kelamin</th>
                    </tr>
                    <tr class="judul">
                        <th>BCG</th>
                        <th>Campak</th>
                        <th>DPT HB HIB</th>
                        <th>Hepatitis B</th>
                        <th>Polio</th>
                    </tr>
                    
                    @foreach($tabelbalita as $d)
                    <tr class="field">
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
                        
                        <td>
                            <?php 

                                if($thn == 0 && $bln != 0 && $hr != 0) {
                                    echo $bln." bulan ".$hr." hari";
                                } else if ($thn == 0 && $bln == 0) {
                                    echo $hr." hari";
                                } else {
                                    echo $thn." tahun ".$bln." bulan ".$hr." hari";
                                }
                            
                            ?>
                        </td>
                        <td>
                            <?php
                            
                                if($d->imunisasi_bcg == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>sudah</span>";
                                } else if($d->imunisasi_bcg == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_campak == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>sudah</span>";
                                } else if($d->imunisasi_campak == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_dpt_hb_hib == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>sudah</span>";
                                } else if($d->imunisasi_dpt_hb_hib == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_hepatitis_b == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>sudah</span>";
                                } else if($d->imunisasi_hepatitis_b == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>
                            <?php
                                
                                if($d->imunisasi_polio == 'sudah')
                                {
                                    echo "<span class='badge text-bg-success'>sudah</span>";
                                } else if($d->imunisasi_polio == 'belum') {
                                    echo "<span class='badge text-bg-warning'>belum</span>";
                                }
                            ?>
                        </td>
                        <td>{{ $d->kelamin}}</td>
                    </tr>
                    @endforeach
                </table>
                {{ $tabelbalita->links() }}
            </div>
        </div>
    </section>
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
</body>
</html>