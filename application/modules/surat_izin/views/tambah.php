<div class="card">
    <div class="header">
        <h4 class="title">Tambah</h4>
    </div>
    <div class="content">
        <form action="#" method="post" class="form" id="f_tambah_surat">
            <div class="form-group">
                <input type="hidden" name="id">
                <label>Jenis Surat</label>
                <select name="jenis" class="form-control" required="true">
                    <option value=""></option>
                    <option value="Surat Izin">Surat Izin</option>
                    <option value="Surat Sakit">Surat Sakit</option>
                </select>
            </div>
            <div class="form-group">
                <label>Surat</label>
                <textarea name="surat" id="" cols="30" rows="20" class="form-control" required="true"></textarea>
            </div>
            <div class="form-group">
                <br><br>
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $("#f_tambah_surat").on("submit", function() {

        var data    = $(this).serialize();

        $.ajax({
            type: "POST",
            data: data,
            url: base_url+"<?php echo $url; ?>/simpan",
            success: function(r) {
                if (r.status == "gagal") {
                    noti("danger", r.data);
                    //$("input").val('');
                } else {
                    $("#modal_data").modal('hide');
                    noti("success", r.data);
                    $("input").val('');
                }
            }
        });

        return false;
    });
</script>
