<form action="<?php echo base_url(); ?>cabang/update" class="form_input" method="POST">
    <div class="form-group mb-3">
        <input type="text" readonly value="<?php echo $cabang['kode_cabang']; ?>" class="form-control" name="kode_cabang" placeholder="Branch ID">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?php echo $cabang['nama_cabang']; ?>" class="form-control" name="nama_cabang" placeholder="Branch Name">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?php echo $cabang['alamat_cabang']; ?>" class="form-control" name="alamat_cabang" placeholder="Address">
    </div>
    <div class="form-group mb-3">
        <input type="text" value="<?php echo $cabang['telepon']; ?>" class="form-control" name="telepon" placeholder="Phone No">
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
                kode_cabang: {
                    message: 'Not valid ID !',
                    validators: {
                        notEmpty: {
                            message: 'Parts ID must not be empty !'
                        }
                    }
                },
                nama_cabang: {
                    message: 'Not valid Branch Name !',
                    validators: {
                        notEmpty: {
                            message: 'Branch Name must not be empty !'
                        }
                    }
                },
                alamat_cabang: {
                    message: 'Not valid Address !',
                    validators: {
                        notEmpty: {
                            message: 'Address must not be empty !'
                        }
                    }
                },
                telepon: {
                    message: 'Not valid Phone NO !',
                    validators: {
                        notEmpty: {
                            message: 'Phone NO must not be empty !'
                        }
                    }
                },
            },
        });
    });
</script>