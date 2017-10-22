  <main class="main-content container">
    <div class="page-header">
      <h1>Materi <small class="roboto-light">Al-Quran</small></h1>
    </div>

    <?php echo form_open() ?>
      <div>
        <div class="panel panel-default">
          <input type="hidden" id="kosong" name="kosong">
          <input type="hidden" id="target" value="<?php echo $angkatanData->target ?>">
          <input type="hidden" name="name" class="form-control" placeholder="Nama Santri" value="<?php echo $santriData->name ?>">
          <input type="hidden" name="angkatan" class="form-control" placeholder="Angkatan" value="<?php echo $santriData->angkatan ?>">

          <div class="panel-heading clean">
            <?php
              if(($angkatanData->target) - ($santriData->kosong) > 50)
                $label = 'danger';
              else if(($angkatanData->target) - ($santriData->kosong) > 20)
                $label = 'warning';
              else
                $label = 'success';
            ?>
            Kosong <span class="label label-<?php echo $label ?>"><?php echo ($angkatanData->target) - ($santriData->kosong) ?></span>
            Terisi <span class="kosong label label-success"><?php echo $santriData->kosong ?></span>
            <button type="submit" class="pull-right btn-sm btn btn-primary submit"><i class="fa fa-floppy-o"></i>Save</button>
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