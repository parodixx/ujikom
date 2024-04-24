<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <span class="fw-bold fs-3">Table <?= $title; ?></span>
            <div class="card mt-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="kasir" class="form-label">Petugas</label>
                                <input type="text" name="kasir" id="kasir" class="form-control" value="<?= $petugas; ?>" disabled />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Tanggal Transaksi</label>
                                <input type="date" name="tglt" id="tglt" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="no_faktur" class="form-label">No Faktur</label>
                                <input type="text" name="no_faktur" id="no_faktur" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Member</label>
                                <select name="member" id="member" class="form-control">
                                    <option disabled selected> - </option>
                                    <?php foreach ($pelanggan1 as $pel) : ?>
                                        <option value="<?= $pel->nama_pelanggan; ?>"><?= $pel->nama_pelanggan; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Kode Produk</label>
                                <select name="kode_produk" id="kode_produk" class="form-control">
                                    <option>-</option>
                                    <?php foreach ($produk2 as $p) : ?>
                                        <option value="<?= $p->kode_produk; ?>"><?= $p->kode_produk; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Harga</label>
                                <input type="text" name="harga" id="harga2" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="mb-3">
                                <label for="" class="form-label">Qty</label>
                                <input type="number" name="qty" id="qty" class="form-control" />
                            </div>
                        </div>
                        <div class=" d-flex justify-content-end">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary btn-lg" id="save" style="border-radius: 2px"><i class="fas fa-check-to-slot"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-3 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="tablebarang">
                                <thead class="table table-info">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Member</th>
                                        <th>Qty</th>
                                        <!-- <th>Diskon</th> -->
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="tambahproduk">

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Tanggal</label>
                                                        <input type="date" name="tanggal" id="tanggal" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Uang</label>
                                                        <input type="text" name="uang" id="uang" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <span class="fw-bold fs-3">TOTAL : </span><span class="fw-bold fs-3" id="total"> 0 </span><br>
                                                <span class="fw-bold fs-5">Diskon : </span><span class="fw-bold fs-5" id="diskon2"> - </span><br>
                                                <span class="fw-bold fs-5">Pembayaran : </span><span class="fw-bold fs-5" id="pembayaran"> 0 </span><br>
                                                <span class="fw-bold fs-5">Kembalian :</span> <span class="fw-bold fs-5" id="kembalian"> 0</span>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" style="border-radius: 1px" id="bayar">Bayar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="<?= base_url(); ?>assets/js/jquery-number/jquery.number.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/df-number-format/2.1.6/jquery.number.min.js"></script> -->

<script>
    $('#uang').number(true, 0, ',', '.');


    $('#save').on('click', function(e) {
        let rows = $('#tablebarang tr');
        let colomsrow = rows.length;
        let kodeProduk = $('#kode_produk').val();
        let namaProduk = $('#nama_produk').val();
        let hargaProduk = parseFloat($('#harga2').val()); // Mengubah hargaProduk menjadi angka
        let member = $('#member').val();
        let qty = parseFloat($('#qty').val()); // Mengubah qty menjadi angka
        let total = hargaProduk * qty;

        let strip;
        if (member == null) {
            strip = '-'
        } else {
            strip = member
        };
        console.log(strip)

        let total2 = $.number(total, 0, ',', '.');

        if (!isNaN(hargaProduk)) {
            let totalHarga = 0;
            $('#tambahproduk').append(
                '<tr>' +
                '<td>' + (colomsrow + 1) + '</td>' +
                '<td class="kode_produk">' + kodeProduk + '</td>' +
                '<td class="nama_produk">' + namaProduk + '</td>' +
                '<td class="harga">' + $.number(hargaProduk, 0, ',', '.') + '</td>' +
                '<td class="member">' + strip + '</td>' +
                '<td class="qty">' + qty + '</td>' +
                '<td class="total">' + total2 + '</td>' +
                // '<td class="diskon">' + $.number(diskon, 0, ',', '.') + '</td>' +
                '</tr>');

            $('#tambahproduk .total').each(function() {
                let hargaStr = $(this).text().replace(/[^0-9,-]/g, '');
                totalHarga += parseFloat(hargaStr);
            });

            $('#total').text($.number(totalHarga, 0, ',', '.'), 'Rp.');

            // let member = $('#member').val();
            if (member) {
                $.ajax({
                    type: "get",
                    url: "<?= base_url('kelola/getDiskon') ?>",
                    dataType: "json",
                    success: function(response) {
                        let diskon = response[0].diskon
                        let total = $('#total').text();
                        // console.log(diskon);
                        let total_harga = parseFloat(total.replace(/[\D]/g, ""));
                        console.log(total_harga);
                        let diskon_replace = diskon.replace(/%/g, "");
                        // console.log(diskon_replace);
                        let minimal_pembelanjaan = response[0].minimal
                        let nominal_minimal = parseFloat(minimal_pembelanjaan.replace(/[\D]/g, ""))
                        // console.log(minimal_pembelanjaan)
                        if (nominal_minimal <= total_harga) {
                            let diskon_persentase = diskon_replace / 100;
                            let apa = total_harga * diskon_persentase
                            $('#diskon2').text($.number(apa, 0, ',', '.'))

                            let total_diskon = total_harga - (total_harga * diskon_persentase);
                            let total_display = $.number(total_diskon, 0, ',', '.');
                            $('#total').text(total_display);
                        }
                    }
                });
            } else {
                $('#total').text($.number(totalHarga, 0, ',', '.'), 'Rp.');
            }

        }

    });
    $('#uang').on('input', function() {
        let bayar = $(this).val();
        // console.log(bayar);
        let total = $('#total').text();
        // console.log(total);
        let bayar2 = parseFloat(bayar.replace(/[\D]/g, ""));
        let total2 = parseFloat(total.replace(/[\D]/g, ""));

        if (!isNaN(bayar2) && !isNaN(total2)) {
            let total3 = bayar2 - total2;
            let totalBayar = $.number(bayar2, 0, ',', '.');
            let kembalian = $.number(total3, 0, ',', '.');
            $('#pembayaran').text(totalBayar);
            $('#kembalian').text(kembalian);

        }
    });
</script>

<script>
    // $(document).ready(function() {
    //     $('#bayar').on('click', function() {
    //         $('#pembayaran').css('display', 'block');
    //         $(this).css('display', 'none');
    //         $('#simpan').css('display', 'block');
    //     })
    // });

    $('#kode_produk').on('change', function() {
        var kodeProduk = $(this).val();
        $.ajax({
            type: "post",
            url: "<?= base_url('admin/getProduk'); ?>",
            data: {
                kodeProduk: kodeProduk
            },
            dataType: "json",
            success: function(response) {
                const result = response[0];
                // console.log(result)
                const harga = parseFloat(result.harga.replace(/[\D]/g, ""))
                $('#nama_produk').val(result.nama_produk);
                $('#harga2').val(harga);
            }
        });
    });
</script>

<script>
    function generateRandom() {
        return Math.floor(Math.random() * (9999 - 1000 + 1) + 1000);
    }

    $(document).ready(function() {
        let formatDate = new Date().toISOString().slice(0, 10).replace(/-/g, "");
        let transaksi = 'NFO';

        let randomCode = generateRandom();
        let noFaktur = formatDate + '-' + transaksi + '-' + randomCode;

        $('#no_faktur').val(noFaktur);
    });
</script>

<script>
    $(document).ready(function() {
        var today = new Date();
        var formattedDate = today.toISOString().substr(0, 10);
        $('#tglt').val(formattedDate);
    });
</script>

<script>
    $(document).ready(function() {
        $('#bayar').on('click', function() {
            // let data = [];
            // let namakasir = $('#kasir').val();
            // let nofaktur = $('#no_faktur').val();
            // let tanggal = $('#tanggal').val();
            // let member = $('#member').val();
            // let total = $('#total').text();
            // let pembayaran = $('#uang').text();
            // let kembalian = $('#kembalian').text();
            // let diskon = $('#diskon2').text();
            let data = [];
            let namakasir = $('#kasir').val();
            let nofaktur = $('#no_faktur').val();
            let tanggal = $('#tanggal').val();
            let member = $('#member').val();
            let total = $('#total').text();
            let pembayaran = $('#pembayaran').text();
            let kembalian = $('#kembalian').text();
            let diskon = $('#diskon2').text();
            // $('#tambahproduk tr').each(function() {
            //     let row = {}
            //     row.kodeproduk = $(this).find('.kode_produk').text()
            //     row.namaproduk = $(this).find('.nama_produk').text();
            //     row.hargaproduk = $(this).find('.harga').text();
            //     row.qty = $(this).find('.qty').text();
            //     row.totalHarga = $(this).find('.total').text();
            //     data.push(row)

            // })
            $('#tambahproduk tr').each(function() {
                let row = {}
                row.kodeProduk = $(this).find('.kode_produk').text()
                row.namaProduk = $(this).find('.nama_produk').text();
                row.hargaProduk = $(this).find('.harga').text();
                row.qty = $(this).find('.qty').text();
                row.totalHarga = $(this).find('.total').text();
                data.push(row)
            })
            // $.ajax({
            //     type: "post",
            //     url: "<?= base_url('kelola/saveSiTransaksi'); ?>",
            //     data: {
            //         kasir:namakasir,
            //         no_faktur:nofaktur,
            //         tanggal:tanggal,
            //         member:member,
            //         total:total,
            //         pembayaran:pembayaran,
            //         kembalian:kembalian,
            //         diskon2:diskon,
            //         data:data
            //     } ,
            //     success: function (response) {
            //         console.log(response)
            //     },
            //     error:function (error) {
            //         console.log(error)
            //     }

            // });
            $.ajax({
                type: "POST",
                url: "<?= base_url('kelola/saveSiTransaksi') ?>",
                data: {
                    kasir: namakasir,
                    no_faktur: nofaktur,
                    tanggal: tanggal,
                    member: member,
                    total: total,
                    pembayaran: pembayaran,
                    kembalian: kembalian,
                    diskon2: diskon,
                    data: data
                },
                success: function(response) {},
                error: function(error) {
                    console.log(error)
                }
            });
        })
    });
</script>