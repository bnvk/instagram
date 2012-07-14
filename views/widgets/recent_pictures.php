<div class="widget_<?= $widget_region ?> widget_instagram_recent_pictures" id="widget_<?= $widget_id ?>">
	<h2><?= $widget_title ?></h2>

	<?php foreach ($pictures->data as $item): ?>
		<a href="<?= $item->images->standard_resolution->url ?>" target="_blank" <?php if (isset($item->caption->text)): echo 'title="'.$item->caption->text.'"'; endif; ?>><img src="<?= $item->images->thumbnail->url ?>"></a>
	<?php endforeach; ?>

</div>