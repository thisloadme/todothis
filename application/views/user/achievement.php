<div class="container">
	<div class="row">
		<h5>Achieve your complete task</h5>
		<?php foreach ($users as $s) { ?>
			<?php if ($s->achievement == 0) { ?>
				<div class="col s12 m12 center-align">
					<i class="material-icons" style="font-size: 40pt">block</i><br>
					<h5>The Graph non active</h5>
					<h6>Activate it to see your progress</h6>
				</div>
			<?php }else{ ?>
				<div class="col s12 m12">
					<canvas id="lineChart"></canvas>
				</div>
			<?php } ?>
		<?php } ?>

		<div class="divider"></div>
		<div class="col s12 m8" style="margin-top: 20px;">
			<h5>Holiday status</h5>
			<?php foreach ($users as $s) { ?>
				<?php if ($s->holiday == 1) { ?>
					<h6><strong>Status = Paused</strong></h6>
					<h6>Happy Holiday ! We won't disturb you. So don't ever mind this graph if you are in holiday mode.</h6>
				<?php }else{ ?>
					<h6><strong>Status = Active</strong></h6>
					<h6>Holiday is over ! This time to work. So don't let your achieve down. Keep it up !</h6>
				<?php } ?>
			<?php } ?>
		</div>
		<div class="col s12 m4" style="margin-top: 20px;">
			<h5>About the graph</h5>
			<div class="collection" style="border: none">
				<a href="#" class="collection-item">ChartJS</a>
			</div>
		</div>
	</div>
</div>
<div id="profile" class="modal">
<div class="modal-content">
	<?php $this->load->view('user/profile'); ?>
</div>
</div>