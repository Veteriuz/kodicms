<div class="widget-header">
	<h3><?php echo __('Page options'); ?></h3>
</div>

<div class="widget-content">
	<label><?php echo __('Layout'); ?></label>
	<select name="page[layout_file]" class="span12">
		<option value="0">&ndash; <?php echo __('inherit'); ?> &ndash;</option>
		<?php foreach ($layouts as $layout): ?>
		<option value="<?php echo($layout->name); ?>" <?php echo($layout->name == $page->layout_file ? ' selected="selected"': ''); ?> ><?php echo $layout->name; ?></option>
		<?php endforeach; ?>
	</select>
	<label><?php echo __('Type'); ?></label>
	<select name="page[behavior_id]" class="span12">
		<option value="0"<?php if ($page->behavior_id == '') echo ' selected="selected"'; ?>>&ndash; <?php echo __('none'); ?> &ndash;</option>
		<?php foreach ($behaviors as $behavior): ?>
		<option value="<?php echo $behavior; ?>"<?php if ($page->behavior_id == $behavior) echo ' selected="selected"'; ?>><?php echo Inflector::humanize($behavior); ?></option>
		<?php endforeach; ?>
	</select>

	<?php if(AuthUser::hasPermission(array('administrator','developer')) && ($action == 'add' || ($action == 'edit' && isset($page->id) && $page->id != 1))): ?>
	<label><?php echo __('Status'); ?></label>

	<?php echo Form::select('page[status_id]', Model_Page::statuses(), $page->status_id, array(
		'class' => 'span12'
	)); ?>
	<?php endif; ?>

	<?php if($action == 'add' || ($action == 'edit' && isset($page->id) && $page->id != 1)): ?>
	<label><?php echo __('Published date'); ?></label>
	<?php echo Form::input('page[published_on]', $page->published_on, array('class' => 'span12 datepicker')); ?>
	<?php endif; ?>

	<?php if (AuthUser::hasPermission(array('administrator','developer'))): ?>
	<label><?php echo __('Needs login'); ?></label>
	<?php echo Form::select('page[needs_login]', Model_Page::logins(), $page->needs_login, array(
		'class' => 'span12'
	)); ?>
	<?php endif; ?>

	<?php if (AuthUser::hasPermission(array('administrator','developer'))): ?>
	<label><?php echo __('Users roles that can edit page'); ?></label>
	<?php echo Form::select('page_permissions[]', $permissions, array_keys($page_permissions), array(
		'class' => 'span12'
	)); ?>
	<?php endif; ?>
</div>

<?php Observer::notify('view_page_edit_options', array($page)); ?>