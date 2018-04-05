<div class="modal-footer" style="height: 10px;">
	<a href="<?=site_url('logout') ?>" class="left"><i class="material-icons" style="font-size: 14pt;" title="Logout">power_settings_new</i></a>
	<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons" title="Close">close</i></a>
</div>
<div class="modal-content">
	<div class="row">
		<?php foreach ($users as $u) { ?>
		<h4 class="center-align"><i style="font-size: 100px;" class="material-icons blue-text">account_circle</i></h4>
		<h5 class="center-align"><?=$this->session->userdata('fullname').' ('.$this->session->userdata('username').')' ?></h5>
		<h6 class="center-align">User since <?=convert_date($this->session->userdata('since')); ?></h6>
		<table class="table-stripped table-bordered">
			<tr>
				<th>Email</th>
				<td>
					<h6><?=$u->email ?></h6>
				</td>
			</tr>
			<tr>
				<th>My Bio</th>
				<td>
					<h6><?=$u->bio ?></h6>
				</td>
			</tr>
			<tr>
				<th>Self Destruct</th>
				<td><a class="center-align" href="<?=site_url('home/delete_acc') ?>">Delete this account</a></td>
			</tr>
		</table>
		<?php } ?>

	</div>
</div>