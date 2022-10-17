<?php 
namespace Controller;
 
use Core\Template;
 
class AbstractController
{
    private $template;
 
    public function __construct()
    {
        $this->template = new \Core\Template();
    }
 
    protected function getView($subtemplate, array $variables = [], array $rows = [])
    {
        $this->template->load("src/View/master.php");

        $this->template->replace('include', $subtemplate);
        foreach ($variables as $k=>$v) {
            $this->template->replace($k, $v);
        }            
//var_dump($rows);
        $this->template->replace("rows", $rows);

        $this->template->publish();
    }
}
?>