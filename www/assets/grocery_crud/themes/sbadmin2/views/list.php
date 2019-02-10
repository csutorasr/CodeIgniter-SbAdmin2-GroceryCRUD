<div class="table-responsive">
	<table cellpadding="0" cellspacing="0" border="0" class="display groceryCrudTable table table-bordered" id="<?php echo uniqid(); ?>">
		<thead>
			<tr>
				<?php foreach($columns as $column){?>
					<th><?php echo $column->display_as; ?></th>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<th class='actions'><?php echo $this->l('list_actions'); ?></th>
				<?php }?>
			</tr>
		</thead>
		<tbody>
			<?php foreach($list as $num_row => $row){ ?>
			<tr id='row-<?php echo $num_row?>'>
				<?php foreach($columns as $column){?>
					<td><?php echo $row->{$column->field_name}?></td>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
				<td class='actions'>
					<?php
					if(!empty($row->action_urls)){
						foreach($row->action_urls as $action_unique_id => $action_url){
							$action = $actions[$action_unique_id];
					?>
							<a href="<?php echo $action_url; ?>" class="edit_button ui-button btn btn-primary btn-icon-split" role="button">
								<span class="icon text-white-50 <?=$action_unique_id;?>">
									<i class="fas <?=$action->css_class; ?>"></i>
								</span>
								<span class="text"><?=$action->label?></span>
							</a>
					<?php }
					}
					?>
					<?php if(!$unset_read){?>
						<a href="<?php echo $row->read_url?>" class="edit_button ui-button btn btn-primary btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-info-circle"></i>
							</span>
							<span class="text"><?php echo $this->l('list_view'); ?></span>
						</a>
					<?php }?>

					<?php if(!$unset_clone){?>
						<a href="<?php echo $row->clone_url?>" class="edit_button ui-button btn btn-info btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-clone"></i>
							</span>
							<span class="text"><?php echo $this->l('list_clone'); ?></span>
						</a>
					<?php }?>

					<?php if(!$unset_edit){?>
						<a href="<?php echo $row->edit_url?>" class="edit_button ui-button btn btn-warning btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-edit"></i>
							</span>
							<span class="text"><?php echo $this->l('list_edit'); ?></span>
						</a>
					<?php }?>

					<?php if(!$unset_delete){?>
						<a href="#" class="edit_button ui-button btn btn-danger btn-icon-split" onclick="javascript: return delete_row('<?php echo $row->delete_url?>', '<?php echo $num_row?>')">
							<span class="icon text-white-50">
								<i class="fas fa-trash"></i>
							</span>
							<span class="text"><?php echo $this->l('list_delete'); ?></span>
						</a>
					<?php }?>
				</td>
				<?php }?>
			</tr>
			<?php }?>
		</tbody>
		<tfoot>
			<tr>
				<?php foreach($columns as $column){?>
					<th><input type="text" name="<?php echo $column->field_name; ?>" placeholder="<?php echo $this->l('list_search').' '.$column->display_as; ?>" class="search_<?php echo $column->field_name; ?>" /></th>
				<?php }?>
				<?php if(!$unset_delete || !$unset_edit || !$unset_read || !empty($actions)){?>
					<th>
						<button class="refresh-data ui-button btn btn-primary" role="button" data-url="<?php echo $ajax_list_url; ?>">
							<i class="fas fa-sync"></i>
						</button>
						<a href="javascript:void(0)" role="button" class="clear-filtering ui-button btn btn-danger btn-icon-split">
							<span class="icon text-white-50">
								<i class="fas fa-trash"></i>
							</span>
							<span class="text"><?php echo $this->l('list_clear_filtering');?></span>
						</a>
					</th>
				<?php }?>
			</tr>
		</tfoot>
	</table>
</div>
