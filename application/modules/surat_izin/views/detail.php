<style type="text/css">
    .ctr {text-align: center}
    .nso {}
</style>
<div class="">
    <div class="col-md-12">
        <p>
            <!--<a href="<?php echo base_url()."/".$url; ?>/cetak/<?php echo $this->uri->segment(3); ?>" class="btn btn-warning" target="_blank">Cetak</a>-->
        </p>
    </div>

    <div class="col-md-12">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nama Wali Kelas : <?= $data->nama_guru?></li>
                <li class="list-group-item">Jenis Surat : <?= $data->jenis?></li>
                <li class="list-group-item"><?= $data->surat?></li>
                <li class="list-group-item">Status : <?= $data->status_surat?></li>
            </ul>
        </div>
    </div>

</div>