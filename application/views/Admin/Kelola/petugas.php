<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <span class="fw-bold fs-3">Table <?= $title; ?></span>
            <div class="card mt-3">
                <div class="card-body">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalId">
                        Add Petugas
                    </button>
                    <div class="table-responsive mt-3 ">
                        <table class="table table-bordered text-center">
                            <thead class="table table-info">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Nama Petugas</th>
                                    <th width="20%">Username</th>
                                    <th width="10%">Status</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($petugas2 as $p) :
                                    if ($p->role_id != 1) :
                                ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $p->nama; ?></td>
                                            <td><?= $p->username; ?></td>
                                            <td><span class="badge rounded-pill <?= $p->is_active == 'aktif' ? 'bg-success' : 'bg-danger'; ?>" id="status"><?= $p->is_active; ?></span></td>
                                            <td class="btn-group">
                                                <a href="<?= base_url('kelola/updatePetugas/') . $p->id; ?>" type="submit" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="<?= base_url('kelola/updateStatus/') . $p->id; ?>" type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin petugas akan di nonaktifkan?')"><i class="fas fa-ban"></i></a>
                                                <a href="<?= base_url('kelola/deletePetugas/') . $p->id; ?>" type="submit" class="btn btn-danger" onclick="return confirm('Apakah yakin petugas akan di hapus?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    endif;
                                endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalId" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('Welcome/register'); ?> " method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="nama_petugas">Nama Petugas</label>
                                        <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="username">Username</label>
                                        <input type="text" class="form-control" name="username" id="username" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">Non Aktif</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Move submit button inside the form -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>