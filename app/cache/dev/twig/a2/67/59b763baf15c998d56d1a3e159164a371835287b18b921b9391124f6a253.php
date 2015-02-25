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
        echo "<!-- Latest compiled and minified CSS -->
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css\">

<!-- Optional theme -->
<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css\">

<!-- Latest compiled and minified JavaScript -->
<script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js\"></script>

<div class=\"jumbotron\">
  <h1>Wypożyczalnia filmów VOD</h1>
  <p><a class=\"btn btn-primary btn-lg\" href=\"";
        // line 12
        echo $this->env->getExtension('routing')->getPath("uek_vod_show_orders");
        echo "\" role=\"button\">Historia zamówień</a></p>
</div>";
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
        return array (  32 => 12,  19 => 1,);
    }
}
