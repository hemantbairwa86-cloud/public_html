<section class="category-section section-space-ptb-90" style="background-color:#f3fffa">
  <div class="container">
    <div class="category-three-slider-active">
      <?php foreach ($CollectionDetails as $ckey => $cvalue) { ?>
      <div class="col">
        <div class="single-category text-center">
          <div class="category-image"> <a href="<?php echo  base_url(); ?>products/<?php echo $cvalue['slug'];?>"><img src="<?php echo  base_url(); ?>uploads/collections/<?php echo $cvalue['image'];?>" alt="<?php echo ucwords($cvalue['name']);?>"></a> </div>
          <div class="category-content">
            <p><?php echo ucwords($cvalue['name']);?></p>
          </div>
        </div>
      </div>
      <?php } ?>
      
      
      
    </div>
  </div>
</section>
