<?php 
	if($status == 200) {
		if(!empty($data["carts"])) {
			$total = 0;
			$total_min = 0;
			if($is_update_only_cart == 0) {
				$currency = "";
				echo "<div class='row'>";
					echo "<div class='col-lg-12'>";
						echo "<table class='table table-default table-bordered table-striped' id='cartTbl'>";
							echo "<thead>";
								echo "<tr>";
									echo "<td width=70%>Service</td>";
									echo "<td align='right' width=15% >Duration</td>";
									echo "<td align='right' width=15% >Amount ".($currency)."</td>";
								echo "</tr>";
							echo "</thead>";
							echo "<tbody id='cart_body'>";
								foreach($data["carts"] as $row) {
									$currency = $row["currency"];
									$total_min = $total_min + $row['duration'];
?>
									<tr>
										<td>
											<a href="javascript:;" onclick="remove_from_cart(<?php echo $row['id']; ?>)"><i class="fas fa-trash"></i></a>
											<b><?php echo $row['service_name']; ?></b>
											<?php
												if(trim($row['caption']) != "") {
													echo " <small>(".$row['caption'].")</small>";
												} 
											?>
										</td>
										<td align="right"><small><?php echo $row['duration']; ?> Min.</small></td>
										<td align="right">
											<?php if($row['discount_amount'] == 0) { $total += $row['amount']; ?>
												<small><?php echo $row['amount']; ?></small>
											<?php } else { $total += $row['discount_amount']; ?>
												<small><?php echo $row['discount_amount']." <strike><small>".$row['amount']."</small></strike> "; ?></small>
											<?php } ?>
										</td>
									</tr>
<?php
								}
							echo '<tr>
									<td align="right"><small>TOTAL</small></td>
									<td align="right"><small>'.$total_min.' Min.</small></td>
									<td align="right" id="total_bill" data-bill="'.$total.'"><small>'.number_format($total,2).'</small></td>
								</tr>';
							echo "</tbody>";
						echo "</table>";
					echo "</div>";
				echo "</div>";
?>
				<div class='row'>
					<form>
						<input type="hidden" name="available_staffs" id="available_staffs" class="form-control" />
						<input type="hidden" name="salon_end_time" id="salon_end_time" class="form-control" value="<?php echo $salon_end_time; ?>" />
						<input type="hidden" name="salon_sunday_end_time" id="salon_sunday_end_time" class="form-control" value="<?php echo $salon_sunday_end_time; ?>" />
						<div class="col-6 col-xl-4 mt-2">
							<label><small>Appointment Date*</small></label>
		                    <input type="text" placeholder="Date" name="appointment_date" id="appointment_date" class="form-control" autocomplete="off" />
		                </div>
		                <div class="col-6 col-xl-4 mt-2">
		                	<label><small>Appointment Time*</small></label>
		                    <select name="appointment_time" id="appointment_time" class="form-control" autocomplete="false">
		                    	<option value="">Choose Time</option>
		                    </select>
		                </div>
		                <div class="col-6 col-xl-4 mt-2">
		                	<label><small>Amount to pay</small></label>
		                    <input type="text" id="payable_amount" value="<?php echo $currency." ".$total; ?>" class="form-control" disabled />
		                </div>
		                <div class="col-6 col-xl-4 mt-2">
		                	<label><small>Mobile No.*</small></label>
		                    <input type="number" placeholder="Your mobile no." name="customer_phone" id="customer_phone" class="form-control" value="<?php echo $userdata['phone']; ?>" autocomplete="false" />
		                </div>
		                <div class="col-xl-4 mt-2">
							<label><small>Name*</small></label>
		                    <input type="text" placeholder="Your name" name="customer_name" id="customer_name" class="form-control" value="<?php echo $userdata['name']; ?>" autocomplete="false" />
		                </div>
		                <div class="col-xl-4 mt-2">
		                	<label><small>Email</small></label>
		                    <input type="email" placeholder="Your email" name="customer_email" id="customer_email" class="form-control" value="<?php echo $userdata['email']; ?>" autocomplete="false" />
		                </div>
		                <div class="col-xl-12 mt-2">
			                <label><small>Note</small></label>
			              	<textarea placeholder="Your note" name="customer_note" id="customer_note" class="form-control"></textarea>
			            </div>
			            <div class="col-xl-12 mt-2">
			                <div class="login_input">
			                    <button type="submit" class="common_btn">Book </button>
			                </div>
			            </div>
			        </form>
	           	</div>
<?php
		   	} else {
				foreach($data["carts"] as $row) {
					$currency = $row["currency"];
					$total_min = $total_min + $row['duration'];
?>
					<tr data-final="<?php echo $row['is_final'] == 0 && $choose_date != "" ? "no" : "yes"; ?>">
						<td <?php echo $row['is_final'] == 0 && $choose_date != "" ? "style='border: 2px solid #FF0000;'" : ""; ?>>
							<a href="javascript:;" onclick="remove_from_cart(<?php echo $row['id']; ?>)" <?php echo $row['is_final'] == 0 && $choose_date != "" ? "style='opacity: 0.5;text-decoration: line-through;'" : ""; ?>><i class="fas fa-trash"></i></a>
							<b <?php echo $row['is_final'] == 0 && $choose_date != "" ? "style='opacity: 0.5;text-decoration: line-through;'" : ""; ?>><?php echo $row['service_name']; ?></b>
							<?php
								if(trim($row['caption']) != "") {
									if($row['is_final'] == 0 && $choose_date != "") {
										echo " <small style='text-decoration: line-through;'>(".$row['caption'].")</small>";
									} else {
										echo " <small>(".$row['caption'].")</small>";
									}
								} 
							?>
							<?php echo $row['is_final'] == 0 && $choose_date != "" ? "<small style='color: #FF0000;'> (This service is not possible for book.)</small>" : ""; ?>
						</td>
						<td align="right" <?php echo $row['is_final'] == 0 && $choose_date != "" ? "style='border: 2px solid #FF0000;opacity: 0.5;text-decoration: line-through;'" : ""; ?>><small><?php echo $row['duration']; ?> Min.</small></td>
						<td align="right" <?php echo $row['is_final'] == 0 && $choose_date != "" ? "style='border: 2px solid #FF0000;opacity: 0.5;text-decoration: line-through;'" : ""; ?>>
							<?php if($row['discount_amount'] == 0) { $total += $row['amount']; ?>
								<small><?php echo $row['amount']; ?></small>
							<?php } else { $total += $row['discount_amount']; ?>
								<small><?php echo $row['discount_amount']." <strike><small>".$row['amount']."</small></strike> "; ?></small>
							<?php } ?>
						</td>
					</tr>
<?php
				}
				echo '<tr>
					<td align="right"><small>TOTAL</small></td>
					<td align="right"><small>'.$total_min.' Min.</small></td>
					<td align="right" id="total_bill" data-bill="'.$total.'"><small>'.number_format($total,2).'</small></td>
				</tr>';
		   	}
		   	echo '<input type="hidden" name="total_min" value="'.$total_min.'" />';
		   	echo '<input type="hidden" id="total_amt" value="'.$total.'" />';
		} else {
			echo '<center><img src="'.base_url('public/frontend/images/cart_empty.webp').'" class="empty_cart" /><br><a class="read_btn" onclick="close_modal()">Continue Booking<a></center>';
		}
	}
?>