<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo e(asset('images/book1.jpg')); ?>" style='width:100%;height:500px'>
      <div class="carousel-caption" style='margin-bottom:120px'>
        <h1 style='font-size:85px'>Season Sale!</h1>
        <p class='slider-cap'>SAVE <span style='background-color: #3490dc' class='pl-2 pr-2'>30%</span> ON ALL BOOKS</p>
        <button type='button' class='shop-now'>SHOP NOW!</button>
    </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo e(asset('images/book2.jpg')); ?>" style='width:100%;height:500px'>
      <div class="carousel-caption" style='margin-bottom:120px'>
        <h1 style='font-size:85px'>A wide range of books</h1>
        <p class='slider-cap'>TO MEET ANY TASTE AND BUDGET</p>
        <button type='button' class='shop-now'>SHOP NOW!</button>
    </div>
    </div>
    <div class="carousel-item">
      <img src="<?php echo e(asset('images/book3.jpg')); ?>" style='width:100%;height:500px'>
      <div class="carousel-caption" style='margin-bottom:120px'>
        <h1 style='font-size:85px'>Find the book you need!</h1>
        <button type='button' class='shop-now'>SHOP NOW!</button>
    </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div><?php /**PATH C:\xampp\htdocs\Ebookstore_Laravel\resources\views/layouts/partials/slider.blade.php ENDPATH**/ ?>