<form action="<?php echo base_url(); ?>barang/add" class="form_input" method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="kodebarang" placeholder="Kode Barang">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="namabarang" placeholder="Nama Barang">
    </div>
    <div class="form-group mb-3">
        <select name="satuan" class="form-select">
            <option value="">Satuan</option>
            <option value="pcs">pcs</option>
            <option value="unit">unit</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="10" y1="14" x2="21" y2="3" />
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
            </svg>
            Save
        </button>
    </div>
</form>

<script>
    $(function() {
        $('.form_input').bootstrapValidator({
            fields: {
                kodebarang: {
                    message: 'Not valid kodebarang !',
                    validators: {
                        notEmpty: {
                            message: 'kodebarang must not be empty !'
                        }
                    }
                },
                namabarang: {
                    message: 'Not valid namabarang !',
                    validators: {
                        notEmpty: {
                            message: 'namabarang must not be empty !'
                        }
                    }
                },
                satuan: {
                    message: 'Not valid satuan !',
                    validators: {
                        notEmpty: {
                            message: 'satuan must not be empty !'
                        }
                    }
                },
            },
        });
    });
</script>