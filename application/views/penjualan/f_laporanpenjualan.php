<h2 class="page-title">Laporan Penjualan</h2>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">

                <form action="<?php echo base_url('penjualan/print_report'); ?>" method="POST">

                    <div class="mb-3">
                        <?php echo $this->session->flashdata('msg'); ?>
                    </div>

                    <?php if ($this->session->userdata('kode_cabang') == 'PST') { ?>
                        <div class="form-group mb-3">
                            <select name="cabang" class="form-select">
                                <option value="">All Branch</option>
                                <?php foreach ($cabang as $c) { ?>
                                    <option value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" name="cabang" value="<?php echo $this->session->userdata('kode_cabang'); ?>">
                    <?php } ?>

                    <div class="row">

                        <div class="col-md-6">
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
                                <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai" placeholder="Start from">
                            </div>
                        </div>

                        <div class=" col-md-6">
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
                                <input type="date" name="tgl_akhir" class="form-control" id="tgl_akhir" placeholder="Until">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" name="submit" class="btn btn-primary w-100"><i class="fa fa-print mr-2"></i>Print...</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" name="export" class="btn btn-success w-100"><i class="fa fa-download mr-2"></i>Export Excel...</button>
                            </div>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('tgl_mulai'), {});
        flatpickr(document.getElementById('tgl_akhir'), {});
    });
</script>