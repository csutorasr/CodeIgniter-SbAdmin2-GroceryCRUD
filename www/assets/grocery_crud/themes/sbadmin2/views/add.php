<?php
	$this->set_css('vendor/datatables/dataTables.bootstrap4.min.css');

    $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js_config($this->default_theme_path.'/sbadmin2/js/datatables-add.js');
	$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<?php echo $this->l('form_add'); ?> <?php echo $subject?>
	</div>
	<div class="card-body">
		<?php echo form_open( $insert_url, 'method="post" id="crudForm" enctype="multipart/form-data"'); ?>
			<div>
				<?php
					foreach($fields as $field)
					{
				?>
				<div class="form-group" id="<?php echo $field->field_name; ?>_field_box">
					<label for="<?php echo $field->field_name; ?>_input_box" id="<?php echo $field->field_name; ?>_display_as_box">
						<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?>:
					</label>
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
				<?php } ?>
				<!-- Start of hidden inputs -->
					<?php
						foreach($hidden_fields as $hidden_field){
							echo $hidden_field->input;
						}
					?>
				<!-- End of hidden inputs -->
				<?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
				<div class='line-1px'></div>
				<div id='report-error' class='report-div'></div>
				<div id='report-success' class='report-div'></div>
			</div>
			<div class='buttons-box'>
				<button id="form-button-save" type="submit" class="btn btn-primary"><?php echo $this->l('form_save'); ?></button>
	<?php 	if(!$this->unset_back_to_list) { ?>
				<button id="save-and-go-back-button" class="btn btn-primary"><?php echo $this->l('form_save_and_go_back'); ?></button>
				<button id="cancel-button" class="btn btn-secondary"><?php echo $this->l('form_cancel'); ?></button>
	<?php   } ?>
				<div class='form-button-box loading-box'>
					<div class='small-loading' id='FormLoading' style="display:none;"><?php echo $this->l('form_insert_loading'); ?></div>
				</div>
			</div>
		<?php echo form_close(); ?>
	</div>
	<script>
		var validation_url = '<?php echo $validation_url?>';
		var list_url = '<?php echo $list_url?>';

		var message_alert_add_form = "<?php echo $this->l('alert_add_form')?>";
		var message_insert_error = "<?php echo $this->l('insert_error')?>";
	</script>
</div>
