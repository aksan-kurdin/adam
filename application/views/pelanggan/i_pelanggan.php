<form action="<?php echo base_url(); ?>pelanggan/add" class="form_input" method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="kode_pelanggan" placeholder="Customer ID">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="nama_pelanggan" placeholder="Customer Name">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="alamat_pelanggan" placeholder="Address">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="no_hp" placeholder="Mobile NO">
    </div>
    <div class="form-group mb-3">
        <select name="cabang" class="form-select">
            <option value="">Select Branch</option>
            <?php foreach ($cabang as $c) { ?>
                <option value="<?php echo $c->kode_cabang; ?>"><?php echo $c->nama_cabang; ?></option>
            <?php } ?>
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
                kode_pelanggan: {
                    message: 'Not valid ID !',
                    validators: {
                        notEmpty: {
                            message: 'Customer ID must not be empty !'
                        }
                    }
                },
                nama_pelanggan: {
                    message: 'Not valid Customer Name !',
                    validators: {
                        notEmpty: {
                            message: 'Customer Name must not be empty !'
                        }
                    }
                },
                alamat_pelanggan: {
                    message: 'Not valid Unit Measurement !',
                    validators: {
                        notEmpty: {
                            message: 'Unit Measurement must not be empty !'
                        }
                    }
                },
                no_hp: {
                    message: 'Not valid Mobile No !',
                    validators: {
                        notEmpty: {
                            message: 'Mobile No must not be empty !'
                        }
                    }
                },
                cabang: {
                    message: 'Not valid Branch !',
                    validators: {
                        notEmpty: {
                            message: 'Branch must not be empty !'
                        }
                    }
                },
            },
        });
    });
</script>