<?php

function genProdBrowser()
{
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 25;
    echo 'Limit is ' . $limit;
    $page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    echo 'Page is ' . $page;

    $start = (($page - 1) * $limit) + 1;
    $end   = $page * $limit;
    echo 'End is ' . $end;
    $limitOptions = [5, 10, 25, 50];

?>
    <div class="prod_browser">


        <div class="prod_browser-nav">
            <div class="prod_browser-nav-sorting">
                <label for="sort_by" class="prod_browser-nav-sorting">Sortuj</label>
                <select name="sort_by" id="sort_by" class="prod_browser-nav-sorting-sort_by">
                    <option value="name" class="prod_browser-nav-sorting-sort_by-option">Nazwa</option>
                    <option value="price_asc" class="prod_browser-nav-sorting-sort_by-option">Cena: rosnąco</option>
                    <option value="price_desc" class="prod_browser-nav-sorting-sort_by-option">Cena: malejąco</option>
                    <option value="brand" class="prod_browser-nav-sorting-sort_by-option">Marka</option>
                    <option value="bestsellers" class="prod_browser-nav-sorting-sort_by-option">Bestsellery</option>
                </select>
            </div>
            <div class="prod_browser-nav-display">
                <label for="display_number" class="prod_browser-nav-display">Wyświetl</label>
                <select name="display_number" id="display_number" class="prod_browser-nav-display-display_number">
                    <?php
                    foreach ($limitOptions as $option) {
                        $selected = ($option == $limit) ? 'selected' : '';
                        echo "<option value='{$option}' class='prod_browser-nav-display-display_number-option' {$selected}>{$option}</option>";
                    }
                    ?>

                </select>
            </div>
            <button class="prod_browser-nav-left_button" onclick="moveTileBrowserRight()"><img src="./res/icon/ball_button.svg" alt="" class="prod_browser-nav-left_button-ball"></button>
            <button class="prod_browser-right_button" onclick="moveTileBrowserLeft()"><img src="./res/icon/ball_button.svg" class="prod_browser-right_button-ball" alt=""></button>
        </div>
        <ul class="prod_browser-list">
            <?php {
                foreach (range($start, $end) as $id) {
                    genTile($id);
                }
            }
            ?>
        </ul>
    </div>
    <script src='./js/components/prod_browser.js'></script>
<?php
}
