<?php

if (!defined('BASEPATH'))
    exit('Acesso Direto ao Objeto n�o permitido.');

// -----------------------------------------------------------------------------------------------------------------------------
/**
 * Helper do Fwsibe para FUN��ES de ENTRADA (INPUT)
 * 
 * As fun��es deste helper s�o encapsulamento de fun��es, arrays e valores de entrada.
 * S�o encapsuladas as fun��es da classe INPUT do framework CODEIGNITER, veja a documenta��o a seguir:
 * https://ellislab.com/codeigniter/user-guide/libraries/input.html
 * 
 * @author Maycon Brito
 * @version 12/12/2014
 * @wikisibe http://192.168.101.2/wiki/index.php/Fwsibe_-_Helpers
 */
// -----------------------------------------------------------------------------------------------------------------------------
if (!function_exists("post")) {

    /**
     * Retorna o array $_POST ou um valor de acordo com o �ndice definido por par�metro.
     * Por padr�o este array � sanitizado a partir do valor do par�metro xss_clean.
     * 
     * Caso o �ndice n�o seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o �ndice do valor do array POST a ser recuperado.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou n�o (FALSE).
     * @return      string
     */
    function post($index = null, $xss_clean = true) {

        if ($index == null || ($index !== null && isset($_POST[$index]))) {
            return get_instance()->input->post($index, $xss_clean);
        }

        return null;
    }

}

if (!function_exists("count_post")) {

    /**
     * Retorna a quantidade de valores armazenados no array POST.
     * 
     * Similar a fun��o count($_POST).
     * 
     * @author      Maycon Brito
     * @access      public
     * @return      int
     */
    function count_post() {

        return count($_POST);
    }

}

if (!function_exists("get")) {

    /**
     * Retorna o array $_GET ou um valor de acordo com o �ndice definido por par�metro.
     * Por padr�o este array � sanitizado a partir do valor do par�metro xss_clean.
     * 
     * Caso o �ndice n�o seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o �ndice do valor do array GET a ser recuperado.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou n�o (FALSE).
     * @return      string
     */
    function get($index = null, $xss_clean = true) {

        if ($index == null || ($index !== null && isset($_GET[$index]))) {
            return get_instance()->input->get($index, $xss_clean);
        }

        return null;
    }

}

if (!function_exists("server")) {

    /**
     * Retorna o array $_SERVER ou um valor de acordo com o �ndice definido por par�metro.
     * Por padr�o este array � sanitizado a partir do valor do par�metro xss_clean.
     * 
     * Caso o �ndice n�o seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o �ndice do valor do array SERVER a ser recuperado.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou n�o (FALSE).
     * @return      string
     */
    function server($index = null, $xss_clean = true) {
        
        if ($index == null || ($index !== null && isset($_SERVER[$index]))) {
            return get_instance()->input->server($index, $xss_clean);
        }

        return null;
    }

}

if (!function_exists("ip_address")) {

    /**
     * Retorna o endere�o IP do usu�rio atual. Caso o IP n�o seja v�lido ser� retornado o IP 0.0.0.0.
     * 
     * @author      Maycon Brito
     * @access      public
     * @return      string
     */
    function ip_address() {

        return get_instance()->input->ip_address();
    }

}

if (!function_exists("is_valid_ip")) {

    /**
     * Verifica se um determinado IP passado por par�metro � v�lido.
     * 
     * @author      Maycon Brito
     * @access      public
     * @return      boolean
     */
    function is_valid_ip($ip, $which = '') {

        return get_instance()->input->valid_ip($ip, $which);
    }

}

if (!function_exists("useragent")) {

    /**
     * Retorna o User Agent (Web Browser) usado pelo usu�rio. Retorna falso se n�o � v�lido ou indispon�vel
     * 
     * @author      Maycon Brito
     * @access      public
     * @return      string
     */
    function useragent() {

        return get_instance()->input->user_agent();
    }

}

if (!function_exists("request_header")) {

    /**
     * Muito �til quando a aplica��o est� sendo executada em um ambiente n�o-apache, 
     * onde o m�todo apache_request_headers() n�o � suportado.
     * 
     * Caso o �ndice n�o seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o �ndice que define o cabe�alho da requisi��o.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou n�o (FALSE).
     * @return      array retorna um array contendo os cabe�alhos da requisi��o
     */
    function request_header($index = null, $xss_clean = true) {

        if ($index) {
            return get_instance()->input->get_request_header($index, $xss_clean);
        } else {
            return get_instance()->input->request_headers($xss_clean);
        }
    }

}

if (!function_exists("is_ajax_request")) {

    /**
     * Verifica se o m�todo est� sendo executado a partir de uma 
     * requisi��o ajax.
     * 
     * @author      Maycon Brito
     * @access      public
     * @return      boolean (TRUE) caso seja uma requisi��o ajax, (FALSE) caso n�o seja
     */
    function is_ajax_request() {

        return get_instance()->input->is_ajax_request();
    }

}

if (!function_exists("is_cli_request")) {

    /**
     * Checa se a constante STDIN est� definida, verificando assim se o PHP est�
     * sendo executado a partir da linha de comando.
     * 
     * @author      Maycon Brito
     * @access      public
     * @return      boolean
     */
    function is_cli_request() {

        return get_instance()->input->is_cli_request();
    }

}

