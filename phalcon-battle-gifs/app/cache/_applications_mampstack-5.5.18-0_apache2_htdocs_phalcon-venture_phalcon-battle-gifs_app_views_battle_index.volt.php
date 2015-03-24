<div class="row">
	<div class="large-2 columns">
		<p></p>
	</div>
	<div class="large-8 text-center columns">

		<form action="battle/create" method="POST" accept-charset="utf-8" enctype="multipart/form-data">

			<label class="text-left" for="name">Battle's Name:</label>
			<input type="text" id="name" name="name" value="" placeholder="..name your battle as ugly as you can...">

			<label class="text-left" for="tags">Battle's Tag:</label>
			<select name="tag" id="tags">
				<?php foreach ($tags as $tag): ?>
					<option value="<?php echo $tag->id_tag; ?>"><?php echo $tag->name; ?></option>
				<?php endforeach ?>
			</select>

			<label class="text-left">upload just gifs</label>
			<input type="file" name="image_one" value="" accept="image/gif">
			<input type="file" name="image_two" value="" accept="image/gif">
			<input type="file" name="image_three" value="" accept="image/gif">


			<!-- read phalcon docs -->
			<input type="hidden" name="<?php echo $this->security->getTokenKey() ?>"
        value="<?php echo $this->security->getToken() ?>"/>

			<button type="submit">Submit Battle!</button>

		</form>

	</div>
	<div class="large-2 columns">
		<p></p>
	</div>
</div>
