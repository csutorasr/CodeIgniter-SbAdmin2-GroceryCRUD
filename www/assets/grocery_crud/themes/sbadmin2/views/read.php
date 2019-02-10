<?php
	$this->set_css('vendor/datatables/dataTables.bootstrap4.min.css');

    $this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.form.min.js');
	$this->set_js_config($this->default_theme_path.'/sbadmin2/js/datatables-edit.js');
	$this->set_css($this->default_css_path.'/ui/simple/'.grocery_CRUD::JQUERY_UI_CSS);
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/ui/'.grocery_CRUD::JQUERY_UI_JS);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
?>
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<?php echo $this->l('list_record'); ?> <?php echo $subject?>
	</div>
	<div class="card-body">
	<?php echo form_open( $read_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>
		<div>
		<?php
			foreach($fields as $field)
			{
		?>
			<div class="form-group" id="<?php echo $field->field_name; ?>_field_box">
				<label for="<?php echo $field->field_name; ?>_input_box" id="<?php echo $field->field_name; ?>_display_as_box">
					<?php echo $input_fields[$field->field_name]->display_as?><?php echo ($input_fields[$field->field_name]->required)? "<span class='required'>*</span> " : ""?>:
				</label>
				<div class="form-control" id="<?php echo $field->field_name; ?>_input_box">
					<?php echo $input_fields[$field->field_name]->input?>
				</div>
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
			<div class='form-button-box'>
				<button class="btn btn-secondary" class='ui-input-button back-to-list' id="cancel-button" >
					<?php echo $this->l('form_back_to_list'); ?>
				</button>
			</div>
			<div class='clear'></div>
		</div>
	</form>
</div>
</div>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>
