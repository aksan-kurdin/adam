<form action="<?php echo base_url(); ?>user/add" class="form_input" method="POST">
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="id_user" placeholder="User ID">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="nama_lengkap" placeholder="Full Name">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="no_hp" placeholder="Mobile No">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="username" placeholder="User Name">
    </div>
    <div class="form-group mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="form-group mb-3">
        <select name="level" class="form-select">
            <option value="">Level</option>
            <option value="administrator">administrator</option>
            <option value="kepala cabang">kepala cabang</option>
            <option value="kasir">kasir</option>
        </select>
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
                id_user: {
                    message: 'Not valid ID !',
                    validators: {
                        notEmpty: {
                            message: 'User ID must not be empty !'
                        }
                    }
                },
                nama_lengkap: {
                    message: 'Not valid Full Name !',
                    validators: {
                        notEmpty: {
                            message: 'Full Name must not be empty !'
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
                username: {
                    message: 'Not valid User Name !',
                    validators: {
                        notEmpty: {
                            message: 'User Name must not be empty !'
                        }
                    }
                },
                password: {
                    message: 'Not valid Password !',
                    validators: {
                        notEmpty: {
                            message: 'Password must not be empty !'
                        }
                    }
                },
                level: {
                    message: 'Not valid Level !',
                    validators: {
                        notEmpty: {
                            message: 'Level must not be empty !'
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