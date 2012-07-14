<form name="settings_update" id="settings_update" method="post" enctype="multipart/form-data">

<div class="content_wrap_inner">

	<h2>Instagram Widgets</h2>

	<h3>Recent Pictures</h3>
	
	<p>Select User (only super admins are shown)<br>
	<select name="widgets_recent_pictures">
		<option value="0">--- select ---</option>
	<?php foreach($users as $user): ?>
		<option value="<?= $user->user_id ?>" <?php if (config_item('instagram_widgets_recent_pictures') == $user->user_id) echo 'selected="selected"'; ?>><?= $user->name ?></option>
	<?php endforeach; ?>
	</select>

	<p><input type="submit" name="save" value="Save" /></p>

</div>
</form>

<script type="text/javascript">
$(document).ready(function()
{
	// Save Settings
	$('#settings_update').bind('submit', function(e)
	{
		e.preventDefault();
		var settings_data = $('#settings_update').serializeArray();
		settings_data.push({'name':'module','value':'instagram'});	
	
		$.oauthAjax(
		{
			oauth 		: user_data,
			url			: base_url + 'api/settings/modify',
			type		: 'POST',
			dataType	: 'json',
			data		: settings_data,
	  		success		: function(result)
	  		{
				$('html, body').animate({scrollTop:0});
				$('#content_message').notify({status:result.status,message:result.message});			 		
		 	}
		});		
	});

});
</script>