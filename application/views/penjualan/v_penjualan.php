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
                    </svg>Add New</a>
                <div class="mb-3">
                    <?php echo $this->session->flashdata('msg'); ?>
                </div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Invoice No</th>
                        <th>Date</th>
                        <th>Cust ID</th>
                        <th>Cust Name</th>
                        <th>Transaction Type</th>
                        <th>T.O.P</th>
                        <th>Cashier</th>
                        <th>Action</th>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>