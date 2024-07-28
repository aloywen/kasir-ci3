<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>assets/modules/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/stisla.js"></script>
  
  <!-- JS Libraies -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "index_0") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/simple-weather/jquery.simpleWeather.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "bootstrap_card") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "bootstrap_modal") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/prism/prism.js"></script>
<?php
}elseif ($this->uri->segment(2) == "layout_transparent") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/sticky-kit.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_gallery") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_multiple_upload") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/dropzonejs/min/dropzone.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_statistic") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jqvmap/dist/maps/jquery.vmap.indonesia.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_table") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_user") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "forms_editor") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/summernote/summernote-bs4.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/codemirror/lib/codemirror.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/codemirror/mode/javascript/javascript.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "gmaps_advanced_route" || $this->uri->segment(2) == "gmaps_draggable_marker" || $this->uri->segment(2) == "gmaps_geocoding" || $this->uri->segment(2) == "gmaps_geolocation" || $this->uri->segment(2) == "gmaps_marker" || $this->uri->segment(2) == "gmaps_multiple_marker" || $this->uri->segment(2) == "gmaps_route" || $this->uri->segment(2) == "gmaps_simple") { ?>
  <script src="http://maps.google.com/maps/api/js?key=AIzaSyB55Np3_WsZwUQ9NS7DP-HnneleZLYZDNw&amp;sensor=true"></script>
  <script src="<?php echo base_url(); ?>assets/modules/gmaps.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_calendar") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/fullcalendar/fullcalendar.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_chartjs") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/chart.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "pembelian" || $this->uri->segment(2) == "daftaradmin" || $this->uri->segment(2) == "daftaritem" || $this->uri->segment(2) == "transaksiperhari" || $this->uri->segment(2) == "riwayatpenjualan" || $this->uri->segment(2) == "daftarjasa" || $this->uri->segment(2) == "daftarobat" || $this->uri->segment(3) == "riwayatpasien" || $this->uri->segment(3) == "historytransaksi") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/modules/jquery-ui/jquery-ui.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_owl_carousel") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_sparkline") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/jquery.sparkline.min.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_sweet_alert") { ?>
  <script src="<?php echo base_url(); ?>assets/modules/sweetalert/sweetalert.min.js"></script>
<?php
} ?>

  <!-- Page Specific JS File -->
<?php
if ($this->uri->segment(2) == "" || $this->uri->segment(2) == "index") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/index.js"></script>
<?php
}elseif ($this->uri->segment(2) == "index_0") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/index-0.js"></script>
<?php
}elseif ($this->uri->segment(2) == "bootstrap_modal") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/bootstrap-modal.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_chat_box") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/components-chat-box.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_multiple_upload") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/components-multiple-upload.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_statistic") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/components-statistic.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_table") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/components-table.js"></script>
<?php
}elseif ($this->uri->segment(2) == "components_user") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/components-user.js"></script>
<?php
}elseif ($this->uri->segment(2) == "forms_advanced_form") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/forms-advanced-forms.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_calendar") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-calendar.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_chartjs") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-chartjs.js"></script>
<?php
}elseif ($this->uri->segment(2) == "pembelian" || $this->uri->segment(2) == "daftaradmin" || $this->uri->segment(2) == "daftaritem" || $this->uri->segment(2) == "transaksiperhari" || $this->uri->segment(2) == "riwayatpenjualan" || $this->uri->segment(2) == "daftarjasa" || $this->uri->segment(3) == "riwayatpasien" || $this->uri->segment(3) == "historytransaksi") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-datatables.js"></script>
<?php
}elseif ($this->uri->segment(2) == "modules_sweet_alert") { ?>
  <script src="<?php echo base_url(); ?>assets/js/page/modules-sweetalert.js"></script>
<?php
} ?>

  <!-- Template JS File -->
  <script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  
  <script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
  

$(document).ready(function() {
  var count = 1
    $("#addField").click(function (e) {
      e.preventDefault()
      count++
      $(".isi").append(`
        <tr id="row_${count}">
            <input data-field-name="kode" type="hidden" class="l form-control col-md-12 autocomplete" value="" name="kode[]" id="kode_${count}" autocomplete="off">
            
          <td class="px-0">
            <input data-field-name="item" type="text" class="l form-control col-md-12 autocomplete" value="" name="item[]" id="item_${count}" autocomplete="off">
          </td>
          <td>
            <input onchange="total();" type="text" inputmode="numeric" class="l form-control qty" value="" name="qty[]" id="qty_${count}">
          </td>
          <td>
            <input type="text" class="l form-control" value="" name="harga[]" id="harga_${count}" readonly>
          </td>
          <td>
            <input type="text" class="l form-control total" value="" name="total_harga[]" id="total_harga_${count}" readonly>
          </td>
          <td class="d-flex align-items-center">
            <div id="delete_${count}" class="btn btn-danger delete_row"><i class="fas fa-trash-alt"></i></div>
          </td>
        </tr>

      `)
      getTotal()
    });
});
 
// $(document).ready(function() {
//   let count = 1
//     $("#addFieldl").click(function (e) {
//       e.preventDefault()
//       count++
//       $(".isi").append(`
//         <tr id="row_${count}">
//           <td class="px-0">
//             <input data-field-name="kode" type="text" class="l form-control" value="" name="kode[]" id="kode_${count}" autocomplete="off">
//           </td>
//           <td class="px-0">
//             <input data-field-name="obat" type="text" class="l form-control autoBeliobat" value="" name="obat[]" id="obat_${count}" autocomplete="off">
//           </td>
//           <td>
//           <input type="text" class="l form-control" value="" name="jenis[]" id="jenis_${count}">
//           </td>
//           <td>
//             <input type="number" class="l form-control" value="" name="qty[]" id="qty_${count}">
//           </td>
//           <td>
//             <input type="text" class="l form-control" value="" name="hargabeli[]" id="harga_beli_${count}">
//           </td>
//           <td class="px-0 d-flex align-items-center">
//             <input type="text" class="l form-control total" value="" name="hargajual[]" id="harga_jual_${count}">
//             <div id="delete_${count}" class="btn btn-danger delete_row"><i class="fas fa-trash-alt"></i></div>
//           </td>
//         </tr>

//       `)
//     });
// });

$(document).ready(function() {
  let kode = document.getElementsByClassName('isi');
  let o = kode[0]
  let a = o.querySelectorAll("tr")
  // console.log(a.length);

  let count = a.length
  
    $("#addFieldeditnota").click(function (e) {
      e.preventDefault()
      count++
      $(".isi").append(`
      <tr id="row_${count}">
            <input data-field-name="kode" type="hidden" class="l form-control col-md-12 autocomplete" value="" name="kode[]" id="kode_${count}" autocomplete="off">
            
          <td class="px-0">
            <input data-field-name="item" type="text" class="l form-control col-md-12 autocomplete" value="" name="item[]" id="item_${count}" autocomplete="off">
          </td>
          <td>
            <input onchange="total();" type="text" inputmode="numeric" class="l form-control qty" value="" name="qty[]" id="qty_${count}">
          </td>
          <td>
            <input type="text" class="l form-control" value="" name="harga[]" id="harga_${count}" readonly>
          </td>
          <td>
            <input type="text" class="l form-control total" value="" name="total_harga[]" id="total_harga_${count}" readonly>
          </td>
          <td class="d-flex align-items-center">
            <div id="delete_${count}" class="btn btn-danger delete_row"><i class="fas fa-trash-alt"></i></div>
          </td>
        </tr>

      `) 

      getTotal()
    });
});

$(document).ready(function() {

    

  

    function getID(element) {
      var id, adArr;
      id = element.attr('id')
      idArr = id.split("_")
      return idArr[idArr.length - 1]
    }

    function handleTotal() {
      var current
      current = $(this);


      var rowNo;
      rowNo = getID(current)
      var qty = $('#qty_'+rowNo).val()
      var harga = $('#harga_'+rowNo).val()

      var totalHar = qty*harga
      $('#total_harga_'+rowNo).val(totalHar)
      
      // var t = $('#t').val([harga])
      // var har = [harga]
      
      handleKembali()
      getTotal()

    }

    function handleKembali() {
      let total = $('#grand_total').val()
      let temp = total.replace(/\./g,'')

      let bayar = $('#bayar').val()

      // console.log('ini total:',total)
      // console.log('ini temp:',temp)
      

      let kembalian = bayar - temp
      $('#uang_kembali').val(kembalian.toLocaleString("id-ID"))
    }
    
    function handleAuto() {
      var fieldName, currentEle
      currentEle = $(this);
      
      fieldName = currentEle.data('field-name')

      // console.log('saas',fieldName)

      if(typeof fieldName === 'undefined'){
        return false;
      }

      currentEle.autocomplete({
        source: function (data, cb) {
          // console.log(cb);
          $.ajax({
            url:"<?php echo base_url();?>kasir/penjualan/cariitem",
            dataType: 'json',
            data: {
              name: data.term,
              fieldName: fieldName
            },
            success: function(res) {
              var result;
              result = [
                {
                  label: 'Data '+data.term+ ' Tidak Ada',
                  value: ''
                }
              ];
              // console.log('tes format', res);

              if(res.length){
                result = $.map(res, function(obj) {
                  // console.log('apa sih obj', obj)
                  return {
                    label: obj.kode + ' - ' + obj.nama,
                    value: obj.nama,
                    data: obj,
                  }
                })
              }

              // console.log('abis format', result)
              cb(result)
            }
          })
        },
        autoFocus: true, 
        minLength: 1,
        select: function(event, selectedData) {
          
          // console.log(selectedData);
          if(selectedData && selectedData.item && selectedData.item.data){
            var rowNo, data;
            rowNo = getID(currentEle)
            data = selectedData.item.data;

            $('#kode_'+rowNo).val(data.kode)
            $('#item_'+rowNo).val(data.nama)
            $('#qty_'+rowNo).val(1)

            let peruntukan = document.getElementById('peruntukan').value
            console.log('untuk apa : ',peruntukan)
            
            if(peruntukan === 'karyawan'){
              $('#harga_'+rowNo).val(data.harga_karyawan)
            } else if (peruntukan === 'pengunjung') {
              $('#harga_'+rowNo).val(data.harga_pengunjung)
            } else {
              ''
            }
            


            var qty = $('#qty_'+rowNo).val()
            let hargaubah = peruntukan === 'karyawan' ? data.harga_karyawan : peruntukan === 'pengunjung' ? data.harga_pengunjung : ''
            
            let totalHarga = hargaubah*qty
            // console.log(totalHarga);
            $('#total_harga_'+rowNo).val(totalHarga)
            getTotal();
            // handleTotal();
          }
        }
      })

    }

    function handleBeliobatEdit() {
      var fieldName, currentEle
      currentEle = $(this);
      
      fieldName = currentEle.data('field-name')

      console.log('saas',fieldName)

      if(typeof fieldName === 'undefined'){
        return false;
      }

      currentEle.autocomplete({
        source: function (data, cb) {
          // console.log(cb);
          $.ajax({
            url:"<?php echo base_url();?>pembelian/pembelian/cariobat",
            dataType: 'json',
            data: {
              name: data.term,
              fieldName: fieldName
            },
            success: function(res) {
              var result;
              result = [
                {
                  label: 'ga ada obat '+data.term,
                  value: ''
                }
              ];
              // console.log('tes format', res);

              if(res.length){
                result = $.map(res, function(obj) {
                  // console.log('apa sih obj', obj)
                  return {
                    label: obj.kode + ' - ' + obj.nama,
                    value: obj.nama,
                    data: obj,
                  }
                })
              }

              // console.log('abis format', result)
              cb(result)
            }
          })
        },
        autoFocus: true,
        minLength: 1,
        select: function(event, selectedData) {
          // console.log(selectedData);
          if(selectedData && selectedData.item && selectedData.item.data){
            var rowNo, data;
            rowNo = getID(currentEle)
            // console.log('id',rowNo)
            data = selectedData.item.data;
            harga = data.harga
            $('#kode_'+rowNo).val(data.kode)

          }
        }
      })

      getTotal();
    }
    
    function handleBeliobat() {
      var fieldName, currentEle
      currentEle = $(this);
      
      fieldName = currentEle.data('field-name')

      // console.log('saas',fieldName)

      if(typeof fieldName === 'undefined'){
        return false;
      }

      currentEle.autocomplete({
        source: function (data, cb) {
          // console.log(cb);
          $.ajax({
            url:"<?php echo base_url();?>pembelian/pembelian/cariobat",
            dataType: 'json',
            data: {
              name: data.term,
              fieldName: fieldName
            },
            success: function(res) {
              var result;
              result = [
                {
                  label: 'ga ada obat '+data.term,
                  value: ''
                }
              ];
              // console.log('tes format', res);

              if(res.length){
                result = $.map(res, function(obj) {
                  // console.log('apa sih obj', obj)
                  return {
                    label: obj.kode + ' - ' + obj.nama,
                    value: obj.nama,
                    data: obj,
                  }
                })
              }

              // console.log('abis format', result)
              cb(result)
            }
          })
        },
        autoFocus: true,
        minLength: 1,
        select: function(event, selectedData) {
          console.log(selectedData);
          if(selectedData && selectedData.item && selectedData.item.data){
            var rowNo, data;
            rowNo = getID(currentEle)
            // console.log('id',rowNo)
            data = selectedData.item.data;
            hargabeli = parseInt(data.harga_beli)
            hargajual = parseInt(data.harga_jasa)
            $('#kode_'+rowNo).val(data.kode)
            $('#harga_beli_'+rowNo).val(hargabeli.toLocaleString('id-ID'))
            $('#harga_jual_'+rowNo).val(hargajual.toLocaleString('id-ID'))

          }
        }
      })

      getTotal();
    }

    function handlePasien() {
      var fieldName, currentEle
      currentEle = $(this);
      
      fieldName = currentEle.data('field-name')

      console.log('saas',fieldName)

      if(typeof fieldName === 'undefined'){
        return false;
      }

      currentEle.autocomplete({
        minLength: 3,
        source: function (data, cb) {
          // console.log(cb);
          $.ajax({
            url:"<?php echo base_url();?>kasir/pasien/cari",
            dataType: 'json',
            data: {
              name: data.term,
              fieldName: fieldName
            },
            success: function(res) {
              var result;
              result = [
                {
                  label: 'Data '+data.term+' Tidak Ada',
                  value: ''
                }
              ];
              // console.log('tes format', res);

              if(res.length){
                result = $.map(res, function(obj) {
                  // console.log('apa sih obj', obj)
                  return {
                    label: obj.nama_pasien + ' - ' + obj.alamat,
                    value: obj.nama_pasien,
                    data: obj,
                  }
                })
              }

              // console.log('abis format', result)
              cb(result)
            }
          })
        },
        autoFocus: true,
        minLength: 3,
        select: function(event, selectedData) {
          console.log(selectedData);
          if(selectedData && selectedData.item && selectedData.item.data){
            data = selectedData.item.data;
            let kod = data.medical_record
            $('#kode_pasien').val(data.medical_record)
            $('#status').val(data.status)

          }
        }
      })

      getTotal();
    }
    
    function getTotal() {
      let arr = document.querySelectorAll('.total')
      let total = 0
      for(var i = 0; i < arr.length; i++){
        if(parseInt(arr[i].value)){
          total +=parseInt(arr[i].value)
        }

        document.getElementById('grand_total').value =total.toLocaleString("id-ID")
      }
    }



    function deleteRow() {
      var currentEle, rowNo;
      currentEle = $(this);
      rowNo = getID(currentEle)
      console.log('row', rowNo)
      $("#row_"+rowNo).remove()

      getTotal()
    }
     
    function registerEvents() {
      $(document).on('focus', '.autoBeliobatEdit', handleBeliobatEdit)
      $(document).on('focus', '.autoBeliobat', handleBeliobat)
      $(document).on('focus', '.autocomplete', handleAuto)
      $(document).on('focus', '.autopasien', handlePasien)
      $(document).on('change', '.qty', handleTotal)
      $(document).on('click', '.delete_row', deleteRow)
      $(document).on('keyup', '.kembali', handleKembali)
    }

    registerEvents();
 
});

    function autofillOmzet(){
        var tgl_dari = document.getElementById('tgl_dari').value;
        var tgl_sampai = document.getElementById('tgl_sampai').value;

        // console.log(tgl_dari);
        // console.log(tgl_sampai);
        $.ajax({
              url:"<?php echo base_url();?>/masterdata/lapomzet/cariomzet",
              data: {
                'tgl_dari': tgl_dari,
                'tgl_sampai': tgl_sampai
               },
              success:function(data){
                var hasil = JSON.parse(data);  
              //  console.log(hasil);
               let total = parseInt(hasil.grand_total)

               let inputOmzet = document.getElementById('total_omzet')
              
                if(total){
                  inputOmzet.value=total.toLocaleString('id-ID')
                } else {
                  inputOmzet.value=0
                }
              //  total === null ? inputOmzet.value="0" : inputOmzet.value=total.toLocaleString('id-ID');
                
              }
        });
                   
    }

    function autofillStok(){
        let tgl_dari = document.getElementById('tgl_d').value;
        let tgl_sampai = document.getElementById('tgl_s').value;

        console.log(tgl_dari);
        console.log(tgl_sampai);
        $.ajax({
              url:"<?php echo base_url();?>/masterdata/lapstokitem/caristok",
              data: {
                'tgl_dari': tgl_dari,
                'tgl_sampai': tgl_sampai
               },
              success:function(data){
              let hasil = JSON.parse(data);  
               console.log(hasil);
              //  let total = parseInt(hasil.grand_total)

              //  let inputOmzet = document.getElementById('total_omzet')
              
              //   if(total){
              //     inputOmzet.value=total.toLocaleString('id-ID')
              //   } else {
              //     inputOmzet.value=0
              //   }
              //  total === null ? inputOmzet.value="0" : inputOmzet.value=total.toLocaleString('id-ID');
                
              }
        });
                   
    }

    function autofill(){
        var kode = document.getElementById('pasien').value;
        $.ajax({
              url:"<?php echo base_url();?>kasir/pasien/cari",
              data:'&kode='+kode,
              success:function(data){
                var hasil = JSON.parse(data);  
              //  console.log(hasil.status);
            
                document.getElementById('status').value=hasil.status;
              }
        });
                   
    }

    function autofillDokter(){
        var kode = document.getElementById('filldokter').value;
        var tgl_dari = document.getElementById('tgl_dari').value;
        var tgl_sampai = document.getElementById('tgl_sampai').value;

 
        var no = document.getElementById('no');
        var fee_dokter = document.getElementById('fee_dokter').value;
        var nama_jasaa = document.getElementById('tees');
        var fee = document.getElementById('feeD');
        var nomor = document.getElementById('nomor');
        var jagafee = document.getElementById('jagafee');
        var feejaga = document.getElementById('feejaga');
        var kode_jaga = document.getElementById('kode_jaga');
        var kodeJa = document.getElementById('kod');
        var grand = document.getElementById('grand_total_dok')
        var nampung = 0
        // let nama_jasaa = document.querySelectorAll('.jasaNama')
        
        
        // console.log(kode, tgl_dari,tgl_sampai);
        $.ajax({
              url:"<?php echo base_url();?>kasir/dokter/cari",
              data: {
                'kode': kode,
                'tgl_dari': tgl_dari,
                'tgl_sampai': tgl_sampai
               },
              success:function(data){
                var hasil = JSON.parse(data);
                let jaga = hasil.jaga[0]
                let konsul = hasil.konsul[0]
                console.log(hasil);
                $(".nomer").remove()
                $(".ja").remove()
                $(".tot").remove()

                jagafee.value= jaga.nama
                feejaga.value= jaga.harga_jasa
                kode_jaga.value= jaga.kode
                

                
                var no = 2
                hasil.jasa[0].forEach((item)=>{
                  // console.log(item);
                  let label = document.createElement("h5");
                  label.innerHTML = no++;
                  label.className = "my-3 nomer";
                  nomor.appendChild(label);
                })

                //kode
                hasil.jasa[0].forEach((item)=>{
                  // console.log(item);
                  let input = document.createElement("input");
                  input.type = "hidden";
                  input.name = "kode[]";
                  input.className = "form-control kodee";
                  input.value = item.kodejasa;
                  kodeJa.appendChild(input);
                })

                //jasa induk
                hasil.jasa[0].forEach((item)=>{
                  // console.log(item);
                  let input = document.createElement("input");
                  input.type = "text";
                  input.name = "jasa[]";
                  input.className = "form-control ja";
                  if(item.induk == 'Jasa'){
                  input.value = item.induk;
                  } else {
                    input.value = 'Jasa '+item.induk;
                  }
                  nama_jasaa.appendChild(input);
                })

                //total
                hasil.jasa[0].forEach((data)=>{
                  console.log(data);
                  // console.log(konsul);
                  let pasien = 10
                  
                  let dikurang = pasien*konsul.fee

                  let hasil = data.total
                  // console.log('dikurang :', dikurang);
                  if(data.kode_obat === 'ZKON0002'){
                    hasil = hasil - dikurang 
                  }

                  let input = document.createElement("input");
                  input.type = "text";
                  input.setAttribute("readonly", true);
                  input.name = "fee[]";
                  input.className = "form-control tot";
                  input.value = hasil
                  fee.appendChild(input);
                }) 
 
                let arr = document.querySelectorAll('.tot')
                let total = 0
                for(var i = 0; i < arr.length; i++){
                  if(parseInt(arr[i].value)){
                    total +=parseInt(arr[i].value)
                  }
                  
                  
                  // console.log(total);
                  nampung =total
                }
                
                var t = nampung+parseInt(jaga.harga_jasa)
                grand.value = t.toLocaleString("id-ID")
                

                // let jumlah_semua = a+b+c+d+e+f+g+h
                // grand_total.value = jumlah_semua
                // document.getElementById('nilai').value=data.grand_total;
              }
        });
                   
    }
    
  </script>
</body>
</html>