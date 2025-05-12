<?php
class Utils
{
    function currencyFormat($num)
    {
        return number_format($num, "2", ",", ".");
    }
}
$utils = new Utils;
