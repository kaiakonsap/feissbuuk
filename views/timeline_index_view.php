<div id="contain" style="width: 80%; margin-left:auto; margin-right:auto;">
	<img style="text-align: center;margin-bottom:100px ;" src="<?=ASSETS_URL?>images/kaanepilt.png" alt="profile pic">
	<img style="z-index: 10000; position:relative;top: 25% ;right: 65%;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
	<h1>Kaia Konsap</h1>

	<div id="my_post">
		<textarea id="post" title="Millest mõtled?" name="post" placeholder="Millest mõtled?"   style="height: 48px;"></textarea>
		<button  onclick="publish()" id="add" >Postita</button>
	</div>
	<div id="posts"></div>


	<div id="old_posts">

		<?if(isset($posts[0]['text'])): foreach($posts as $post):?>
			<div style="padding: 10px; text-align:left;background-color:powderblue; width: 33%" class="well" id="post<?=$post['post_id']?>">
				<img style="float: left; margin-right: 20px;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
				<i class="icon-pencil" style="float: right" onclick="delete_post(<?=$post['post_id']?>)"></i>
				<p> <?=$post['text']?></p>
				<p id="like_post" style="float: right"><?if(isset($post['likes'])&&$post['likes']!="0"){echo $post['likes'];}
					else {echo
				0;}?></p>
				<img style="float: right; margin-right: 10px;" src="<?=ASSETS_URL?>images/like.png" alt="like pic">
				<button  onclick="likes_post(<?=$post['post_id']?>,<?=$post['likes']?>)" >meeldib!</button>
				<button  >kommenteeri!</button>


				<? if(isset($post[0]['comment'])):foreach($post[0]['comment'] as	$comment):?>

					<div style="padding: 10px;margin-top: 0px;background-color: lavenderblush; text-align:left;"class="well" id="old_com<?=$comment['comment_id']?>">
						<i class="icon-remove-circle" style="float: right" onclick="delete_com(<?=$comment['comment_id']?>)"></i>
						<p> <?=$comment['text']?></p>
						<p id="like_com" style="float: right"><?if(isset($comment['likes'])&&$comment['likes']!="0"){echo
							$comment['likes'];}
							else {echo
							0;}?></p>
						<img style="float: right; margin-right: 10px;" src="<?=ASSETS_URL?>images/like.png" alt="like pic">

						<button  onclick="likes_com(<?=$comment['comment_id']?>,<?=$comment['likes']?>)" >meeldib!</button>
					</div>
				<?endforeach;endif?>

			<div id="new_com<?=$post['post_id']?>"></div>
					<textarea id="comment<?=$post['post_id']?>" title="Kommenteeri" name="comment" placeholder="Kommenteeri"   style="height:
					48px;"></textarea>
					<button  onclick="publish_comment(<?=$post['post_id']?>)" id="add" >Postita</button>
			</div>
		<?endforeach;endif?>

	</div>
</div>