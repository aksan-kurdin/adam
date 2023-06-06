<form action="<?php echo base_url(); ?>barang/add_harga" class="form_input" method="POST">
    <div class="form-group mb-3">
        <input type="text" readonly class="form-control" name="kode_harga" placeholder="Price ID" id="kode_harga">
    </div>
    <div class="form-group mb-3">
        <select name="kode_barang" class="form-select" id="kode_barang">
            <option value="">Select Parts</option>
            <?php foreach ($barang as $b) { ?>
                <option value="<?php echo $b->kode_barang; ?>"><?php echo $b->kode_barang . " - " . $b->nama_barang; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="harga" placeholder="Price">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="stok" placeholder="Stock">
    </div>
    <div class="form-group mb-3">
        <select name="kode_cabang" class="form-select" id="kode_cabang">
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
                kode_barang: {
                    message: 'Not valid ID !',
                    validators: {
                        notEmpty: {
                            message: 'Parts ID must not be empty !'
                        }
                    }
                },
                harga: {
                    message: 'Not valid Price !',
                    validators: {
                        notEmpty: {
                            message: 'Price must not be empty !'
                        }
                    }
                },
                stok: {
                    message: 'Not valid Stock !',
                    validators: {
                        notEmpty: {
                            message: 'Stock must not be empty !'
                        }
                    }
                },
                kode_cabang: {
                    message: 'Not valid ID !',
                    validators: {
                        notEmpty: {
                            message: 'Branch ID must not be empty !'
                        }
                    }
                },
            },
        });

        function set_kode_harga() {
            var kode_barang = $("#kode_barang").val();
            var kode_cabang = $("#kode_cabang").val();
            var kode_harga = kode_barang + kode_cabang;
            $("#kode_harga").val(kode_harga);
        }

        $("#kode_barang").change(function() {
            set_kode_harga();
        });

        $("#kode_cabang").change(function() {
            set_kode_harga();
        });

    });
</script>