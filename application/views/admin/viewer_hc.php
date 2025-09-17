    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title"><i class="fa fa-list text-blue"></i> Data HCS</h3>
                            <div class="text-right">

                                <!-- <button type="button" class="btn btn-sm btn-outline-primary" onclick="add_compliance()" title="Add Data"><i class="fas fa-plus"></i> Add</button> -->
                                <!-- <a href="<?php echo base_url('compliance/download') ?>" type="button" class="btn btn-sm btn-outline-info" target="_blank" id="dwn_compliance" title="Download"><i class="fas fa-download"></i> Download</a> -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabelcompliance" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="bg-info">
                                        <th>No</th>
                                        <th>File</th>
                                        <th>Nama File</th>
                                        <th>Kategori</th>
                                        <th>Status</th>

                                        <th>Tanggal Buat</th>

                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>



    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title ">View compliance</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" id="md_def">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


    <script type="text/javascript">
        var save_method; //for save method string
        var table;

        $(document).ready(function() {

            table = $("#tabelcompliance").DataTable({
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "sEmptyTable": "Data HC Belum Ada"
                },
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('viewer_hc/ajax_list') ?>",
                    "type": "POST"
                },
                //Set column definition initialisation properties.


            });
            $("input").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
                $(this).removeClass('is-invalid');
            });
            $("textarea").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
                $(this).removeClass('is-invalid');
            });
            $("select").change(function() {
                $(this).parent().parent().removeClass('has-error');
                $(this).next().empty();
                $(this).removeClass('is-invalid');
            });
        });

        function reload_table() {
            table.ajax.reload(null, false); //reload datatable ajax 
        }

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        // Button Tabel

        function riset(id) {

            Swal.fire({
                title: 'Reset password?',
                text: "Pass Default: password123",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, reset it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?php echo site_url('compliance/reset'); ?>",
                        type: "POST",
                        data: "id=" + id,
                        cache: false,
                        dataType: 'json',
                        success: function(respone) {
                            if (respone.status == true) {
                                reload_table();
                                Swal.fire(
                                    'Reset!',
                                    'Your password has been reset.',
                                    'success'
                                );
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: 'Reset password Error!!.'
                                });
                            }
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }
            })
        }
        //view
        function vcompliance(id) {
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('.modal-title').text('View compliance');
            $("#modal-default").modal('show');
            $.ajax({
                url: '<?php echo base_url('compliance/viewcompliance'); ?>',
                type: 'post',
                data: 'table=tbl_compliance&id=' + id,
                success: function(respon) {
                    $("#md_def").html(respon);
                }
            })
        }

        //delete
        function delcompliance(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {

                $.ajax({
                    url: "<?php echo site_url('compliance/delete'); ?>",
                    type: "POST",
                    data: "id=" + id,
                    cache: false,
                    dataType: 'json',
                    success: function(respone) {
                        if (respone.status == true) {
                            reload_table();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            );
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: 'Delete Error!!.'
                            });
                        }
                    }
                });

            })
        }



        function add_compliance() {
            save_method = 'add';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string
            $('#modal_form').modal('show'); // show bootstrap modal
            $('.modal-title').text('Add File Compliance'); // Set Title to Bootstrap modal title
        }

        function edit_compliance(id) {

            save_method = 'update';
            $('#form')[0].reset(); // reset form on modals
            $('.form-group').removeClass('has-error'); // clear error class
            $('.help-block').empty(); // clear error string

            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('compliance/editcompliance') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {

                    $('[name="id_compliance"]').val(data.id_compliance);
                    $('[name="compliancename"]').val(data.compliancename);
                    $('[name="full_name"]').val(data.full_name);
                    $('[name="is_active"]').val(data.is_active);
                    $('[name="level"]').val(data.id_level);

                    if (data.image == null) {
                        var image = "<?php echo base_url('assets/foto/compliance/default.png') ?>";
                        $("#v_image").attr("src", image);
                    } else {
                        var image = "<?php echo base_url('assets/foto/compliance/') ?>";
                        $("#v_image").attr("src", image + data.image);
                    }

                    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                    $('.modal-title').text('Edit compliance'); // Set title to Bootstrap modal title

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }

        function save() {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable 
            var url;
            if (save_method == 'add') {
                url = "<?php echo site_url('compliance/insert') ?>";
            } else {
                url = "<?php echo site_url('compliance/update') ?>";
            }
            var formdata = new FormData($('#form')[0]);
            $.ajax({
                url: url,
                type: "POST",
                data: formdata,
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    console.log(data.status)
                    if (data.status) //if success close modal and reload ajax table
                    {
                        $('#modal_form').modal('hide');
                        reload_table();
                        Toast.fire({
                            icon: 'success',
                            title: 'Success!!.'
                        });
                    } else {
                        for (var i = 0; i < data.inputerror.length; i++) {
                            $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                            $('[name="' + data.inputerror[i] + '"]').closest('.kosong').append('<span></span>');
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]).addClass('invalid-feedback');
                        }
                    }
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 


                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(textStatus);
                    // alert('Error adding / update data');
                    Toast.fire({
                        icon: 'error',
                        title: 'Error!!.'
                    });
                    $('#btnSave').text('save'); //change button text
                    $('#btnSave').attr('disabled', false); //set button enable 

                }
            });
        }

        var loadFile = function(event) {
            var image = document.getElementById('file');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        function batal() {
            $('#form')[0].reset();
            reload_table();
            var image = document.getElementById('file');
            image.src = "";
        }
    </script>


    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">compliance Form</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div class="modal-body form">
                    <form action="#" id="form" class="form-horizontal" enctype="multipart/form-data">
                        <!-- <?php echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'form')) ?> -->
                        <input type="hidden" value="" name="id_file" />
                        <div class="card-body">
                            <div class="form-group row ">
                                <label for="nama_file" class="col-sm-3 col-form-label">Nama File</label>
                                <div class="col-sm-9 kosong">
                                    <input type="text" class="form-control" name="nama_file" id="nama_file" placeholder="Masukan nama file">
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label for="level" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9 kosong">
                                    <select class="form-control" name="id_kat" id="id_kat">
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        foreach ($datakategori as $l) { ?>
                                            <option value="<?= $l->id_kat; ?>"><?= $l->nama_kat; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="level" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9 kosong">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Pilih Kategori</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak aktif">Tidak Aktif</option>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="imagefile" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9 kosong ">
                                    <img id="file" width="100px" height="100px">
                                    <input type="file" class="form-control btn-file" onchange="loadFile(event)" name="file" id="file" placeholder="Image" value="UPLOAD">
                                </div>
                            </div>
                        </div>
                        <!-- <?php echo form_close(); ?> -->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-danger" onclick="batal()" data-dismiss="modal">Cancel</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- End Bootstrap modal -->