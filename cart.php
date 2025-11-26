<?php
include './php/layouts/head.php';

include './php/layouts/header.php';
include './php/layouts/footer.php';

include './php/components/header_link.php';
include './php/components/log_modal.php';
include './php/components/tab_nav.php';

include './php/components/standard_button.php';
require './php/components/light_button.php';
include './php/components/wide_button.php';
include './php/components/ugly_button.php';
include './php/components/show.php';
//logging /registration
require './php/layouts/register.php';
require './php/components/input.php';
require './php/components/password_input.php';
require './php/components/logging.php';
require './php/components/reg_policy.php';
require './php/components/profile.php';
// api
require './php/api/connection.php';
require './php/api/get_product_data.php';

session_start();

?>
<?php genHeader() ?>

<main class="main">







</main>























<?php genFooter() ?>