<?php
function sanitizeInputValue($inputValue)
{
    $inputValue = trim($inputValue);
    $inputValue = stripslashes($inputValue);
    $inputValue = htmlspecialchars(($inputValue));
    return $inputValue;
}
