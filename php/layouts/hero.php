<?php
function genHero()
{
    $slideShowData = array(
        array(
            'header' => 'Najlepsze rakiety!',
            'details' => 'Unikatowe modele renomowanych producentów',
            'img' => '../res/img/rakiety.jpg'
        ),
        array(
            'header' => 'Najlepsza odzież!',
            'details' => 'Stylowe i funkcjonalne ciuchy.',
            'img' => '../res/img/odziez.jpg'
        ),
        array(
            'header' => 'Najlepsze buty!',
            'details' => 'Na każdy rodzaj nawierzchni.',
            'img' => '../res/img/buty.jpg'
        ),
        array(
            'header' => 'Najlepsze piłki!',
            'details' => 'Żeby było co podkręcać.',
            'img' => '../res/img/pilki.jpg'
        ),
        array(
            'header' => 'Najlepsze akcesoria',
            'details' => 'Zbyś mógł skupić się tylko  na grze',
            'img' => '../res/img/akcesoria.jpg'
        ),

    )
?>
    <section class="hero">


        <?php genSlideShow($slideShowData)


        ?>
    </section>



<?php
}
