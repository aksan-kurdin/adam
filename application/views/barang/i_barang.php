<form action="<?php echo base_url(); ?>barang/add" class="form_input" method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="kode_barang" placeholder="Parts ID / Code">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="nama_barang" placeholder="Parts Name">
    </div>
    <div class="form-group mb-3">
        <select name="satuan" class="form-select">
            <option value="">Unit Measurement</option>
            <option value="pcs">pcs</option>
            <option value="unit">unit</option>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">
            <i class="fa fa-paper-plane"> </i>
            Save
        </button>
    </div>
</form>

<script>
    $(function() {
        $('.form_input').bootstrapValidator({
            fields: {
                kode_barang: {
                    message: 'Not valid ID !',
                    validators: {
                        notEmpty: {
                            message: 'Parts ID must not be empty !'
                        }
                    }
                },
                nama_barang: {
                    message: 'Not valid Parts Name !',
                    validators: {
                        notEmpty: {
                            message: 'Parts Name must not be empty !'
                        }
                    }
                },
                satuan: {
                    message: 'Not valid Unit Measurement !',
                    validators: {
                        notEmpty: {
                            message: 'Unit Measurement must not be empty !'
                        }
                    }
                },
            },
        });
    });
</script>