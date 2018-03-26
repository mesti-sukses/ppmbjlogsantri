<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Ketercapaian Hadist <?php echo $hadistData->nama ?></h5>


        <div class="section-divider">
        </div>
        <?php echo form_open() ?>

        <div class="row">
          <div class="col-md-12">
            <div class="dash-item">
              <div class="item-title">
                Terisi <span class="kosong label label-success"><?php echo $hadistData->kosong ?></span> 
                <?php 
                  $kosong = $hadistData->offset - $hadistData->kosong;
                  if($kosong > 60) $check = 'danger';
                  else if ($kosong > 20) $check = 'warning';
                  else $check = 'success';
                ?> Kosong 
                <span class="label label-<?php echo $check ?>"><?php echo $kosong ?></span> <button class="pull-right btn-sm btn btn-primary submit" type="submit"><i class="fa fa-floppy-o"></i> Save</button> <input id="kosong" name="kosong" type="hidden">
              </div>


              <div class="inner-item">
                <?php

                  $progress = unserialize($hadistData->ketercapaian);
                  for ($i=1; $i <= $hadistData->offset; $i++) {
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
        <?php echo form_close() ?>
      </div>
    </div>
  </div>