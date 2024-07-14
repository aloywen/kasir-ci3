<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <style>
        .tes {
            margin-top: -10px;
            margin-bottom: -12px;
        }
        .re {
            margin-top: -7px;
            margin-bottom: -1px;
        }
        .is {
            margin-top: -7px;
        }
        .iss {
            margin-top: -7px;
            margin-bottom: -10px;
        }
        hr.g{
          border-top: 2px dashed black;
        }
    </style>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">

</head>
<body class="px-5">

<?php

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " BELAS";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." PULUH". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " SERATUS" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " RATUS" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " SERIBU" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " RIBU" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " JUTA" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " MILYAR" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " TRILYUN" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "MINUS ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil;
}

?>

    <h5>KANTIN RS</h5>
    <h5 class="re">Jl. Raya Sumber Jaya No.18 Tambun - Bekasi</h5>
    <h5>Telp. 021 22162106
        <!-- <?php date_default_timezone_set('Asia/Jakarta'); 
    echo date('h:i:s')?> -->
    </h5>

    <h5 class="text-right">No Nota : <?= $transaksi['no_nota'] ?></h5>
    <h4 class="text-center">N O T A</h4>

    <hr class="g">
    <div class="row tes">
        <h5 class="col-md-2">No.</h5>
        <h5 class="col-md-6">Keterangan</h5>
        <h5 class="col-md-3">Jumlah (Rp)</h5>
    </div>
    <hr class="g">
    <?php $no = 1;
    // var_dump($jasa );
    ?>
    <?php foreach ($item_penjualan as $r) : ?>
        <div class="row is">
            <h5 class="col-md-2"><?= $no++ ?></h5>
            <h5 class="col-md-6"><?= $r['nama']; ?></h5>
            <h5 class="col-md-3">Rp <?= number_format($r['total_harga'],0,',','.'); ?></h5>
        </div>
    <?php endforeach; ?>
    
    <!-- <?php
    var_dump($total_obat);
    if($total_obat['total_harga'] == null){
        echo " ";
    }else{
        echo "<div class='row iss'>";
        echo "<h5 class='col-md-2'></h5>";
        echo "<h5 class='col-md-6'>OBAT-OBATAN</h5>";
        echo "<h5 class='col-md-3'>Rp ".number_format($total_obat['total_harga'],0,',','.'); "</h5>";
        echo "</div>";
    }
    ?> -->
    
    <hr class="g">
    <div class="row tes">
        <h5 class="col-md-2">Total Biaya</h5>
        <h5 class="col-md-6"></h5>
        <h5 class="col-md-3">Rp <?= number_format($transaksi['grand_total'],0,',','.'); ?></h5>
    </div>
    <hr class="g">

    <h5 class="re">Terbilang : ##<?= terbilang($transaksi['grand_total']) ?> RUPIAH##</h5>

    <div class="row">
        <div class="col-md-6">
            <h5 class="text-center">Bekasi, <?php date_default_timezone_set('Asia/Jakarta'); 
            echo date('d F Y')
            ?></h5>
            <br>
            <br>
            <br>
            <h5 class="text-center"> <?php if($transaksi == null){
                echo '';
            } else { echo $transaksi['admin']; }  ?> </h5>

        </div>
    </div>



    <script>
        my()

        function my() {
            window.print();
        }

        window.onafterprint = function () {
            closePrintView()
        }

        function closePrintView() {
            window.location.href =  'http://localhost/kasir/kasir'
        }
    </script>
    </body>
</html>