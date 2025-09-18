
<?php
function genDiscounts(){
    $tileBrowserData = array(
        array('productType'=>'racket',
        'productName'=>'racket_babolat_01',
        'newPrice'=>'139.30',
        'oldPrice'=>'199.00',
        'discount%'=> '30%',
        'starsNumber'=>'4.5',
        'opinionNumber'=> '2',
        'img'=>'../res/img/products/rackets/babolat_01/babolat_01_01.jpg'),
        array('productType'=>'racket',
        'productName'=>'racket_head_01',
        'newPrice'=>'126,65',
        'oldPrice'=>'149.00',
        'discount%'=> '15%',
        'starsNumber'=>'4.0',
        'opinionNumber'=> '3',
        'img'=>'../res/img/products/rackets/head_01/head_01.jpg'),
        array('productType'=>'ball',
        'productName'=>'ball_dunlop_01',
        'newPrice'=>'35.10',
        'oldPrice'=>'39.00',
        'discount%'=> '10%',
        'starsNumber'=>'3.9',
        'opinionNumber'=> '11',
        'img'=>'../res/img/products/balls/dunlop_01/dunlop_01_01.jpg'),
        array('productType'=>'shoes',
        'productName'=>'shoes_ascics_01',
        'newPrice'=>'230.00',
        'oldPrice'=>'512.00',
        'discount%'=> '45%',
        'starsNumber'=>'4.6',
        'opinionNumber'=> '13',
        'img'=>'../res/img/products/shoes/ascics_01/asics_01_01.jpg'),
        array('productType'=>'clothes',
        'productName'=>'t_shirt_head_01',
        'newPrice'=>'49.50',
        'oldPrice'=>'99.00',
        'discount%'=> '50%',
        'starsNumber'=>'3.9',
        'opinionNumber'=> '9',
        'img'=>'../res/img/products/clothes/men/t_shirts/head/head_01_01.jpg'),
        array('productType'=>'accessory',
        'productName'=>'bag_head_01',
        'newPrice'=>'270.00',
        'oldPrice'=>'360.00',
        'discount%'=> '25%',
        'starsNumber'=>'4.1',
        'opinionNumber'=> '18',
        'img'=>'../res/img/products/accessories/bags/head_01/head_01_01.jpg')

    )
   
    
    ?>
  <section class="discounts">


  <?php genTileBrowser($tileBrowserData,'Obniżki cen') 
  
  
  ?>
</section>



    <?php
}