<main class="main-content container">
  <div class="page-header" style="display: block; width: 100%">
    <h1>Target Angkatan</h1>
  </div>

  <?php $j = 1; foreach ($angkatanList as $angkatan): ?>

    <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>
    
      <div class="col-md-6">
        <div class="panel panel-default">

          <div class="panel-heading clean">
            Angkatan <?php echo $angkatan->angkatan ?>
          </div>

          <div class="panel-body">
            <input type="hidden" name="id" value="<?php echo $angkatan->id ?>">

            <input type="hidden" name="angkatan" value="<?php echo $angkatan->angkatan ?>">

            <input type="hidden" id="kosong-<?php echo $j ?>" name="target">

            <div class="info" style="margin-bottom: 24px">
              Target <span class="kosong-<?php echo $j ?>"><?php echo $angkatan->target ?></span> halaman
              <button type="submit" class="submit btn btn-primary pull-right">Save</button>
            </div>
            <?php
              $progress = unserialize($angkatan->progress);
              $juz = 1;
              for ($i=2; $i <= 605; $i++) {
                if(array_key_exists($i, $progress)) $check = 'checked'; else $check = '';
                echo '<label class="switch switch-'.$j.'">
                  <input type="checkbox" id="'.$i.'" name="'.$i.'" value="'.$i.'" '.$check.'>
                  <span class="slider">'.$i.'</span>
                </label>';
                //echo '<input type="checkbox" id="'.$i.'" name="'.$i.'" value="'.$i.'" '.$check.'/><label for="'.$i.'" title="Halaman '.$i.'"></label>';
              } ?>
          </div>
        </div>
      <?php echo form_close() ?>
    </div>

  <?php $j++; endforeach; ?>
</main>