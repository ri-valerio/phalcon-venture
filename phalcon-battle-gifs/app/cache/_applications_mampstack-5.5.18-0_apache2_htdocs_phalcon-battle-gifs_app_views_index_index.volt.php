
<?php foreach ($battles as $battle): ?>

<div>
  <h6><?php echo $this->tag->linkTo("fight/". $battle->id_battle ,$battle->name); ?> | <?php echo date_format(new DateTime($battle->created_at), "Y-m-d"); ?> | <?php foreach ($battles_has_tag as $battle_has_tag): ?>
      <?php if ($battle_has_tag->id_battle == $battle->id_battle ): ?>
        <?php echo $this->tag->linkTo("tag/". $battle_has_tag->tag->name, $battle_has_tag->tag->name . " "); ?>
      <?php endif ?>
  <?php endforeach ?></h6>
    <ul id="lightGallery<?php echo $battle->id_battle; ?>" class="gallery">
        <li data-src="img/<?php echo $battle->image_one; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle->image_one .".png"); ?>
            </a>
        </li>
            <?php echo $battle->vote->image_one; ?>
        <li data-src="img/<?php echo $battle->image_two; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle->image_two .".png"); ?>
            </a>
        </li>
            <?php echo $battle->vote->image_two; ?>
        <li data-src="img/<?php echo $battle->image_three; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle->image_three .".png"); ?>
            </a>
        </li>
            <?php echo $battle->vote->image_three; ?>
    </ul>
</div>

  <script>
      $(document).ready(function() {
          $("#lightGallery<?php echo $battle->id_battle; ?>").lightGallery();
      });
  </script>

<!-- END BATTLE -->
<hr>
<?php endforeach ?>


<script>

  $(document).ready(function() {
    $('.gallery img')
      .mouseover(function() { this.src = this.src.replace(".png", ".gif"); })
      .mouseout(function() { this.src = this.src.replace(".gif", ".png"); })
  });

</script>
