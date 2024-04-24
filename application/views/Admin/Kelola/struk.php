<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Sturk</title>
    <style>
        @page {
            margin: 0;
        }

        body {
            margin: 0;
            font-size: 10px;
            font-family: monospace;
        }

        td {
            font-size: 10px;
        }

        .sheet {
            margin: 0;
            overflow: hidden;
            position: relative;
            box-sizing: border-box;
            page-break-after: always;
        }

        /** Paper sizes **/
        body.struk .sheet {
            width: 58mm;
            padding: 2mm;
            background: white;
            color: black;
            box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
            margin: 5mm;
        }

        .txt-left {
            text-align: left;
        }

        .txt-center {
            text-align: center;
        }

        .txt-right {
            text-align: right;
        }

        /* Style untuk tampilan layar */
        @media screen {
            body {
                background: #e0e0e0;
                font-family: monospace;
            }

            .sheet {
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                margin: 5mm;
            }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
            body {
                font-family: monospace;
            }

            body.struk {
                width: 58mm;
                text-align: left;
            }

            body.struk .sheet {
                padding: 2mm;
            }

            .txt-left {
                text-align: left;
            }

            .txt-center {
                text-align: center;
            }

            .txt-right {
                text-align: right;
            }
        }
    </style>
</head>

<body class="struk">
    <section class="sheet">
        <div class="print-section">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td>Nama Toko</td>
                </tr>
                <tr>
                    <td>Alamat Toko</td>
                </tr>
                <tr>
                    <td>Telp: Nomor Telepon</td>
                </tr>
            </table>

            <?= str_repeat("=", 38) ?><br />
            <table cellpadding="0" cellspacing="0" style="width:100%">
                <tr>
                    <td align="left" class="txt-left">Nota&nbsp;</td>
                    <td align="left" class="txt-left">:</td>
                    <td align="left" class="txt-left">&nbsp;<?= $data_transaksi['no_faktur']; ?></td>
                </tr>
                <tr>
                    <td align="left" class="txt-left">Kasir</td>
                    <td align="left" class="txt-left">:</td>
                    <td align="left" class="txt-left">&nbsp;<?= $data_transaksi['nama_kasir']; ?></td>
                </tr>
                <tr>
                    <td align="left" class="txt-left">Tgl.&nbsp;</td>
                    <td align="left" class="txt-left">:</td>
                    <td align="left" class="txt-left">&nbsp;<?= $data_transaksi['tanggal']; ?></td>
                </tr>

            </table>
            <?= str_repeat("=", 38) ?><br />
            <table cellpadding="0" cellspacing="0" style="width:100%">
                <tr>
                    <td align="left" class="txt-left" width="50%">Item</td>
                    <td align="left" class="txt-left">Qty</td>
                    <td align="left" class="txt-left">Harga</td>
                    <td align="left" class="txt-left">Total</td>
                </tr>
                <?php foreach ($data_barang as $b) : ?>
                    <tr>
                        <td align="left" class="txt-left"><?= $b['nama_barang']; ?></td>
                        <td align="left" class="txt-left"><?= $b['qyt']; ?></td>
                        <td align="left" class="txt-left"><?= $b['harga_perbarang']; ?></td>
                        <td align="left" class="txt-left"><?= $b['total_harga_barang']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <!-- Sisipkan baris-baris data barang secara statis sesuai kebutuhan -->
            <br />
            <table cellpadding="0" cellspacing="0" style="width:100%">
                <tr>
                    <td align="left" class="txt-left" width="80%">Metode Pembayaran</td>
                    <td align="left" class="txt-left"><?= $data_transaksi['metode_pem']; ?></td>
                </tr>
                <tr>
                    <td align="left" class="txt-left" width="80%">Pembayaran</td>
                    <td align="left" class="txt-left"><?= $data_transaksi['pembayaran']; ?></td>
                </tr>
                <tr>
                    <td align="left" class="txt-left" width="80%">Kembalian</td>
                    <td align="left" class="txt-left"><?= $data_transaksi['kembalian']; ?></td>
                </tr>
                <tr>
                    <td align="left" class="txt-left">Diskon</td>
                    <td align="left" class="txt-left"><?= $data_transaksi['diskon']; ?></td>
                </tr>

                <tr>
                    <td align="left" class="txt-left">Grand&nbspTotal</td>
                    <td align="left" class="txt-left"><?= $data_transaksi['total']; ?></td>
                </tr>
                <!-- Sisipkan bagian pembayaran, angsuran, kembalian jika diperlukan -->
            </table>
            <br />
            <p>Terima kasih atas kunjungan anda</p>
            <br /><br /><br /><br />
        </div>
    </section>
    <script>

    </script>
</body>

</html>