<?php foreach ($battles_with_tag as $battle_tag): ?>
<div>
  <h6><?php echo $this->tag->linkTo("fight/".$battle_tag->battle->id_battle ,$battle_tag->battle->name); ?> | <?php echo date_format(new DateTime($battle_tag->battle->created_at), "Y-m-d"); ?></h6>
    <ul id="lightGallery<?php echo $battle_tag->battle->id_battle; ?>" class="gallery">
        <li data-src="../img/<?php echo $battle_tag->battle->image_one; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle_tag->battle->image_one .".png"); ?>
            </a>
        </li>
            <?php echo $battle_tag->battle->vote->image_one; ?>
        <li data-src="../img/<?php echo $battle_tag->battle->image_two; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle_tag->battle->image_two .".png"); ?>
            </a>
        </li>
            <?php echo $battle_tag->battle->vote->image_two; ?>
        <li data-src="../img/<?php echo $battle_tag->battle->image_three; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle_tag->battle->image_three .".png"); ?>
            </a>
        </li>
            <?php echo $battle_tag->battle->vote->image_three; ?>
    </ul>
</div>

  <script>
      $(document).ready(function() {
          $("#lightGallery<?php echo $battle_tag->battle->id_battle; ?>").lightGallery();
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
