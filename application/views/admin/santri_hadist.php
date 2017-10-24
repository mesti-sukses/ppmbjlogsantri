  <main class="main-content container">
    <div class="page-header">
      <h1>Materi <small class="roboto-light"><?php echo $hadistDataSantri->name ?></small></h1>
    </div>

    <?php echo form_open() ?>
      <div>
        <div class="panel panel-default">

          <input type="hidden" name="name" class="form-control" value="<?php echo $santriData->name ?>">

          <div class="panel-heading clean">
            Terisi <span class="kosong label label-success"><?php echo $santriData->kosong ?></span>
            <button type="submit" class="pull-right btn-sm btn btn-primary submit"><i class="fa fa-floppy-o"></i>Save</button>
          </div>

          <div class="rate panel-body">
            <?php
            $progress = unserialize($santriData->hadist);
            $offset = $hadistDataSantri->start;
            for ($i=1; $i <= $hadistDataSantri->halaman; $i++) {
              $hal = $i+$offset-1;
              if(array_key_exists($hal, $progress)) 
                $check = 'checked';
              else 
                $check = '';
              echo '<label class="switch">
                <input type="checkbox" id="'.$i.'" name="'.$hal.'" value="'.$i.'" '.$check.'>
                <span class="slider">'.$i.'</span>
              </label>';
              //echo '<input type="checkbox" id="'.$i.'" name="'.$i.'" value="'.$i.'" '.$check.'/><label for="'.$i.'" title="Halaman '.$i.'"></label>';
            } ?>
          </div>
        </div>
      </div>

    <?php echo form_close(); ?>


  </main>