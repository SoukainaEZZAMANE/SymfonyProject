<?php

/* NajdahStatBundle:Stat:statistique2.html.twig */
class __TwigTemplate_e8d9c8613275dc6081c8b075ee8a8237a38a7acfeb88696d79c202d6c970b083 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'menu_Acceuil' => array($this, 'block_menu_Acceuil'),
            'menu_Acceuil_active' => array($this, 'block_menu_Acceuil_active'),
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Acceuil - ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 5
    public function block_menu_Acceuil($context, array $blocks = array())
    {
        echo "<span class=\"selected\"></span>";
    }

    // line 6
    public function block_menu_Acceuil_active($context, array $blocks = array())
    {
        echo "active";
    }

    // line 8
    public function block_body_app($context, array $blocks = array())
    {
        // line 9
        echo "    ";
        // line 10
        echo "    <div class=\"row-fluid\">
        <div class=\"span12\">
            <!-- END BEGIN STYLE CUSTOMIZER -->
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->
            <h3 class=\"page-title\">
                BackOffice Najdah <small>page d'accueil</small>
            </h3>
            <ul class=\"breadcrumb\">
                <li>
                    <i class=\"icon-home\"></i>
                    <a href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil"), "html", null, true);
        echo "\">Najdah</a>
                    <i class=\"icon-angle-right\"></i>
                </li>
                <li><a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil"), "html", null, true);
        echo "\"></a>Accueil</li>
                <li class=\"pull-right no-text-shadow\">
                    <div id=\"dashboard-report-range\" class=\"dashboard-date-range tooltips no-tooltip-on-touch-device responsive\" data-tablet=\"\" data-desktop=\"tooltips\" data-placement=\"top\" data-original-title=\"Change dashboard date range\">
                        <i class=\"icon-calendar\"></i>
                        <span></span>
                        <i class=\"icon-angle-down\"></i>
                    </div>
                </li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    ";
        // line 36
        echo "    <div id=\"dashboard\">
        <div class=\"row-fluid\">
            <div class=\"span3 responsive\" data-tablet=\"span6\" data-desktop=\"span3\">
                <div class=\"dashboard-stat blue\">
                    <div class=\"visual\">
                        <i class=\"icon-user\"></i>
                    </div>
                    <div class=\"details\">
                        <div class=\"number\">
                            ";
        // line 45
        echo twig_escape_filter($this->env, (isset($context["nbrAllCitoyen"]) ? $context["nbrAllCitoyen"] : $this->getContext($context, "nbrAllCitoyen")), "html", null, true);
        echo "
                        </div>
                        <div class=\"desc\">
                            Utilisateurs
                        </div>
                    </div>
                    <a class=\"more\" href=\"#\">
                        détails <i class=\"m-icon-swapright m-icon-white\"></i>
                    </a>
                </div>
            </div>
            <div class=\"span3 responsive\" data-tablet=\"span6\" data-desktop=\"span3\">
                <div class=\"dashboard-stat red\">
                    <div class=\"visual\">
                        <i class=\"icon-envelope icon-white\"></i>
                    </div>
                    <div class=\"details\">
                        <div class=\"number\">";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["nbrAllDec"]) ? $context["nbrAllDec"] : $this->getContext($context, "nbrAllDec")), "html", null, true);
        echo "</div>
                        <div class=\"desc\">Déclarations</div>
                    </div>
                    <a class=\"more\" href=\"#\">
                        Détails <i class=\"m-icon-swapright m-icon-white\"></i>
                    </a>
                </div>
            </div>
            <div class=\"span3 responsive\" data-tablet=\"span6  fix-offset\" data-desktop=\"span3\">
                <div class=\"dashboard-stat purple\">
                    <div class=\"visual\">
                        <i class=\"icon-map-marker\"></i>
                    </div>
                    <div class=\"details\">
                        <div class=\"number\">Maps</div>
                        <div class=\"desc\">Infrastructure</div>
                    </div>
                    <a class=\"more\" href=\"#\">
                        Détails <i class=\"m-icon-swapright m-icon-white\"></i>
                    </a>
                </div>
            </div>
            <div class=\"span3 responsive\" data-tablet=\"span6\" data-desktop=\"span3\">
                <div class=\"dashboard-stat yellow\">
                    <div class=\"visual\">
                        <i class=\"icon-bar-chart\"></i>
                    </div>
                    <div class=\"details\">
                        <div class=\"number\">Tous</div>
                        <div class=\"desc\">Statistiques</div>
                    </div>
                    <a class=\"more\" href=\"#\">
                        Détails <i class=\"m-icon-swapright m-icon-white\"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    ";
        // line 103
        echo "<div class=\"clearfix\"></div>
    <div class=\"row-fluid\">
        <div class=\"span6\">
            <!-- BEGIN PORTLET-->
            <div class=\"portlet solid bordered light-grey\">
                <div class=\"portlet-title\">
                    <div class=\"caption\"><i class=\"icon-bar-chart\"></i>Déclaration par mois/ville</div>
                    <div class=\"tools\">
                        <div class=\"btn-group pull-right\" data-toggle=\"buttons-radio\">
                            <a href=\"\" class=\"btn mini\">Users</a>
                            <a href=\"\" class=\"btn mini active\">Feedbacks</a>
                        </div>
                    </div>
                </div>";
        // line 128
        echo "                <div id=\"containerStat\"  class=\"portlet-body\" style=\"height: 300px\">

                   ";
        // line 132
        echo "
                </div>
            </div>
            <!-- END PORTLET-->
        </div>
        <div class=\"span6\">
            <!-- BEGIN PORTLET-->
            <div class=\"portlet solid light-grey bordered\">
                <div class=\"portlet-title\">
                    <div class=\"caption\"><i class=\"icon-bullhorn\"></i>Traitement des déclaration</div>
                    <div class=\"tools\">
                        <div class=\"btn-group pull-right\" data-toggle=\"buttons-radio\">
                            <a href=\"\" class=\"btn blue mini active\">Users</a>
                            <a href=\"\" class=\"btn blue mini\">Orders</a>
                        </div>
                    </div>
                </div>
                <div class=\"portlet-body\">
                    <div id=\"site_statistics_loading\">
                        <img src=\"";
        // line 151
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/img/loading.gif"), "html", null, true);
        echo "\" alt=\"loading\" />
                    </div>
                    <div id=\"site_statistics_content\" class=\"hide\">
                        <div id=\"site_statistics\" class=\"chart\"></div>
                    </div>
                </div>
            </div>
            <!-- END PORTLET-->
            <!-- BEGIN PORTLET-->
   ";
        // line 181
        echo "            <!-- END PORTLET-->
        </div>
    </div>";
        // line 187
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/rsone-statistique/jquery-1.8.2.min.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
    <script src=\"";
        // line 188
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/rsone-statistique/morris.min.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>
    <script src=\"";
        // line 189
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/rsone-statistique/raphael-2.1.0.min.js"), "html", null, true);
        echo "\" type=\"application/javascript\"></script>

    <script type=\"application/javascript\" >

        var StatVille= '";
        // line 193
        echo twig_jsonencode_filter((isset($context["statistiqueVille"]) ? $context["statistiqueVille"] : $this->getContext($context, "statistiqueVille")));
        echo "';
        var donnee=JSON.parse(StatVille);
        //alert(StatVille);
        var j=0;
        var tab=[];
        var element={};

        \$.each(donnee, function(key, value) {

            var test=0;
            element={};


            if(value['mois'])
            \$.each(tab, function(key1, value1) {
                if(value1['mois']==value['mois'])
                {
                    tab[key1][value['libelle']]=value['nbr'];
                    test=1;
                }
            });
            if(test==0){
                element[value['libelle']]=value['nbr'];
                element['mois']=value['mois'];
                tab.push(element);
            }

            //console.log(element);
          //  alert(tab[0]);
        });
        //alert(tab[1]);
        console.log(tab);

            // ID of the element in which to draw the chart.
        Morris.Bar({
            element: 'containerStat',
            data: tab,
            xkey: 'mois',
            ykeys: ['Marrakech','Casablanca','Fes','Mohammedia','Agadir','Rabat'],
            labels: ['Marrakech','Casablanca','Fes','Mohammedia','Agadir','Rabat']
        });



    </script>

";
    }

    public function getTemplateName()
    {
        return "NajdahStatBundle:Stat:statistique2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  232 => 193,  225 => 189,  221 => 188,  216 => 187,  212 => 181,  200 => 151,  179 => 132,  175 => 128,  160 => 103,  119 => 62,  99 => 45,  88 => 36,  73 => 23,  67 => 20,  55 => 10,  53 => 9,  50 => 8,  44 => 6,  38 => 5,  31 => 3,);
    }
}
