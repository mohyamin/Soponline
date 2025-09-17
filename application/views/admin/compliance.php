<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h3 class="card-title"><i class="fa fa-list text-blue"></i> Data COMPLIANCE</h3>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-outline-primary" onclick="add_compliance()" title="Add Data">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabelcompliance" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr class="bg-info">
                                    <th>No</th>
                                    <th>Url File</th>
                                    <th>File Name</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Year</th>
                                    <th>Create Date</th>
                                    <th>Lampiran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal View Compliance -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View compliance</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="md_def"></div>
        </div>
    </div>
</div>

<!-- Modal Add/Edit Compliance -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Compliance Form</h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>

            <div class="modal-body form">
                <form id="form" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="id_file" />

                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Name</label>
                            <div class="col-sm-9 kosong">
                                <input type="text" class="form-control" name="nama_file" id="nama_file" placeholder="Enter file name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9 kosong">
                                <select class="form-control" name="id_kat" id="id_kat">
                                    <option value="">Select Category</option>
                                    <?php foreach ($datakategori as $l) { ?>
                                        <option value="<?= $l->id_kat; ?>"><?= $l->nama_kat; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Type</label>
                            <div class="col-sm-9 kosong">
                                <select class="form-control" name="status" id="status">
                                    <option value="">Select Type</option>
                                    <option value="peraturan ojk">Peraturan OJK</option>
                                    <option value="surat edaran ojk">Surat Edaran OJK</option>
                                    <option value="keputusan dewan komisioner">Keputusan Dewan Komisioner</option>
                                    <option value="peraturan bi">Peraturan BI</option>
                                    <option value="surat edaran bi">Surat Edaran BI</option>
                                    <option value="peraturan anggota dewan gubernur">Peraturan Anggota Dewan Gubernur</option>
                                    <option value="kementrian">Kementrian</option>
                                    <option value="ketenagakerjaan">Ketenagakerjaan</option>
                                    <option value="lingkungan hidup">Lingkungan Hidup</option>
                                    <option value="lps">LPS</option>
                                    <option value="pemerintah daerah">Pemerintah Daerah</option>
                                    <option value="perpajakan">Perpajakan</option>
                                    <option value="UU">UU</option>
                                    <option value="lampiran">Lampiran</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Year</label>
                            <div class="col-sm-9 kosong">
                                <input type="text" class="form-control" name="tahun" id="tahun" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Create Date</label>
                            <div class="col-sm-9 kosong">
                                <input type="datetime-local" class="form-control" name="created_at" id="created_at" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File Utama</label>
                            <div class="col-sm-9 kosong">
                                <input type="file" class="form-control btn-file" name="file" id="fileInput">
                                <div id="file-preview" class="mt-2"></div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Lampiran Baru</label>
                            <div class="col-sm-9 kosong">
                                <input type="file" class="form-control btn-file" name="lampiran[]" multiple id="lampiranInput">
                                <small class="text-muted">Boleh pilih beberapa file (opsional)</small>
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
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>

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

<script>
    var save_method;
    var table;

    $(document).ready(function() {
        table = $("#tabelcompliance").DataTable({
            responsive: true,
            autoWidth: false,
            language: {
                sEmptyTable: "Data compliance Belum Ada"
            },
            processing: true,
            serverSide: true,
            order: [],
            ajax: {
                url: "<?php echo site_url('compliance/ajax_list') ?>",
                type: "POST"
            },
            "columnDefs": [{
                "targets": [-1], //last column
                "render": function(data, type, row) {
                    return "<a class=\"btn btn-xs btn-outline-primary\" href=\"javascript:void(0)\" title=\"Edit\" onclick=\"edit_compliance(" + row[8] + ")\"><i class=\"fas fa-edit\"></i></a>" +
                        "<a class=\"btn btn-xs btn-outline-danger\" href=\"javascript:void(0)\" title=\"Delete\" nama=" + row[8] + "  onclick=\"delcompliance(" + row[8] + ")\"><i class=\"fas fa-trash\"></i></a>";
                },
                "orderable": false, //set not orderable
            }]
        });
    });

    function reload_table() {
        table.ajax.reload(null, false);
    }

    function add_compliance() {
        save_method = 'add';
        $('#form')[0].reset();
        $('#lampiran-lama').hide();
        $('#lampiran-list').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Add File Compliance');
    }

    function edit_compliance(id) {
        save_method = 'update';
        $('#form')[0].reset();
        $('#lampiran-list').empty();

        $.ajax({
            url: "<?php echo site_url('compliance/editcompliance') ?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data) {
                // isi form biasa
                $('[name="id_file"]').val(data.id_file);
                $('[name="nama_file"]').val(data.nama_file);
                $('[name="id_kat"]').val(data.id_kat);
                $('[name="status"]').val(data.status);
                $('[name="tahun"]').val(data.tahun);
                $('[name="created_at"]').val(data.created_at.replace(' ', 'T'));

                // isi lampiran lama
                $("#lampiran-list").empty();
                if (data.lampiran && data.lampiran.length > 0) {
                    $("#lampiran-lama").show();
                    $.each(data.lampiran, function(i, lamp) {
                        $("#lampiran-list").append(`
        <li id="lampiran-item-${lamp.id_lampiran}">
            <a href="<?= base_url() ?>${lamp.file_url}" target="_blank">
                ${lamp.nama_file}
            </a>
            <a href="javascript:void(0)" onclick="hapusLampiranModal(${lamp.id_lampiran})">
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
        $('#btnSave').text('saving...').attr('disabled', true);
        var url = (save_method == 'add') ?
            "<?php echo site_url('compliance/insert') ?>" :
            "<?php echo site_url('compliance/update') ?>";

        var formdata = new FormData($('#form')[0]);
        var lampiranFiles = $('#lampiranInput')[0].files;
        for (var i = 0; i < lampiranFiles.length; i++) {
            formdata.append('lampiran[]', lampiranFiles[i]);
        }

        $.ajax({
            url: url,
            type: "POST",
            data: formdata,
            dataType: "JSON",
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.status) {
                    $('#modal_form').modal('hide');
                    reload_table();
                    Swal.fire('Success', 'Data berhasil disimpan', 'success');
                } else {
                    Swal.fire('Error', 'Terjadi kesalahan', 'error');
                }
                $('#btnSave').text('Save').attr('disabled', false);
            },
            error: function() {
                Swal.fire('Error', 'Gagal terhubung ke server', 'error');
                $('#btnSave').text('Save').attr('disabled', false);
            }
        });
    }

    function loadLampiranLama(id_file) {
        $.ajax({
            url: "<?= site_url('compliance/getLampiranByFile') ?>/" + id_file,
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
                        <a href="javascript:void(0)" onclick="hapusLampiranModal(${lamp.id_lampiran})">
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

    function hapusLampiranModal(id_lampiran) {
        if (confirm("Yakin mau hapus lampiran ini?")) {
            $.ajax({
                url: "<?= site_url('compliance/deleteLampiranItem') ?>/" + id_lampiran,
                type: "GET",
                dataType: "JSON",
                success: function(res) {
                    if (res.status) {
                        // hapus langsung item di modal
                        $("#lampiran-item-" + id_lampiran).remove();

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