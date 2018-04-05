<div class="container">
	<div class="row">
		<br>
		<h5>Tasks</h5>
		<h6 class="center-align blue-text"><?=$this->session->flashdata('task'); ?></h6><br>
		<h6 class="left-align black-text"><?=$this->session->flashdata('sort'); ?></h6>

		<table class="table-bordered table-stripped col s8 m7">
			<?php if ($total == 0) { ?>
				<tr>
					<td>
						<h1 class="center-align flow-text"><i style="font-size: 84pt;" class="material-icons blue-text">nature_people</i></h1>
						<h5 class="flow-text center-align blue-text">Oh no!! Nothing To Do Here</h5>
					</td>
				</tr>
			<?php }else { ?>
			<?php foreach ($tasks as $s) { ?>
			<tr>
				<td>
					<h6 style="font-size: 16pt;">
						<a href="#task_info<?=$s->id_task ?>" class="modal-trigger"><i class="material-icons teal-text" style="font-size: 12pt;">info_outline</i></a><?=$s->name_task ?> <br>
						<small style="font-size: 10pt;"> due :  <?=$s->due_date ?></small>
						<a href="<?=site_url('home/completed_task/'.$s->id_task) ?>"><i title="Set to done" class="material-icons right teal-text" style="margin-right: 20px!important;">done</i></a>
					</h6>
				</td>
			</tr>
		<?php } 
			}
		?>
	</table>
	<table class="table-bordered table-stripped col s4 m2 hide-on-small-only"> <!-- layar besar -->
	<tr>
		<td>
			<p>Sort by :</p>
			<a href="<?=site_url('app/due_date') ?>"><p><i class="material-icons" style="font-size: 12pt;">keyboard_arrow_right</i>Due Date</p></a>
			<a href="<?=site_url('app/name_task') ?>"><p><i class="material-icons" style="font-size: 12pt;">keyboard_arrow_right</i>Task Name</p></a>
			<a href="<?=site_url('app/priority') ?>"><p><i class="material-icons" style="font-size: 12pt;">keyboard_arrow_right</i>Priority</p></a>
			<br><div class="divider"></div><br>
			<p>Project : <a href="#add_project" class="blue-text right modal-trigger"><i class="material-icons" style="font-size: 12pt;">add</i></a></p>
			<?php foreach ($project as $s) { ?>
				<a href="#project<?=$s->id_project ?>" class="modal-trigger"><p><i class="material-icons" style="font-size: 12pt;"><?=$s->icon ?></i><?=$s->name_project ?></p></a>
			<?php } ?>
		</td>
	</tr>
</table>
<table class="table-bordered table-stripped col s4 m3 hide-on-small-only">
	<tr>
		<td>
			<a href="<?=site_url('achievement') ?>"><p><i class="material-icons" style="font-size: 12pt;">show_chart</i>Achievement</p></a>
			<a href="<?=site_url('calendar') ?>"><p><i class="material-icons" style="font-size: 12pt;">date_range</i>Calendar</p></a>
		</td>
	</tr>
</table>
<table class="table-bordered table-stripped col s4 m4 hide-on-med-and-up"> <!-- layar kecil -->
<tr>
	<td>
		<p>Sort by :</p>
		<a href="<?=site_url('app/due_date') ?>"><p><i class="material-icons" style="font-size: 12pt;">keyboard_arrow_right</i>Due Date</p></a>
		<a href="<?=site_url('app/name_task') ?>"><p><i class="material-icons" style="font-size: 12pt;">keyboard_arrow_right</i>Task Name</p></a>
		<a href="<?=site_url('app/priority') ?>"><p><i class="material-icons" style="font-size: 12pt;">keyboard_arrow_right</i>Priority</p></a>
		<br><div class="divider"></div><br>
		<p>Project :<a href="#add_project" class="blue-text right modal-trigger"><i class="material-icons" style="font-size: 12pt;">add</i></a></p>
		<?php foreach ($project as $s) { ?>
			<a href="#project<?=$s->id_project ?>" class="modal-trigger"><p><i class="material-icons" style="font-size: 12pt;"><?=$s->icon ?></i><?=$s->name_project ?></p></a>
		<?php } ?>
	</td>
</tr>
</table>
<table class="table-bordered table-stripped col s12 hide-on-med-and-up">
<tr>
	<td>
		<a href="<?=site_url('home/achieve_page') ?>"><p><i class="material-icons" style="font-size: 12pt;">show_chart</i>Achievement</p></a>
	</td>
	<td>
		<a href="<?=site_url('home/calendar') ?>"><p><i class="material-icons" style="font-size: 12pt;">date_range</i>Calendar</p></a>
	</td>
</tr>
</table>

<?php foreach ($task_pro as $s) { ?>
	
<div id="project<?=$s->id_project ?>" class="modal">
	<div class="modal-footer" style="height: 10px;">
		<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons">close</i></a>
	</div>
	<div class="modal-content">
		<div class="row">
			<h6 class="teal-text center-align">All task in <?=$s->name_project ?></h6>
			<br>
			<div class="collection">
				<a class="collection-item"><?=$s->name_task ?></a>
			</div>
		</div>
	</div>
</div>
<?php } ?>


<div id="profile" class="modal">
<div class="modal-content">
	<?php $this->load->view('user/profile'); ?>
</div>
</div>

<div id="add_project" class="modal">
	<div class="modal-content">
		<div class="modal-footer" style="height: 10px;">
			<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons">close</i></a>
		</div>
		<div class="modal-content" style="padding-top: 10px!important; padding-bottom: 15px;">
			<h5 style="margin-top: 0px; margin-bottom: 16px;" class="center-align teal-text"><i class="material-icons" style="padding-right: 10px;">info_outline</i>Add new project</h5>
			<h6 style="font-size: 8pt" class="center-align">The project icon will show the default. Coming soon for the new feature</h6>
			<div class="row">
				<form action="<?=site_url('home/add_project') ?>" method="post">
					<div class="input-field col s12 m12">
						<label for="name">Project Name :</label>
						<input type="text" id="name" name="pro_name" class="validate">
					</div>
					<div class="input-field col s12 m12">
						<button type="submit" name="btn" class="btn-large teal right"><i class="material-icons">add</i></button>
					</div>
				</form>	
			</div>
		</div>
	</div>
</div>

<?php foreach ($info as $q) { ?>
<div id="task_info<?=$q->id_task ?>" class="modal">
<div class="modal-content">
	<div class="modal-footer" style="height: 10px;">
		<a href="" class="modal-action modal-close waves-effect waves-green"><i class="material-icons">close</i></a>
	</div>
	<div class="modal-content" style="padding-top: 10px!important;">
		
		<?php if ($q->img_task == NULL) { ?>
			<h6 class="center-align"><i class="teal-text material-icons" style="font-size: 12pt;">warning</i>There is no image available for this task</h6>
		<?php }else { ?>
			<img src="<?=base_url() ?>aset/img/<?=$q->img_task ?>" class="responsive-image" style="width: 100%">
		<?php } ?>
		<h5 style="margin-top: 10px; margin-bottom: 16px;" class="center-align teal-text"><br><?=$q->name_task ?></h5>
		<table>
			<tr>
				<th>Due Date</th>
				<td><?=$q->due_date ?></td>
			</tr>
			<tr>
				<th>Create at</th>
				<td><?=$q->create_at ?></td>
			</tr>
			<tr>
				<th>Priority</th>
				<td>
					<?php if ($q->priority == 1) {
						echo '<i class="material-icons" style="font-size: 12pt">error</i>Low';
					}elseif ($q->priority == 2) {
						echo '<i class="material-icons" style="font-size: 12pt">warning</i>Medium';
					}elseif ($q->priority == 3) {
						echo '<i class="material-icons" style="font-size: 12pt">new_releases</i>High';
					} ?>
				</td>
			</tr>
			<tr>
				<th>Project</th>
				<td><i class="material-icons" style="font-size: 12pt"><?=$q->icon ?></i><?=$q->name_project ?></td>
			</tr>
			<tr>
				<th>Additional Note</th>
				<td><?=$q->note ?></td>
			</tr>
		</table>
	</div>
</div>
</div>
<?php } ?>
	
</div>
</div>