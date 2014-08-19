<?php

/* NajdahAppBundle::layout.html.twig */
class __TwigTemplate_2faf3c6734062c83f9bde1ce595fd522dd57f6ff3d99b8503b3d82aab88db06b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
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

    public function getTemplateName()
    {
        return "NajdahAppBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 115,  238 => 114,  216 => 94,  209 => 92,  202 => 89,  196 => 88,  192 => 87,  188 => 86,  184 => 85,  179 => 83,  173 => 82,  169 => 81,  165 => 80,  161 => 79,  157 => 78,  151 => 77,  147 => 76,  143 => 75,  137 => 74,  134 => 73,  129 => 72,  95 => 41,  81 => 29,  78 => 28,  59 => 12,  55 => 11,  51 => 10,  47 => 9,  44 => 8,  38 => 6,  32 => 5,);
    }
}
