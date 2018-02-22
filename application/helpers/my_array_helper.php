<?php
// if (!defined('BASEPATH')) {
//     header('Location:../../index.php');
// }

/*
 * Imprime devidamente formatado um array a partir da função "print_r" nativa do PHP.
 *
 * @param array $array o array a ser formatado e exibido na tela
 */
if (!function_exists('print_array')) {
    function print_array($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>';
    }
}

if (!function_exists('array_associativo_por_indice')) {
    function array_associativo_por_indice($array, $indice, $valor){
        $assoc_arr = array_reduce($array, function ($result, $item) use ($indice, $valor) {
            $result[$item[$indice]] = $item[$valor];

            return $result;
        }, array());
        return $assoc_arr;
    }
}