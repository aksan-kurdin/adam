<h2 class="page-title mb-3">
    Data Faktur
</h2>

<input type="hidden" name="cek_barang">
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-stripped">
                    <tr>
                        <th>No Faktur</th>
                        <th><?php echo $penjualan['no_faktur']; ?></th>
                    </tr>
                    <tr>
                        <th>Transaction Date</th>
                        <th><?php echo $penjualan['tgltransaksi']; ?></th>
                    </tr>
                    <tr>
                        <th>Cust ID</th>
                        <th><?php echo $penjualan['kode_pelanggan']; ?></th>
                    </tr>
                    <tr>
                        <th>Cust Name</th>
                        <th><?php echo $penjualan['nama_pelanggan']; ?></th>
                    </tr>
                    <tr>
                        <th>Transaction Type</th>
                        <th><?php echo ucwords($penjualan['jenistransaksi']); ?></th>
                    </tr>
                    <?php if ($penjualan['jenistransaksi'] == 'credit') { ?>
                        <tr>
                            <th>Due Date</th>
                            <th><?php echo $penjualan['jatuhtempo']; ?></th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-7">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white avatar mr-3" style="height:9rem; width:9rem">
                    <i class="fa fa-shopping-cart" style="font-size:5rem"></i>
                </span>
                <div class="mr-3">
                    <h2 id="total_penjualan" style="font-size:5rem">0</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">Data Barang</h4>
            </div>

            <div class="card-body">

                <div class="row">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Parts ID</th>
                                <th>Parts Name</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $grand_total = 0;
                            foreach ($detail as $d) {
                                $total = $d->harga * $d->qty;
                                $grand_total += $total;
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $d->kode_barang; ?></td>
                                    <td><?php echo $d->nama_barang; ?></td>
                                    <td align="right"><?php echo number_format($d->harga, '0', '', '.'); ?></td>
                                    <td><?php echo $d->qty; ?></td>
                                    <td align="right"><?php echo number_format($total, '0', '', '.'); ?></td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5">Grand Total</th>
                                <th style="text-align:right" id="grand_total"><?php echo number_format($grand_total, '0', '', '.'); ?></th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">

            <div class="card-header">
                <h4 class="card-title">History</h4>
            </div>

            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="pay"><i class="fa fa-money mr-3">Pay!</i></a>
                <div><?php echo $this->session->flashdata('msg'); ?></div>
                <table class="table table-bordered table-stripped">
                    <thead>
                        <th>NO</th>
                        <th>No Bukti</th>
                        <th>Paid Date</th>
                        <th>Paid Amount</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $total_paid = 0;
                        foreach ($bayar as $b) {
                            $total_paid += $b->bayar;
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $b->nobukti; ?></td>
                                <td><?php echo $b->tglbayar; ?></td>
                                <td align="right"><?php echo number_format($b->bayar, '0', '', '.'); ?></td>
                                <td>
                                    <a href="#" data-href="<?php echo base_url('penjualan/delete_pay/' . $b->nobukti . '/' . $penjualan['no_faktur']); ?>" class="btn btn-sm btn-danger delete"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modalPay" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Input</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formPay"></div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalDelete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Are you sure?</div>
                <div>If you proceed, you will lose this data permanently.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <a href="#" id="href-delete" class="btn btn-danger">Yes, delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    $(function() {

        $("#total_penjualan").text($("#grand_total").text());

        $(".delete").click(function() {
            var href = $(this).attr("data-href");
            $("#modalDelete").modal("show");
            $("#href-delete").attr("href", href);
            // console.log(href);
            // return false;
        });

        $("#pay").click(function() {
            var no_faktur = "<?php echo $penjualan['no_faktur']; ?>"
            var grand_total = "<?php echo $grand_total; ?>"
            var total_paid = "<?php echo $total_paid; ?>"

            $("#modalPay").modal("show");

            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('penjualan/input_pay'); ?>',
                data: {
                    no_faktur: no_faktur,
                    grand_total: grand_total,
                    total_paid: total_paid
                },
                cache: false,
                success: function(respond) {
                    $("#formPay").html(respond);
                }
            });
        });
    });
</script>