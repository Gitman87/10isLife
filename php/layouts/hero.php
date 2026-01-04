<?php
function genHero()
{
    $slideShowData = array(

        array(
            'header' => 'Najlepsza odzież!',
            'details' => 'Stylowe i funkcjonalne ciuchy.',
            'img' => '../res/img/odziez.jpg',
            'url' => './clothes.php'
        ),
        array(
            'header' => 'Najlepsze rakiety!',
            'details' => 'Unikatowe modele renomowanych producentów',
            'img' => '../res/img/rakiety.jpg',
            'url' => './rackets.php'

        ),
        array(
            'header' => 'Najlepsze buty!',
            'details' => 'Na każdy rodzaj nawierzchni.',
            'img' => '../res/img/buty.jpg',
            'url' => './shoes.php'

        ),
        array(
            'header' => 'Najlepsze piłki!',
            'details' => 'Żeby było co podkręcać.',
            'img' => '../res/img/pilki.jpg',
            'url' => './balls.php'

        ),
        array(
            'header' => 'Najlepsze akcesoria',
            'details' => 'Zbyś mógł skupić się tylko  na grze',
            'img' => '../res/img/akcesoria.jpg',
            'url' => './accessories.php'

        ),

    )
?>
    <section class="hero">


        <?php genSlideShow($slideShowData)


        ?>
    </section>



<?php
}
