<section>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-lg-4">
            <div class="card border-primary">
                <div class="card-body">
                    <h1 class="card-title fw-bold text-center">
                        Login
                    </h1>
                    <form action="<?= base_url('Welcome/login'); ?>" method="post" class=" mb-3 p-4">
                        <div class="form-group">
                            <div class="mb-3 ">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="<?= set_value('username'); ?>" class="form-control">
                                <?= form_error('username', '<small class="text-danger pl-3"> error </small>'); ?>
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                                <?= form_error('password', '<small class="text-danger pl-3"> error </small>'); ?>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>