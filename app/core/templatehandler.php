<?php
namespace PROJECT\CORE;

class templatehandler {
    private $template_component;
    private $action_path;
    private $data;
    private $registery;
    
    public function __construct($template_component) {
        $this->template_component = $template_component;
    }
    
    public function __get($key)
    {
        return $this->registery->$key;
    }
    
    public function swaptemplate($template)
    {
        $this->template_component = $this->template_component[$template];
    }
    
    public function setactionpath($action_path)
    {
        $this->action_path = $action_path;
    }
    
    public function setdata($data)
    {
        $this->data = $data;
    }
    
    public function setregistery($registery)
    {
        $this->registery = $registery;
    }
    
    private function rendertemplateheaderstart()
    {
        require_once TEMPLATE_PATH.DS."templateheaderstart.php";
    }
    
    private function rendertemplateheadermeta()
    {
        require_once TEMPLATE_PATH.DS."templateheadermeta.php";
    }
    
    private function rendertemplateheaderend()
    {
        extract($this->data);
        require_once TEMPLATE_PATH.DS."templateheaderend.php";
    }
    
    private function rendertemplateend()
    {
        require_once TEMPLATE_PATH.DS."templateend.php";
    }
    
    private function renderheadercss()
    {
        if(isset($this->template_component['header_resources']['css']))
        {
            $css = $this->template_component['header_resources']['css'];
            if($css !== [])
            {
                $css_request = '';
                foreach ($css as $req)
                {
                    $css_request .= '<link rel="stylesheet" href="'.$req.'">';
                }
                echo $css_request;
            }
        }
    }
    
    private function renderheaderjs()
    {
        if(isset($this->template_component['header_resources']['js']))
        {
            $js = $this->template_component['header_resources']['js'];
            if($js !== [])
            {
                $js_request = '';
                foreach ($js as $req)
                {
                    $js_request .= '<script src="'.$req.'"></script>';
                }
                echo $js_request;
            }
        }
    }
    
    private function renderfootercss()
    {
        if(isset($this->template_component['footer_resources']['css']))
        {
            $css = $this->template_component['footer_resources']['css'];
            if($css !== [])
            {
                $css_request = '';
                foreach ($css as $req)
                {
                    $css_request .= '<link rel="stylesheet" href="'.$req.'">';
                }
                echo $css_request;
            }
        }
    }
    
    private function renderfooterjs()
    {
        if(isset($this->template_component['footer_resources']['js']))
        {
            $js = $this->template_component['footer_resources']['js'];
            if($js !== [])
            {
                $js_request = '';
                foreach ($js as $req)
                {
                    $js_request .= '<script src="'.$req.'"></script>';
                }
                echo $js_request;
            }
        }
    }
    
    private function rendertemplatecomponent()
    {
        if(isset($this->template_component['template']))
        {
            extract($this->data);
            $component = $this->template_component['template'];
            foreach ($component as $key => $value)
            {
                if($key === ":view")
                {
                    require_once $this->action_path;
                }
                else
                {
                    require_once $value;
                }
            }
        }
    }
    
    public function render()
    {
        $this->rendertemplateheaderstart();
        $this->rendertemplateheadermeta();
        $this->renderheadercss();
        $this->renderheaderjs();
        $this->rendertemplateheaderend();
        $this->rendertemplatecomponent();
        $this->renderfootercss();
        $this->renderfooterjs();
        $this->rendertemplateend();
    }
    
}
