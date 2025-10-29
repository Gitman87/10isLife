<?php
function genHead($title)
{
?>

    <!DOCTYPE html>
    <html lang="pl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $title ?></title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="icon" type="image/x-icon" href="./res/icon/favicon.svg">
    </head>
<?php
}
