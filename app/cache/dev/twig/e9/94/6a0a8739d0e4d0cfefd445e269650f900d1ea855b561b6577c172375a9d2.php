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
        // line 20
        echo "     </body>
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
        $context['_seq'] = twig_ensure_traversable((isset($context["posts"]) ? $context["posts"] : $this->getContext($context, "posts")));
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 11
            echo "         <li>
             ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "vodOrderId", array()), "html", null, true);
            echo "
             ";
            // line 13
            echo twig_escape_filter($this->env, $this->getAttribute($context["post"], "vodFilmId", array()), "html", null, true);
            echo "
             
             </a>
         </li>
         ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "     </ul>
 ";
    }

    public function getTemplateName()
    {
        return "UekVodBundle:Default:show.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  74 => 18,  63 => 13,  59 => 12,  56 => 11,  52 => 10,  48 => 8,  45 => 7,  39 => 4,  34 => 20,  32 => 7,  26 => 4,  21 => 1,);
    }
}
