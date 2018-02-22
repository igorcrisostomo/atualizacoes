<?php

if (!defined('BASEPATH'))
    exit('Acesso Direto ao Objeto não permitido.');

// -----------------------------------------------------------------------------------------------------------------------------
/**
 * Helper do Fwsibe para FUNÇÕES de ENTRADA (INPUT)
 * 
 * As funções deste helper são encapsulamento de funções, arrays e valores de entrada.
 * São encapsuladas as funções da classe INPUT do framework CODEIGNITER, veja a documentação a seguir:
 * https://ellislab.com/codeigniter/user-guide/libraries/input.html
 * 
 * @author Maycon Brito
 * @version 12/12/2014
 * @wikisibe http://192.168.101.2/wiki/index.php/Fwsibe_-_Helpers
 */
// -----------------------------------------------------------------------------------------------------------------------------
if (!function_exists("post")) {

    /**
     * Retorna o array $_POST ou um valor de acordo com o índice definido por parámetro.
     * Por padrão este array é sanitizado a partir do valor do parâmetro xss_clean.
     * 
     * Caso o índice não seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o índice do valor do array POST a ser recuperado.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou não (FALSE).
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
     * Similar a função count($_POST).
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
     * Retorna o array $_GET ou um valor de acordo com o índice definido por parámetro.
     * Por padrão este array é sanitizado a partir do valor do parâmetro xss_clean.
     * 
     * Caso o índice não seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o índice do valor do array GET a ser recuperado.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou não (FALSE).
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
     * Retorna o array $_SERVER ou um valor de acordo com o índice definido por parámetro.
     * Por padrão este array é sanitizado a partir do valor do parâmetro xss_clean.
     * 
     * Caso o índice não seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o índice do valor do array SERVER a ser recuperado.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou não (FALSE).
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
     * Retorna o endereço IP do usuário atual. Caso o IP não seja válido será retornado o IP 0.0.0.0.
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
     * Verifica se um determinado IP passado por parâmetro é válido.
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
     * Retorna o User Agent (Web Browser) usado pelo usuário. Retorna falso se não é válido ou indisponível
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
     * Muito útil quando a aplicação está sendo executada em um ambiente não-apache, 
     * onde o método apache_request_headers() não é suportado.
     * 
     * Caso o índice não seja definido, retorna todo o array.
     * 
     * @author      Maycon Brito
     * @access      public
     * @param       string      $index o índice que define o cabeçalho da requisição.
     * @param       bool        $xss_clean determina se o array deve ser sanitizado (TRUE) ou não (FALSE).
     * @return      array retorna um array contendo os cabeçalhos da requisição
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
     * Verifica se o método está sendo executado a partir de uma 
     * requisição ajax.
     * 
     * @author      Maycon Brito
     * @access      public
     * @return      boolean (TRUE) caso seja uma requisição ajax, (FALSE) caso não seja
     */
    function is_ajax_request() {

        return get_instance()->input->is_ajax_request();
    }

}

if (!function_exists("is_cli_request")) {

    /**
     * Checa se a constante STDIN está definida, verificando assim se o PHP está
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

