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
        // line 2
        echo " ";
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 3
            echo "     <div>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "message", array()), "html", null, true);
            echo "</div>
 ";
        }
        // line 5
        echo "
 <form action=\"";
        // line 6
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
     <label for=\"username\">Username:</label>
     <input type=\"text\" id=\"username\" name=\"_username\" value=\"";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\" />

     <label for=\"password\">Password:</label>
     <input type=\"password\" id=\"password\" name=\"_password\" />

     ";
        // line 17
        echo "
     <button type=\"submit\">login</button>
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
        return array (  44 => 17,  36 => 8,  31 => 6,  28 => 5,  22 => 3,  19 => 2,);
    }
}
