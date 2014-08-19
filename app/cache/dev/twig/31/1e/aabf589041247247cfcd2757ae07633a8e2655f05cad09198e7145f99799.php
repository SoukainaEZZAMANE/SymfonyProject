<?php

/* NajdahEtabBundle:Etablissement:ajouter.html.twig */
class __TwigTemplate_311eaabf589041247247cfcd2757ae07633a8e2655f05cad09198e7145f99799 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NajdahEtabBundle::layout.html.twig");

        $this->blocks = array(
            'body_app' => array($this, 'block_body_app'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NajdahEtabBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body_app($context, array $blocks = array())
    {
        // line 6
        echo "    <h2>Ajouter :</h2>
\t
    ";
        // line 8
        $this->env->loadTemplate("NajdahEtabBundle:Etablissement:formulaire.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "NajdahEtabBundle:Etablissement:ajouter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 8,  31 => 6,  28 => 5,);
    }
}
