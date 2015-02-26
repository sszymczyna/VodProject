<?php

/* UekVodBundle:Security:login.html.twig */
class __TwigTemplate_3c39e0539114aebd151c75a4a5fe6506767598c7eebe64f062989ff7a2132e5d extends Twig_Template
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

";
        // line 11
        echo " ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 12
            echo "     <div>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
 ";
        }
        // line 14
        echo "
<form action=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\" class=\"form-inline\" >
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"username\">Nazwa użytkownika</label>
    <input type=\"text\" class=\"form-control\" id=\"username\" name=\"_username\" value=\"";
        // line 18
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" placeholder=\"Nazwa użytkownika\">
  </div>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"password\">Hasło</label>
    <input type=\"password\" class=\"form-control\" name=\"_password\" id=\"password\" placeholder=\"Hasło\">
  </div>
  <div class=\"checkbox\">
    <label>
      <input type=\"checkbox\"> Remember me
    </label>
  </div>
  <button type=\"submit\" class=\"btn btn-default\">Zaloguj</button>
</form>";
    }

    public function getTemplateName()
    {
        return "UekVodBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 18,  42 => 15,  39 => 14,  33 => 12,  30 => 11,  19 => 1,);
    }
}
