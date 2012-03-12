<?php foreach ($feed->data as $item): ?>

	<p id="picture_<?= $item->id ?>">
		<a href="<?= $item->images->standard_resolution->url ?>" class="view_image" <?php if (isset($item->caption->text)): echo 'title="'.$item->caption->text.'"'; endif; ?>><img src="<?= $item->images->thumbnail->url ?>"></a><br>
		By <?php if ($item->user->website != ''): ?><a href="<?= $item->user->website ?>" target="_blank"><?= $item->user->full_name ?></a><?php else: echo $item->user->full_name; endif; ?> View on <a href="<?= $item->link ?>" target="_blank">Instagram</a> or <a href="<?= $item->images->standard_resolution->url ?>" target="_blank">Full Size</a><br> 
		<?php if (isset($item->location)):
		if (isset($item->location->name)) $location_name = $item->location->name;
		else $location_name = '';
		echo $location_name.' '.$item->location->latitude.', '.$item->location->longitude.'<br>'; 
		endif; ?>
		<span class="item_meta"><?= format_datetime('MONTH_DAY_YEAR', unix_to_mysql($item->created_time)) ?></span><br>

		<?php if ($item->likes->count): ?>
		<span id="likes_<?= $item->id ?>">
			<strong>Likes</strong><br>
			<?php foreach ($item->likes->data as $like): ?>
				<img src="<?= $like->profile_picture ?>" width="24">
				<a href="<?= $like->username ?>"><?= $like->full_name ?></a><br>
			<?php endforeach; ?>
		</span>
		<?php endif; ?>

		<?php if ($item->comments->count): ?>
		<span id="comments_<?= $item->id ?>">
			<strong>Comments</strong><br>
			<?php foreach ($item->comments->data as $comment): ?>
				<img src="<?= $comment->from->profile_picture ?>" width="24">
				<a href="<?= $comment->from->username ?>"><?= $comment->from->full_name ?></a>: <?= $comment->text ?><br> <span class="item_meta"><?= format_datetime('ELAPSED', unix_to_mysql($comment->created_time)) ?></span><br>
			<?php endforeach; ?>
		</span>
		<?php endif; ?>
	</p>

	<hr>	

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
	
	$('.get_comments').bind('click', function(e)
	{
		e.preventDefault();
		var image_id = $(this).attr('rel');
	
		$.oauthAjax(
		{
			oauth 		: user_data,	
			url			: base_url + 'api/instagram/media_comments/id/' + image_id,
			type		: 'GET',
			dataType	: 'json',
		  	success		: function(result)
		  	{						
		  		if (result.status == 'success')
		  		{
		  			  	
					console.log(result);									
		  		}
		  		else
		  		{
		  			$('#comments_' + image_id).html(result.message);
		  		}
		  	}		
		});				
	});
	
});
</script>