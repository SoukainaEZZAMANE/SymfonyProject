<?php

/* NajdahUserBundle:Citoyen:modifier.html.twig */
class __TwigTemplate_763724f9f77aed0b58a73083722404917e8934ee13b6e19655b636aea9ac7a6d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NajdahUserBundle::layout.html.twig");

        $this->blocks = array(
            'menu_Citoyens' => array($this, 'block_menu_Citoyens'),
            'menu_Citoyens_active' => array($this, 'block_menu_Citoyens_active'),
            'body_userBundle' => array($this, 'block_body_userBundle'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NajdahUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_menu_Citoyens($context, array $blocks = array())
    {
        echo "<span class=\"selected\"></span>";
    }

    // line 6
    public function block_menu_Citoyens_active($context, array $blocks = array())
    {
        echo "active";
    }

    // line 8
    public function block_body_userBundle($context, array $blocks = array())
    {
        // line 9
        echo "    <h2>Modifier :</h2>
\t
    ";
        // line 11
        $this->env->loadTemplate("NajdahUserBundle:Citoyen:formulaire.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "NajdahUserBundle:Citoyen:modifier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 11,  45 => 9,  42 => 8,  36 => 6,  30 => 5,);
    }
}
