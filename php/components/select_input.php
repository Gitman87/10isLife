<?php
function genSelectInput($id, $label, $contentArray)
{
?>
    <div class="select_wrapper">
        <label for="<?= $id ?>" class="select_wrapper-label"><?= $label ?></label>
        <select class="select_wrapper-select_input" id="<?= $id ?>">
            <?php
            foreach ($contentArray as $option) {
                $value = str_replace(" ", "_", strtolower($option));
                // echo  $value;
            ?>
                <option value="<?= $value ?>" class="select_wrapper-select_input-option"><?= $option ?></option>
            <?php
            }
            ?>
        </select>
    </div>
<?php
}
