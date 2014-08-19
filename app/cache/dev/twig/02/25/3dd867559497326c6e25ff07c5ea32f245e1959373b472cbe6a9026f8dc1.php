<?php

/* NajdahEtabBundle::layout.html.twig */
class __TwigTemplate_02253dd867559497326c6e25ff07c5ea32f245e1959373b472cbe6a9026f8dc1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'menu_Etablissements' => array($this, 'block_menu_Etablissements'),
            'menu_Etablissements_active' => array($this, 'block_menu_Etablissements_active'),
            'sub_menu' => array($this, 'block_sub_menu'),
            'body_app' => array($this, 'block_body_app'),
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
    public function block_menu_Etablissements($context, array $blocks = array())
    {
        echo "<span class=\"selected\"></span>";
    }

    // line 6
    public function block_menu_Etablissements_active($context, array $blocks = array())
    {
        echo "active";
    }

    // line 8
    public function block_sub_menu($context, array $blocks = array())
    {
    }

    // line 16
    public function block_body_app($context, array $blocks = array())
    {
        // line 17
        echo "             
";
    }

    public function getTemplateName()
    {
        return "NajdahEtabBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 17,  48 => 16,  31 => 5,  157 => 73,  154 => 72,  144 => 64,  137 => 62,  128 => 58,  124 => 57,  119 => 55,  113 => 54,  109 => 53,  105 => 52,  97 => 51,  94 => 50,  89 => 49,  60 => 23,  46 => 11,  43 => 8,  37 => 6,  33 => 6,  30 => 5,);
    }
}
