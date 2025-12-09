<?php
function genTileBrowser($tileBrowserData, $tileBrowserTitle)

{
?>
    <div class="tile_browser">
        <div class="tile_browser-head">
            <div class="tile_browser-head-header">
                <h2 class="tile_browser-head-header-title"><?= $tileBrowserTitle ?></h2>
                <hr class="tile_browser-head-header-hr">
            </div>
            <div class="tile_browser-head-nav">
                <button class="tile_browser-head-nav-left_button" onclick="moveTileBrowserRight()"><img src="./res/icon/ball_button.svg" alt="" class="tile_browser-head-nav-left_button-ball"></button>
                <button class="tile_browser-head-right_button" onclick="moveTileBrowserLeft()"><img src="./res/icon/ball_button.svg" class="tile_browser-head-right_button-ball" alt=""></button>
            </div>
        </div>
        <ul class="tile_browser-list">
            <?php
            foreach ($tileBrowserData as $tile) {
                genTile($tile);
            }
            ?>
        </ul>
    </div>
    <script src='./js/components/tile_browser.js'></script>
<?php
}
