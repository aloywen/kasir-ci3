<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Fee Dokter</title>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">

    <style>
        .min {
            margin-top: 0px
        }
        .as {
            margin-top: 0px
        }
        .s {
            margin-top: 0px
        }
        .k {
            margin-top: 0px
        }
        .d {
            margin-left: 0px;
        }
        .bawah {
            margin-top: -13px !important;
        }
        hr.g{
          border-top: 2px dashed black;
        }
    </style>
</head>
<body class="p-4">
    
    <h5 class="font-monospace">KLINIK DHARMA BHAKTI</h5>
    <h5 class="l">Jl. Raya Sumber Jaya No.18 Tambun - Bekasi</h5>
    <div class="d-flex">
        <h4 class="d">S L I P</h4>
        <h4 class="mx-3"> F E E </h4>
        <h4>D O K T E R</h4>
    </div> 

    <div class="row k">
        <h5 class="col-md-2">Nama</h5>
        <h5 class="col-md-1.5">:</h5>
        <h5 class="col-md-2"><?= $dokter['nama_dokter'] ?></h5>
        <h5 class="col"></h5>
    </div>
    <div class="row k">
        <h5 class="col-md-2">Tanggal</h5>
        <h5 class="col-md-1.5">:</h5>
        <h5 class="col-md-2"><?= date('d - m - Y',strtotime($tgl_dari)); ?></h5>
        <h5 class="col"></h5>
    </div>
    <div class="row k">
        <h5 class="col-md-2">Jumlah Pasien</h5>
        <h5 class="col-md-1.5">:</h5>
        <h5 class="col-md-2"><?= $total_pasien ?></h5>
        <h5 class="col"></h5>
    </div>

    <hr class="g" style="width:65%;margin-left:0" class="as">
    <hr class="g bawah" style="width:65%;margin-left:0" class="min">
    <div class="row s">
        <h5 class="col-md-1">NO.</h5>
        <h5 class="col-md-4">KETERANGAN</h5>
        <h5 class="col-md-2">NILAI (Rp)</h5>
    </div>
    <hr class="g" style="width:65%;margin-left:0" class="as">
    <hr class="g bawah" style="width:65%;margin-left:0" class="min">
    
    <?php $i = 1;
     ?>
    <?php foreach($datajasa as $r) : ?>
            <div class="row s">
            <h5 class="col-md-1"><?= $i++ ?></h5>
            
                <h5 class="col-md-4"><?= $r['kode_jasa'] ?></h5>
                <h5 class="col-md-2"><?= number_format($r['fee'],0,',','.'); ?></h5>
            </div>
    <?php endforeach ?>


    <hr class="g" style="width:65%;margin-left:0" class="as">
    <hr class="g bawah" style="width:65%;margin-left:0" class="min">
    <div class="row s">
        <h5 class="col-md-5">TOTAL</h5>
        <h5 class="col-md-3"><?php if( $hasil['total'] == 0){
            echo '';
        }else {
            echo number_format($hasil['total'],0,',','.');
        }
        ?></h5>
                    <!-- <?php var_dump($hasil) ?> -->
    </div>
    <hr class="g" style="width:65%;margin-left:0" class="as">
    <hr class="g bawah" style="width:65%;margin-left:0" class="min">
    
    
    
    <div class="row">
        <h5 class="col-md-5">Dibayar oleh,</h5>
        <h5 class="col-md-3">Diterima oleh,</h5>
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
            window.location.href =  'http://localhost/klinik/kasir/dokter'
        }
    </script>
</body>
</html>