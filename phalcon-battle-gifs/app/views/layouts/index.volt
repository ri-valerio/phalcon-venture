    <!-- Desktop Slider -->

    <div class="row">
      <div class="large-12 columns">
        <div class="row">

          <!-- Content -->

          <div class="large-8 columns">
            <div class="panel radius">
              <?php echo " | "; ?>
              <?php foreach ($tags as $tag): ?>
                  <?php echo $this->tag->linkTo("tag/". $tag->name, $tag->name)." "; ?>
                  <?php foreach ($num_tags as $num_tag): ?>
                    <?php if ($num_tag->id_tag == $tag->id_tag): ?>
                      <?php echo "(". $num_tag->rowcount .")"; ?>
                    <?php else: ?>
                      <?php echo "(0)"; ?>
                    <?php endif ?>
                  <?php endforeach ?>
                  <?php echo " | "; ?>
              <?php endforeach ?>
            </div>
          </div>

          <div class="large-4 columns hide-for-small">

          {{ link_to('create', 'Create a Battle!', 'class': 'large button expand success') }}

        </div>

        <!-- End Content -->

      </div>
    </div>
  </div>

  {{ content() }}
