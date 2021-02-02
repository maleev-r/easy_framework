<?php


namespace App\Classes;


class view
{
    private $data;

    function __construct($view_path, $data = array())
    {
        $this->data = $data;
        echo eval('?>'.$this->load_template_file($view_path) .'<?php');

    }

    private function parse_template($template)
    {
        $matches = '';
        preg_match_all("/@include\(\'(.*)\'\)/", $template, $matches);
        foreach ($matches[1] as $index => $template_path) {
            $template = str_replace($matches[0][$index], $this->load_template_file($template_path), $template);
        }
        return $template;
    }

    private function load_template_file($view_path)
    {
        $file_path = PATH . 'app' . DS . 'views' . DS . str_replace('.', DS, $view_path) . '.template.php';
        if (file_exists($file_path)) {
            $template = file_get_contents($file_path);
            $template = $this->parse_template($template);
            return $template;
        } else {
            \app\app::error('View (' . $view_path . ') ' . $file_path . ' no found');
            return '<span style="border: 1px solid #FF0000">Not found needed view "'.$view_path.'"</span>';
        }
    }
}