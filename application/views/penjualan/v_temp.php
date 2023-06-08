<?php
$no = 1;
foreach ($barang_temp as $b) {
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $b->kode_barang; ?></td>
        <td><?php echo $b->nama_barang; ?></td>
        <td><?php echo $b->harga; ?></td>
        <td><?php echo $b->qty; ?></td>
        <td><?php echo $b->total; ?></td>
    </tr>
<?php
    $no++;
}
?>