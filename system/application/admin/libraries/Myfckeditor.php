<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    
    class Myfckeditor {

        function Myfckeditor($params=null)
        {
            // Do something with $params
            
        }
        
        function create_editor($vars) {
            $CI =& get_instance();
            $CI->load->library('Fckeditor', empty($vars['name'])==true ? "fckeditor" : $vars['name']);
            
            $editor = new fckeditor(empty($vars['name'])==true ? "fckeditor" : $vars['name']);
            $editor->BasePath = base_url().'assets/FCKeditor/';
            $editor->ToolbarSet = empty($vars['toolbar'])==true ? "Tool" : $vars['toolbar'];
            $editor->Width = empty($vars['width'])==true ? 600 : $vars['width'];
            $editor->Height = empty($vars['height'])==true ? 600 : $vars['height'];
            $editor->Value = empty($vars['value'])==true ? "" : $vars['value'];

            return $editor->Create();
        }
    }
?>
