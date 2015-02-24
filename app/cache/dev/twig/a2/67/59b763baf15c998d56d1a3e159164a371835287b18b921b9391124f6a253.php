<?php

/* UekVodBundle:Default:index.html.twig */
class __TwigTemplate_a26759b763baf15c998d56d1a3e159164a371835287b18b921b9391124f6a253 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Witaj w wypożyczalni</h1>

<form action=\"";
        // line 3
        echo $this->env->getExtension('routing')->getPath("uek_vod_show_orders");
        echo "\" >
        <button type=\"submit\">Pokaż zamówienia</button>
 </form>
";
    }

    public function getTemplateName()
    {
        return "UekVodBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  23 => 3,  19 => 1,);
    }
}
