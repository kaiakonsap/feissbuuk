<div id="contain" style="width: 80%; margin-left:auto; margin-right:auto;">
<img style="text-align: center;margin-bottom:100px ;" src="<?=ASSETS_URL?>images/kaanepilt.png" alt="profile pic">
<img style="z-index: 10000; position:relative;top: 25% ;right: 65%;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
<h1>Kaia Konsap</h1>

<div id="my_post">
<textarea id="post" title="Millest mõtled?" name="post" placeholder="Millest mõtled?"   style="height: 48px;"></textarea>
<button  onclick="publish()" id="add" >Postita</button>
</div>
<div id="posts"><ul style="width: 20%"></ul></div>

	<div id="old_posts">

			<?if(isset($posts[0]['text'])): foreach($posts as $post):?>
					<div style="padding: 10px; text-align:left;background-color:powderblue; width: 33%" class="well">
						<img style="float: left; margin-right: 20px;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
						<p> <?=$post['text']?></p>
						<button   >meeldib!</button>
						<button  >kommenteeri!</button>
						<img style="float: right; margin-right: 10px;" src="<?=ASSETS_URL?>images/like.png" alt="like pic">

					</div>
					<? if(isset($post[0]['comment'])):foreach($post[0]['comment'] as	$comment):?>
							<div style="padding: 10px;margin-top: 0px;background-color: lightcoral; text-align:left; width: 33%
							"class="well">
									<p> <?=$comment['text']?></p>
							</div>
					<?endforeach;endif?>

						<div id="comments"><ul style="width: 20%"></ul></div>
							<div id="my_comment">
								<textarea id="comment" title="Kommenteeri" name="comment" placeholder="Kommenteeri"   style="height:
					48px;"></textarea>
							<button  onclick="publish_comment(<?=$post['post_id']?>)" id="add" >Postita</button>
						</div>
			<?endforeach;endif?>

	</div>
</div>