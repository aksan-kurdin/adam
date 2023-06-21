<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report: Selling</title>
    <style>
        body {
            font-family: Tahoma;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 2px solid black;
        }

        table,
        th,
        td {
            padding: 5px;
        }

        th {
            font-size: 14px;
            background-color: #2972ba;
            color: white;
        }
    </style>
</head>

<body>
    <h4>
        Laporan Penjualan <br>
        <?php if (empty($cabang)) {
            echo "All Branches";
        } else {
            echo "Branch: " . $cabang;
        } ?>
        <br>
        PERIODE <?php echo $tgl_mulai; ?> s/d <?php echo $tgl_akhir; ?>
    </h4>
    <br>
    <table>
        <tr>
            <th>NO</th>
            <th>NO FAKTUR</th>
            <th>TGL TRANSAKSI</th>
            <th>KODE PELANGGAN</th>
            <th>NAMA PELANGGAN</th>
            <th>JENIS TRANSAKSI</th>
            <th>JATUH TEMPO</th>
            <th>TOTAL PENJUALAN</th>
            <th>TOTAL BAYAR</th>
            <th>SISA BAYAR</th>
            <th>KETERANGAN</th>
            <th>KASIR</th>
        </tr>
        <?php $no = 1;
        $tot_jual = 0;
        $tot_bayar = 0;
        $tot_sisa = 0;

        foreach ($rpt_data as $r) {
            $tot_jual += $r->total_jual;
            $tot_bayar += $r->total_bayar;
            $tot_sisa += $r->sisa;

            if ($r->sisa != 0) {
                $keterangan = "BELUM LUNAS";
                $colorbg = "#ba2b4f";
                $color = "white";
            } else {
                $keterangan = "LUNAS";
                $colorbg = "";
                $color = "";
            } ?>
            <tr style="background-color:<?php echo $colorbg; ?>; color:<?php echo $color; ?>;">
                <td><?php echo $no; ?></td>
                <td><?php echo $r->no_faktur; ?></td>
                <td><?php echo $r->tgltransaksi; ?></td>
                <td><?php echo $r->kode_pelanggan; ?></td>
                <td><?php echo $r->nama_pelanggan; ?></td>
                <td><?php echo $r->jenistransaksi; ?></td>
                <td><?php echo $r->jatuhtempo; ?></td>
                <td align="right"><?php echo number_format($r->total_jual, '0', '', '.'); ?></td>
                <td align="right"><?php echo number_format($r->total_bayar, '0', '', '.'); ?></td>
                <td align="right"><?php echo number_format($r->sisa, '0', '', '.'); ?></td>
                <td><?php echo $keterangan; ?></td>
                <td><?php echo $r->nama_lengkap; ?></td>
            </tr>
        <?php $no++;
        } ?>

        <tr>
            <th colspan="7">TOTAL</th>
            <th align="right"><?php echo number_format($tot_jual, '0', '', '.'); ?></th>
            <th align="right"><?php echo number_format($tot_bayar, '0', '', '.'); ?></th>
            <th align="right"><?php echo number_format($tot_sisa, '0', '', '.'); ?></th>
            <th colspan="2"></th>
        </tr>
    </table>
</body>

</html>