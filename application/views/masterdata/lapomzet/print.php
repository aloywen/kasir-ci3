<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAPORAN OMZET</title>

    <style>
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

    <h4 class="mt-4" style="letter-spacing:6.5px">KANTIN RS</h5>
    <h5 style="margin-left:100px">LAPORAN OMZET</h5>
    <hr class="g" style="width:410px;text-align:left;margin-left:0;">
    <hr class="g" style="width:410px;text-align:left;margin-left:0;margin-top:-12px">


    <div class="row">
        <div class="col-md-3"><h5>Kasir</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:175px"><h5 class="ml-2"><?= $transaksi['admin'] ?></h5></div>
    </div>
    <div class="row">
        <div class="col-md-3"><h5>Tanggal</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:155px"><h5 class="text-left ml-2"><?php date_default_timezone_set('Asia/Jakarta'); 
    echo date('d-m-Y', strtotime($transaksi["tgl"]));
    ?></h5></div>
    </div>
    <br>
    
    <div class="row">
        <div class="col-md-3"><h5>Total Omzet</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:105px"><h5 class="text-right"><?= number_format($grand_total['grand_total'],0,',','.'); ?></h5></div>
    </div>

    <br>

    <div class="row">
        <div class="col-md-3"><h5>Omzet Kredit</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:105px"><h5 class="text-right"><?= number_format(0,0,',','.'); ?></h5></div>
    </div>
    <div class="row">
        <div class="col-md-3"><h5>Omzet Credit Card</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:105px"><h5 class="text-right"><?= number_format(0,0,',','.'); ?></h5></div>
    </div>
    <div class="row">
        <div class="col-md-3"><h5>Omzet Debet Card</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:105px"><h5 class="text-right"><?= number_format(0,0,',','.'); ?></h5></div>
    </div>
    <div class="row">
        <div class="col-md-3"><h5>Omzet Smart Debet Card</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:105px"><h5 class="text-right"><?= number_format(0,0,',','.'); ?></h5></div>
    </div>
    
    <br>
    

    <hr class="g" style="width:150px;text-align:left;margin-left:200px;">
    <hr class="g" style="width:150px;text-align:left;margin-left:200px;margin-top:-12px">

    <div class="row">
        <div class="col-md-3 d-flex justify-content-between"><h5>Uang Dalam Kas</h5> <h5 class="text-right">Rp</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:105px"><h5 class="text-right"><?= number_format($transaksi['total']+$transaksi['mcu'],0,',','.'); ?></h5></div>
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
            window.location.href =  'http://localhost/kasir/masterdata/lapomzet'
        }
    </script>
    </body>
</html>