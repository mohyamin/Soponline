<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-3">
                <div class="card-header bg-info text-white">
                    <i class="fas fa-user-edit"></i> Edit Profile
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="<?php echo site_url('profile/update'); ?>">
                        <div class="row">

                            <!-- Foto Profil -->
                            <div class="col-md-4 text-center">
                                <img id="preview"
                                    src="<?php echo base_url('assets/foto/user/' . $this->session->userdata('image')) . '?t=' . time(); ?>"
                                    class="img-thumbnail rounded-circle mb-3"
                                    width="150" height="150" alt="Foto Profile">


                                <div class="form-group">
                                    <input type="file" name="image" class="form-control-file" id="imageInput">
                                    <small class="text-muted">Format: jpg, jpeg, png, gif. Max 5MB</small>
                                </div>
                            </div>

                            <!-- Form Data User -->
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="full_name" class="fw-bold">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="full_name"
                                        value="<?php echo $this->session->userdata('full_name'); ?>">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="username" class="fw-bold">Username</label>
                                    <input type="text" class="form-control" name="username"
                                        value="<?php echo $this->session->userdata('username'); ?>" readonly>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" class="fw-bold">Password Baru
                                        <small class="text-muted">(Opsional)</small>
                                    </label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Kosongkan jika tidak diubah">
                                </div>
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="mt-4 d-flex justify-content-between">
                            <a href="<?php echo site_url('dashboard'); ?>" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-info text-white">
                                <i class="fas fa-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script Preview + Validasi -->
<script>
    document.getElementById('imageInput').addEventListener('change', function(event) {
        let file = event.target.files[0];
        if (file) {
            // Validasi format file
            const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                Swal.fire({
                    icon: 'error',
                    title: 'Format tidak valid',
                    text: 'Hanya diperbolehkan jpg, jpeg, png, atau gif!',
                    confirmButtonColor: '#17a2b8' // samakan dengan warna header template
                });
                event.target.value = ""; // reset input
                return;
            }

            // Validasi ukuran file (max 5MB)
            const maxSize = 5 * 1024 * 1024; // 5MB
            if (file.size > maxSize) {
                Swal.fire({
                    icon: 'warning',
                    title: 'File terlalu besar',
                    text: 'Ukuran maksimal 5MB!',
                    confirmButtonColor: '#17a2b8'
                });
                event.target.value = ""; // reset input
                return;
            }

            // Preview gambar
            let reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata('success'); ?>',
            confirmButtonColor: '#17a2b8'
        });
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= $this->session->flashdata('success'); ?>',
            confirmButtonColor: '#17a2b8'
        });
    </script>
    <?php $this->session->unset_userdata('success'); ?>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '<?= $this->session->flashdata('error'); ?>',
            confirmButtonColor: '#17a2b8'
        });
    </script>
    <?php $this->session->unset_userdata('error'); ?>
<?php endif; ?>