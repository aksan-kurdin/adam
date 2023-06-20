<h2 class="page-title">
    Transaction: Sell
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="<?php echo base_url(); ?>penjualan/input" class="btn btn-success mb-3" id="add">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>Add New
                </a>
                <form action="<?php echo base_url('penjualan/index'); ?>" method="POST">
                    <div class="mb-3">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>

                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                                <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                                <rect x="5" y="11" width="1" height="2" />
                                <line x1="10" y1="11" x2="10" y2="13" />
                                <rect x="14" y="11" width="1" height="2" />
                                <line x1="19" y1="11" x2="19" y2="13" />
                            </svg>
                        </span>
                        <input type="text" name="no_faktur" class="form-control" id="no_faktur" placeholder="Invoice No" value="<?php echo $no_faktur; ?>">
                    </div>

                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </span>
                        <input type="text" name="nama_pelanggan" class="form-control" id="nama_pelanggan" placeholder="Customer Name" value="<?php echo $nama_pelanggan; ?>">
                    </div>

                    <div class=" row">
                        <div class="col-6">

                            <div class="input-icon mb-3" id="jt">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="11" y1="15" x2="12" y2="15" />
                                        <line x1="12" y1="15" x2="12" y2="18" />
                                    </svg>
                                </span>
                                <input type="text" name="tgl_mulai" class="form-control" id="tgl_mulai" placeholder="Start from" value="<?php echo $tgl_mulai; ?>">
                            </div>

                        </div>

                        <div class=" col-6">

                            <div class="input-icon mb-3" id="jt">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="11" y1="15" x2="12" y2="15" />
                                        <line x1="12" y1="15" x2="12" y2="18" />
                                    </svg>
                                </span>
                                <input type="text" name="tgl_akhir" class="form-control" id="tgl_akhir" placeholder="Until" value="<?php echo $tgl_akhir; ?>">
                            </div>

                        </div>
                    </div>

                    <div class=" mb-3">
                        <button type="submit" name="submit" class="btn btn-primary w-100"><i class="fa fa-search mr-2"></i>Find...</button>
                    </div>
                </form>

                <table class="table table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Cust ID</th>
                        <th>Cust Name</th>
                        <th>Transaction Type</th>
                        <th>T.O.P</th>
                        <th>Total Penjualan</th>
                        <th>Total Pembayaran</th>
                        <th>Sisa Pembayaran</th>
                        <th>Remarks</th>
                        <th>Cashier</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php $no = $row + 1;
                        foreach ($penjualan as $p) {
                            if ($p->sisa > 0) {
                                $remarks = 'BELUM LUNAS';
                                $bg_color = 'bg-red';
                            } else {
                                $remarks = 'LUNAS';
                                $bg_color = 'bg-green';
                            }
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $p->no_faktur ?></td>
                                <td><?php echo $p->tgltransaksi ?></td>
                                <td><?php echo $p->kode_pelanggan ?></td>
                                <td><?php echo $p->nama_pelanggan ?></td>
                                <td><?php echo $p->jenistransaksi ?></td>
                                <td><?php echo $p->jatuhtempo ?></td>
                                <td align="right"><?php echo number_format($p->total_jual, '0', '', '.') ?></td>
                                <td align="right"><?php echo number_format($p->total_bayar, '0', '', '.') ?></td>
                                <td align="right"><?php echo number_format(($p->sisa), '0', '', '.') ?></td>
                                <td align="center"><span class="badge <?php echo $bg_color; ?>"><?php echo $remarks ?></span></td>
                                <td><?php echo $p->id_user ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger delete" data-href="<?php echo base_url('penjualan/delete/' . $p->no_faktur); ?>"><i class="fa fa-trash-o"></i></a>
                                    <a href="<?php echo base_url('penjualan/printout/' . $p->no_faktur); ?>" target="_blank" class="btn btn-sm btn-primary"><i class="fa fa-print"></i></a>
                                    <?php if ($p->sisa > 0) { ?>
                                        <a href="<?php echo base_url('penjualan/detailfaktur/' . $p->no_faktur); ?>" class="btn btn-sm btn-success">Pay</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php $no++;
                        }
                        ?>
                    </tbody>
                </table>
                <div>
                    <?php echo $pagination; ?>
                </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('tgl_mulai'), {});
    });

    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('tgl_akhir'), {});
    });
</script>

<script>
    $(function() {
        $(function() {
            $(".delete").click(function() {
                var href = $(this).attr("data-href");
                $("#modalDelete").modal("show");
                $("#href-delete").attr("href", href);
            });
        });
    });
</script>