<?php

/* NajdahEtabBundle:Etablissement:formulaire.html.twig */
class __TwigTemplate_467340163601ff69404e39551f5f1dc0393051d828083aa42836c8d469b7784e extends Twig_Template
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
        echo "
<div class=\"well\">
\t<form method=\"post\" ";
        // line 4
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
        echo ">
\t\t";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'widget');
        echo "
\t\t<input type=\"submit\" class=\"btn btn-primary\" />
\t</form>
</div>
";
    }

    public function getTemplateName()
    {
        return "NajdahEtabBundle:Etablissement:formulaire.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 5,  23 => 4,  19 => 2,  35 => 9,  31 => 7,  28 => 6,);
    }
}
