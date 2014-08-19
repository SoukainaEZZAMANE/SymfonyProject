<?php

/* NajdahEtabBundle:Etablissement:index.html.twig */
class __TwigTemplate_b618157f14122107e5b0d11d3bdbe850ab48e46e6f6f7f122f518e1fcf7102d3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NajdahEtabBundle::layout.html.twig");

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'body_app' => array($this, 'block_body_app'),
            'javascript_ready' => array($this, 'block_javascript_ready'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 6
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script src=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/scripts/table_advanced_etab.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 10
    public function block_body_app($context, array $blocks = array())
    {
        // line 11
        echo "<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class=\"portlet box green\">
        <div class=\"portlet-title\">
                <div class=\"caption\"><i class=\"icon-globe\"></i>Etablissements</div>
                <div class=\"tools\">
                        <a href=\"javascript:;\" class=\"reload\"></a>
                        <a href=\"javascript:;\" class=\"remove\"></a>
                </div>
        </div>
        <div class=\"portlet-body\">
            <div class=\"table-toolbar\">
                <div class=\"btn-group\">
                    <button id=\"sample_editable_1_new\" class=\"btn green\"><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etab_ajouter"), "html", null, true);
        echo "\">
                    Add New <i class=\"icon-plus\"></i>
                    </a></button>
                </div>
                <div class=\"btn-group pull-right\">
                    <button class=\"btn dropdown-toggle\" data-toggle=\"dropdown\">Tools <i class=\"icon-angle-down\"></i>
                    </button>
                    <ul class=\"dropdown-menu pull-right\">
                        <li><a href=\"#\">Print</a></li>
                        <li><a href=\"#\">Save as PDF</a></li>
                        <li><a href=\"#\">Export to Excel</a></li>
                    </ul>
                </div>
            </div>
            <table class=\"table table-striped table-bordered table-hover table-full-width\" id=\"sample_1\">
                <thead>
                    <tr>
                        <th class=\"hidden\"></th>
                        <th>Designation</th>
                        <th>Adresse</th>
                        <th class=\"hidden\">Position</th>
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 49
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["etabs"]) ? $context["etabs"] : $this->getContext($context, "etabs")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["etab"]) {
            // line 50
            echo "                        <tr>
                            <td class=\"hidden\"><img style=\"height:100px;\" src=\"";
            // line 51
            if (($this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "image") == "")) {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("najdah/img/Etablissements/Etab.png"), "html", null, true);
            } else {
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "webPath")), "html", null, true);
            }
            echo "\" class=\"img-circle img-thumbnail\"/></td>
                            <td>";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "designation"), "html", null, true);
            echo "</td>
                            <td>";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "Adresse"), "html", null, true);
            echo "</td>
                            <td class=\"hidden\">(";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "x"), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "y"), "html", null, true);
            echo ")</td>
                            <td>";
            // line 55
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "type"), "libelle"), "html", null, true);
            echo "</td>
                            <td>
                                <a class=\"widget-icon widget-icon-circle\" href=\"";
            // line 57
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etab_modifier", array("id" => $this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "id"))), "html", null, true);
            echo "\" ><span class=\"icon-edit\" /></a>
                                <a class=\"widget-icon widget-icon-circle\" href=\"";
            // line 58
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etab_supprimer", array("id" => $this->getAttribute((isset($context["etab"]) ? $context["etab"] : $this->getContext($context, "etab")), "id"))), "html", null, true);
            echo "\" ><span class=\"icon-remove-sign\" /></a>
                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 62
            echo "                        <span>Pas (encore !) des etabs !!!</span>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['etab'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "                </tbody>
            </table>
        </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
               
";
    }

    // line 72
    public function block_javascript_ready($context, array $blocks = array())
    {
        // line 73
        $this->displayParentBlock("javascript_ready", $context, $blocks);
        echo "
TableAdvanced.init();
";
    }

    public function getTemplateName()
    {
        return "NajdahEtabBundle:Etablissement:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 73,  154 => 72,  144 => 64,  137 => 62,  128 => 58,  124 => 57,  119 => 55,  113 => 54,  109 => 53,  105 => 52,  97 => 51,  94 => 50,  89 => 49,  60 => 23,  46 => 11,  43 => 10,  37 => 7,  33 => 6,  30 => 5,);
    }
}
