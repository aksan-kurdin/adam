<form id="form_pay" action="<?php echo base_url('penjualan/save_pay'); ?>" method="post">

    <input type="hidden" name="no_faktur" value="<?php echo $no_faktur; ?>">
    <input type="hidden" name="g_total" value="<?php echo $grand_total; ?>" id="g_total">
    <input type="hidden" name="total_paid" value="<?php echo $total_paid; ?>" id="total_paid">
    
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
        <input type="date" name="tgl_bayar" class="form-control" id="tgl_bayar" placeholder="Pay Date" value="<?php echo date("Y-m-d"); ?>">
    </div>

    <div class="input-icon mb-3">
        <span class="input-icon-addon">
            <i class="fa fa-money"></i>
        </span>
        <input type="text" name="bayar" style="text-align:right" class="form-control" id="bayar" placeholder="Pay Amount">
    </div>

    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100"><i class="fa fa-send mr-2">PAY</i></button>
    </div>

</form>

<script>
    flatpickr(document.getElementById('tgl_bayar'), {});
</script>
<script>
    $("#form_pay").submit(function() {
        var jmlbayar = $("#bayar").val();
        var g_total = $("#g_total").val();
        var total_paid = $("#total_paid").val();
        var rest_paid = parseInt(g_total) - parseInt(total_paid);

        if (jmlbayar == "" || jmlbayar == 0) {
            swal("Oops !", "Please fill pay amount!", "warning");
            return false;
        } else if (parseInt(jmlbayar) > parseInt(rest_paid)) {
            swal("Oops !", "Total paid should not exceed rest paid. Your rest paid is " + rest_paid, "warning");
            return false;
        } else {
            return true;
        }
    });
</script>