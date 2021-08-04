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
            <div class="header">
                <h4 class="title">Surat Izin </h4>
                <?php 
                    if ($wali['is_wali'] == false){
                ?>
                        <div class="right">
                            <a href="<?php echo base_url().$url."/tambah/"; ?>" class="btn btn-success btn-sm"><i  class="fa fa-plus"></i> Tambah</a>
                        </div>
                <?php
                    }
                ?>
            </div>
            <div class="content">  

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th width="40%">Jenis surat</th>
                            <?= ($wali['is_wali'] == true) ? '<th width="40%">Nama Siswa</th>' : '';?>
                            <th width="40%">Status</th>
                            <th width="50%">Lihat</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 

                        $no = 1;
                        if (!empty($surat_izin)) {
                            foreach ($surat_izin as $sk) {  
                                // for ($i = 1; $i <= 2; $i++) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $sk['jenis']; ?></td>
                                <?= ($wali['is_wali'] == true) ? "<td>".$sk['nama_siswa']."</td>" : '';?>
                                <td><?php echo $sk['status_surat']; ?></td>
                                <td>
                                    <!-- <a href="<?//php echo base_url().$url."/sampul1/".$sk['id_siswa']; ?>" class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-print"></i> S 1</a>
                                    <a href="<?//php echo base_url().$url."/sampul2/".$sk['id_siswa']; ?>" class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-print"></i> S 2</a>
                                    <a href="<?//php echo base_url().$url."/sampul4/".$sk['id_siswa']; ?>" class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-print"></i> S 4</a> -->
                                    <?= ($wali['is_wali'] == true) ? 
                                    '<a href="'.base_url().$url.'/edit/'.$sk['id_surat'].'/"'.' class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-pencil"></i> Edit</a>'
                                    : 
                                    '<a href="'.base_url().$url.'/detail/'.$sk['id_surat'].'/"'.' class="btn btn-success btn-sm" target="_blank"><i  class="fa fa-eye"></i> Detail</a>'
                                    ;?>
                                    
                                    
                                </td>
                            </tr>
                        <?php 
                                    $no++;
                                // }
                            }
                        } else {
                            echo '<tr><td colspan="3">Belum ada data surat izin</td></tr>';
                        }
                        ?>

                        
                        
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>

</div>