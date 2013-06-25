<div id="contain" style="width: 80%; margin-left:auto; margin-right:auto;">
	<img style="text-align: center;margin-bottom:50px ;" src="<?=ASSETS_URL?>images/kaanepilt.png" alt="profile
	pic">
	<img style="position:absolute;top: 23% ;right: 85%;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
	<h1>Kaia Konsap</h1>

	<div id="my_post">
		<textarea id="post" title="Millest mõtled?" name="post" placeholder="Millest mõtled?"   style="font-size:11px;height:
		48px;
		"></textarea>
		<button  onclick="publish()" id="add" >Postita</button>
	</div>
	<div id="posts"></div>


	<div id="old_posts">

		<?if(isset($posts[0]['text'])): foreach($posts as $post):?>
			<div style="padding: 10px; text-align:left;background-color:rgb(250, 251, 251); width: 33%" class="well" id="post<?=$post['post_id']?>">
				<img style="float: left; margin-right: 20px;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
				<i class="icon-pencil" style="cursor:pointer;float: right;opacity:0.1;filter:alpha(opacity=10);"
				   onclick="delete_post(<?=$post['post_id']?>)"></i>
				<p> <?=$post['text']?></p>
				<p id="like_post" style="float: right"><?if(isset($post['likes'])&&$post['likes']!="0"){echo $post['likes'];}
					else {echo
				0;}?></p>

				<img style="float: right; margin-right: 10px;" src="<?=ASSETS_URL?>images/like.png" alt="like pic">
				<p id="like_unlike" style="float:left;padding-right:5px;cursor:pointer;color:#3b5998;" <?if(isset
				($post['user_liked'])&&
					$post['user_liked']=='0')
				:?>onclick="likes_post
					(<?=$post['post_id']?>,
				<?=$post['likes']?>)" >meeldib! <?else:?> onclick="delete_post_like(<?=$post['post_id']?>,
						<?=$post['likes']?>)" >Eemalda meeldimine!<?endif;
					?></p>
				<p style="cursor:pointer;color:#3b5998;" onclick="commentbox(<?=$post['post_id']?>)" >kommenteeri!</p>


				<? if(isset($post[0]['comment'])):foreach($post[0]['comment'] as	$comment):?>

					<div style="padding: 10px;margin-top: 0px;background-color: lavenderblush; text-align:left;"class="well" id="old_com<?=$comment['comment_id']?>">
						<i class="icon-remove-circle "
						   style="float: right;opacity:0.4;filter:alpha(opacity=40);cursor:pointer" onclick="delete_com(<?=$comment['comment_id']?>)"></i>
						<p> <?=$comment['text']?></p>
						<p id="like_com" style="float: right"><?if(isset($comment['likes'])&&$comment['likes']!="0"){echo
							$comment['likes'];}
							else {echo
							0;}?></p>
						<img style="float: right; margin-right: 10px;" src="<?=ASSETS_URL?>images/like.png" alt="like pic">

						<p style="cursor:pointer;color:#3b5998;" <?if(isset($comment['user_liked'])&& $comment['user_liked']=='0'):?> onclick="likes_com
							(<?=$comment['comment_id']?>,
						<?=$comment['likes']?>)">
						        meeldib! <? else:?> onclick="delete_com_like
								(<?=$comment['comment_id']?>,
								<?=$comment['likes']?>)"> Eemalda meeldimine!<?endif;?></p>
					</div>
				<?endforeach;endif?>

			<div id="new_com<?=$post['post_id']?>"></div>
				<?if(isset($post['likes'])&&$post['likes']>=1 ):?>
					<textarea id="comment<?=$post['post_id']?>" title="Kommenteeri" name="comment" placeholder="Kommenteeri"
					          style="height:48px;font-size:11px"></textarea>
					<button  onclick="publish_comment(<?=$post['post_id']?>)" id="add" >Postita</button>
				<?endif;?>
			</div>
		<?endforeach;endif?>

	</div>
</div>