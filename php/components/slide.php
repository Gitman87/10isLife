<?php
function genSlide($slide){
    ?>
       <li class="slideshow-list-slide inactive_slide">
                <img src="<?php echo $slide['img'] ?>" class="slideshow-list-slide-img" alt="">
                <div class="slideshow-list-slide-details">
                    <h3><?php echo $slide['header'] ?></h3>
                    <p><?php echo $slide['details'] ?></p>
                    <?php 
                    genStandardButton('Sprawdź','./123', 'test()');

                    ?>
                </div>
            </li>
           <?php
        }