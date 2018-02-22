<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
// -----------------------------------------------------------------------------------------------------------------------------
/**
 * Este helper contém funções cujo principal objetivo é a MANIPULAÇÃO DE DATAS DO SISTEMA, tais como
 * dias, meses e anos.
 * @author Maycon Brito
 * @version 10/03/2014
 * @wikisibe http://192.168.101.2/wiki/index.php/Fwsibe_-_Helpers
 */
// -----------------------------------------------------------------------------------------------------------------------------
/**
 * Conversão de datas, banco de dados e para mostrar"
 *
 *
 * @access	public
 * @param	integer Unix timestamp
 * @param	bool	whether to show seconds
 * @param	string	format: us or euro
 * @return	string
 */
if (!function_exists('databd')) {

    function databd($data, $mostrahora = null) {

        //O parâmetro é um objeto DateTime?
        if ($data instanceof DateTime) {

            //Istancía uma string contendo a data formatada de acordo com o padrão do BD
            $data = $data->format('Y-m-d ' . ($mostrahora ? 'H:i:s' : ''));

            //Caso a data esteja num formato default para 
            if ($data === '-0001-11-30') {
                return null;
            }

            return $data;

            //O parâmetro $data não é um DateTime.
        } else {

            $entrada = trim($data);
            $entrada = explode(" ", $entrada);
            $data = $entrada[0];
            if (count($entrada) > 1) {
                $hora = $entrada[1];
            } else {
                $hora = '';
            }

            if (strstr($data, "/")) {
                $aux2 = explode("/", $data);
                $datai2 = $aux2[2] . "-" . $aux2[1] . "-" . $aux2[0];
                if ($hora != '') {
                    return $datai2 . " " . $hora;
                } else {
                    return $datai2;
                }
            }
            return $data;
        }
    }

}

if (!function_exists('databr')) {

    function databr($data, $mostrarhora = 0) {

        //O parâmetro é um objeto DateTime?
        if ($data instanceof DateTime) {

            //Istancía uma string contendo a data formatada de acordo com o padrão do BD
            $data = $data->format('d/m/Y ' . ($mostrarhora ? 'H:i:s' : ''));

            //Caso a data esteja num formato default para 
            if (strpos($data, '30/11/-0001') === 0) {
                return null;
            }

            return $data;

            //O parâmetro $data não é um DateTime.
        } else {

            $entrada = trim($data);
            $entrada = explode(" ", $entrada);
            $data = $entrada[0];
            if (count($entrada) > 1)
                $hora = $entrada[1];
            else
                $hora = '';

            if (strstr($data, "-")) {
                $aux2 = explode("-", $data);
                $datai2 = $aux2[2] . "/" . $aux2[1] . "/" . $aux2[0];
                if ($hora != '' && $mostrarhora == 1)
                    return $datai2 . " " . $hora;
                else
                    return $datai2;
            }
        }
    }

}

if (!function_exists('dataprotheus')) {

    function dataprotheus($data) {
        $entrada = trim($data);
        $entrada = explode(" ", $entrada);
        $data = $entrada[0];
        if (count($entrada) > 1)
            $hora = $entrada[1];
        else
            $hora = '';

        if (strstr($data, "/")) {
            $aux2 = explode("/", $data);
            $datai2 = $aux2[2] . $aux2[1] . $aux2[0];
            if ($hora != '')
                return $datai2 . " " . $hora;
            else
                return $datai2;
        }
    }

}

if (!function_exists('databrProtheus')) {

    function databrProtheus($data) {
        return substr($data, -2) . "/" . substr($data, -4, 2) . "/" . substr($data, 0, 4);
    }

}

if (!function_exists('retornadata')) {

    function retornadata($data, $formato) {
        $vdata = explode('-', $data);
        if ($formato == 'd')
            return $vdata[2];
        else if ($formato == 'm')
            return $vdata[1];
        else
            return $vdata[0];
    }

}

if (!function_exists('mesbr')) {

    function mesbr($mes) {
        $meses = array(1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro');
        return $meses[$mes];
    }

}

if (!function_exists('diferenca_data')) {

    function diferenca_data($date01, $date02, $formato) {
        //Formato
        //d - dias
        //m - meses
        //a - anos
        $date01 = explode('-', $date01);
        $date01 = $date01[0] . $date01[1] . $date01[2];
        $date02 = explode('-', $date02);
        $date02 = $date02[0] . $date02[1] . $date02[2];

        $thisyear01 = substr($date01, 0, 4);
        $thismonth01 = substr($date01, 4, 2);
        $thisday01 = substr($date01, 6, 2);

        $thisyear02 = substr($date02, 0, 4);
        $thismonth02 = substr($date02, 4, 2);
        $thisday02 = substr($date02, 6, 2);

        $date01 = mktime(0, 0, 0, $thismonth01, $thisday01, $thisyear01);
        $date02 = mktime(0, 0, 0, $thismonth02, $thisday02, $thisyear02);


        $aux = $date02 - $date01;
        $aux = $aux / 60 / 60 / 24;
        if ($formato == 'd') {
            return $aux;
        }
        if ($formato == 'm') {
            $aux = $aux / 30;
            return round($aux, 0);
        }
        if ($formato == 'a') {
            $aux = $aux / 30 / 12;
            return round($aux, 0);
        }
    }

}

if (!function_exists('meses')) {

    function meses() {
        $meses = array(
            '1' => array('nome' => 'Janeiro', 'valor' => '1'),
            '2' => array('nome' => 'Fevereiro', 'valor' => '2'),
            '3' => array('nome' => 'Março', 'valor' => '3'),
            '4' => array('nome' => 'Abril', 'valor' => '4'),
            '5' => array('nome' => 'Maio', 'valor' => '5'),
            '6' => array('nome' => 'Junho', 'valor' => '6'),
            '7' => array('nome' => 'Julho', 'valor' => '7'),
            '8' => array('nome' => 'Agosto', 'valor' => '8'),
            '9' => array('nome' => 'Setembro', 'valor' => '9'),
            '10' => array('nome' => 'Outubro', 'valor' => '10'),
            '11' => array('nome' => 'Novembro', 'valor' => '11'),
            '12' => array('nome' => 'Dezembro', 'valor' => '12'),
            );
        return $meses;
    }

}

if (!function_exists('meses_aux')) {

    function meses_aux($ano) {
        $meses = array(
            '1' => array('nome' => 'Janeiro', 'valor' => '1'),
            '2' => array('nome' => 'Fevereiro', 'valor' => '2'),
            '3' => array('nome' => 'Março', 'valor' => '3'),
            '4' => array('nome' => 'Abril', 'valor' => '4'),
            '5' => array('nome' => 'Maio', 'valor' => '5'),
            '6' => array('nome' => 'Junho', 'valor' => '6'),
            '7' => array('nome' => 'Julho', 'valor' => '7'),
            '8' => array('nome' => 'Agosto', 'valor' => '8'),
            '9' => array('nome' => 'Setembro', 'valor' => '9'),
            '10' => array('nome' => 'Outubro', 'valor' => '10'),
            '11' => array('nome' => 'Novembro', 'valor' => '11'),
            '12' => array('nome' => 'Dezembro', 'valor' => '12'),
            );

        $meses_aux = array();
        if ($ano == date('Y'))
            $mesfinal = date('n');
        else
            $mesfinal = 12;

        for ($i = 1; $i <= ($mesfinal); $i++) {
            $meses_aux[$i] = array('nome' => $meses[$i]['nome'], 'valor' => $meses[$i]['valor']);
        }

        return $meses_aux;
    }

}

if (!function_exists('anos')) {

    function anos($anoinicial, $anofinal, $arsort = true) {
        for ($i = $anoinicial; $i <= ($anofinal); $i++) {
            $anos[$i] = $i;
        }

        if ($arsort)
            arsort($anos);

        return $anos;
    }

}

if (!function_exists('anos_aux')) {

    function anos_aux($anoinicial, $anofinal) {
        for ($i = $anoinicial; $i <= ($anofinal); $i++) {
            $anos[$i] = array('nome' => $i, 'valor' => $i);
        }
        return $anos;
    }

}

/**
 * Constrói um array contende de forma ordenada os anos precedentes e procedentes
 * ao ano atual
 * 
 * @author Maycon Brito
 * @param int $anosPre anos precedentes ao ano atual
 * @param int $anosPro anos procedentes ao ano atual
 * @return array $anos array contendo de forma ordenada todos os anos solicitados 
 */
if (!function_exists("arrayAnos")) {

    function arrayAnos($anosPre = '10', $anosPro = '20') {

        $anos = array();

        //Captura o ano atual
        $anoAtual = (int) date("Y");

        //Monta o array contendo os anos solicitados
        for ($i = ($anoAtual - $anosPre); $i <= ($anoAtual + $anosPro); $i++) {
            $anos[$i] = $i;
        }

        //Retorna o array
        return $anos;
    }

}

/**
 * Constrói um array com o nome de cada mês do ano em português
 * 
 * @author Maycon Brito
 * @return array $meses array com o nome de cada ano em português
 */
if (!function_exists("arrayMeses")) {

    function arrayMeses() {

        $meses = array();

        //Preenche o array com cada mês do ano
        for ($i = 1; $i <= 12; $i++) {
            $meses[$i] = mesbr($i);
        }

        //Retorno
        return $meses;
    }

}

if (!function_exists('subtraidias')) {

    function subtraidias($date, $days) {
        $thisyear = substr($date, 0, 4);
        $thismonth = substr($date, 5, 2);
        $thisday = substr($date, 8, 2);
        $nextdate = mktime(0, 0, 0, $thismonth, $thisday - $days, $thisyear);
        $data = date("Y-m-d", $nextdate);
        return $data;
    }

}

if (!function_exists('dia_util')) {

    function dia_util($date) {
        $thisyear = substr($date, 0, 4);
        $thismonth = substr($date, 5, 2);
        $thisday = substr($date, 8, 2);
        $dt = mktime(0, 0, 0, $thismonth, $thisday, $thisyear);

        $dia = date("j", $dt);
        $dia_semana = date("w", $dt);
        // domingo = 0;
        // sábado = 6;
        if ($dia_semana == 0) {
            $dia--; // mudando de domingo p/ sábado
            $dia--; //mudando de sábado p/ sexta
        }
        if ($dia_semana == 6) {
            $dia--; //mudando de sábado p/ sexta
        }

        $dia_util = mktime(0, 0, 0, $thismonth, $dia, $thisyear);
        return date("Y-m-d", $dia_util);
    }

}

if (!function_exists('adiciona_meses')) {

    function adiciona_meses($data, $qtde, $manterDia = false) {
        $thisyear = substr($data, 0,4);
        $thismonth = substr($data, 5,2);
        $thisday =substr($data, 8,2);

        $aux = mktime ( 0, 0, 0, $thismonth + $qtde, $thisday , $thisyear );

        if($manterDia){
            return date('Y-m-d', $aux);
        } else {
            return date('Y-m-01', $aux);
        }
    }

}

if (!function_exists('subtrai_meses')) {

    function subtrai_meses($data, $qtde, $manterDia = false) {
        $thisyear = substr($data, 0, 4);
        $thismonth = substr($data, 5, 2);
        $thisday = substr($data, 8, 2);
        
        $aux = mktime(0, 0, 0, $thismonth - $qtde, $thisday, $thisyear);
        if($manterDia){
            return date('Y-m-d', $aux);
        } else {
            return date('Y-m-01', $aux);
        }
    }

}

if (!function_exists('adicionadias')) {

    function adicionadias($date, $days) {
        $thisyear = substr($date, 0, 4);
        $thismonth = substr($date, 5, 2);
        $thisday = substr($date, 8, 2);
        $nextdate = mktime(0, 0, 0, $thismonth, $thisday + $days, $thisyear);
        return date("Y-m-d", $nextdate);
    }

}

if (!function_exists('formata_data_validade')) {

    function formata_data_validade($data) {
        $year = substr($data, 2, 2);
        $month = substr($data, 5, 2);
        $day = substr($data, 8, 2);
        $hour = substr($data, 11, 2);
        $min = substr($data, 14, 2);

        return $month . "/" . $year;
    }

}

if (!function_exists("ultimoDiaMes")) {

    /**
     * Retorna um atributo do tipo date contendo o último dia do mês enviado por parâmetro
     * 
     * @param int $mes o número do mês do ano
     * @return date $data o último dia do mês
     */
    function ultimoDiaMes($mes = '', $ano = '', $format = 'd/m/Y') {

        if ($mes != '' && $ano != '') {
            $aux = mktime(0, 0, 0, $mes, 1, $ano);
            setlocale(LC_ALL, 'pt_BR');

            $dateTime = new DateTime();
            $dateTime->setDate($ano, $mes, intval(date("t", $aux)));
            $data = substr($dateTime->format($format), 0, 10);

            return date($data);
        }
    }
}

if (!function_exists('validadata')) {

    function validadata($entrada) {
        $data = explode("/", "$entrada"); // fatia a string $dat em pedados, usando / como referência
        if (count($data) != 3) {
            return false;
        } else {
            $d = $data[0];
            $m = $data[1];
            $y = $data[2];
            if (!is_numeric($d) or ! is_numeric($m) or ! is_numeric($y)) {
                return false;
            } else {
                // verifica se a data é válida!
                // 1 = true (válida)
                // 0 = false (inválida)
                $res = checkdate($m, $d, $y);
                if ($res == 1) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

}

if (!function_exists('validahora')) {

    function validahora($time) {
        if (Empty($time))
            return false;
        list($hour, $minute) = explode(':', $time);

        if ($hour > -1 && $hour < 24 && $minute > -1 && $minute < 60)
            return true;
        else
            return false;
    }

}

/**
 * Retorna a data inicial e final dos ultimos 4 meses
 * Exemplo se voce tiver no dia 2016-12-27
 * Retornará datai = 2016-08-01 e dataf 2016-11-30
 * @author Lucas Lima
 */
if(!function_exists('data_finalInicial_ultimos_quatro_meses')) {
    function data_finalInicial_ultimos_quatro_meses() {
        $ts = mktime(0, 0, 0, intval(date('m') - 4), '01', intval(date('Y')));
        $datai = date('Y-m-01', $ts);
        $ts = mktime(0, 0, 0, intval(date('m') - 1), '01', intval(date('Y')));
        $dataf = date('Y-m-t', $ts);

        return ["dataInicial" => $datai, "dataFinal" => $dataf];
    }
}