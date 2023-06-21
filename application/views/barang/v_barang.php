<h2 class="page-title"> Master: Parts </h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="#" class="btn btn-success mb-3" id="add">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>Add New
                </a>
                <div class="mb-3"> <?php echo $this->session->flashdata('msg'); ?> </div>
                <table class="table table-striped table-bordered" id="list">
                    <thead>
                        <th>No</th>
                        <th>Parts ID</th>
                        <th>Parts Name</th>
                        <th>U/M</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $b) {
                        ?>
                            <tr>
                                <td> <?php echo $no; ?> </td>
                                <td> <?php echo $b->kode_barang; ?> </td>
                                <td> <?php echo $b->nama_barang; ?> </td>
                                <td> <?php echo $b->satuan; ?> </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-primary edit" data-kode_barang="<?php echo $b->kode_barang; ?>">
                                        <i class="fa fa-solid fa-pencil"> </i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger delete" data-href="<?php echo base_url(); ?>barang/delete/<?php echo $b->kode_barang; ?>">
                                        <i class=" fa fa-trash-o"> </i>
                                    </a>
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
            $("#formAdd").load("<?php echo base_url('barang/input'); ?>");
        });

        $(".edit").click(function() {
            var kodebarang = $(this).attr("data-kode_barang");
            $("#modalEdit").modal("show");
            $("#formEdit").load("<?php echo base_url('barang/edit/'); ?>" + kodebarang);
        });

        $(".delete").click(function() {
            var href = $(this).attr("data-href");
            $("#modalDelete").modal("show");
            $("#href-delete").attr("href", href);
        });

        $("#list").DataTable();
    });
</script>