
<?php
function genHero(){
    $slideShowData= array(
        array('header'=>'Najlepsze rakiety!',
        'details'=>'loremdfdsfgggggggggsd',
        'img'=>'../res/img/rakiety.jpg'),
        array('header'=>'Najlepsz odzież!',
        'details'=>'loremddsfsdfdsfdsfggggggsd',
        'img'=>'../res/img/odziez.jpg'),
        array('header'=>'Najlepsze buty!',
        'details'=>'lorembyty buty dsfdsfdsfdsfgdsfggsd',
        'img'=>'../res/img/buty.jpg'),
        array('header'=>'Najlepsze piłki!',
        'details'=>'lorempilki lorempilki lorempilki lorempilki lorempilki lorempilki',
        'img'=>'../res/img/pilki.jpg'),
        array('header'=>'Najlepsze akcesoria',
        'details'=>'loremdfdsfgggggggggsd akcesoria akcesoria akcesoria akcesoria akcesoria akcesoria',
        'img'=>'../res/img/akcesoria.jpg'),

    )
    ?>
  <section class="hero">


  <?php genSlideShow($slideShowData) 
  
  
  ?>
</section>



    <?php
}