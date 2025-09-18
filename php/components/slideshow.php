
<?php
function genSlideShow($slideShowData){
    
    ?>
    <div class="slideshow">
        
        
        
        <ul class="slideshow-list">
            
            <?php 
                   foreach($slideShowData as $slide){
                       genSlide($slide);
                    }
                    
                    ?>






</ul>


<div class="slideshow-nav">
    <button class="slideshow-nav-left_button" onclick="moveSlideShowRight()"><img src="./res/icon/ball_button.svg" alt="" class="slideshow-nav-left_button-ball"></button>
    <button class="slideshow-nav-right_button" onclick="moveSlideShowLeft()"><img src="./res/icon/ball_button.svg" class="slideshow-nav-right_button-ball" alt=""></button>
</div>

</div>

<script src='./js/components/slideshow.js'></script>

    <?php
}
