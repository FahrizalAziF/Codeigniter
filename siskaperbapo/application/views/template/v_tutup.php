<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

<div class="container ">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin_bottom_30_all">
        <img src="<?= base_url() ?>assets/img/close.png" style="width: 200px;height:200px;display: block; margin: auto;">
        <h4 class="mt-3" style="text-align: center;"><span id="jamServer"><?php echo date("H:i:s"); ?></span>
        </h4>
        <p style="text-align: center;font-size: large">
            E-Pasar Pamekasan akan buka mulai pukul <b>06:00 - 13:00 WIB</b><br>
            Silahkan akses kembali pada waktu tersebut untuk melakukan pembelian produk dari Pasar Pamekasan, <b> Selamat Berbelanja!</b>
        </p>
        <img src="<?= base_url() ?>assets/img/icon.png" style="width: 20%;display: block; margin: auto;">

    </div>
</div>



<script>
    var serverClock = jQuery("#jamServer");
    if (serverClock.length > 0) {
        showServerTime(serverClock, serverClock.text());
    }

    function showServerTime(obj, time) {
        var parts = time.split(":"),
            newTime = new Date();
        newTime.setHours(parseInt(parts[0], 10));
        newTime.setMinutes(parseInt(parts[1], 10));
        newTime.setSeconds(parseInt(parts[2], 10));
        var timeDifference = new Date().getTime() - newTime.getTime();
        var methods = {
            displayTime: function() {
                var now = new Date(new Date().getTime() - timeDifference);
                obj.text([
                    methods.leadZeros(now.getHours(), 2),
                    methods.leadZeros(now.getMinutes(), 2),
                    methods.leadZeros(now.getSeconds(), 2)
                ].join(":"));
                setTimeout(methods.displayTime, 500);
            },
            leadZeros: function(time, width) {
                while (String(time).length < width) {
                    time = "0" + time;

                }
                return time;
            }
        }
        methods.displayTime();

    }
</script>