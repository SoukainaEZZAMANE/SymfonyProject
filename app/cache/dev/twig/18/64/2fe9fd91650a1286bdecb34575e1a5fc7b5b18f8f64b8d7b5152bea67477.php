<?php

/* ::layout.html.twig */
class __TwigTemplate_18642fe9fd91650a1286bdecb34575e1a5fc7b5b18f8f64b8d7b5152bea67477 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::superLayout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'detailsNotice' => array($this, 'block_detailsNotice'),
            'menu' => array($this, 'block_menu'),
            'menu_Acceuil_active' => array($this, 'block_menu_Acceuil_active'),
            'menu_Acceuil' => array($this, 'block_menu_Acceuil'),
            'menu_Declarations_active' => array($this, 'block_menu_Declarations_active'),
            'menu_Declarations' => array($this, 'block_menu_Declarations'),
            'menu_Etablissements_active' => array($this, 'block_menu_Etablissements_active'),
            'menu_Etablissements' => array($this, 'block_menu_Etablissements'),
            'menu_Citoyens_active' => array($this, 'block_menu_Citoyens_active'),
            'menu_Citoyens' => array($this, 'block_menu_Citoyens'),
            'menu_Policiers_active' => array($this, 'block_menu_Policiers_active'),
            'menu_Policiers' => array($this, 'block_menu_Policiers'),
            'menu_Pompiers_active' => array($this, 'block_menu_Pompiers_active'),
            'menu_Pompiers' => array($this, 'block_menu_Pompiers'),
            'menu_Statistiques_active' => array($this, 'block_menu_Statistiques_active'),
            'menu_Statistiques' => array($this, 'block_menu_Statistiques'),
            'sub_menu' => array($this, 'block_sub_menu'),
            'body_app' => array($this, 'block_body_app'),
            'footer' => array($this, 'block_footer'),
            'javascript_ready' => array($this, 'block_javascript_ready'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::superLayout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "<!-- BEGIN BODY -->
<body class=\"page-header-fixed\">
    ";
        // line 9
        echo "
    <!-- BEGIN HEADER -->   
    <div class=\"header navbar navbar-inverse navbar-fixed-top\">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class=\"navbar-inner\">
                    <div class=\"container-fluid\">
                            <!-- BEGIN LOGO -->
                            <a class=\"brand\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil"), "html", null, true);
        echo "\">
                            <img style=\"height:29px;\" src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("najdah/img/logo_header.png"), "html", null, true);
        echo "\" alt=\"logo\" />
                            </a>
                            <!-- END LOGO -->
                            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                            <a href=\"javascript:;\" class=\"btn-navbar collapsed\" data-toggle=\"collapse\" data-target=\".nav-collapse\">
                            <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/img/menu-toggler.png"), "html", null, true);
        echo "\" alt=\"\" />
                            </a>          
                            <!-- END RESPONSIVE MENU TOGGLER -->            
                            <!-- BEGIN TOP NAVIGATION MENU -->              
                            <ul class=\"nav pull-right\">
                                    <!-- BEGIN NOTIFICATION DROPDOWN -->   
                                    <li class=\"dropdown\" id=\"header_notification_bar\">
                                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-close-others=\"true\">
                                            <i class=\"icon-warning-sign\"></i>
                                            <span class=\"badge\">";
        // line 31
        echo $this->env->getExtension('notice')->getNbrNoticeExtension();
        echo "</span>
                                            </a>
                                            <ul class=\"dropdown-menu extended notification\">
                                                    <li>
                                                            <p>";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("You have"), "html", null, true);
        echo " ";
        echo $this->env->getExtension('notice')->getNbrNoticeExtension();
        echo " ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("new notifications"), "html", null, true);
        echo "</p>
                                                    </li>
                                                    ";
        // line 37
        $this->displayBlock('detailsNotice', $context, $blocks);
        // line 71
        echo "                                                    <li class=\"external\">
                                                            <a href=\"#\">";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("See all notifications"), "html", null, true);
        echo " <i class=\"m-icon-swapright\"></i></a>
                                                    </li>
                                            </ul>
                                    </li>
                                    <!-- END NOTIFICATION DROPDOWN -->
                                    
                                    
                                    <!-- BEGIN LANGUAGE DROPDOWN -->
                                    <li class=\"dropdown language\">
                                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-close-others=\"true\">
                                        <span class=\"username\">";
        // line 82
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Langue"), "html", null, true);
        echo "</span>
                                        <i class=\"icon-angle-down\"></i>
                                        </a>
                                        <ul class=\"dropdown-menu\">
                                            <li><a href=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil", array("_locale" => "ar")), "html", null, true);
        echo "\"> العربية</a></li>
                                            <li><a href=\"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil", array("_locale" => "fr")), "html", null, true);
        echo "\"> Francais</a></li>
                                            <li><a href=\"";
        // line 88
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil", array("_locale" => "en")), "html", null, true);
        echo "\"> English</a></li>
                                        </ul>
                                    </li>
                                    <!-- END LANGUAGE DROPDOWN -->
                                    <!-- BEGIN USER LOGIN DROPDOWN -->
                                    <li class=\"dropdown user\">
                                            <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\" data-hover=\"dropdown\" data-close-others=\"true\">

                                            <img alt=\"Avatar\" style=\"height: 29px;\" src=\"";
        // line 96
        if (($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "image") == "")) {
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/img/avatar.png"), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "webPath")), "html", null, true);
        }
        echo "\" />
                                            <span class=\"username\">";
        // line 97
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "nom"), "html", null, true);
        echo "</span>
                                            <i class=\"icon-angle-down\"></i>
                                            </a>
                                            <ul class=\"dropdown-menu\">
                                                    <li><a href=\"";
        // line 101
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_profile_show"), "html", null, true);
        echo "\"><i class=\"icon-user\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("My Profile"), "html", null, true);
        echo "</a></li>
                                                    
                                                    <li><a href=\"inbox.html\"><i class=\"icon-envelope\"></i> ";
        // line 103
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("My Inbox"), "html", null, true);
        echo " <span class=\"badge badge-important\">3</span></a></li>
                                                    
                                                    <li class=\"divider\"></li>
                                                    <li><a href=\"javascript:;\" id=\"trigger_fullscreen\"><i class=\"icon-move\"></i> ";
        // line 106
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Full Screen"), "html", null, true);
        echo "</a></li>
                                                    
                                                    <li><a href=\"";
        // line 108
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_logout"), "html", null, true);
        echo "\"><i class=\"icon-key\"></i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Log Out"), "html", null, true);
        echo "</a></li>
                                            </ul>
                                    </li>
                                    <!-- END USER LOGIN DROPDOWN -->
                                    <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                            <!-- END TOP NAVIGATION MENU --> 
                    </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
    </div>
    <!-- END HEADER -->
    
    
    <!-- BEGIN CONTAINER -->
    <div class=\"page-container\">
            <!-- BEGIN SIDEBAR -->
            <div class=\"page-sidebar nav-collapse collapse\">
                <!-- BEGIN SIDEBAR MENU -->        
                <ul class=\"page-sidebar-menu\">
                        <li>
                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                                <div class=\"sidebar-toggler hidden-phone\"></div>
                                <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <li>
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                <form class=\"sidebar-search\">
                                        <div class=\"input-box\">
                                                <a href=\"javascript:;\" class=\"remove\"></a>
                                                <input type=\"text\" placeholder=\"Search...\" />
                                                <input type=\"button\" class=\"submit\" value=\" \" />
                                        </div>
                                </form>
                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        ";
        // line 144
        $this->displayBlock('menu', $context, $blocks);
        // line 229
        echo "                </ul>
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
            
            <!-- BEGIN PAGE -->
            <div class=\"page-content\">
                    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <div id=\"portlet-config\" class=\"modal hide\">
                            <div class=\"modal-header\">
                                    <button data-dismiss=\"modal\" class=\"close\" type=\"button\"></button>
                                    <h3>Title</h3>
                            </div>
                            <div class=\"modal-body\">
                                    Description
                            </div>
                    </div>
                    <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                    <!-- BEGIN PAGE CONTAINER-->
                    <div class=\"container-fluid\">
                            <!-- BEGIN PAGE HEADER-->
                            <div class=\"row-fluid\">
                                    <div class=\"span12\">

                                            <!-- BEGIN PAGE TITLE & BREADCRUMB
                                            <h3 class=\"page-title\">
                                                    Dashboard <small>statistics and more</small>
                                            </h3>
                                            <ul class=\"breadcrumb\">
                                                    <li>
                                                            <i class=\"icon-home\"></i>
                                                            <a href=\"";
        // line 260
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil"), "html", null, true);
        echo "\">Acceuil</a> 
                                                            <i class=\"icon-angle-right\"></i>
                                                    </li>
                                                    <li><a href=\"#\">Dashboard</a></li>
                                                    <li class=\"pull-right no-text-shadow\">
                                                            <div id=\"dashboard-report-range\" class=\"dashboard-date-range tooltips no-tooltip-on-touch-device responsive\" data-tablet=\"\" data-desktop=\"tooltips\" data-placement=\"top\" data-original-title=\"Change dashboard date range\">
                                                                    <i class=\"icon-calendar\"></i>
                                                                    <span></span>
                                                                    <i class=\"icon-angle-down\"></i>
                                                            </div>
                                                    </li>
                                            </ul>
                                             END PAGE TITLE & BREADCRUMB-->
                                    </div>
                            </div>
                            <!-- END PAGE HEADER-->
                            <div id=\"dashboard\">
                                ";
        // line 277
        $this->displayBlock('body_app', $context, $blocks);
        // line 280
        echo "                            </div>
                    <!-- END PAGE CONTAINER-->    
            </div>
            <!-- END PAGE -->
    </div>
    <!-- END CONTAINER -->
    ";
        // line 286
        $this->displayBlock('footer', $context, $blocks);
        // line 300
        echo "</body>
<!-- END BODY -->
";
    }

    // line 37
    public function block_detailsNotice($context, array $blocks = array())
    {
        // line 38
        echo "                                                            <li>
                                                                 <ul class=\"dropdown-menu-list scroller\" style=\"height:250px\">
                                                                ";
        // line 68
        echo "                                                                </ul>
                                                        </li>
                                                    ";
    }

    // line 144
    public function block_menu($context, array $blocks = array())
    {
        // line 145
        echo "                        <li class=\"start ";
        $this->displayBlock('menu_Acceuil_active', $context, $blocks);
        echo "\">
                                <a href=\"";
        // line 146
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("app_acceuil"), "html", null, true);
        echo "\">
                                <i class=\"icon-home\"></i> 
                                <span class=\"title\">";
        // line 148
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Acceuil"), "html", null, true);
        echo "</span>
                                ";
        // line 149
        $this->displayBlock('menu_Acceuil', $context, $blocks);
        // line 150
        echo "                                </a>
                        </li>
                        ";
        // line 177
        echo "                            
                        <li class=\"";
        // line 178
        $this->displayBlock('menu_Declarations_active', $context, $blocks);
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("declaration_index"), "html", null, true);
        echo "\">
                            <i class=\"icon-warning-sign\"></i><span class=\"title\">";
        // line 179
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Declarations"), "html", null, true);
        echo "</span>
                            ";
        // line 180
        $this->displayBlock('menu_Declarations', $context, $blocks);
        // line 181
        echo "                       </a></li>
                        <li class=\"";
        // line 182
        $this->displayBlock('menu_Etablissements_active', $context, $blocks);
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("etab_index"), "html", null, true);
        echo "\">
                            <i class=\"icon-hospital\"></i><span class=\"title\">";
        // line 183
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Etablissements"), "html", null, true);
        echo "</span>
                            ";
        // line 184
        $this->displayBlock('menu_Etablissements', $context, $blocks);
        // line 185
        echo "                       </a></li>
                        <li class=\"";
        // line 186
        $this->displayBlock('menu_Citoyens_active', $context, $blocks);
        echo "\"><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("citoyen_index"), "html", null, true);
        echo "\">
                            <i class=\"icon-group\"></i><span class=\"title\">";
        // line 187
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Citoyens"), "html", null, true);
        echo "</span>
                            ";
        // line 188
        $this->displayBlock('menu_Citoyens', $context, $blocks);
        // line 189
        echo "                       </a></li>
                       ";
        // line 190
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_POLICIER")) {
            echo " 
                       <li class=\"";
            // line 191
            $this->displayBlock('menu_Policiers_active', $context, $blocks);
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_index", array("type_user" => "Policier")), "html", null, true);
            echo "\">
                            <i class=\"icon-truck\"></i><span class=\"title\">";
            // line 192
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Policiers"), "html", null, true);
            echo "</span>
                            ";
            // line 193
            $this->displayBlock('menu_Policiers', $context, $blocks);
            // line 194
            echo "                       </a></li>
                       ";
        }
        // line 196
        echo "                       ";
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN_POMPIER")) {
            echo " 
                       <li class=\"";
            // line 197
            $this->displayBlock('menu_Pompiers_active', $context, $blocks);
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user_index", array("type_user" => "Pompier")), "html", null, true);
            echo "\">
                            <i class=\"icon-user-md\"></i><span class=\"title\">";
            // line 198
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Pompiers"), "html", null, true);
            echo "</span>
                            ";
            // line 199
            $this->displayBlock('menu_Pompiers', $context, $blocks);
            // line 200
            echo "                        </a></li> </li>
                       ";
        }
        // line 202
        echo "                       ";
        // line 218
        echo "                       ";
        if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
            echo " 
                       <li class=\"";
            // line 219
            $this->displayBlock('menu_Statistiques_active', $context, $blocks);
            echo "\"><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("stat_index"), "html", null, true);
            echo "\">
                            <i class=\"icon-bar-chart\"></i><span class=\"title\">";
            // line 220
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("Statistiques"), "html", null, true);
            echo "</span>
                            ";
            // line 221
            $this->displayBlock('menu_Statistiques', $context, $blocks);
            // line 222
            echo "                       </a></li>
                       ";
        }
        // line 224
        echo "                       
                       ";
        // line 225
        $this->displayBlock('sub_menu', $context, $blocks);
        // line 227
        echo "
                        ";
    }

    // line 145
    public function block_menu_Acceuil_active($context, array $blocks = array())
    {
    }

    // line 149
    public function block_menu_Acceuil($context, array $blocks = array())
    {
    }

    // line 178
    public function block_menu_Declarations_active($context, array $blocks = array())
    {
    }

    // line 180
    public function block_menu_Declarations($context, array $blocks = array())
    {
    }

    // line 182
    public function block_menu_Etablissements_active($context, array $blocks = array())
    {
    }

    // line 184
    public function block_menu_Etablissements($context, array $blocks = array())
    {
    }

    // line 186
    public function block_menu_Citoyens_active($context, array $blocks = array())
    {
    }

    // line 188
    public function block_menu_Citoyens($context, array $blocks = array())
    {
    }

    // line 191
    public function block_menu_Policiers_active($context, array $blocks = array())
    {
    }

    // line 193
    public function block_menu_Policiers($context, array $blocks = array())
    {
    }

    // line 197
    public function block_menu_Pompiers_active($context, array $blocks = array())
    {
    }

    // line 199
    public function block_menu_Pompiers($context, array $blocks = array())
    {
    }

    // line 219
    public function block_menu_Statistiques_active($context, array $blocks = array())
    {
    }

    // line 221
    public function block_menu_Statistiques($context, array $blocks = array())
    {
    }

    // line 225
    public function block_sub_menu($context, array $blocks = array())
    {
        // line 226
        echo "                       ";
    }

    // line 277
    public function block_body_app($context, array $blocks = array())
    {
        // line 278
        echo "                                    
                                ";
    }

    // line 286
    public function block_footer($context, array $blocks = array())
    {
        // line 287
        echo "    <!-- BEGIN FOOTER -->
    <div class=\"footer\">
            <div class=\"footer-inner\">
                    2013 &copy; ";
        // line 290
        echo twig_escape_filter($this->env, (isset($context["app_name"]) ? $context["app_name"] : $this->getContext($context, "app_name")), "html", null, true);
        echo " by IRISI TEAM.
            </div>
            <div class=\"footer-tools\">
                    <span class=\"go-top\">
                    <i class=\"icon-angle-up\"></i>
                    </span>
            </div>
    </div>
    <!-- END FOOTER -->
    ";
    }

    // line 304
    public function block_javascript_ready($context, array $blocks = array())
    {
        // line 305
        echo "//alert('Cc2');
App.init(); // initlayout and core plugins
Index.init();
/*
Index.initJQVMAP(); // init index page's custom scripts
Index.initCalendar(); // init index page's custom scripts
Index.initCharts(); // init index page's custom scripts
Index.initChat();
Index.initMiniCharts();
Index.initDashboardDaterange();
Index.initIntro();
Tasks.initDashboardWidget();
*/
//TableManaged.init();
//TableAdvanced.init();
";
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  563 => 305,  560 => 304,  546 => 290,  541 => 287,  538 => 286,  533 => 278,  530 => 277,  526 => 226,  523 => 225,  518 => 221,  513 => 219,  508 => 199,  503 => 197,  498 => 193,  493 => 191,  488 => 188,  483 => 186,  478 => 184,  473 => 182,  468 => 180,  463 => 178,  458 => 149,  453 => 145,  448 => 227,  446 => 225,  443 => 224,  439 => 222,  437 => 221,  433 => 220,  427 => 219,  422 => 218,  420 => 202,  416 => 200,  414 => 199,  410 => 198,  404 => 197,  399 => 196,  395 => 194,  393 => 193,  389 => 192,  383 => 191,  379 => 190,  376 => 189,  374 => 188,  370 => 187,  364 => 186,  361 => 185,  359 => 184,  355 => 183,  349 => 182,  346 => 181,  344 => 180,  340 => 179,  334 => 178,  331 => 177,  327 => 150,  325 => 149,  321 => 148,  316 => 146,  311 => 145,  308 => 144,  302 => 68,  298 => 38,  295 => 37,  289 => 300,  287 => 286,  279 => 280,  277 => 277,  257 => 260,  224 => 229,  222 => 144,  181 => 108,  176 => 106,  170 => 103,  163 => 101,  156 => 97,  148 => 96,  137 => 88,  133 => 87,  129 => 86,  122 => 82,  109 => 72,  106 => 71,  104 => 37,  95 => 35,  76 => 22,  68 => 17,  64 => 16,  51 => 6,  48 => 5,  232 => 193,  225 => 189,  221 => 188,  216 => 187,  212 => 181,  200 => 151,  179 => 132,  175 => 128,  160 => 103,  119 => 62,  99 => 45,  88 => 31,  73 => 23,  67 => 20,  55 => 9,  53 => 9,  50 => 8,  44 => 6,  38 => 5,  31 => 3,);
    }
}
