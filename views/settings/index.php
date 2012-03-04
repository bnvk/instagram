<form name="settings_update" id="settings_update" method="post" action="<?= base_url() ?>api/settings/modify" enctype="multipart/form-data">
<div class="content_wrap_inner">

	<div class="content_inner_top_right">
		<h3>App</h3>
		<p><?= form_dropdown('enabled', config_item('enable_disable'), $settings['instagram']['enabled']) ?></p>
		<p><a href="<?= base_url() ?>api/<?= $this_module ?>/uninstall" id="app_uninstall" class="button_delete">Uninstall</a></p>
	</div>
	
	<h3>Application Keys</h3>

	<p>Instagram requires <a href="http://instagram.com/developer/" target="_blank">registering your application</a></p>
				
	<p><input type="text" name="client_name" value="<?= $settings['instagram']['client_name'] ?>"> App Name</p>
	<p><input type="text" name="client_id" value="<?= $settings['instagram']['client_id'] ?>"> Client ID </p> 
	<p><input type="text" name="client_secret" value="<?= $settings['instagram']['client_secret'] ?>"> Client Secret</p>
	
	
</div>
<span class="item_separator"></span>

<div class="content_wrap_inner">

	<h3>Setup</h3>

	<p>Login
	<?= form_dropdown('social_login', config_item('yes_or_no'), $settings['instagram']['social_login']) ?>
	</p>
	
	<p>Login Redirect<br>
	<?= base_url() ?> <input type="text" size="30" name="login_redirect" value="<?= $settings['instagram']['login_redirect'] ?>" />
	</p>	

	<p>Connections
	<?= form_dropdown('social_connection', config_item('yes_or_no'), $settings['instagram']['social_connection']) ?>
	</p>

	<p>Connections Redirect<br>
	<?= base_url() ?> <input type="text" size="30" name="connections_redirect" value="<?= $settings['instagram']['connections_redirect'] ?>" />
	</p>	

</div>

<span class="item_separator"></span>

<div class="content_wrap_inner">
			
	<h3>Comments</h3>	

	<p>Allow
	<?= form_dropdown('module_allow', config_item('yes_or_no'), $settings['instagram']['comments_allow']) ?>
	</p>

	<p>Comments Per-Page
	<?= form_dropdown('module_per_page', config_item('amount_increments_five'), $settings['instagram']['comments_per_page']) ?>
	</p>

	<input type="hidden" name="module" value="<?= $this_module ?>">

	<p><input type="submit" name="save" value="Save" /></p>

</div>
</form>

<?= $shared_ajax ?>