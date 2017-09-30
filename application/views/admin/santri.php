  <main class="main-content container">
    <div class="page-header">
      <h1><?php echo $this->session->userdata('name') ?></a> <small class="roboto-light">Ketercapaian</small></h1>
    </div>

    <?php echo form_open() ?>
      <div class="col-lg-4">
        
        <div class="panel panel-default">
          <div class="clean panel-heading">
            Info Santri
          </div>

          <div class="panel-body">
            <input type="text" name="name" class="form-control" placeholder="Nama Santri" value="<?php echo $santriData->name ?>">
            <input type="text" name="angkatan" class="form-control" placeholder="Angkatan" value="<?php echo $santriData->angkatan ?>">
            <input type="hidden" id="kosong" name="kosong">
            <input type="hidden" id="target" value="<?php echo $angkatanData->target ?>">
            <p>Terisi <span class="kosong"><?php echo $santriData->kosong ?></span> Lembar</p>
            <p>Kosong <?php echo ($angkatanData->target) - ($santriData->kosong) ?> Lembar</p>
            <button type="submit" class="btn btn-primary submit">Save</button>
          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <div class="panel panel-default">

          <div class="panel-heading clean">
            Progress Detail
          </div>

          <div class="rate panel-body">
            <?php

            $angkatanProgress = unserialize($angkatanData->progress);

            $progress = unserialize($santriData->progress);
            $juz = 1;
            for ($i=2; $i <= 605; $i++) {
              if(!array_key_exists($i, $angkatanProgress)) 
                $check = 'disabled'; 
              else if(array_key_exists($i, $progress)) 
                $check = 'checked';
              else 
                $check = '';
              echo '<label class="switch">
                <input type="checkbox" id="'.$i.'" name="'.$i.'" value="'.$i.'" '.$check.'>
                <span class="slider">'.$i.'</span>
              </label>';
              //echo '<input type="checkbox" id="'.$i.'" name="'.$i.'" value="'.$i.'" '.$check.'/><label for="'.$i.'" title="Halaman '.$i.'"></label>';
            } ?>
          </div>
        </div>
      </div>

    <?php echo form_close(); ?>


  </main>