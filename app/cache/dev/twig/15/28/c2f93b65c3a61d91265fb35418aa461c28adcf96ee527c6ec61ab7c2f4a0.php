<?php

/* NajdahEtabBundle:Etablissement:modifier.html.twig */
class __TwigTemplate_1528c2f93b65c3a61d91265fb35418aa461c28adcf96ee527c6ec61ab7c2f4a0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NajdahAppBundle::layout.html.twig");

        $this->blocks = array(
            'body_app' => array($this, 'block_body_app'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "NajdahAppBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 6
    public function block_body_app($context, array $blocks = array())
    {
        // line 7
        echo "    <h2>Modifier :</h2>
\t
    ";
        // line 9
        $this->env->loadTemplate("NajdahEtabBundle:Etablissement:formulaire.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "NajdahEtabBundle:Etablissement:modifier.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 9,  31 => 7,  28 => 6,);
    }
}
