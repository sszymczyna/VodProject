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
        // line 26
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
        // line 11
        echo "         <li>
             ";
        // line 13
        echo "             ";
        // line 14
        echo "             
             </a>
         </li>
         ";
        // line 18
        echo "     </ul>
 <form action=\"";
        // line 19
        echo $this->env->getExtension('routing')->getPath("uek_vod_homepage");
        echo "\" >
        <button type=\"submit\">Strona główna</button>
 </form>
 <form action=\"";
        // line 22
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
        return array (  71 => 22,  65 => 19,  62 => 18,  57 => 14,  55 => 13,  52 => 11,  48 => 8,  45 => 7,  39 => 4,  34 => 26,  32 => 7,  26 => 4,  21 => 1,);
    }
}
