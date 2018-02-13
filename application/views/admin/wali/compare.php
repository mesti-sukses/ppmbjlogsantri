<div class="main-content" id="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 clear-padding-xs">
        <h5 class="page-title"><i class="fa fa-book"></i>Compare Santri</h5>
      <div class="section-divider"></div>

			<div class="row">
				<div class="col-md-2">
		      <div class="dash-item">
		        <div class="item-title">
			        List Santri

		        </div>


		        <div class="inner-item">
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
		      <div class="dash-item">
		        <div class="item-title">
			        <?php 
			        	if(isset($name)){
			        		foreach ($name as $nama) {
			        			echo $nama.', ';
			        		}
			        	} else echo "Select to compare";
			        ?>
		        </div>


		        <div class="inner-item">
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
		</div>
</div>