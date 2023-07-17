<?php

use App\Models\Slider;

$argc_slider = [
    ['status', '=', 1],
    ['position', '=', 'slidershow']
];
$list_slider = Slider::where($argc_slider)->get();
?>
<div class="section-slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <?php $index = 1; ?>
            <?php foreach ($list_slider as $slider) : ?>
                <?php if ($index == 1) : ?>
                    <div class="carousel-item active">
                        <img height="600px" width="310px" src="public/images/slider/<?= $slider->image; ?>" class="d-block w-100" alt="<?= $slider->image; ?>">
                    </div>
                <?php else : ?>
                    <div class="carousel-item">
                        <img height="600px" width="310px" src="public/images/slider/<?= $slider->image; ?>" class="d-block w-100" alt="<?= $slider->image; ?>">
                    </div>
                <?php endif; ?>
                <?php $index++; ?>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>