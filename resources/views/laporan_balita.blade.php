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
    <script src="{{asset('js/dashboardAdmin.js')}}"></script>
    <style>

        table {
            border-left: 0.01em solid #ccc;
            border-right: 0;
            border-top: 0.01em solid #ccc;
            border-bottom: 0;
            border-spacing: 0;
        }
        table td,
        table th {
            border-left: 0;
            border-right: 0.01em solid #ccc;
            border-top: 0;
            border-bottom: 0.01em solid #ccc;
        }

        body {
            text-align: center;
        }
    
    </style>
    <title>Document</title>
</head>
<body>
    
    @foreach($pos as $p)
        <h2>Laporan Bulanan</h2>
        <h3>Data Balita Posyandu {{ $p->pos }} Wilayah Desa Ilir</h3>
    @endforeach
    <table align="center" class="mt-3">
        <tr class="judul">
            <th rowspan="2">No</th>
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
        <?php $no = 1;?>
        @foreach($tabelbalita as $d)
        <tr class="field">
            <td><?php echo $no;?></td>
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
                        echo "Sudah";
                    } else if($d->imunisasi_bcg == 'belum') {
                        echo "Belum";
                    }
                ?>
            </td>
            <td>
                <?php
                    
                    if($d->imunisasi_campak == 'sudah')
                    {
                        echo "Sudah";
                    } else if($d->imunisasi_campak == 'belum') {
                        echo "Belum";
                    }
                ?>
            </td>
            <td>
                <?php
                    
                    if($d->imunisasi_dpt_hb_hib == 'sudah')
                    {
                        echo "Sudah";
                    } else if($d->imunisasi_dpt_hb_hib == 'belum') {
                        echo "Belum";
                    }
                ?>
            </td>
            <td>
                <?php
                    
                    if($d->imunisasi_hepatitis_b == 'sudah')
                    {
                        echo "Sudah";
                    } else if($d->imunisasi_hepatitis_b == 'belum') {
                        echo "Belum";
                    }
                ?>
            </td>
            <td>
                <?php
                    
                    if($d->imunisasi_polio == 'sudah')
                    {
                        echo "Sudah";
                    } else if($d->imunisasi_polio == 'belum') {
                        echo "Belum";
                    }
                ?>
            </td>
            <td>{{ $d->kelamin }}</td>
        </tr>
        <?php $no++;?>
        @endforeach
    </table>
    
</body>
</html>




