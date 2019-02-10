<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Community Auth - Login Form View
 *
 * Community Auth is an open source authentication application for CodeIgniter 3
 *
 * @package     Community Auth
 * @author      Robert B Gottier
 * @copyright   Copyright (c) 2011 - 2018, Robert B Gottier. (http://brianswebdesign.com/)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://community-auth.com
 */
?>
<div class="container">
<?php
if( ! isset( $on_hold_message ) )
{
	if( isset( $login_error_mesg ) )
	{
		?>
<div class="card my-4 border-left-danger">
	<div class="card-body">
		<?=lang('sb2admin_login_login_error')?> #<?=$this->authentication->login_errors_count?>/<?=config_item('max_allowed_attempts')?>: <?=lang('sb2admin_login_invalid')?><br/>
		<?=lang('sb2admin_login_case_sensitive')?>
	</div>
</div>
		<?php
	}

	if( $this->input->get(AUTH_LOGOUT_PARAM) )
	{
		?>
<div class="card my-4 border-left-success">
	<div class="card-body">
		<?=lang('sb2admin_login_logout_successful')?>
	</div>
</div>
		<?php
	}

	echo form_open( $login_url, ['class' => 'std-form', 'novalidate' => 'true'] ); 
?>
  <div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-6">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4"><?=lang('sb2admin_login_welcome')?></h1>
                </div>
                <form class="user">
                  <div class="form-group">
                    <input type="email" name="login_string" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?=lang('sb2admin_login_email_placeholder')?>" autocomplete="off">
                  </div>
                  <div class="form-group">
                    <input type="password" name="login_pass" class="form-control form-control-user" id="exampleInputPassword" placeholder="<?=lang('sb2admin_login_password_placeholder')?>">
									</div>
									<?php if( config_item('allow_remember_me') ): ?>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                      <input type="checkbox" class="custom-control-input" id="customCheck">
                      <label class="custom-control-label" for="customCheck"><?=lang('sb2admin_login_remember_me')?></label>
                    </div>
									</div>
									<?php endif; ?>
                  <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                    <?=lang('sb2admin_login_login_button')?>
                  </button>
                </form>
                <!-- <hr>
                <div class="text-center">
                  <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                  <a class="small" href="register.html">Create an Account!</a>
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
<?php
}
else
{
	?>
<div class="card my-4 border-left-danger">
	<div class="card-body">
		<?=lang('sb2admin_login_excessive_before')?>
		<?=( (int) config_item('seconds_on_hold') / 60 )?>
		<?=lang('sb2admin_login_excessive_after')?>
	</div>
</div>
	<?php
}

?>
</div>
