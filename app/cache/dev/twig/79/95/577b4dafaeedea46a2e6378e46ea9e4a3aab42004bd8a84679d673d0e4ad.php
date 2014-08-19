<?php

/* NajdahUserBundle:Citoyen:index.html.twig */
class __TwigTemplate_7995577b4dafaeedea46a2e6378e46ea9e4a3aab42004bd8a84679d673d0e4ad extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NajdahUserBundle::layout.html.twig");

        $this->blocks = array(
            'menu_Citoyens' => array($this, 'block_menu_Citoyens'),
            'menu_Citoyens_active' => array($this, 'block_menu_Citoyens_active'),
            'javascripts' => array($this, 'block_javascripts'),
            'body_userBundle' => array($this, 'block_body_userBundle'),
            'javascript_ready' => array($this, 'block_javascript_ready'),
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
    public function block_javascripts($context, array $blocks = array())
    {
        // line 9
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/scripts/table_managed_citoyen.js"), "html", null, true);
        echo "\"></script>
<!-- <script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/scripts/table-managed.js"), "html", null, true);
        echo "\"></script> -->
<!-- <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/scripts/table-advanced.js"), "html", null, true);
        echo "\"></script> -->
";
    }

    // line 15
    public function block_body_userBundle($context, array $blocks = array())
    {
        // line 16
        echo "<div class=\"portlet box light-grey\">
    <div class=\"portlet-title\">
        <div class=\"caption\"><i class=\"icon-globe\"></i>Citoyens :</div>
        <div class=\"tools\">
            <a href=\"javascript:;\" class=\"collapse\"></a>
            <a href=\"#portlet-config\" data-toggle=\"modal\" class=\"config\"></a>
            <a href=\"javascript:;\" class=\"reload\"></a>
            <a href=\"javascript:;\" class=\"remove\"></a>
        </div>
    </div>
    <div class=\"portlet-body\">
        <div class=\"table-toolbar\">
            <div class=\"btn-group\">
                <button id=\"sample_editable_1_new\" class=\"btn green\"><a href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("citoyen_ajouter"), "html", null, true);
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
        <table class=\"table table-striped table-bordered table-hover\" id=\"sample_1\">
            <thead>
                <tr>
                    <th>CIN</th>
                    <th class=\"hidden-480\">Nom</th>
                    <th class=\"hidden-480\">Prenom</th>
                    <th class=\"hidden-480\">Tel</th>
                    <th >Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 54
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["citoyens"]) ? $context["citoyens"] : $this->getContext($context, "citoyens")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["citoyen"]) {
            // line 55
            echo "                <tr class=\"odd gradeX\">
                    <td>";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["citoyen"]) ? $context["citoyen"] : $this->getContext($context, "citoyen")), "cin"), "html", null, true);
            echo "</td>
                    <td class=\"hidden-480\">";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["citoyen"]) ? $context["citoyen"] : $this->getContext($context, "citoyen")), "nom"), "html", null, true);
            echo "</td>
                    <td class=\"hidden-480\">";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["citoyen"]) ? $context["citoyen"] : $this->getContext($context, "citoyen")), "prenom"), "html", null, true);
            echo "</td>
                    <td class=\"center hidden-480\">";
            // line 59
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["citoyen"]) ? $context["citoyen"] : $this->getContext($context, "citoyen")), "tel"), "html", null, true);
            echo "</td>
                    <td>
                        <a href=\"";
            // line 61
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("citoyen_modifier", array("id" => $this->getAttribute((isset($context["citoyen"]) ? $context["citoyen"] : $this->getContext($context, "citoyen")), "id"))), "html", null, true);
            echo "\" ><i class=\"icon-pencil\" ></i></a>
                        <a href=\"";
            // line 62
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("citoyen_supprimer", array("id" => $this->getAttribute((isset($context["citoyen"]) ? $context["citoyen"] : $this->getContext($context, "citoyen")), "id"))), "html", null, true);
            echo "\" ><i class=\"icon-trash\" ></i></a>
                    </td>
                </tr>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 66
            echo "                    <span>Pas (encore !) des citoyens !!!</span>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['citoyen'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "            </tbody>
        </table>
    </div>
</div>
";
    }

    // line 74
    public function block_javascript_ready($context, array $blocks = array())
    {
        // line 75
        $this->displayParentBlock("javascript_ready", $context, $blocks);
        echo "
TableManaged.init();
//TableAdvanced.init();
";
    }

    public function getTemplateName()
    {
        return "NajdahUserBundle:Citoyen:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 75,  164 => 74,  156 => 68,  149 => 66,  140 => 62,  136 => 61,  131 => 59,  127 => 58,  123 => 57,  119 => 56,  116 => 55,  111 => 54,  83 => 29,  68 => 16,  65 => 15,  59 => 12,  55 => 11,  51 => 10,  47 => 9,  44 => 8,  38 => 6,  32 => 5,);
    }
}
