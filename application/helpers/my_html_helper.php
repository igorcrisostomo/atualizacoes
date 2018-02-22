<?php
if (!defined('BASEPATH')) {
    header('Location:../../index.php');
}

/**
 * script_tag
 *
 * Generates link to a JS file
 *
 * @access    public
 * @param    mixed    javascript srcs or an array
 * @param    string    type
 * @param    boolean    should index_page be added to the js path
 * @return    string
 * @link https://snippetrepo.com/snippets/script-tag-for-codeigniter
 */
if ( ! function_exists('script_tag')){
    function script_tag($src = '', $type = 'text/javascript', $index_page = FALSE){
        $CI =& get_instance();

        $link = '';
        if (is_array($src)){
            foreach ($src as $v){
                $link .= script_tag($v,$type,$index_page);
            }
        }else{
            $link = '<script ';
            if ( strpos($src, '://') !== FALSE){
                $link .= 'src="'.$src.'" ';
            }elseif ($index_page === TRUE){
                $link .= 'src="'.$CI->config->site_url($src).'" ';
            }else{
                $link .= 'src="'.$CI->config->slash_item('base_url').$src.'" ';
            }

            $link .= " type='{$type}'></script>";
        }
        return $link;
    }
}

/**
 * @param String $alertClass    classe html para colorir a div [info, sucess, danger, warning, default]
 * @param String $strong        texto para ficar em negrito
 * @param String $msg           texto da mensagem
 * @return String               retorna uma div de alerta bootstrap
 */
if(!function_exists('alertDiv')){
    function alertDiv($alertClass = 'default', $strong = '', $msg = ''){
        $strong = !empty($strong) ? '<strong>'.$strong.'</strong> ' : $strong;
        return '<div class="alert alert-'.$alertClass.'">
        '.$strong.$msg.'
    </div>';
}
}

if(!function_exists('redirecionar')){
    function redirecionar($url){
        echo '<meta http-equiv="Refresh" content="0; url='.base_url($url).'">';
        // addJsInline('window.location.href = "'.base_url($url).'";');
    }
}

if(!function_exists('selectTag')){
    function selectTag($label, $name, $arrayValues, $valor, $required = false){
        $required = $required ? 'required' : '';
        $str = '<div class="form-group">
                    <label>'.$label.'</label>
                    <select name="'.$name.'" class="form-control" '.$required.'>
                        <option value="">Selecione</option>';
                    foreach ($arrayValues as $key => $value) {
                        $selected = $key == $valor ? 'selected' : '';
                        $str .= '<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
                    }
                    $str.='
                    </select>
                </div>';
        // unset($selected);
        return $str;
    }
}