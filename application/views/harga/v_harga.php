<h2 class="page-title">
    Master: Price
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php if ($this->session->userdata('level') == "administrator") { ?>
                    <a href="#" class="btn btn-success mb-3" id="add">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>Add New
                    </a>
                <?php } ?>
                <div class="mb-3">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <table class="table table-striped table-bordered" id="list">
                    <thead>
                        <th>No</th>
                        <th>Price ID</th>
                        <th>Parts ID</th>
                        <th>Parts Name</th>
                        <th>U/M</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Branch</th>
                        <?php if ($this->session->userdata('level') == "administrator") { ?>
                            <th>Action</th>
                        <?php } ?>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($harga as $h) {
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $h->kode_harga; ?> </td>
                                <td> <?php echo $h->kode_barang; ?> </td>
                                <td> <?php echo $h->nama_barang; ?> </td>
                                <td> <?php echo $h->satuan; ?> </td>
                                <td align="right"> <?php echo number_format($h->harga, '0', '', '.'); ?> </td>
                                <td> <?php echo $h->stok; ?> </td>
                                <td> <?php echo $h->kode_cabang; ?> </td>
                                <?php if ($this->session->userdata('level') == "administrator") { ?>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary edit" data-kode_harga="<?php echo $h->kode_harga; ?>">
                                            <i class="fa fa-solid fa-pencil"> </i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-danger delete" data-href="<?php echo base_url(); ?>harga/delete/<?php echo $h->kode_harga; ?>">
                                            <i class=" fa fa-trash-o"> </i>
                                        </a>
                                    </td>
                                <?php } ?>
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

<div class="modal modal-blur fade" id="modalAdd" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Input</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formAdd"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modalEdit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Update</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="formEdit"></div>
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
        $("#add").click(function() {
            $("#modalAdd").modal("show");
            $("#formAdd").load("<?php echo base_url(); ?>harga/input");
        });
    });

    $(function() {
        $(".edit").click(function() {
            var kode_harga = $(this).attr("data-kode_harga");
            $("#modalEdit").modal("show");
            $("#formEdit").load("<?php echo base_url(); ?>harga/edit/" + kode_harga);
        });
    });

    $(function() {
        $(".delete").click(function() {
            var href = $(this).attr("data-href");
            $("#modalDelete").modal("show");
            $("#href-delete").attr("href", href);
        });
    });

    $("#list").DataTable();
</script>