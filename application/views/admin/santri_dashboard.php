<main class="main-content container">
    
    <div class="page-header">
      <h1><?php echo $this->session->userdata('name') ?> <small class="roboto-light">Dashboard</small></h1>
    </div>

      <div class="col-lg-4">
        
        <div class="panel panel-default">
          <div class="clean panel-heading">
            Biodata
          </div>

          <div class="panel-body">
            <p>Nama : <?php echo $santriData->name ?></p>
            <p>Angkatan : <?php echo $santriData->angkatan ?></p>
          </div>
        </div>

      </div>

      <div class="col-lg-4">
        
        <div class="panel panel-default">
          <div class="clean panel-heading">
            Materi Al-Quran
            <a href="<?php echo base_url('santri/edit/'.$this->session->userdata('id')) ?>" class="pull-right btn-xs btn btn-primary submit"><i class="fa fa-pencil"></i> Edit</a>
          </div>

          <div class="panel-body">
            <p>Terisi : <?php echo $santriData->kosong ?></span> Lembar</p>
            <p>Kosong : <?php echo ($angkatanData->target) - ($santriData->kosong) ?> Lembar</p>
          </div>
        </div>

      </div>

</main>