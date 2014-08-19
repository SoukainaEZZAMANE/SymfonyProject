<?php

/* NajdahUserBundle:Citoyen:formulaire.html.twig */
class __TwigTemplate_8fc83a78a649ca2588a1a9a143b89364aa8d381255be78935eb2841d43f32b90 extends Twig_Template
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
        return "NajdahUserBundle:Citoyen:formulaire.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 5,  23 => 4,  19 => 2,  49 => 11,  45 => 9,  42 => 8,  36 => 6,  30 => 5,);
    }
}
