<div class="card">
    <div class="header">
        <h4 class="title">Edit</h4>
    </div>
    <div class="content">
        <form action="#" method="post" class="form" id="f_tambah_surat">
            <div class="form-group">
                <input type="hidden" name="id" value=<?= $data->id?>>
                <label>Jenis Surat</label>
                <select name="jenis" class="form-control" required="true">
                    <option value="<?= $data->jenis?>"><?= $data->jenis?></option>
                    <option value="Surat Izin">Surat Izin</option>
                    <option value="Surat Sakit">Surat Sakit</option>
                </select>
            </div>
            <div class="form-group">
                <label>Surat</label>
                <textarea name="surat" id="" cols="30" rows="20" class="form-control" required="true"><?=$data->surat?></textarea>
            </div>
            <div class="form-group">
                <input type="hidden" name="id" value=<?= $data->id?>>
                <label>Status</label>
                <select name="status" class="form-control" required="true">
                    <option value="<?= $data->status?>"><?= $data->status?></option>
                    <option value="Ditolak">Ditolak</option>
                    <option value="Diterima">Diterima</option>
                </select>
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
