            

            </div>
            <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
            <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

            <script src="<?= base_url('assets/'); ?>js/datatables.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/select2.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/jquery-ui.min.js"></script>
            <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

            <script> 

                $('.custom-file-input').on('change', function() {
                    let fileName = $(this).val().split('\\').pop();
                    $(this).next('.custom-file-label').addClass("selected").html(fileName);
                });



                $('.form-check-input').on('click', function() {
                    const menuId = $(this).data('menu');
                    const roleId = $(this).data('role');

                    $.ajax({
                        url: "<?= base_url('admin/changeaccess'); ?>",
                        type: 'post',
                        data: {
                            menuId: menuId,
                            roleId: roleId
                        },
                        success: function() {
                            document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                        }
                    });

                });

                

                 
                $('#mydata').dataTable();
                  
            
                $(document).ready(function () {
                    $('#table').DataTable({
                        "serverSide": true,
                        "deferRender": true,
                        "processing": true,
                    });
                });

                $(document).ready(function() {
                    $('.js-example-basic-single').select2();
                });

                // $('#nama_barang').select2({
                //     dropdownParent: $('#newRoleModal')
                // });

                // $('.modal').modal('show');
                // $('.modal').on('shown.bs.modal', function(e) {
                //     $('.bootstrap-datetimepicker-widget').css('z-index', 1500);
                // });

                // $(function() {
                //     $("body").delegate(".datepicker", "focusin", function(){
                //         $(this).datepicker();
                //     });
                // });

                // let $j_custom = jQuery.noConflict(true);


                // $j_custom(function() {
                //     $j_custom("#datepicker").datepicker();
                // });




                $(document).ready(function() {
                    $( "#datepicker" ).datepicker(
                        { dateFormat: 'yy-mm-dd',
                        }
                    );
                } );

                $(document).ready(function() {
                    $( "#datpicker" ).datepicker(
                        { dateFormat: 'yy-mm-dd',
                        }
                    );
                } );


                $(function () {   
                    $('#newRoleModal').on('shown.bs.modal', function () {   
                        $('#nama_barang').focus();   
                    });   
                });

                


                $(document).ready(function() {

                    function handleSupplier() {
                        var fieldName, currentEle
                        currentEle = $(this);
                        
                        fieldName = currentEle.data('field-name')

                        // console.log('saas',fieldName)

                        if(typeof fieldName === 'undefined'){
                            return false;
                        }

                        currentEle.autocomplete({
                            source: function (data, cb) {
                            // console.log(data);
                            $.ajax({
                                url:"<?php echo base_url();?>user/cariSupplier",
                                dataType: 'json',
                                data: {
                                    supplier: data.term,
                                    fieldName: fieldName
                                },
                                success: function(res) {
                                var result;
                                result = [
                                    {
                                    label: data.term+' Tidak Ada',
                                    value: ''
                                    }
                                ];
                                // console.log('tes format', res);

                                if(res.length){
                                    result = $.map(res, function(obj) {
                                    // console.log('apa sih obj', obj)
                                    return {
                                        label: obj.kode_supplier + ' - ' + obj.nama_supplier,
                                        value: obj.nama_supplier,
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
                            // select: function(event, selectedData) {
                            // // console.log(selectedData);
                            //     if(selectedData && selectedData.item && selectedData.item.data){
                            //         data = selectedData.item.data;
                            //         harga = data.harga
                            //         $('#kode_barang').val(data.kode_barang)

                            //     }
                            // }
                        })

                    }

                    function handleJasa() {
                        var fieldName, currentEle
                        currentEle = $(this);
                        
                        fieldName = currentEle.data('field-name')

                        // console.log('saas',fieldName)

                        if(typeof fieldName === 'undefined'){
                            return false;
                        }

                        currentEle.autocomplete({
                            source: function (data, cb) {
                            // console.log(data);
                            $.ajax({
                                url:"<?php echo base_url();?>user/cariJasa",
                                dataType: 'json',
                                data: {
                                    kirim_by: data.term,
                                    fieldName: fieldName
                                },
                                success: function(res) {
                                var result;
                                result = [
                                    {
                                    label: 'Jasa '+data.term+' Tidak Ada',
                                    value: ''
                                    }
                                ];
                                // console.log('tes format', res);

                                if(res.length){
                                    result = $.map(res, function(obj) {
                                    // console.log('apa sih obj', obj)
                                    return {
                                        label: obj.nama_jasa,
                                        value: obj.nama_jasa,
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
                            // select: function(event, selectedData) {
                            // // console.log(selectedData);
                            //     if(selectedData && selectedData.item && selectedData.item.data){
                            //         data = selectedData.item.data;
                            //         harga = data.harga
                            //         $('#kirim_by').val(data.kode_barang)

                            //     }
                            // }
                        })

                    }

                    function handleItem() {
                        var fieldName, currentEle
                        currentEle = $(this);
                        
                        fieldName = currentEle.data('field-name')

                        // console.log('saas',fieldName)

                        if(typeof fieldName === 'undefined'){
                            return false;
                        }

                        currentEle.autocomplete({
                            source: function (data, cb) {
                            // console.log(data);
                            $.ajax({
                                url:"<?php echo base_url();?>user/cari",
                                dataType: 'json',
                                data: {
                                    barang: data.term,
                                    fieldName: fieldName
                                },
                                success: function(res) {
                                var result;
                                result = [
                                    {
                                    label: 'Barang '+data.term+' tidak ada',
                                    value: ''
                                    }
                                ];
                                // console.log('tes format', res);

                                if(res.length){
                                    result = $.map(res, function(obj) {
                                    // console.log('apa sih obj', obj)
                                    return {
                                        label: obj.kode_barang + ' - ' + obj.nama_barang + '- Stok :' + obj.stok,
                                        value: obj.nama_barang,
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
                                    data = selectedData.item.data;
                                    // harga = data.harga
                                    $('#kode_barang').val(data.kode_barang)

                                }
                            }
                        })

                    }

                    function handleItemedit() {
                        var fieldName, currentEle
                        currentEle = $(this);
                        
                        fieldName = currentEle.data('field-name')
                        // no = currentEle.data('field-name')

                        // console.log('saas',fieldName)

                        if(typeof fieldName === 'undefined'){
                            return false;
                        }
                        
                        currentEle.autocomplete({
                            source: function (data, cb) {
                            // console.log(data);
                            $.ajax({
                                url:"<?php echo base_url();?>user/cari",
                                dataType: 'json',
                                data: {
                                    barang: data.term,
                                    fieldName: fieldName
                                },
                                success: function(res) {
                                var result;
                                result = [
                                    {
                                    label: 'Barang '+data.term+' tidak ada ',
                                    value: ''
                                    }
                                ];
                                // console.log('tes format', res);

                                if(res.length){
                                    result = $.map(res, function(obj) {
                                    // console.log('apa sih obj', obj)
                                    return {
                                        label: obj.kode_barang + ' - ' + obj.nama_barang + '- Stok :' + obj.stok,
                                        value: obj.nama_barang,
                                        data: obj,
                                        no: nomor_trans
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
                                if(selectedData && selectedData.item && selectedData.item.data){
                                    data = selectedData.item.data;
                                    harga = data.harga
                                    $('#kode_bar').val(data.kode_barang)
                                }
                            }
                        })

                    }

                    function handleIteme() {
                        var fieldName, currentEle
                        currentEle = $(this);
                        
                        fieldName = currentEle.data('field-name')

                        // console.log('saas',fieldName)

                        if(typeof fieldName === 'undefined'){
                            return false;
                        }

                        currentEle.autocomplete({
                            source: function (data, cb) {
                            // console.log(data);
                            $.ajax({
                                url:"<?php echo base_url();?>user/cari",
                                dataType: 'json',
                                data: {
                                    barang: data.term,
                                    fieldName: fieldName
                                },
                                success: function(res) {
                                var result;
                                result = [
                                    {
                                    label: 'Barang '+data.term+' tidak ada',
                                    value: ''
                                    }
                                ];
                                // console.log('tes format', res);

                                if(res.length){
                                    result = $.map(res, function(obj) {
                                    // console.log('apa sih obj', obj)
                                    return {
                                        label: obj.kode_barang + ' - ' + obj.nama_barang,
                                        value: obj.nama_barang,
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
                                    data = selectedData.item.data;
                                    harga = data.harga
                                    $('#kode_b').val(data.kode_barang)

                                }
                            }
                        })

                    }

                    function registerEvents() {
                        $(document).on('focus', '.autoitem', handleItem)
                        $(document).on('focus', '.autoiteme', handleIteme)
                        $(document).on('focus', '.autoitemedit', handleItemedit)
                        $(document).on('focus', '.autosupplier', handleSupplier)
                        $(document).on('focus', '.autojasa', handleJasa)

                    }

                    registerEvents();
                });
            </script>

            </body>

            </html> 