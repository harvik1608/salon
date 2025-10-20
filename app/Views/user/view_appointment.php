<?php 
	if(!empty($data)) {
?>
<div class="table-responsive">
		<table class="table table-default table-bordered table-striped">
			<thead>
				<tr>
					<td>No</td>
					<td>Service</td>
					<td>Date</td>
					<td>Time</td>
					<td>Duration</td>
					<td align="right">Amount</td>
				</tr>
			</thead>
			<tbody>
<?php
				$no = 0;
				$total = 0;
				foreach($data as $row) {
					$no++;
					$total += $row['amount'];
?>
					<tr>
						<td><small><?php echo $no; ?></small></td>
						<td><small><?php echo $row['serviceNm']; ?><?php echo trim($row['caption']) == "" ? "" : ' (<small>'.$row['caption'].'</small>)'; ?></small></td>
						<td><small><?php echo date('d M, Y',strtotime($row['date'])); ?></small></td>
						<td><small><?php echo date('h:i A',strtotime($row['stime'])); ?> To <?php echo date('h:i A',strtotime($row['etime'])); ?></small></td>
						<td><small><?php echo $row['duration']; ?> Min.</small></td>
						<td align="right"><small><?php echo number_format($row['amount'],2); ?></small></td>
					</tr>
<?php
				}
				echo '<tr><td colspan="5" align="right">TOTAL</td><td align="right">'.number_format($total,2).'</td></tr>';
?>
			</tbody>
		</table>
	</div>
<?php
	}
?>