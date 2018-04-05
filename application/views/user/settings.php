<div class="container">
	<div class="row">
		<table class="col m4 l4 hide-on-small-only">
			<tr>
				<td>
					<div class="collection" style="border: none;">
						<p class="blue-text"><a class="blue-text collection-item" href="<?=site_url('settings/1') ?>"><i style="font-size: 14pt;" class="material-icons">account_circle</i> Account</a></p>
						<p class="blue-text"><a class="blue-text collection-item" href="<?=site_url('settings/2') ?>"><i style="font-size: 14pt;" class="material-icons">grade</i> Achievement and Holiday</a></p>
						<p class="blue-text"><a class="blue-text collection-item" href="<?=site_url('settings/3') ?>"><i style="font-size: 14pt;" class="material-icons">alarm</i> Reminder</a></p>
						<p class="blue-text"><a class="blue-text collection-item" href="<?=site_url('settings/4') ?>"><i style="font-size: 14pt;" class="material-icons">supervisor_account</i> Support</a></p>
						<p class="blue-text"><a class="blue-text collection-item" href="<?=site_url('settings/5') ?>"><i style="font-size: 14pt;" class="material-icons">info_outline</i> About</a></p>
					</div>
				</td>
			</tr>
		</table>
		<table class="col s12 hide-on-med-and-up">
			<tr>
				<td><p class="blue-text"><a href="<?=site_url('settings/1') ?>"><i style="font-size: 14pt;" class="material-icons">settings</i> Account</a></p></td>
				<td><p class="blue-text"><a href="<?=site_url('settings/2') ?>"><i style="font-size: 14pt;" class="material-icons">grade</i> Achievement</a></p></td>
				<td><p class="blue-text"><a href="<?=site_url('settings/3') ?>"><i style="font-size: 14pt;" class="material-icons">alarm</i> Reminder</a></p></td>
				<td><p class="blue-text"><a href="<?=site_url('settings/4') ?>"><i style="font-size: 14pt;" class="material-icons">supervisor_account</i> Support</a></p></td>
				<td><p class="blue-text"><a href="<?=site_url('settings/5') ?>"><i style="font-size: 14pt;" class="material-icons">info_outline</i> About</a></p></td>
			</tr>
		</table>
		<table class="col m8 l8 s12">
			<?php switch ($set) {
			case 'account': ?>
			<tr>
				<td>
					<p class="blue-text"><?=$this->session->flashdata('flash'); ?></p>
					<h5>Account Settings</h5>
					<p class="flow-text" style="font-size: 12pt">Edit your identity to personalize yours.</p>
					<div class="divider"></div><br>
					<a href="#change_pass" class="btn blue modal-trigger">Change password</a>
					<br><br>
					<div class="divider"></div><br>
					<?php foreach ($users as $s) { ?>
						<form method="post" action="<?=site_url('home/change_profile') ?>">
						<table class="table-stripped table-bordered">
							<tr>
								<th>Username</th>
								<td><input value="<?=$s->username ?>" type="text" name="username" required></td> 
							</tr>
							<tr>
								<th>Fullname</th>
								<td><input value="<?=$s->fullname ?>" type="text" name="fullname" required></td>
							</tr>
							<tr>
								<th>Password</th>
								<td id="pass"><button class="blue btn" onclick="pass()">Show your password</button></td>
							</tr>
							<script type="text/javascript">
								function pass(){
									document.getElementById('pass').innerHTML = "<?=$s->password ?>"
								}
							</script>
							<tr>
								<th>Email</th>
								<td><input value="<?=$s->email ?>" type="email" name="email" required></td> 
							</tr>
							<tr>
								<th>My Bio</th>
								<td><input type="text" name="bio" value="<?=$s->bio ?>" required></td>
							</tr>
							<tr>
								<td colspan="2"><button class="btn blue right" type="submit">Save</button></td>
							</tr>
						</table>
						</form>
					<?php } ?>
				</td>
			</tr>
			<?php break;
			case 'achievement': ?>
			<tr>
				<td>
					<p class="blue-text"><?=$this->session->flashdata('success'); ?></p>
					<h5>Achievement and Holiday</h5>
					<p class="flow-text" style="font-size: 13pt">Achievement is a magic feature that will make you can monitoring your task done.</p>
					<h6>Enable this feature ?</h6>
					<form method="post" action="<?=site_url('home/holiday') ?>">
						<div class="col s12 m12">
						<?php foreach ($users as $s) { ?>
							<p>
								<input class="with-gap" value="1" name="group2" type="radio" id="achieve1"
								<?php if ($s->achievement == 1) { ?>
								checked="true"
								<?php } ?>>
								<label for="achieve1">Activate</label>
							</p>
							<p>
								<input class="with-gap" value="0" name="group2" type="radio" id="achieve2"
								<?php if ($s->achievement == 0) { ?>
								checked="true"
								<?php } ?>>
								<label for="achieve2">Deactivate</label>
							</p>	
						</div>
					<br><br><br><div class="divider"></div><br><br><br>
					<h6>Holiday Mode</h6>
					<p class="flow-text" style="font-size: 13pt">Holiday Mode is a mode that all of your done task won't be achieved in a My Achievement graph. This will help you to focus on your relaxing holiday.</p>
						<?php if ($s->holiday == 0) { ?>
							<h6>Status = Non active</h6>
						<?php }else{ ?>
							<h6>Status = Active</h6>
						<?php } ?>
					<!-- <form method="post" action=""> -->
						<div class="col s12 m12">
							<p>
								<input class="with-gap" value="1" name="group1" type="radio" id="holiday_radio1"
								<?php if ($s->holiday == 1) { ?>
								checked="true"
								<?php } ?>>
								<label for="holiday_radio1">Activate</label>
							</p>
							<p>
								<input class="with-gap" value="0" name="group1" type="radio" id="holiday_radio2"
								<?php if ($s->holiday == 0) { ?>
								checked="true"
								<?php } ?>>
								<label for="holiday_radio2">Deactivate</label>
							</p>
							<?php } ?>
							
							<button type="submit" name="btn" class="btn blue right">Save</button>
						</div>
					</form>
				</td>
			</tr>
			<?php break;
			case 'reminder': ?>
			<tr>
				<td>
					<h5>Reminder Settings</h5>
					<p class="flow-text" style="font-size: 13pt">Reminder helps remind you with email that you have. If there is a task that is present or overdue.</p>
					<br><div class="divider"></div><br>
					<h6>Enable Reminder ?</h6>
					<?php foreach ($users as $s) { ?>
					<p class="blue-text"><?=$this->session->flashdata('success'); ?></p>
					<form method="post" action="<?=site_url('home/reminder') ?>">
						<div class="col s12 m12">
						<p>
							<input type="radio" class="with-gap" id="value1" name="remind" value="1" <?php if ($s->reminder == 1) {
								echo 'checked';
							} ?>>
							<label for="value1">Yes</label>
						</p>
						<p>
							<input type="radio" class="with-gap" id="value2" name="remind" value="0" <?php if ($s->reminder == 0) {
								echo 'checked';
							} ?>>
							<label for="value2">No</label>
						</p>
						<!-- <p class="range-field">
							<input type="range" id="test5" min="0" max="100" />
						</p> -->
						<button type="submit" class="right btn blue">Save</button>
						</div>
					</form>
					<?php } ?>
				</td>
			</tr>
			<?php break;
			case 'support': ?>
			<tr>
				<td>
					<h6 class="blue-text center-align"><?=$this->session->flashdata('feed'); ?></h6>
					<h5>Support</h5>
					<div class="collection" style="border: none;">
						<a href="#" class="blue-text collection-item">Get a Guide</a>
						<a href="#feedback" class="modal-trigger blue-text collection-item">Send a Feedback</a>
					</div>
					<p title="See all your feedback"><a href="#see" class="modal-trigger"><i class="material-icons right">visibility</i></a></p>
					<br>
					<div class="divider"></div>
					<br>
					<h5>Donate to make ToDoThis effloresce</h5>
					<div class="collection" style="border: none">
						<a href="#" class="blue-text collection-item">Donate Now</a>
					</div>
				</td>
			</tr>
			<?php break;
			case 'about': ?>
			<tr>
				<td>
					<h5>About</h5>
					<h2 class="left-align"><img src="<?=base_url() ?>aset/img/colorfullogo.png" style="height: auto; width: 120px;"></h2>
					<table>
						<tr>
							<td colspan="2"><p class="flow-text" style="font-size: 12pt">ToDoThis is a Semi-Advanced To Do List application that can help someone who need it. With this app, we hope you can wake up early to prepare for the daily job, make a email reminder to remind you to washing a car, and other time management problem case.</p></td>
						</tr>
						<tr>
							<th>App Name</th>
							<td>ToDoThis | Get All Your Tasks Done</td>
						</tr>
						<tr>
							<th>Version</th>
							<td>1.0.2 Beta</td>
						</tr>
						<tr>
							<th>Copyright</th>
							<td><i class="material-icons" style="font-size: 12pt;">copyright</i>2018</td>
						</tr>
						<tr>
							<th>Made with</th>
							<td>
								<div class="collection">
									<a href="#" class="blue-text collection-item">Love <i class="blue-text material-icons">favorite</i></a>
									<a href="http://materializecss.com" class="blue-text collection-item">Materialize CSS</a>
									<a href="http://codeigniter.com" class="blue-text collection-item">CodeIgniter</a>
									<a href="http://jquery.com" class="blue-text collection-item">JQuery</a>
								</div>
							</td>
						</tr>
						<tr>
							<th>Team</th>
							<td>
								<a href="http://www.facebook.com/thisloadme" class="blue-text">#ThisLoadMe</a> <small>Developer</small><br>
								<a href="http://www.facebook.com/NayzZ.design" class="blue-text">#NayzZ</a> <small>Graphics Designer</small>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="blue-text center-align"><p class="flow-text">Thanks for using this app <i class="material-icons">favorite</i></p></td>
						</tr>
					</table>
				</td>
			</tr>
			<?php break; } ?>
			
		</table>
	</div>
</div>
<div id="profile" class="modal">
	<div class="modal-content">
		<?php $this->load->view('user/profile'); ?>
	</div>
</div>

<div class="modal" id="change_pass">
	<div class="modal-footer" style="height: 10px;">
		<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons teal-text" title="Close">close</i></a>
	</div>
	<div class="modal-content">
		<div class="container">
			<div class="row">
				<div class="col s12 m12">
					<h5 class="center-align teal-text">Change Password</h5>
					<form action="<?=site_url('change_password') ?>" method="post">
						<table>
							<tr>
								<th>Old password</th>
								<td><input type="password" name="oldpass"></td>
							</tr>
							<tr>
								<th>Enter new password</th>
								<td><input type="password" name="newpass"></td>
							</tr>
							<tr>
								<th>Confirm again</th>
								<td><input type="password" name="newpass2"></td>
							</tr>
							<tr>
								<td colspan="2"><button type="submit" class="btn btn-teal right">Change now</button></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="feedback">
	<div class="modal-footer" style="height: 10px;">
		<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons teal-text" title="Close">close</i></a>
	</div>
	<div class="modal-content">
		<div class="container">
			<div class="row">
				<div class="col s12 m12">
					<h5 class="blue-text center-align">Give us a Feedback</h5>
					<br>
					<form action="<?=site_url('feedback') ?>" method="post">
						<div class="input-field">
							<label for="feed">Summary</label>
							<input type="text" id="feed" name="summ">
						</div>
						<div class="input-field">
							<label for="note">Body feedback</label>
							<textarea id="note" class="materialize-textarea" name="feed" data-length="1000"></textarea>
						</div><br>
						<div class="input-field">
							<button class="blue right btn" type="submit">Send to us</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="see">
	<div class="modal-footer" style="height: 10px;">
		<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons teal-text" title="Close">close</i></a>
	</div>
	<div class="modal-content">
		<div class="row">
			<h5 class="blue-text center-align">All your feedback</h5>
			<br>
			<?php if (count($all) == 0) { ?>
				<p class="center-align"><i class="material-icons" style="font-size: 12pt">clear</i>Not feedback yet</p>
			<?php }else{ ?>
			<?php foreach ($all as $s) { ?>
				<div class="card col s12 m6 z-depth-3 hoverable">
					<div class="card-content">
						<h5><?=$s->summary ?></h5>
						<div class="divider"></div>
						<p class="flow-text hide-on-med-and-up"><?=$s->body ?></p>
						<h6 class="hide-on-small-only"><?=$s->body ?></h6>
						<br>
						<a title="delete this" href="<?=site_url('delete_feed/'.$s->id_feed) ?>"><i class="material-icons right blue-text" style="font-size: 12pt">clear</i></a>
					</div>
				</div>
			<?php }} ?>
		</div>
	</div>
</div>