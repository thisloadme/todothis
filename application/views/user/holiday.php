<div class="modal-footer" style="height: 10px;">
	<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons">close</i></a>
</div>
<div class="modal-content">
	<div class="row">
		<h5 style="top: 15px; right: 15px" class="teal-text center-align">Holiday Mode</h5>
		<p class="flow-text" style="font-size: 13pt">Holiday Mode is a mode that all of your done task won't be achieved in a My Achievement graph. This will help you to focus on your relaxing holiday.</p>
		<?php foreach ($users as $s) { ?>
			<?php if ($s->holiday == 0) { ?>
				<h6>Status = Non active</h6>
			<?php }else{ ?>
				<h6>Status = Active</h6>
			<?php } ?>
		<?php } ?>
		<form method="post" action="<?=site_url('home/holiday/'.$this->uri->segment(3)) ?>">
			<div class="col s12 m12">
				<table class="table table-bordered hide-on-small-only" style="border: none">
					<tr>
						<?php foreach ($users as $s) { ?>
							
						<td>
							<p style="text-align: center">
								<input class="with-gap" value="1" name="group1" type="radio" id="holiday_radio1" 
								<?php if ($s->holiday == 1) { ?>
									checked="true"	
								<?php } ?>>
								<label for="holiday_radio1">Activate</label>
							</p>
						</td>
						<td>
							<p style="text-align: center">
								<input class="with-gap" value="0" name="group1" type="radio" id="holiday_radio2" 
								<?php if ($s->holiday == 0) { ?>
									checked="true"
								<?php } ?>>
								<label for="holiday_radio2">Deactivate</label>
							</p>
						</td>

						<?php } ?>
						<td>
							<button type="submit" name="btn" class="btn teal white-text right" style="font-size: 12pt"><i class="material-icons">send</i></button>
						</td>
					</tr>
				</table>
			</div>
		</form>
		<form method="post" action="<?=site_url('home/holiday/'.$this->uri->segment(3)) ?>">
			<div class="col s12 m12">
				<table class="table table-bordered hide-on-med-and-up" style="border: none">
					<tr>
						<?php foreach ($users as $s) { ?>
							
						<td>
							<p style="text-align: center">
								<input class="with-gap" value="1" name="group1" type="radio" id="holiday_radio3" 
								<?php if ($s->holiday == 1) { ?>
									checked="true"	
								<?php } ?>>
								<label for="holiday_radio3">Activate</label>
							</p>
						</td>
						<td>
							<p style="text-align: center">
								<input class="with-gap" value="0" name="group1" type="radio" id="holiday_radio4" 
								<?php if ($s->holiday == 0) { ?>
									checked="true"
								<?php } ?>>
								<label for="holiday_radio4">Deactivate</label>
							</p>
						</td>

						<?php } ?>
					</tr>
					<tr>
						<td colspan="2"><button type="submit" name="btn" class="btn teal white-text right" style="font-size: 12pt"><i class="material-icons">send</i></button></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>