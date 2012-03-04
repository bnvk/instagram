<?php foreach ($feed->data as $item): ?>

	<p>
		<a href="<?= $item->images->standard_resolution->url ?>" class="view_image" <?php if (isset($item->caption->text)): echo 'title="'.$item->caption->text.'"'; endif; ?>><img src="<?= $item->images->thumbnail->url ?>"></a><br>
		By <?php if ($item->user->website != ''): ?><a href="<?= $item->user->website ?>" target="_blank"><?= $item->user->full_name ?></a><?php else: echo $item->user->full_name; endif; ?> at <?= format_datetime('MONTH_DAY_YEAR', unix_to_mysql($item->created_time)) ?><br>
		View on <a href="<?= $item->link ?>" target="_blank">Instagram</a> or <a href="<?= $item->images->standard_resolution->url ?>" target="_blank">Full Size</a>
	</p>
	
	<span class="line_seperator"></span>

<?php endforeach; ?>

<link type="text/css" href="<?= base_url() ?>css/fancybox.css" rel="stylesheet" media="screen" />
<script type="text/javascript" src="<?= base_url() ?>js/jquery.fancybox.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$(".view_image").fancybox({
		'titleShow': true,
		'title': $(this).attr('title'),
	});
});
</script>