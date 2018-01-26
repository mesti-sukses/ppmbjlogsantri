<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Jurnal Quran</h1>
    </div>
  </div>
  <!--/.row-->

  <?php $j = 1; foreach ($targetQuran as $target) : ?>
    <?php echo form_open() ?>
    <div class="panel panel-container">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-heading">
              Angkatan <?php echo $target->angkatan ?> <span class="kosong-<?php echo $j ?> label label-success"><?php echo $target->target ?></span>

              <button type="submit" class="pull-right btn-sm btn btn-primary submit"><i class="fa fa-floppy-o"></i> Save</button>

              <input type="hidden" id="kosong-<?php echo $j ?>" name="target">
              <input type="hidden" name="angkatan" value="<?php echo $target->angkatan ?>">
              <input type="hidden" name="id" value="<?php echo $target->id ?>">
            </div>

            <div class="panel-body">
              <?php
                $target_detail = unserialize($target->target_detail);
                for ($i=2; $i <= 605; $i++) {
                    if(array_key_exists($i, $target_detail)) 
                    $check = 'checked';
                  else 
                    $check = '';
                  echo '<label class="switch switch-'.$j.'">
                    <input type="checkbox" id="'.$i.'" name="'.$i.'" value="'.$i.'" '.$check.'>
                    <span class="slider">'.$i.'</span>
                  </label>';
                } 
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $j++; echo form_close() ?>
  <?php endforeach; ?>
</div>