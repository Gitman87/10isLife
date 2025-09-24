<?php 
function genRateBalls(){
    

    ?>
    <div class="rate">
        <ul class="rate-balls">
            <li class="rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img"></li>
            <li class="rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img"></li>
            <li class="rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img"></li>
            <li class="rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img"></li>
            <li class="rate-balls-ball"><img src="./res/icon/favicon.svg" alt="ball rating" class="rate-balls-ball-img"></li>
        </ul>
        <p class="rate-opinions">(<span class="rate-opinions-number"><?php echo $tile['opinionNumber'] ?>reviews.rating</span>)</p>
    </div>

<?php
}