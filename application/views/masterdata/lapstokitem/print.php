<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok Obat</title>

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
<div class="row">
    <div class="col-md-8">
      

    <div class="text-center">

    <?php
                                date_default_timezone_set('Asia/Jakarta');
                        ?>
        <h6 class="mt-4">KLINIK DHARMA BHAKTI</h5>
        <h5 style="margin-top:-8px">Jl. Raya Sumber Jaya No.18 Tambun - Bekasi</h5>
        <h4 style="letter-spacing:5.5px;margin-top:-9px">Laporan Omzet & Stok Obat</h4>
        <h5 style="margin-top:-8px"><?= date('d-m-Y G:i:s');?></h5>
        <hr class="g" style="width:700px;text-align:left;margin-left:0;">
        <!-- <hr class="g" style="width:700px;text-align:left;margin-left:0;margin-top:-12px"> -->
    </div>
     
    
        <table style="margin-top:-15px; margin-left:10px">
            <thead>
                <tr>
                    <td style="width:50px">No</td>
                    <td style="width:140px">Kode</td>
                    <td style="width:350px">Nama Obat</td>
                    <td style="width:100px">Qty-Jual</td>
                    <td style="width:100px">Qty-Stok</td>
                    <td style="width:100px">Satuan</td>
                </tr>
            </thead>
        </table>
        <hr class="g" style="width:700px;text-align:left;margin-left:0; margin-top:3px">
        <!-- <hr class="g" style="width:700px;text-align:left;margin-left:0;margin-top:-12px"> -->
        
        <table style="margin-top:-17px; margin-left:10px">
            <tbody>
                <?php $i = 1 ?>
                <?php foreach ($obat as $o) : ?>
                <tr>
                    <td style="width:50px"><?= $i ?></td>
                    <td style="width:140px"><?= $o['kode_obat'] ?></td>
                    <td style="width:350px"><?= $o['nama'] ?></td>
                    <td style="width:100px"><?= $o['totalObat'] ?></td>
                    <td style="width:100px"><?= $o['stok'] ?></td>
                    <td style="width:100px"><?= $o['jenis'] ?></td>
                    <?php $i++ ?>
                    <?php endforeach ?>
                </tr>
            </tbody>
        </table>
  
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
            window.location.href =  'http://localhost/klinik/masterdata/lapstokobat'
        }
    </script>
    </body>
</html>