<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <span class="fw-bold fs-3">Table <?= $title; ?></span>
            <div class="card mt-3">
                <div class="card-body">
                    <button type="button" class="btn btn-success" style="border-radius: 2px;" data-bs-toggle="modal" data-bs-target="#modalId">
                        Add Produk
                    </button>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered text-center">
                            <thead class="table table-info">
                                <tr>
                                    <th width="5%">No</th>
                                    <th width="15%">Kode Produk</th>
                                    <th width="20%">Nama Produk</th>
                                    <th width="15%">Harga Produk</th>
                                    <th width="10%">Stok</th>
                                    <th width="10%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($produk as $p) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $p->kode_produk; ?></td>
                                        <td><?= $p->nama_produk; ?></td>
                                        <td>Rp. <?= $p->harga; ?></td>
                                        <td><?= $p->stok; ?></td>
                                        <td>
                                            <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaledit<?= $p->id_produk; ?>"><i class="fas fa-pencil"></i></a> |
                                            <a class="btn btn-danger" href="<?= base_url('kelola/hapusProduk/' . $p->id_produk); ?>" onclick="return confirm('Yakin data akan di hapus??');"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
                    <form action="<?= base_url('kelola/saveProduk'); ?> " method="post">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <label for="kode_produk">Kode Produk</label>
                                        <input type="text" class="form-control" name="kode_produk" id="kode_produk" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="nama_produk">Nama Produk</label>
                                        <input type="text" class="form-control" name="nama_produk" id="nama_produk" required>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <label for="harga">Harga Produk</label>
                                        <input type="number" class="form-control" name="harga" id="harga" required>
                                    </div>
                                    <div class="col-3 mb-3">
                                        <label for="stok">Stok Produk</label>
                                        <input type="number" class="form-control" name="stok" id="stok" required>
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

    <?php foreach ($produk as $p) : ?>
        <div class="modal fade" id="modaledit<?= $p->id_produk ?>" tabindex="-1">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= base_url('kelola/editProduk/' . $p->id_produk); ?> " method="post">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label for="">Kode Produk</label>
                                            <input type="text" class="form-control" name="kode_produk" id="kode_produk" value="<?= $p->kode_produk; ?>">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="">Nama Produk</label>
                                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= $p->nama_produk; ?>">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="">Harga Produk</label>
                                            <input type="number" class="form-control" name="harga" id="harga" value="<?= $p->harga; ?>">
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="">Stok Produk</label>
                                            <input type="number" class="form-control" name="stok" id="stok" value="<?= $p->stok; ?>">
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
    <?php endforeach; ?>
</div>

<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>