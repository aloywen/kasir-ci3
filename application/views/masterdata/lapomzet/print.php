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
        <div class="col-md-2"><h5>Tanggal</h5></div>
        <div class="col-md-1.5"><h5>:</h5></div>
        <div style="width:155px"><h5 class="text-left ml-2"><?php date_default_timezone_set('Asia/Jakarta'); 
    echo date('d-m-Y', strtotime($tgl));
    ?></h5></div>
    </div>
    <br>

    <br>

    
    <table style="margin-top:-15px; margin-left:10px">
            <thead>
                <tr>
                    <td style="width:50px">No</td>
                    <td style="width:150px">No. Nota</td>
                    <!-- <td style="width:250px">Tanggal</td> -->
                    <td style="width:100px">Kasir</td>
                    <td style="width:100px" class="text-center">Nominal</td>
                </tr>
            </thead>
        </table>
        <hr class="g" style="width:410px;text-align:left;margin-left:0; margin-top:3px">
        <hr class="g" style="width:410px;text-align:left;margin-left:0;margin-top:-12px">
        
        <table style="margin-top:-17px; margin-left:10px">
            <tbody style="padding-top:3px"> 
                <?php $i = 1 ?>
                <?php foreach ($transaksi as $t) : ?>
                <tr>
                    <td style="width:50px"><?= $i ?></td>
                    <td style="width:150px""><h6><?= $t['no_nota'] ?></h6></td>
                    <!-- <td style="width:250px"><?= $t['tgl'] ?></td> -->
                    <td style="width:100px"><?= $t['admin'] ?></td>
                    <td style="width:100px; margin-right:15px !important" class="text-right mr-1"><?= number_format($t['grand_total'],0,',','.'); ?></td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
                
            </tbody>
            <tfoot>
                <!-- <hr class="g" style="width:100%;text-align:left;margin-left:0;margin-top:-12px"> -->
                <tr style="margin-top:10px !important">
                    <td style="margin-top:10px !important" colspan="3" >GRAND TOTAL</td>
                    <td class="text-center" colspan="2">Rp. <?= number_format($grand_total['grand_total'],0,',','.'); ?></td>
                    <!-- <td colspan="2" class="text-right"><?= number_format($grand_total['grand_total'],0,',','.'); ?></td> -->
                    <!-- <hr class="g"> -->
                </tr>
            </tfoot>
            <!-- <hr class="g"> -->
        </table>
        <hr class="g" style="width:410px;text-align:left;margin-left:0;margin-top:-26px">
        <hr class="g" style="width:410px;text-align:left;margin-left:0;margin-top:30px">
  


    
    <script>
        my()

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