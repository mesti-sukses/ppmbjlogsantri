<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.table-wrapper{
			width: 80%;
			margin: 0 auto;
			margin-bottom: 100px;
		}
		.table-wrapper h1{
			text-align: center;
		}
		table{
			width: 100%;
		}
		table thead th{
			font-size: 1.3em;
			font-weight: bold;
			padding-bottom: 12px;
			padding-left: 12px;
			border: 0px;
			border-bottom: solid #999 2px;
			border-collapse: collapse;
			text-align: left;
		}
		td{
			padding-left: 12px;
		}
		table tr td{
			border-bottom: solid #999 1px;
			padding-bottom: 12px;
			padding-top: 12px;
		}
	</style>
</head>
<body>
	<?php foreach ($res as $key => $value): ?>
		<div class="table-wrapper">
			<h1><?php echo $key ?></h1>
			<table>
				<thead>
					<th>Materi</th>
					<th>Target</th>
					<th>Kosong</th>
					<th>Terisi</th>
					<th>Presentasi</th>
				</thead>
				<tr>
					<td colspan="5" style="background-color: #eee">
						Quran
					</td>
				</tr>
				<tr>
					<td>Quran</td>
					<td><?php echo $value['quran']->target." Halaman" ?></td>
					<td><?php echo $value['quran']->terisi." Halaman" ?></td>
					<td><?php echo $value['quran']->kosong." Halaman" ?></td>
					<td>
						<?php
							$terisi = intval($value['quran']->kosong);
							$target = intval($value['quran']->target);
							echo ($terisi/$target)*100;
						?>
					</td>
				</tr>
				<?php if (isset($value['hadist'])): ?>
					<tr>
						<td colspan="5" style="background-color: #eee">
							Hadist
						</td>
					</tr>
					<?php foreach ($value['hadist'] as $hadist): ?>
						<tr>
							<td><?php echo $hadist->hadist ?></td>
							<td><?php echo $hadist->target." Halaman" ?></td>
							<td><?php echo $hadist->terisi." Halaman" ?></td>
							<td><?php echo $hadist->kosong." Halaman" ?></td>
							<td>
								<?php
									$terisi = intval($hadist->kosong);
									$target = intval($hadist->target);
									echo ($terisi/$target)*100;
								?>
							</td>
						</tr>
					<?php endforeach ?>
				<?php endif ?>
			</table>
		</div>
	<?php endforeach ?>
</body>
</html>