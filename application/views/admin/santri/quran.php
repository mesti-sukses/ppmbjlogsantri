<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Ketercapaian Quran</h1>
    </div>
  </div>
  <!--/.row-->

  <?php echo form_open() ?>
  <div class="panel panel-container">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Terisi <span class="kosong label label-success"><?php echo $quranData->kosong ?></span>

            <?php 
              $kosong = $quranData->target - $quranData->kosong;
              if($kosong > 60) $check = 'danger';
              else if ($kosong > 20) $check = 'warning';
              else $check = 'success';
            ?>

            Kosong <span class="label label-<?php echo $check ?>"><?php echo $kosong ?></span>

            <button type="submit" class="pull-right btn-sm btn btn-primary submit"><i class="fa fa-floppy-o"></i> Save</button>
            <input type="hidden" id="kosong" name="kosong">
          </div>

          <div class="panel-body">
            <?php

            $progress = unserialize($quranData->ketercapaian);
            $target_detail = unserialize($quranData->target_detail);

            $juz = 1;
            for ($i=2; $i <= 605; $i++) {
              if(!array_key_exists($i, $target_detail)) 
                $check = 'disabled'; 
              else 
                if(array_key_exists($i, $progress)) 
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
    </div>
  </div>
  <?php echo form_close() ?>
</div>