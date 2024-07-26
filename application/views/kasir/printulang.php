<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
    <style>
        body {
            width: 303px;
        }
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
<body>

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

    <h6>KANTIN RS</h6>
    <h6 class="re"><?php date_default_timezone_set('Asia/Jakarta'); 
            echo date('d F Y')
            ?></h6>

    <h6 class="text-right">No : <?= $transaksi['no_nota'] ?></h6>

    <hr class="g">
    <div class="row ">
        <h6 class="col-md-1">No.</h6>
        <h6 class="col-md-5">Keterangan</h6>
        <h6 class="col-md-5">Jumlah (Rp)</h6>
    </div>
    <hr class="g">
    <?php $no = 1;
    ?>
    <?php foreach ($item_penjualan as $r) : ?>
        <div class="row is">
            <h6 class="col-md-1"><?= $no++ ?></h6>
            <h6 class="col-md-6"><?= $r['nama']; ?></h6>
            <h6 class="col-md-4">Rp <?= number_format($r['total_harga'],0,',','.'); ?></h6>
        </div>
    <?php endforeach; ?>
    
    
    <hr class="g">
    <div class="row tes">
        <h6 class="col-md-6">Total :</h6>
        <h6 class="col-md-1"></h6>
        <h6 class="col-md-4">Rp <?= number_format($transaksi['grand_total'],0,',','.'); ?></h6>
    </div>
    <hr class="g">
    <div class="row tes">
        <h6 class="col-md-6">Tunai :</h6>
        <h6 class="col-md-1"></h6>
        <h6 class="col-md-4">Rp <?= number_format($transaksi['bayar'],0,',','.'); ?></h6>
    </div>
    <br>
    <div class="row tes">
        <h6 class="col-md-6">Kembali :</h6>
        <h6 class="col-md-1"></h6>
        <h6 class="col-md-4">Rp <?= number_format($transaksi['kembali'],0,',','.'); ?></h6>
    </div>
    <hr class="g">

    <div class="row">
        <div class="col-md-6">
            <h6>Kasir : <?php echo $transaksi['admin'];  ?> </h6>

        </div>
    </div>



    <script>
        // my()

        function my() {
            window.print();
        }

        window.onafterprint = function () {
            closePrintView()
        }

        function closePrintView() {
            window.location.href =  'http://localhost/kasir/kasir/penjualan'
        }
    </script>
    </body>
</html>