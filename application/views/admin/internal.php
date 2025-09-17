    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3 class="card-title"><i class="fa fa-list text-blue"></i> Data Internal</h3>
                            <div class="text-right">

                                <button type="button" class="btn btn-sm btn-outline-primary" onclick="add_compliance()" title="Add Data"><i class="fas fa-plus"></i> Add</button>
                                <!-- <a href="<?php echo base_url('compliance/download') ?>" type="button" class="btn btn-sm btn-outline-info" target="_blank" id="dwn_compliance" title="Download"><i class="fas fa-download"></i> Download</a> -->
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <style>
                                /* Kolom URL dan File Name */
                                .wrap-url,
                                .wrap-name {
                                    max-width: 200px;
                                    /* atur sesuai kebutuhan */
                                    word-wrap: break-word;
                                }

                                .wrap-url a,
                                .wrap-name {
                                    font-size: 16px;
                                    line-height: 2;
                                }
                            </style>
                            <table id="tabelcompliance" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="bg-info">
                                        <th>No</th>
                                        <th class="wrap-url">Url File</th>
                                        <th class="wrap-name">File Name</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Year</th>
                                        <th>Create Date</th>
                                        <th>Lampiran</th>
                                        <th>Action</th>
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
    <style>
        /* Supaya teks di tabel wrap dan tidak bikin geser ke samping */
        #tabelcompliance td,
        #tabelcompliance th {
            white-space: normal !important;
            word-wrap: break-word;
            max-width: 250px;
            /* Batas lebar kolom, bisa disesuaikan */
        }
    </style>

    <script type="text/javascript">
        var save_method; //for save method string
        var table;

        $(document).ready(function() {
            table = $("#tabelcompliance").DataTable({
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "sEmptyTable": "Data internal Belum Ada"
                },
                "processing": true, //Feature control the processing indicator.
                "serverSide": true, //Feature control DataTables' server-side processing mode.
                "order": [], //Initial no order.

                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('internal/ajax_list') ?>",
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [-1], //last column
                    "render": function(data, type, row) {
                        return "<a class=\"btn btn-xs btn-outline-primary\" href=\"javascript:void(0)\" title=\"Edit\" onclick=\"edit_compliance(" + row[8] + ")\"><i class=\"fas fa-edit\"></i></a>" +
                            "<a class=\"btn btn-xs btn-outline-danger\" href=\"javascript:void(0)\" title=\"Delete\" nama=" + row[8] + "  onclick=\"delcompliance(" + row[8] + ")\"><i class=\"fas fa-trash\"></i></a>";
                    },
                    "orderable": false, //set not orderable
                }]

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
            console.log(id)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "<?php echo site_url('internal/delete'); ?>",
                        type: "POST",
                        data: "id_file=" + id,
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
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal(
                        'Cancelled',
                        'Your imaginary file is safe :)',
                        'error'
                    )
                }

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
            $('#form')[0].reset();
            $('#lampiran-list').empty();

            $.ajax({
                url: "<?php echo site_url('internal/editcompliance') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    // isi form biasa
                    $('[name="id_file"]').val(data.id_file);
                    $('[name="nama_file"]').val(data.nama_file);
                    $('[name="id_kategori"]').val(data.id_kategori);
                    $('[name="status"]').val(data.status);
                    $('[name="tahun"]').val(data.tahun);
                    $('[name="created_at"]').val(data.created_at.replace(' ', 'T'));

                    // isi lampiran lama
                    $("#lampiran-list").empty();
                    if (data.lampiran && data.lampiran.length > 0) {
                        $("#lampiran-lama").show();
                        $.each(data.lampiran, function(i, lamp) {
                            $("#lampiran-list").append(`
        <li id="lampiran-item-${lamp.id_lampiran_in}">
            <a href="<?= base_url() ?>${lamp.file_url}" target="_blank">
                ${lamp.nama_file}
            </a>
            <a href="javascript:void(0)" onclick="hapusLampiranModal(${lamp.id_lampiran_in})">
                <i class="fa fa-trash text-danger ml-2"></i>
            </a>
        </li>
    `);
                        });

                    } else {
                        $("#lampiran-lama").hide();
                    }

                    $('#modal_form').modal('show');

                    $('.modal-title').text('Edit Compliance');
                },
                error: function() {
                    alert('Error get data from ajax');
                }
            });
        }

        function save() {
            $('#btnSave').text('saving...'); //change button text
            $('#btnSave').attr('disabled', true); //set button disable
            var url;
            if (save_method == 'add') {
                url = "<?php echo site_url('internal/insert') ?>";
            } else {
                url = "<?php echo site_url('internal/update') ?>";
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
                            $('[name="' + data.inputerror[i] + '" ]').addClass('is-invalid');
                            $('[name="' + data.inputerror[i] + '" ]').closest('.kosong').append('<span></span>');
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
            var image = document.getElementById('url_file');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        function batal() {
            $('#form')[0].reset();
            reload_table();

        }

        function loadLampiranLama(id_file) {
            $.ajax({
                url: "<?= site_url('internal/getLampiranByFile') ?>/" + id_file,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    let html = "";
                    data.forEach(lamp => {
                        html += `
                    <li id="lampiran-item-${lamp.id_lampiran}">
                        <a href="<?= base_url('uploads/lampiran/') ?>${lamp.file_url}" target="_blank">
                            ${lamp.nama_file}
                        </a>
                        <a href="javascript:void(0)" onclick="hapusLampiranModal(${lamp.id_lampiran_in})">
                            <i class="fa fa-trash text-danger ml-2"></i>
                        </a>
                    </li>
                `;
                    });
                    $("#lampiran-list").html(html);

                    // tampilkan form-group hanya jika ada lampiran
                    if (data.length > 0) {
                        $("#lampiran-lama").show();
                    } else {
                        $("#lampiran-lama").hide();
                    }
                }
            });
        }

        function hapusLampiranModal(id_lampiran_in) {
            if (confirm("Yakin mau hapus lampiran ini?")) {
                $.ajax({
                    url: "<?= site_url('internal/deleteLampiranItem') ?>/" + id_lampiran_in,
                    type: "GET",
                    dataType: "JSON",
                    success: function(res) {
                        if (res.status) {
                            // hapus langsung item di modal
                            $("#lampiran-item-" + id_lampiran_in).remove();

                            // kalau sudah kosong, sembunyikan form-group
                            if ($("#lampiran-list li").length === 0) {
                                $("#lampiran-lama").hide();
                            }
                        }
                    }
                });
            }
        }
    </script>



    <!-- Bootstrap modal -->
    <div class="modal fade" id="modal_form" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">Internal Form</h3>
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
                                <label for="nama_file" class="col-sm-3 col-form-label">File Name</label>
                                <div class="col-sm-9 kosong">
                                    <input type="text" class="form-control" name="nama_file" id="nama_file" placeholder="Enter a file name">
                                </div>
                            </div>


                            <div class="form-group row ">
                                <label for="level" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9 kosong">
                                    <select class="form-control" name="id_kategori" id="id_kategori">
                                        <option value="">Select Category</option>
                                        <?php
                                        foreach ($datakategori as $l) { ?>
                                            <option value="<?= $l->id_kategori; ?>"><?= $l->nama_internal; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="level" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9 kosong">
                                    <select class="form-control" name="status" id="status">
                                        <option value="">Select Type</option>
                                        <option value="SK Direksi">SK Direksi</option>
                                        <option value="SE Direksi">SE Direksi</option>
                                        <option value="Memo Intern">Memo Intern</option>
                                        <option value="Laporan">Laporan</option>
                                        <option value="Lampiran">Lampiran</option>
                                        <option value="Informasi">Informasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label for="level" class="col-sm-3 col-form-label">Year</label>
                                <div class="col-sm-9 kosong">
                                    <input type="text" id="tahun" name="tahun" required>
                                </div>
                            </div>

                            <div class="form-group row ">
                                <label for="level" class="col-sm-3 col-form-label">Create Date</label>
                                <div class="col-sm-9 kosong">
                                    <input type="datetime-local" id="created_at" name="created_at" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imagefile" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9 kosong">
                                    <!-- Embed PDF using PHP base_url() -->
                                    <!-- <iframe id="file" src="<?php echo $file_url; ?>" type="application/pdf" style="width: 100%; height: 500px;"></iframe> -->

                                    <!-- Input file -->
                                    <input type="file" class="form-control btn-file" onchange="loadFile(event)" name="file" id="fileInput">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="lampiran" class="col-sm-3 col-form-label">Lampiran</label>
                                <div class="col-sm-9 kosong">
                                    <input type="file" class="form-control btn-file" name="lampiran[]" multiple id="lampiranInput">
                                    <small class="text-muted">Pilih beberapa file jika ada lampiran tambahan (Opsional)</small>
                                </div>
                            </div>
                            <!-- Tempat list lampiran lama saat edit -->
                            <div class="form-group row" id="lampiran-lama" style="display:none;">
                                <label class="col-sm-3 col-form-label">Lampiran Lama</label>
                                <div class="col-sm-9">
                                    <ul id="lampiran-list" class="list-unstyled mb-0"></ul>
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