<h2 class="page-title mb-3">
    Detail Sell
</h2>
<form id="form_sell" action="POST">
    <input type="hidden" name="cek_barang">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">

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
                        <input type="text" value="<?php echo $no_faktur; ?>" class="form-control" name="no_faktur" id="no_faktur" placeholder="Invoice No">
                    </div>

                    <div class="input-icon mb-3">
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
                        <input type="text" value="<?php echo date("Y-m-d"); ?>" class="form-control" name="tgl_transaksi" id="tgl_transaksi" placeholder="Date">
                    </div>

                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </span>
                        <input type="hidden" name="kode_pelanggan" id="kode_pelanggan">
                        <input type="text" class="form-control" name="nama_pelanggan" id="nama_pelanggan" placeholder="Customer Name">
                    </div>

                    <div class="mb-3">
                        <select name="jenis_transaksi" id="jenis_transaksi" class="form-select">
                            <option value="">Select Transaction Type</option>
                            <option value="cash">Cash</option>
                            <option value="credit">Credit</option>
                        </select>
                    </div>

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
                        <input type="text" readonly class="form-control" name="tgl_jatuh_tempo" id="tgl_jatuh_tempo" placeholder="Due Date">
                    </div>

                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </span>
                        <input type="hidden" value="<?php echo $this->session->userdata('id_user'); ?>" name="id_user">
                        <input type="text" readonly value="<?php echo $this->session->userdata('id_user') . ' - ' . $this->session->userdata('nama_lengkap'); ?>" class="form-control" name="username" id="username" placeholder="Cashier">
                    </div>

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

                        <div class="col-md-2">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <i class="fa fa-barcode"></i>
                                </span>
                                <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Parts ID">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="6" height="6" rx="1" />
                                        <rect x="14" y="4" width="6" height="6" rx="1" />
                                        <rect x="4" y="14" width="6" height="6" rx="1" />
                                        <rect x="14" y="14" width="6" height="6" rx="1" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Parts Name">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                        <path d="M12 3v3m0 12v3" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" name="harga" id="harga" placeholder="Price" style="text-align:right">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect width="6" height="6" x="9" y="5" rx="1" />
                                        <line x1="4" y1="7" x2="5" y2="7" />
                                        <line x1="4" y1="11" x2="5" y2="11" />
                                        <line x1="19" y1="7" x2="20" y2="7" />
                                        <line x1="19" y1="11" x2="20" y2="11" />
                                        <line x1="4" y1="15" x2="20" y2="15" />
                                        <line x1="4" y1="19" x2="20" y2="19" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <button class="btn btn-primary">
                                <i class="fa fa-cart-plus" style="font-size:1.5rem"></i>
                            </button>
                        </div>

                    </div>

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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">Grand Total</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>

                        <div class="row mt-3">
                            <button type="submit" class="btn btn-primary w100"><i class="fa fa-send mr-2"> Save</i></button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</form>

<div class="modal modal-blur fade" id="modal_cust" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customers</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered" id="list">
                    <thead>
                        <th>No</th>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Address</th>
                        <th>Mobile No</th>
                        <th>Branch</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pelanggan as $p) {
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $p->kode_pelanggan; ?> </td>
                                <td> <?php echo $p->nama_pelanggan; ?> </td>
                                <td> <?php echo $p->alamat_pelanggan; ?> </td>
                                <td> <?php echo $p->no_hp; ?> </td>
                                <td> <?php echo $p->nama_cabang; ?> </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary choose" data_kodepel="<?php echo $p->kode_pelanggan; ?>" data_namapel="<?php echo $p->nama_pelanggan; ?>">Select!</a>
                                </td>
                            </tr>

                        <?php
                            $no++;
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('tgl_transaksi'), {});
    });
</script>

<script>
    $(function() {
        function hide_tgl_jatuh_tempo() {
            $("#jt").hide();
        }

        function show_tgl_jatuh_tempo() {
            $("#jt").show();
        }

        function get_tgl_jatuh_tempo() {
            var tgl_transaksi = $("#tgl_transaksi").val();
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>penjualan/get_tgl_jatuh_tempo',
                data: {
                    tgl_transaksi: tgl_transaksi
                },
                cache: false,
                success: function(respond) {
                    $("#tgl_jatuh_tempo").val(respond);
                }
            });
        }

        function cek_barang() {
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url(); ?>penjualan/cek_barang',
                cache: false,
                success: function(respond) {
                    $("#cek_barang").val(respond);
                }
            });
        }


        cek_barang();
        get_tgl_jatuh_tempo();
        hide_tgl_jatuh_tempo();
        $("#jenis_transaksi").change(function() {
            var jenis_transaksi = $(this).val();
            if (jenis_transaksi == "credit") {
                show_tgl_jatuh_tempo();
            } else {
                hide_tgl_jatuh_tempo();
            }
        });

        $("#tgl_transaksi").change(function() {
            get_tgl_jatuh_tempo();
        });

        $("#form_sell").submit(function() {
            var no_faktur = $("#no_faktur").val();
            var tgl_transaksi = $("#tgl_transaksi").val();
            var kode_pelanggan = $("#kode_pelanggan").val();
            var jenis_transaksi = $("#jenis_transaksi").val();

            if (no_faktur == "") {
                swal("Ooops!", "Invoice no should not be empty!", "warning");
                return false;
            } else if (tgl_transaksi == "") {
                swal("Ooops!", "Invoice date no should not be empty!", "warning");
                return false;
            } else if (kode_pelanggan == "") {
                swal("Ooops!", "Customer should not be empty!", "warning");
                return false;
            } else if (jenis_transaksi == "") {
                swal("Ooops!", "Transaction type should not be empty!", "warning");
                return false;
            } else {
                return true;
            }
        });

        $("#nama_pelanggan").click(function() {
            $("#modal_cust").modal("show");
        });

        $(".choose").click(function() {
            $("#kode_pelanggan").val($(this).attr("data_kodepel"));
            $("#nama_pelanggan").val($(this).attr("data_namapel"));
            $("#modal_cust").modal("hide");
        });
        $("#list").dataTable();
    });
</script>