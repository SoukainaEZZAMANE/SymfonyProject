<?php

/* NajdahAppBundle:Declaration:index.html.twig */
class __TwigTemplate_1baa911d5eb504c9dc9f927bf6bb8d7aa71fde2da46a4794945b35ec6b9854fc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("NajdahAppBundle::layout.html.twig");

        $this->blocks = array(
            'menu_Declarations' => array($this, 'block_menu_Declarations'),
            'menu_Declarations_active' => array($this, 'block_menu_Declarations_active'),
            'javascripts' => array($this, 'block_javascripts'),
            'body_app' => array($this, 'block_body_app'),
            'javascript_ready' => array($this, 'block_javascript_ready'),
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

    // line 5
    public function block_menu_Declarations($context, array $blocks = array())
    {
        echo "<span class=\"selected\"></span>";
    }

    // line 6
    public function block_menu_Declarations_active($context, array $blocks = array())
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/scripts/table_advanced_declaration.js"), "html", null, true);
        echo "\"></script>
<script src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/scripts/ui-modals.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\" src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("http://maps.google.com/maps/api/js?sensor=false"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
function initialiser_map(newX, newY) {
    var latlng = new google.maps.LatLng(newX, newY);
    var options = {
        center: latlng,
        zoom: 15,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    
    carte.setOptions(options);
    marqueur.setPosition(latlng);
}
</script>
";
    }

    // line 28
    public function block_body_app($context, array $blocks = array())
    {
        // line 29
        echo "<!-- BEGIN EXAMPLE TABLE PORTLET-->
<div class=\"portlet box green\">
        <div class=\"portlet-title\">
                <div class=\"caption\"><i class=\"icon-globe\"></i>Declarations</div>
                <div class=\"tools\">
                        <a href=\"javascript:;\" class=\"reload\"></a>
                        <a href=\"javascript:;\" class=\"remove\"></a>
                </div>
        </div>
        <div class=\"portlet-body\">
            <div class=\"table-toolbar\">
                <div class=\"btn-group\">
                    <button id=\"sample_editable_1_new\" class=\"btn green\"><a href=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("declaration_ajouter"), "html", null, true);
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
                        <th class=\"hidden\">Map</th>
                        <th>Date</th>
                        <th>Adresse</th>
                        <th class=\"hidden\">Position</th>
                        <th class=\"hidden\">Nombre Blesses</th>
                        <th>Type</th>
                        <th>Etat</th>
                        <th class=\"hidden\">CIN</th>
                        <th class=\"hidden\">Nom</th>
                        <th class=\"hidden\">Tel</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 72
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["declarations"]) ? $context["declarations"] : $this->getContext($context, "declarations")));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["declaration"]) {
            // line 73
            echo "                        <tr>
                            <td class=\"hidden\"><a class=\" btn purple btn-large\" onClick=\"javascript:initialiser_map(";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "x"), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "y"), "html", null, true);
            echo ");\" data-toggle=\"modal\" href=\"#carteModal\">Map</a></td>
                            <td>";
            // line 75
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "date"), "d/m/Y"), "html", null, true);
            echo "</td>
                            <td>";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "Adresse"), "html", null, true);
            echo "</td>
                            <td class=\"hidden\">(";
            // line 77
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "x"), "html", null, true);
            echo ",";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "y"), "html", null, true);
            echo ")</td>
                            <td class=\"hidden\">";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "nbrBlesses"), "html", null, true);
            echo "</td>
                            <td>";
            // line 79
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "type"), "libelle"), "html", null, true);
            echo "</td>
                            <td>";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "etat"), "libelle"), "html", null, true);
            echo "</td>
                            <td class=\"hidden\">";
            // line 81
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "citoyen"), "cin"), "html", null, true);
            echo "</td>
                            <td class=\"hidden\">";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "citoyen"), "nom"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "citoyen"), "prenom"), "html", null, true);
            echo "</td>
                            <td class=\"hidden\">";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "citoyen"), "tel"), "html", null, true);
            echo "</td>
                            <td>
                                <a class=\"btn blue icn-only config\" href=\"";
            // line 85
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("details_declaration", array("id" => $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "id"))), "html", null, true);
            echo "\" ><i class=\"icon-eye-open icon-white\" /></i></a>
                                <a class=\"btn green icn-only config\" href=\"";
            // line 86
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("declaration_modifier", array("id" => $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "id"))), "html", null, true);
            echo "\" ><i class=\"icon-edit icon-white\" /></i></a>
                                <a class=\"btn red icn-only config\" href=\"";
            // line 87
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("declaration_supprimer", array("id" => $this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "id"))), "html", null, true);
            echo "\" ><i class=\"icon-remove icon-white\" /></i></a>
                                ";
            // line 88
            if (($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "lienRapport") != "")) {
                echo "<a class=\"btn yellow icn-only config\" href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute((isset($context["declaration"]) ? $context["declaration"] : $this->getContext($context, "declaration")), "webPath")), "html", null, true);
                echo "\" ><i class=\"icon-remove icon-white\" />Rapport</i></a>";
            }
            // line 89
            echo "                            </td>
                        </tr>
                    ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 92
            echo "                        <span>Pas (encore !) des declarations !!!</span>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['declaration'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "                </tbody>
            </table>
        </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
<div id=\"carteModal\" class=\"modal container hide fade\" tabindex=\"-1\">
        <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\"></button>
                <h3>Carte</h3>
        </div>
        <div class=\"modal-body\">
            <div id=\"carte\" style=\"width:100%; height:450px\"></div>
        </div>
        <div class=\"modal-footer\">
            <button type=\"button\" data-dismiss=\"modal\" class=\"btn\">Close</button>
        </div>
</div>
               
";
    }

    // line 114
    public function block_javascript_ready($context, array $blocks = array())
    {
        // line 115
        $this->displayParentBlock("javascript_ready", $context, $blocks);
        echo "

TableAdvanced.init();
UIModals.init();

var x=31.62809838;
var y=-7.998819351;
latlng = new google.maps.LatLng(x, y);

var options = {
    center: latlng,
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
};

carte = new google.maps.Map(document.getElementById(\"carte\"), options);

marqueur = new google.maps.Marker({
    position: latlng,
    map: carte,
    draggable: false
});
    
\$('#carteModal').on('shown.bs.modal', function () {
    var currentCenter = carte.getCenter();
    google.maps.event.trigger(carte, \"resize\");
    carte.setCenter(currentCenter);
});
";
    }

    public function getTemplateName()
    {
        return "NajdahAppBundle:Declaration:index.html.twig";
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
