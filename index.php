<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Menambahkan library Highcharts -->
    <script src="highcharts/highcharts.js"></script>
    <script src="highcharts/modules/exporting.js"></script>
    <script src="highcharts/modules/export-data.js"></script>
</head>
<body>
    <div id="grafik_batang" style="min-width: 310px; height: 400px; margin: 0 auto; margin-top: 30px;"></div>
    
    <?php   
            // file koneksi php
            $server = "localhost";
            $username = "root";
            $password = "";
            $database = "transaksiweb";
            $koneksi= mysqli_connect($server,$username,$password,$database) or die("Koneksi gagal");
            if(mysqli_connect_errno()){
                echo 'gagal terhubung';
            }
    ?>

<!-- Script untuk membuat grafik batang -->
<script type="text/javascript">
    Highcharts.chart({
        chart: {
            renderTo: 'grafik_batang',
            type: 'column'
        },
        title: {
            text: 'Penjualan Material Bahan'
        },
        subtitle: {
            text: 'Dalam 3 bulan terakhir'
        },
        xAxis: {
            categories: [
                'Agustus',
                'September',
                'Oktober'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} Penjualan</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [
            <?php
            function getTotalLaku($koneksi, $nama_bahan, $tanggal_awal, $tanggal_akhir){
                $sql = "SELECT * FROM ".$nama_bahan." WHERE tanggal_penjualan BETWEEN '".$tanggal_awal."' AND '".$tanggal_akhir."'";
                $query = mysqli_query($koneksi, $sql) or die(mysqli_error());
                $total_laku = 0;
                while($hasil = mysqli_fetch_array($query)){
                    $jumlah_laku = $hasil['jumlah_laku'];
                    $total_laku += $jumlah_laku;
                }
                return $total_laku;   
            }

            function getTotalTigaBulan($koneksi, $tabel){
                $array = array(
                    getTotalLaku($koneksi, $tabel, '2020-08-01', '2020-08-31'),
                    getTotalLaku($koneksi, $tabel, '2020-09-01', '2020-09-30'),
                    getTotalLaku($koneksi, $tabel, '2020-10-01', '2020-10-31')
                );

                return $array;
            }
            
            for($n=1; $n<=4; $n++){
                switch ($n){
                    case 1:
                        ?>
                        {
                        name: 'cat',
                        data : [
                            <?php echo getTotalTigaBulan($koneksi, 'cat')[0]; ?>,
                            <?php echo getTotalTigaBulan($koneksi, 'cat')[1]; ?>, 
                            <?php echo getTotalTigaBulan($koneksi, 'cat')[2]; ?> 
                        ]
                        },<?php
                    break;
                    case 2:
                        ?>
                        {
                        name: 'kayu',
                        data : [
                            <?php echo getTotalTigaBulan($koneksi, 'kayu')[0]; ?>,
                            <?php echo getTotalTigaBulan($koneksi, 'kayu')[1]; ?>, 
                            <?php echo getTotalTigaBulan($koneksi, 'kayu')[2]; ?> 
                        ]
                        },<?php
                    break;
                    case 3:
                        ?>
                        {
                        name: 'pipa',
                        data : [
                            <?php echo getTotalTigaBulan($koneksi, 'pipa')[0]; ?>,
                            <?php echo getTotalTigaBulan($koneksi, 'pipa')[1]; ?>, 
                            <?php echo getTotalTigaBulan($koneksi, 'pipa')[2]; ?> 
                        ]
                        },<?php
                    break;
                    case 4:
                        ?>
                        {
                        name: 'semen',
                        data : [
                            <?php echo getTotalTigaBulan($koneksi, 'semen')[0]; ?>,
                            <?php echo getTotalTigaBulan($koneksi, 'semen')[1]; ?>, 
                            <?php echo getTotalTigaBulan($koneksi, 'semen')[2]; ?> 
                        ]
                        },<?php
                    break;
                    default:
                        ?><?php echo "Koneksi Bermasalah"; ?><?php
                    break;
                }
            }            
            ?>

            // {
            //     name: 'Fakultas Ilmu Komputer',
            //     data: [515,540,610]

            // }, {
            //     name: 'Fakultas Ekonomi',
            //     data: [530,567,613]

            // }, {
            //     name: 'Fakultas Kesehatan',
            //     data: [340,360,395]

            // }, {
            //     name: 'Fakultas Pertanian',
            //     data: [200,230,180]

            // },  {
            //     name: 'Fakultas KIP',
            //     data: [370,420,450]

            // }
        ]
    });
</script>
</body>
</html>