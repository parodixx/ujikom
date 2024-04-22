<nav style="background-color: #2F539B;" class="navbar navbar-expand-sm navbar-dark ">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="<?= base_url('admin'); ?>">Si Kasir</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#a">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="a">
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('admin/petugas'); ?>" aria-current="page">Petugas
                        <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('admin/barang'); ?>" aria-current="page">Barang
                        <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url(''); ?>" aria-current="page">Diskon
                        <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="<?= base_url('admin/transaksi'); ?>" aria-current="page">Transaksi
                        <span class="visually-hidden">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active btn btn-danger" style="border-radius: 0px;" href="<?= base_url('Welcome/logout'); ?>" onclick="return confirm ('Yakin logout?')" aria-current="page"> Logout
                        <span class="visually-hidden">(current)</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>