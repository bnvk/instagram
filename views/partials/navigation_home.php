<h2 class="content_title"><img src="<?= $modules_assets ?>instagram_32.png"> Instragram</h2>
<ul class="content_navigation">
	<?= navigation_list_btn('home/instagram', 'Recent') ?>
	<?= navigation_list_btn('home/instagram/custom', 'Custom') ?>
	<?php if ($logged_user_level_id <= 2) echo navigation_list_btn('home/instagram/manage', 'Manage', $this->uri->segment(4)) ?>
</ul>