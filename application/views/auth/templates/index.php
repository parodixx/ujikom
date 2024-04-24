<head>
    <?php $this->load->view('auth/templates/header'); ?>
</head>

<body>
    <div class="swal" data-swal="<?= $this->session->flashdata('success'); ?>"></div>
    <div class="error" data-error="<?= $this->session->flashdata('error'); ?>"></div>

    <?php $this->load->view($abc); ?>
</body>


<script src="<?= base_url(); ?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/sweetalert2/sweetalert2.js"></script>
<script src="<?= base_url(); ?>assets/js/main.js"></script>