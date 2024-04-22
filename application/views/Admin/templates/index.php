<head>
    <?php $this->load->view('admin/templates/header'); ?>
</head>


<?php $this->load->view('admin/templates/topbar'); ?>


<body>
    <div class="mt-5 ms-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb fw-bold">
                <li class="breadcrumb-item">Home</li>
                <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
        </nav>
    </div>
    <?php $this->load->view($abc); ?>
</body>

<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>