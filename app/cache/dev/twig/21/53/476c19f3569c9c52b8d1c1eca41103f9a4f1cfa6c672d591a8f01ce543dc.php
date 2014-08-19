<?php

/* NajdahUserBundle::layout.html.twig */
class __TwigTemplate_2153476c19f3569c9c52b8d1c1eca41103f9a4f1cfa6c672d591a8f01ce543dc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'sub_menu' => array($this, 'block_sub_menu'),
            'body_app' => array($this, 'block_body_app'),
            'body_userBundle' => array($this, 'block_body_userBundle'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_sub_menu($context, array $blocks = array())
    {
    }

    // line 23
    public function block_body_app($context, array $blocks = array())
    {
        // line 24
        echo "    
<div>
    ";
        // line 26
        $this->displayBlock('body_userBundle', $context, $blocks);
        // line 30
        echo "</div>
                
                
";
    }

    // line 26
    public function block_body_userBundle($context, array $blocks = array())
    {
        // line 27
        echo "          ";
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 29
        echo "    ";
    }

    // line 27
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 28
        echo "          ";
    }

    public function getTemplateName()
    {
        return "NajdahUserBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 27,  58 => 29,  52 => 26,  45 => 30,  43 => 26,  39 => 24,  36 => 23,  31 => 5,  167 => 75,  164 => 74,  156 => 68,  149 => 66,  140 => 62,  136 => 61,  131 => 59,  127 => 58,  123 => 57,  119 => 56,  116 => 55,  111 => 54,  83 => 29,  68 => 16,  65 => 28,  59 => 12,  55 => 27,  51 => 10,  47 => 9,  44 => 8,  38 => 6,  32 => 5,);
    }
}
