<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Jurnal Qur'an</h5>


        <div class="section-divider">
        </div>
        <?php $j = 1; foreach ($targetQuran as $target) : ?><?php echo form_open() ?>

        <div class="row">
          <div class="col-md-12">
            <div class="dash-item">
              <div class="item-title">
                Angkatan <?php echo $target->angkatan ?> <span class="kosong-<?php echo $j ?> label label-success"><?php echo $target->target ?></span> <button class="pull-right btn-xs btn btn-primary submit" type="submit"><i class="fa fa-floppy-o"></i> Save</button> <input id="kosong-<?php echo $j ?>" name="target" type="hidden"> <input name="angkatan" type="hidden" value="<?php echo $target->angkatan ?>"> <input name="id" type="hidden" value="<?php echo $target->id ?>">
              </div>


              <div class="inner-item">
                <?php
                  $target_detail = unserialize($target->target_detail);
                  for ($i=2; $i <= 605; $i++) 
                  {
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
        <?php $j++; echo form_close() ?><?php endforeach; ?>
      </div>
    </div>
  </div>