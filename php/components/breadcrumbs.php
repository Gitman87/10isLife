<?php



function genBreadcrumbs($separator = ' &raquo; ', $home = 'Stona główna')
{
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = [];
    $breadcrumbs[] = "<ul class='breadcrumbs_list'><li class='crumb'><a href=\"$base\">$home</a></li>";

    $last = end(array_keys($path));

    foreach ($path as $x => $crumb) {
        $title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));

        if ($x != $last) {
            $breadcrumbs[] = "<li class='crumb'><a href=\"$base$crumb\">$title</a></li>";
        } else {
            $breadcrumbs[] = "<li>$title</li>";
            $breadcrumbs[] = "</ul>";
        }
    };


    return implode($separator, $breadcrumbs);
    //     Credit goes to Dominic Barnes – http://stackoverflow.com/users/188702/dominic-barnes
    // http://stackoverflow.com/questions/2594211/php-simple-dynamic-breadcrumb
}
