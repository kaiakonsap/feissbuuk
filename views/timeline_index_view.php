<div id="contain" style="width: 80%; margin-left:auto; margin-right:auto;">
<img style="text-align: center;margin-bottom:100px ;" src="<?=ASSETS_URL?>images/kaanepilt.png" alt="profile pic">
<img style="z-index: 10000; position: fixed;top: 25% ;left: 15%;" src="<?=ASSETS_URL?>images/q.jpg" alt="profile pic">
<h1>Kaia Konsap</h1>

<div id="my_post">
<textarea id="post" title="Millest mõtled?" name="post" placeholder="Millest mõtled?"   style="height: 48px;"></textarea>
<button  onclick="publish()" id="add" >Postita</button>
</div>
<div id="posts"></div>
	<div id="old_posts">
		<table>
			<?if(isset($posts[0]['text'])): foreach($posts as $post):?>
			<tr>
				<td class="well"> <?=$post['text']?></td>
			</tr>
			<?endforeach;endif?>
		</table>
	</div>
</div>