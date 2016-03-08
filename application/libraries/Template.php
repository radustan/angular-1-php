<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
    
    var $templateData = array();

    protected $viewName;

    public function setValue($name, $value)
    {
        $this->templateData[$name] = $value;
    }

    public function setViewName($viewName)
    {
        $this->viewName = $viewName;
    }

    public function load($view_data = array(),  $template = 'default', $return = FALSE)
    {
        $this->CI =& get_instance();
        $this->setValue('content', $this->CI->load->view($this->viewName, $view_data, TRUE));
        $templateName = 'templates/' . $template . '.html';

        return $this->CI->load->view($templateName, $this->templateData, $return);
    }
}

