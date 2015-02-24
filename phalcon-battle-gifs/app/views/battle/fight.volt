<div>
  <h6><?php echo $battle->name; ?> | <?php echo date_format(new DateTime($battle->created_at), "Y-m-d"); ?></h6>
    <ul id="lightGallery<?php echo $battle->id_battle; ?>" class="gallery">
        <li data-src="../img/<?php echo $battle->image_one; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle->image_one .".png"); ?>
            </a>
        </li>
            <?php echo $battle->vote->image_one; ?>
        <li data-src="../img/<?php echo $battle->image_two; ?>.gif">
            <a href="#">
            <?php echo $this->tag->image("img/". $battle->image_two .".png"); ?>
            </a>
        </li>
            <?php echo $battle->vote->image_two; ?>
        <li data-src="../img/<?php echo $battle->image_three; ?>.gif">
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

<script>

  $(document).ready(function() {
    $('.gallery img')
      .mouseover(function() { this.src = this.src.replace(".png", ".gif"); })
      .mouseout(function() { this.src = this.src.replace(".gif", ".png"); })
  });

</script>
