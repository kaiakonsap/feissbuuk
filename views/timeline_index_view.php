<div id="contain" style="width: 80%; margin-left:auto; margin-right:auto;">
<img style="text-align: center;margin-bottom:100px ;" src="<?=ASSETS_URL?>images/kaanepilt.png" alt="profile pic">
<img style="z-index: 10000; position:relative;top: 25% ;left: 15%;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
<h1>Kaia Konsap</h1>

<div id="my_post">
<textarea id="post" title="Millest mõtled?" name="post" placeholder="Millest mõtled?"   style="height: 48px;"></textarea>
<button  onclick="publish()" id="add" >Postita</button>
</div>
<div id="posts"><ul style="width: 20%"></ul></div>

	<div id="old_posts">

			<?if(isset($posts[0]['text'])): foreach($posts as $post):?>
					<div style="list-style-type: none;padding: 0; text-align:left;" class="well">
						<p> <?=$post['text']?></p>

					</div>
					<? if(isset($post[0]['comment'])):foreach($post[0]['comment'] as	$comment):?>
							<div style="list-style-type:none;padding: 0;margin-top: 20px;background-color: red; text-align:left;
							"class="well">
									<p> <?=$comment['text']?></p>
							</div>
					<?endforeach;endif?>

						<div id="comments"><ul style="width: 20%"></ul></div>
						<div id="my_comment">
							<textarea id="comment" title="Kommenteeri" name="comment" placeholder="Kommenteeri"   style="height:
					48px;"></textarea>
							<button  onclick="publish_comment(<?$post['post_id']?>)" id="add" >Postita</button>
						</div>
			<?endforeach;endif?>

	</div>
</div>