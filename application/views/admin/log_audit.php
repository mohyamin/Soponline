    <!-- Main content -->
    <section class="content">
        <!-- Grafik Dokumen -->
        <div class="row mb-3">

        </div>
        <div class="row">
            <!-- <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Number of Regulasi categories</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="chartKategori" height="150"></canvas>
                    </div>
                </div>
            </div> -->

            <div class="col-md-6">

                <!-- <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="card-title">Number of documents per years</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="grafikDokumen"></canvas>
                    </div>
                </div> -->
            </div>
            <div class="col-md-6">
                <!-- <button id="exportPdfInternal" class="btn btn-sm btn-primary">Export PDF</button> -->
                <!-- <div class="card">
                    <div class="card-header center bg-info">
                        <h3 class="card-title">Number of internal categories</h3>

                    </div>
                    <div class="card-body">
                        <canvas id="chartInternal" height="150"></canvas>
                    </div>
                </div> -->
            </div>

            <div class="col-md-6">
                <!-- <div class="card">
                    <div class="card-header center bg-info">
                        <h3 class="card-title">Number of Users per Role</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="chartRole" height="150"></canvas>
                    </div>
                </div> -->
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header bg-light d-flex flex-wrap justify-content-between align-items-center">
                            <h3 class="card-title mb-2 mb-md-0">
                                <i class="fa fa-list text-blue"></i> Data Log User
                            </h3>

                            <form method="get" action="<?= base_url('dashboard/pdf') ?>" target="_blank" class="form-inline">
                                <div class="form-group mr-2 mb-2">
                                    <label class="mr-1 font-weight-bold">From:</label>
                                    <input type="date" id="from" name="from" class="form-control form-control-sm" required>
                                </div>

                                <div class="form-group mr-2 mb-2">
                                    <label class="mr-1 font-weight-bold">Until:</label>
                                    <input type="date" id="until" name="until" class="form-control form-control-sm" required>
                                </div>

                                <button type="submit" class="btn btn-sm btn-danger mb-2">
                                    <i class="fas fa-file-pdf"></i> DOWNLOAD PDF LOG
                                </button>
                            </form>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="tabellog" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr class="bg-info">
                                        <th>No</th>
                                        <th>User Name</th>
                                        <th>Access Features</th>
                                        <th>User Activity</th>
                                        <th>Create Date</th>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <!-- /.modal -->
    <script type="text/javascript">
        var save_method; // for save method string
        var table; // GLOBAL, akan diisi nanti

        $(document).ready(function() {
            table = $("#tabellog").DataTable({ // JANGAN pakai "var" di sini
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "sEmptyTable": "Data Log Belum Ada"
                },
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    "url": "<?php echo site_url('dashboard/ajax_list') ?>",
                    "type": "POST",
                    "data": function(d) {
                        d.from = $('#from').val();
                        d.until = $('#until').val();
                    }
                },
                "pageLength": 10
            });

            $('#from, #until').on('change', function() {
                table.ajax.reload(); // sekarang ini akan BERHASIL
            });
        });

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
                    url: "<?php echo site_url('Compliance/delete'); ?>",
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
            var image = document.getElementById('id_file');
            image.src = URL.createObjectURL(event.target.files[0]);
        };

        function batal() {
            $('#form')[0].reset();
            reload_table();

        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const kategoriLabels = <?= json_encode(array_column($kategori_data ?? [], 'nama_kat')) ?>;
        const kategoriTotals = <?= json_encode(array_column($kategori_data ?? [], 'total')) ?>;

        const ctxKategori = document.getElementById('chartKategori').getContext('2d');
        new Chart(ctxKategori, {
            type: 'bar',
            data: {
                labels: kategoriLabels,
                datasets: [{
                    label: 'Total Documents',
                    data: kategoriTotals,
                    backgroundColor: 'rgba(54, 162, 235, 0.7)'
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });

        const tahunLabels = <?= json_encode(array_column($tahun_data ?? [], 'tahun')) ?>;
        const tahunTotals = <?= json_encode(array_column($tahun_data ?? [], 'total')) ?>;

        const ctxTahun = document.getElementById('chartTahun').getContext('2d');
        new Chart(ctxTahun, {
            type: 'line',
            data: {
                labels: tahunLabels,
                datasets: [{
                    label: 'Total Dokumen',
                    data: tahunTotals,
                    borderColor: 'rgba(255, 99, 132, 0.9)',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        }
                    }
                }
            }
        });
    </script>
    <script>
        // Grafik Jumlah User per Role
        const roleLabels = <?php echo json_encode(array_column($role_data, 'nama_level')); ?>;
        const roleTotals = <?php echo json_encode(array_column($role_data, 'total')); ?>;

        const ctxRole = document.getElementById('chartRole').getContext('2d');
        new Chart(ctxRole, {
            type: 'bar', // Bisa juga 'doughnut' atau 'bar'
            data: {
                labels: roleLabels,
                datasets: [{
                    label: 'Number of Users',
                    data: roleTotals,
                    backgroundColor: [
                        '#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                }
            }
        });
    </script>

    <script>
        // Grafik Jumlah User per Role
        const roleInternal = <?= json_encode(array_column($kategori_data_internal, 'nama_internal')) ?>;
        const internalTotal = <?= json_encode(array_map('intval', array_column($kategori_data_internal ?? [], 'total'))) ?>;

        const ctxInternal = document.getElementById('chartInternal').getContext('2d');
        new Chart(ctxInternal, {
            type: 'bar',
            data: {
                labels: roleInternal,
                datasets: [{
                    label: 'Internal Amount',
                    data: internalTotal,
                    backgroundColor: [
                        '#007bff', '#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1'
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        ticks: {
                            precision: 0, // ✅ Pastikan hanya angka bulat
                            stepSize: 1
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    </script>


    <script>
        document.getElementById('exportPdfInternal').addEventListener('click', function() {
            const originalCanvas = document.getElementById('chartInternal');

            // 👉 Buat canvas baru dengan ukuran sama
            const exportCanvas = document.createElement('canvas');
            exportCanvas.width = originalCanvas.width;
            exportCanvas.height = originalCanvas.height;

            const ctx = exportCanvas.getContext('2d');

            // ✅ Isi background putih
            ctx.fillStyle = '#ffffff';
            ctx.fillRect(0, 0, exportCanvas.width, exportCanvas.height);

            // 👉 Gambar ulang canvas asli ke atas canvas putih
            ctx.drawImage(originalCanvas, 0, 0);

            // 🖼️ Ambil gambar dari canvas baru (yang sudah ada background putih)
            const canvasImg = exportCanvas.toDataURL('image/jpeg', 1.0);

            const {
                jsPDF
            } = window.jspdf;
            const pdf = new jsPDF();

            const imgProps = pdf.getImageProperties(canvasImg);
            const pdfWidth = pdf.internal.pageSize.getWidth();
            const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

            // 📥 Masukkan gambar ke PDF
            pdf.addImage(canvasImg, 'JPEG', 10, 10, pdfWidth - 20, pdfHeight);
            pdf.save('grafik-internal.pdf');
        });
    </script>

    <script>
        fetch('<?= base_url('dashboard/data_grafik_dokumen') ?>')
            .then(res => res.json())
            .then(data => {
                const tahunUnik = [...new Set(data.map(item => item.tahun))].sort();
                const sumberMenu = ['BOII-REGULASI', 'BOII-INTERNAL', 'BOII-REVOKED'];

                const datasets = sumberMenu.map(menu => {
                    return {
                        label: menu,
                        data: tahunUnik.map(tahun => {
                            const found = data.find(item => item.tahun == tahun && item.sumber_menu == menu);
                            return found ? found.total_dokumen : 0;
                        }),
                        backgroundColor: getWarna(menu)
                    }
                });

                new Chart(document.getElementById('grafikDokumen'), {
                    type: 'bar',
                    data: {
                        labels: tahunUnik,
                        datasets: datasets
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            title: {
                                display: true,
                                text: 'Number of Documents per Year per Menu'
                            }
                        }
                    }
                });

                function getWarna(menu) {
                    switch (menu) {
                        case 'BOII-REGULASI':
                            return 'rgba(54, 162, 235, 0.6)';
                        case 'BOII-INTERNAL':
                            return 'rgba(255, 206, 86, 0.6)';
                        case 'BOII-REVOKED':
                            return 'rgba(255, 99, 132, 0.6)';
                    }
                }
            });

        $('#from, #until').change(function() {
            console.log("Tanggal berubah: ", $('#from').val(), $('#until').val());
            table.ajax.reload();
        });
    </script>