<?php

/**
 * Helper do Fwsibe para TRATAMENTO DO TEMPLATE do framework, incluindo janelas e fun��es javascript
 * direcionadas ao template.
 * @author Maycon Brito
 * @version 10/03/2014
 * @wikisibe http://192.168.101.2/wiki/index.php/Fwsibe_-_Helpers
 */
// -----------------------------------------------------------------------------------------------------------------------------
/**
 * Este Helper cont�m fun��es relacionadas ao template do FwSibe, ou seja, a��es de layout, redirecionamento e etc.
 * @author Maycon Brito
 * @since 18/07/2013
 */
if (!function_exists("carrega_script")) {

    /**
     * Carrega um determinado script especificado no par�metro $url
     * @param string $url caminho do script a ser carregado
     */
    function carrega_script($url) {
        $tempo = time();
        echo "<script  src='$url'?$tempo></script>";
    }

}

if (!function_exists("carrega_style")) {
    /**
     * Carrega uma determinada folha de estilo css
     * @author David Jonas
     * @param string $url caminho do css
     */
    function carrega_style($url) {
        echo "<link rel='stylesheet' type='text/css' href='$url'>";
    }

}

if (!function_exists("atualizarJanela")) {

    /**
     * Atualiza uma janela, seja com o mesmo endere�o ou com outro especificado pelo usu�rio.
     *
     * @param boolean $template a atualiza��o ser� da p�gina inteira ou um template
     * @param string $url endere�o url que atualizar� a p�gina
     * @return string retorna uma string caso seja impressa com '$script=false' ou imprime o resultado da string caso '$script=true'
     */
    function atualizarJanela($url = null, $template = true, $script = false) {

        try {

            $str = "";
            $ci = &get_instance();

            //N�o foi recebido como par�metro uma url?
            if ($url == null) {
                $url = $ci->uri->uri_string;
            }

            //Ser� atualizada uma view do template?
            if ($template && !isColetor()) {
                $str = "document.location = \"javascript:loadView('" . $url . "', true, true, true)\"";

                //Ser� atualizada a p�gina inteira?
            } else {

                $str = "document.location = \"" . site_url($url) . "\"";
            }

            //A fun��o ser� executada independentemente, ou seja, ter� que imprimir a tag <script> para execut�-la
            if ($script) {
                echo "<script>$str</script>";
                return;
            }

            //Retorna a fun��o para ser executada sem a tag <script>
            return $str;
        } catch (Exception $ex) {
            mensagemExcecao($ex);
        }
    }

}

if (!function_exists('atualizarJanelaPai')) {

    /**
     *
     * Atualiza a p�gina pai da p�gina atual (geralmente um pop-up ou aba) que foi aberta a partir
     * de um evento gerado pela primeira.
     * Executa a fun��o do script libraries/interface/javascript/scripts/Template.js
     *
     * @author Maycon Brito
     * @since 18/07/2013
     * @param string $url url contendo a view que ser� exibida na p�gina pai
     * @param boolean $fecharPagAtual determina se a p�gina autal (pop-up ou aba) ser� fechada ap�s a atualiza��o da p�gina pai.
     */
    function atualizarJanelaPai($url = null, $fecharPagAtual = true, $template = true, $script = false) {
        $str = '';

        $janelaPai = "parent.window.opener";

        //A url foi definida?
        if ($url != null || $url != "") {
            //A p�gina pai ter� o seu template atualizado?
            if ($template && !isColetor()) {
                $str = "$janelaPai.location.href = \"javascript:loadView('" . $url . "', true, true, true)\";";

                //N�o ser� o template da p�gina pai a ser atualizado
            } else {
                //Caso a pagina tenha um formul�rio, submete o mesmo, caso negativo recarrega o endere�o definido em 'url'
                $str = "$janelaPai.location.href = \"$url\";";
            }

            //Caso a url n�o tenha sido definida
        } else {


            if ($template && !isColetor()) {
                $str = "$janelaPai.location.href = \"javascript:loadView(location.hash, true, true, true)\";";
            } else if (!isColetor()) {
                $str = "($janelaPai.document.forms.length > 0 ? $janelaPai.document.forms[0].submit() : $janelaPai.location.reload());";
            }
        }


        if ($fecharPagAtual && !isColetor()) {
            $str .= " window.close(); ";
        } else if ($fecharPagAtual && isColetor()) {
            $str .= " history.back();";
        }

        if (!$script) {
            return $str;
        } else {
            echo "<script>$str</script>";
        }
    }

}

if (!function_exists('fecharJanela')) {

    /**
     *
     * @param type $script
     * @return boolean $script determina se a fun��o ser� executada dentro de outra fun��o javascript (false - Default) ou se ser� executada sozinha (true)
     */
    function fecharJanela($script = false) {

        $str = "window.close();";

        if (!$script) {
            return $str;
        } else {
            echo "<script>$str</script>";
        }
    }

}

if (!function_exists('abrirJanela')) {

    /**
     * Abre uma nova janela com o endere�o enviado pelo usu�rio
     */
    function abrirJanela($url, $script = false) {

        $ci = &get_instance();
        $open = "window.open('" . $ci->session->userdata('dir_principal') . $url . "', '_blank');";

        if ($script) {
            echo "<script >
                    $open
                  </script>";
        } else {
            return $open;
        }
    }

}

if (!function_exists("voltarPagina")) {

    /**
     * Volta para a p�gina anterior
     * @param boolean $script verifica se a fun��o ser� precisar� ser executada junto com a tag <script> (TRUE), ou se n�o � necess�rio pois j� faz parte de uma fun��o maior (FALSE)
     * @param int $numHistory quantidade de p�ginas que ser�o voltadas no hist�rico
     */
    function voltarPagina($script = true, $numHistory = 1) {

        $numHistory = -$numHistory;

        if ($script) {
            echo "<script >history.go($numHistory);</script>";
        } else {
            return "history.go($numHistory);";
        }
    }

}

if (!function_exists("addEventoClasse")) {

    /**
     * Adiciona um ou mais eventos aos componentes existentes em $arrayCampos.
     * Os componentes que poder�o executar estes eventos devem ser de pelo menos
     * uma das classes especificadas em $tipoClassesCampos.
     *
     *
     * @param array $arrayCampos array contendo o campo dos formul�rios
     * @param Evento/Array $eventos inst�ncia(s) do(s) objeto(s) a ser(em) adicionado(s) a cada campo
     * @param Class/Array $tiposClassesCampos tipo(s) de classe(s) (ou array com diversas classes) dos campos a terem o(s) evento(s) adicionado(s). Pode ser por exemplo Select, Input, Radio, etc.
     * @param boolean $subClasse verifica se subclasses da classe enviada no par�metro $tipoClasseCampos tamb�m adicionar�o o evento.
     */
    function addEventoClasse($arrayCampos, $eventos, $tiposClassesCampos, $subclasse = false) {

        try {

            //$tipoClasseCampos n�o � um array?
            if (!is_array($tiposClassesCampos)) {
                //Insere a classe em um array para que ele possa ser percorrido
                $tiposClassesCampos = array($tiposClassesCampos);
            }

            //$evento n�o � um array?
            if (!is_array($eventos)) {
                //Insere a classe em um array para que ele possa ser percorrido
                $eventos = array($eventos);
            }

            //Percorre cada classe do array de $tipoClasseCampos
            foreach ($tiposClassesCampos as $classe) {

                //A clase do tipo de campo definido � de um Campo de Formul�rio?
                if ($classe instanceof CampoForm) {

                    //Percorre cada campo do array
                    foreach ($arrayCampos as $campo) {

                        //O campo � do tipo do definido pelo usu�rio?
                        if ($campo instanceof $classe) {

                            //Verifica se classes filhos podem adicionar o evento.
                            if ((!$subclasse && !is_subclass_of($campo, get_class($classe))) || $subclasse) {
                                foreach ($eventos as $evento) {
                                    $campo->addEvento($evento);
                                }
                            }
                        }
                    }
                } else {
                    throw new Exception("O tipo de classe para inserir um evento n�o � um CampoForm!", "", "");
                }
            }
        } catch (Exception $ex) {
            mensagemExcecao($ex, $ex->getMessage());
        }
    }

}

if (!function_exists("isTemplate")) {

    /**
     * Verifica se a janela atual est� exibindo o template
     *
     * @autho Maycon Brito
     * @returns {Boolean} TRUE caso esteja sendo executada dentro do template ou FALSE caso seja executada em uma p�gina fora do template
     */
    function isTemplate() {

        return executarFuncaoJavascript("isTemplate");
    }

}

if (!function_exists("validaNavegador")) {

    /**
     * Valida a vers�o do navegador. Caso n�o seja aceit�vel retorna uma p�gina para que o usu�rio atualize o navegador.
     *
     * @return boolean TRUE caso o navegador seja suportado ou FALSE caso o navegador n�o seja suportado
     */
    function validaNavegador() {

        $ci = &get_instance();

        $dados = array();

        /**
         * O navegador utilizado � inferior ao IE 9
         * E n�o � o IE6Mobile (Navegador dos coletores da bioextratus)?
         *
         */
        if (($ci->agent->browser() == "Internet Explorer" && $ci->agent->version() < 9) && !isColetor()) {

            $dados['titulo'] = "Atualize o seu navegador";
            $dados['mensagem'] = "O seu navegador (<i>browser</i>) est� desatualizado e por isso n�o � mais suportado pelo SIBE. Navegadores antigos n�o est�o preparados para novos recursos e tecnologias, por isto s�o mais suscet�veis a falhas de seguran�a.
            <br /><br />Acesse esta <a href=\"http://www.updateyourbrowser.net/pt/\" target='_blank'>p�gina</a> da campanha <i>\"Atualize o seu navegador\"</i> e fa�a o download da vers�o atual do navegador de sua prefer�ncia. Aconselhamos o uso do
            Google Chrome ou Mozilla Firefox.
            <br /><br />Agradecemos pela compreens�o.
            <br /><br /><a href='http://updateyourbrowser.net/pt/' target ='_blank' title='Atualize seu Navegador'><img src='http://updateyourbrowser.net/asn.jpg' border='0' alt='Atualize seu Navegador' /></a> ";

            $ci->load->viewfw("padrao/aviso", $dados);

            return false;
        }

        return true;
    }

}

if (!function_exists('carregaPagina')) {

    function carregaPagina($pagina, &$dados = '') {

        if ($pagina == 'template/branco') {
            $arrayComponentes = array();
            $arrayComponentes['dados'] = $dados;
        } else {
            $arrayComponentes = $dados;
        }

        // if($paginaPadrao){
        //     $dados='<div class="home">
        //                 <div class="container">'
        //                     .$dados. 
        //                 '</div>
        //             </div>';
        // }
        $ci = &get_instance();
        try{            
            // $ci->load->view('template/html_cabecalho', $arrayComponentes);
            $ci->load->view('template/cabecalho', $arrayComponentes);
            $ci->load->view($pagina, $arrayComponentes);
            $ci->load->view('template/rodape');
            // $ci->load->view('template/html_rodape');
        }catch(Exception $error){
            echo "Deu ruim";
            exit($error->getMessage());
        }
    }
}

if (!function_exists('CarregaPaginaFw')) {

    function CarregaPaginaFw($pagina, $dados = '', $isTemplate = true, $return = false) {

        if ($pagina == 'padrao/layoutpadrao') {
            $arrayComponentes = array();
            $arrayComponentes['dados'] = $dados;
        } else {
            $arrayComponentes = $dados;
        }

        $ci = &get_instance();

        if (!$return) {
            getCabecalho($isTemplate);
            $ci->load->view($pagina, $arrayComponentes, $return);
            getRodape($isTemplate);
        } else {
            return $ci->load->view($pagina, $arrayComponentes, $return);
        }
    }

}

if (!function_exists('CarregarView')) {

    /**
     * Carrega um arquivo de visualiza��o que esteja no diret�rio "views" do
     * PROJETO ATUAL.
     *
     * @param      string   $view    endere�o da view a ser exibida, incluindo
     *                               os diret�rios a partir do da pasta "view"
     * @param      array    $dados   array cont�m as vari�veis com os
     *                               respectivos valores a serem utilizados pela
     *                               view
     * @param      boolean  $return  op��o de retornar ou imprimir a view
     *
     * @return     <type>   ( description_of_the_return_value )
     */
    function CarregarView($view = null, $dados = array(), $return = false) {
        return get_instance()->load->view($view, $dados, $return);
    }

}

/**
 * Carrega o template e redireciona para um controller de uma determinada view especificada por par�metro
 * @author Maycon Brito
 * @since 31/01/2014
 * @param string $view endere�o hash do controller da view a ser carregada
 * @param array $dados array de dados contendo os componentes a serem carregados pela view
 */
if (!function_exists('CarregaRedirecionaPagina')) {

    function CarregaRedirecionaPagina($view, $dados = '') {

        if ($dados == '')
            $dados = array();
        //Imprime este meta para for�car o browser (no caso do IE) a trabalhar no m�todo Standard, evitando o modo Quirks
        //Pois o modo Quirks n�o executa corretamente esta fun��o por n�o realizar o redirecionamento da view
        //echo "<meta http-equiv='X-UA-Compatible' content='IE=edge' />";
        //Declara a vari�vel Javascript que contem a view a ser redirecionada
        $ci = &get_instance();
        $ci->session->set_userdata(array('redirecionarView' => $view));

        CarregaPaginaFw('padrao/layoutpadrao', $dados, false);
    }

}

if (!function_exists('CarregaJanelaFw')) {

    function CarregaJanelaFw($pagina, $dados = null) {
        if ($pagina == 'padrao/layoutpadrao') {
            $arrayComponentes = array();
            $arrayComponentes['dados'] = $dados;
        } else {
            $arrayComponentes = $dados;
        }

        $ci = &get_instance();

        //O sistema nao esta sendo executado em um coletor?
        $ci->load->viewfw(DIR_TEMPLATE . 'cabecalho_janela');
        $ci->load->viewfw($pagina, $arrayComponentes);
        $ci->load->viewfw(DIR_TEMPLATE . 'rodape_janela');
    }

}

if (!function_exists('CarregaJanela')) {

    function CarregaJanela($pagina, $dados = null) {

        if ($pagina == 'padrao/layoutpadrao') {
            $arrayComponentes = array();
            $arrayComponentes['dados'] = $dados;
        } else {
            $arrayComponentes = $dados;
        }

        $ci = &get_instance();
        $ci->load->viewfw(DIR_TEMPLATE . 'cabecalho_janela');
        $ci->load->view($pagina, $arrayComponentes);
        $ci->load->viewfw(DIR_TEMPLATE . 'rodape_janela');
    }

}

if (!function_exists('CarregaJanelaPortal')) {

    function CarregaJanelaPortal($pagina, $dados = null) {

        $ci = &get_instance();
        $ci->load->viewfw(DIR_TEMPLATE . 'cabecalho_janelaportal');
        $ci->load->view($pagina, $dados);
        $ci->load->viewfw(DIR_TEMPLATE . 'rodape_janela');
    }

}

if (!function_exists('CarregaJanelaPDF')) {

    function CarregaJanelaPDF($pagina, $dados = null) {
        $ci = &get_instance();
        $ci->load->view($pagina, $dados);
    }

}

if (!function_exists('CarregaJanelaPdfFw')) {

    function CarregaJanelaPdfFw($pagina, $dados = null) {
        $ci = &get_instance();
        $ci->load->viewfw($pagina, $dados);
    }

}

if (!function_exists('Abrir_janela')) {

    function Abrir_janela($caminho) {
        return "<script language=\"javascript\">window.open('" . $caminho . "','_blank')</script>";
    }

}

if (!function_exists('validaInsert')) {

    /**
     * Impede que, ao pressionar F5 mais de uma vez, o sistema n�o duplique a inser��o
     *
     * @author Marcony Felipe
     */
    function validaInsert($post) {
        $ci = &get_instance();
        //Verifica se POST � novo ou est� acontecendo novamnete
        if (is_array($post)) {
            $post = implode($post);
        }
        $hash = md5($post);
        if (isset($ci->session->userdata['hash']) && $ci->session->userdata['hash'] == $hash) {
            return false; //N�o ir� inserir
        } else {
            $ci->session->set_userdata(array('hash' => $hash));
            return true; //Insere (primeira vez)
        }
    }

}

if (!function_exists('isAjax')) {

    /**
     * Verifica se o m�todo que invoca esta fun��o est� sendo executado atrav�s de uma
     * requisi��o AJAX
     *
     * @return boolean
     */
    function isAjax() {

        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }

        return false;
    }

}

if(!function_exists('template_notify')){
    /**
     * Exibe uma mensagem de notifica��o padr�o no template.
     * 
     * @author Maycon Brito <maycon.brito@rede.bioextratus.rede>
     * @param  string $msg a mensagem a ser exibida na notifica��o
     * @return boolean
     */
    function template_notify($msg){

        addJS('notify/notification.js');
        addStyle('notify/notify.css');
        addInlineJS("notification.init('$msg')");
        return true;
    }
}

if(!function_exists('redirect_hash_template')){

    /**
     * Realiza um redirecionamento ou atualiza��o da p�gina a partir
     * da hash da url
     * 
     * @author Maycon Brito <maycon.brito@rede.bioextratus.rede>
     * @param  string $hash url a partir da hash
     * @return boolean
     */
    function redirect_hash_template($hash){
        
        echo executarFuncaoJavascript('atualizarHash', [$hash], false);

        return true;    
    }
    

}
