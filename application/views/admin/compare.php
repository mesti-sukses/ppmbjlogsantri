<main class="main-content container">
  <!-- <?php dump($santriCheck) ?> -->
  <div class="page-header" style="display: block; width: 100%">
    <h1>Pembanding</h1>
  </div>
  <?php echo form_open_multipart('', array('class' => 'form-horizontal form-label-left')) ?>

  <div class="col-md-3">
    <div class="panel panel-default">

      <div class="panel-heading clean">
        Santri
      </div>

      <div class="panel-body">
      	<?php foreach ($dataSantri as $santri): ?>
      		<div class="checkbox">
					  <label><input type="checkbox" name="check[]" value="<?php echo $santri->id ?>"><?php echo $santri->name ?></label>
					</div>
      	<?php endforeach ?>

      	<button class="btn btn-primary" type="submit">Compare</button>
      </div>
    </div>
  </div>
  <?php echo form_close() ?>
  <div class="col-md-9">
    <div class="panel panel-default">

      <div class="panel-heading clean">
        Result
      </div>

      <div class="panel-body">
      	<?php if (isset($check)): ?>
	        <table class="comparator">
	        	<?php
	        		$juz = 1;
	        		echo '<tr>';
	        		for ($i=3; $i < 605; $i++) { 
	        			if($i%20 == 3 && $juz <= 30){
	        				echo '</tr><tr>';
	        				echo '<td class="juz bg-blue">Juz '.$juz.'</td>';
	        				$juz++;
	        			}
	        			echo '<td class="';

	        			if(in_array($i, $check)) echo 'bg-yellow'; else echo 'bg-red';

	        			echo '">'.$i.'</td>';
	        		}
	        		echo '</tr>';
	        	?>
	        </table>
      	<?php endif ?>
      </div>
    </div>
  </div>
</main>