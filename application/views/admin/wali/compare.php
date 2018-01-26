<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Comparator</h1>
    </div>
  </div>

	<div class="row">
		<div class="col-md-2">
      <div class="panel panel-info">
        <div class="panel-heading">
	        List Santri

        </div>


        <div class="panel-body">
        	<?php echo form_open() ?>
        	<button type="submit" class="btn btn-success" style="display: block; width: 100%; margin-bottom: 24px;">Compare</button>

	        <?php foreach ($santriData as $santri): ?>
	        	<label class="switch" style="display: block; width: 100%">
              <input type="checkbox" name="check[]" value="<?php echo $santri->santri_id ?>">
            	<span class="slider"><?php echo $santri->nama ?></span>
            </label>
	        <?php endforeach ?>          	
        </div>
      </div>
     </div>

     <div class="col-md-10">
      <div class="panel panel-info">
        <div class="panel-heading">
	        <?php 
	        	if(isset($name)){
	        		foreach ($name as $nama) {
	        			echo $nama.', ';
	        		}
	        	} else echo "Select to compare";
	        ?>
        </div>


        <div class="panel-body">
	        <?php
	        	if(isset($checkProgress) && isset($checkTarget)){
	        		for ($i=2; $i <= 605; $i++) {
	              if(!in_array($i, $checkTarget)) 
	                $check = 'disabled'; 
	              else 
	                if(in_array($i, $checkProgress)) 
	                $check = 'checked';
	              else 
	                $check = '';
	              echo '<label class="switch">
	                <input type="checkbox" id="'.$i.'" name="'.$i.'" value="'.$i.'" '.$check.'>
	                <span class="slider">'.$i.'</span>
	              </label>';
	            }
	        	}
	        ?>
        </div>
      </div>
     </div>
   </div>
</div>