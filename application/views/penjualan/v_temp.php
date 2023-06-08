<?php
$no = 1;
$grand_total = 0;
foreach ($barang_temp as $b) {
    $grand_total = $grand_total + $b->total;
?>
    <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $b->kode_barang; ?></td>
        <td><?php echo $b->nama_barang; ?></td>
        <td align="right"><?php echo number_format($b->harga, '0', '', ','); ?></td>
        <td align="center"><?php echo $b->qty; ?></td>
        <td align="right"><?php echo number_format($b->total, '0', '', ','); ?></td>
        <td>
            <a href="#" class="btn btn-danger btn-sm delete" data-kodebarang="<?php echo $b->kode_barang; ?>" data-iduser="<?php echo $b->id_user; ?>">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
<?php
    $no++;
}
?>
<tr>
    <th colspan="5">Grand Total</th>
    <th style="text-align:right">
        <p id="grand_total">
            <?php echo number_format($grand_total, '0', '', ','); ?>
        </p>
    </th>
    <th></th>
</tr>

<script>
    $(function() {
        function load_temp() {
            var id_user = $("#id_user").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>penjualan/load_temp',
                data: {
                    id_user: id_user
                },
                cache: false,
                success: function(respond) {
                    $("#data_temp").html(respond);
                }
            });
        }

        function load_grand_total() {
            var grandtotal = $("#grand_total").text();
            $("#total_penjualan").text(grandtotal);
        }

        load_grand_total();

        $(".delete").click(function() {
            var kodebarang = $(this).attr("data-kodebarang");
            var iduser = $(this).attr("data-iduser");
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>penjualan/delete_temp',
                data: {
                    kodebarang: kodebarang,
                    iduser: iduser
                },
                cache: false,
                success: function(respond) {
                    if (respond == 1) {
                        swal("Deleted!", "Data deleted successfully.", "success");
                        load_temp();
                    }
                }
            });
        });
    });
</script>