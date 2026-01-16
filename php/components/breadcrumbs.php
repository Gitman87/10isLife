<?php



function genBreadcrumbs($separator = " <li class='breadcrumbs-breadcrumbs_list-separator'> &#62</li> ", $home = 'Strona główna')
{
    $path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));

    $base = ($_SERVER['HTTPS'] ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
    $breadcrumbs = [];
    $breadcrumbs[] = "<ul class='breadcrumbs-breadcrumbs_list'><li class='breadcrumbs-breadcrumbs_list-crumb'><a href=\"$base\" class='breadcrumbs-breadcrumbs_list-crumb-link'>$home</a></li>";

    $last = end(array_keys($path));

    foreach ($path as $x => $crumb) {
        $title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));

        if ($x != $last) {
            $breadcrumbs[] = "<li class='breadcrumbs-breadcrumbs_list-crumb'><a href=\"$base$crumb\" class='breadcrumbs-breadcrumbs_list-crumb-link'>$title</a></li>";
        } else {
            $breadcrumbs[] = "<li class='breadcrumbs-breadcrumbs_list-last_crumb'>$title</li>";
            $breadcrumbs[] = "</ul>";
        }
    };
    $breadcrumbsList = implode($separator, $breadcrumbs);
    $breadcrumbsWrapper = "<div class='breadcrumbs hidden_crumb'>$breadcrumbsList</div>";
    return $breadcrumbsWrapper;
    //     Credit goes to Dominic Barnes – http://stackoverflow.com/users/188702/dominic-barnes
    // http://stackoverflow.com/questions/2594211/php-simple-dynamic-breadcrumb
}
