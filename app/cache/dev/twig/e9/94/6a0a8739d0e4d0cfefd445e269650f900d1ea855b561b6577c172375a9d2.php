<?php

/* UekVodBundle:Default:show.html.twig */
class __TwigTemplate_e9946a0a8739d0e4d0cfefd445e269650f900d1ea855b561b6577c172375a9d2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
 <html>
     <head>
         <title>";
        // line 4
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
     </head>
     <body>
         ";
        // line 7
        $this->displayBlock('body', $context, $blocks);
        // line 27
        echo "     <div class=\"btn-group\">
  <button class=\"btn btn-default btn-lg dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\" aria-expanded=\"false\">
    Large button <span class=\"caret\"></span>
  </button>
  <ul class=\"dropdown-menu\" role=\"menu\">
   
  </ul>
</div>
     </body>
 </html>";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Default title";
    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        // line 8
        echo "     <h1>List of orders</h1>
     <ul>
         ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["orders"]) ? $context["orders"] : $this->getContext($context, "orders")));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 11
            echo "         <li>
             ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "users", array()), "name", array()), "html", null, true);
            echo "
             ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["post"], "films", array()), "name", array()), "html", null, true);
            echo "
             ";
            // line 14
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["post"], "date", array()), "F jS \\a\\t g:ia"), "html", null, true);
            echo "
             
             </a>
         </li>
         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "     </ul>
 <form action=\"";
        // line 20
        echo $this->env->getExtension('routing')->getPath("uek_vod_homepage");
        echo "\" >
        <button type=\"submit\">Strona główna</button>
 </form>
 <form action=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\" >
        <button type=\"submit\">Wylogouj</button>
 </form>
 ";
    }

    public function getTemplateName()
    {
        return "UekVodBundle:Default:show.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  95 => 23,  89 => 20,  86 => 19,  75 => 14,  71 => 13,  67 => 12,  64 => 11,  60 => 10,  56 => 8,  53 => 7,  47 => 4,  34 => 27,  32 => 7,  26 => 4,  21 => 1,);
    }
}
