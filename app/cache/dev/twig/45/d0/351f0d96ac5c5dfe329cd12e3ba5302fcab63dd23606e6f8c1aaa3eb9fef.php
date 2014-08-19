<?php

/* FOSUserBundle:Security:login.html.twig */
class __TwigTemplate_45d0351f0d96ac5c5dfe329cd12e3ba5302fcab63dd23606e6f8c1aaa3eb9fef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::superLayout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'fos_user_content' => array($this, 'block_fos_user_content'),
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
        echo "
<!-- BEGIN BODY -->
<body class=\"login\">
    <!-- BEGIN LOGO -->
    <div class=\"logo\">
            <img src=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("najdah/img/logo.png"), "html", null, true);
        echo "\" alt=\"Najdah App\" /> 
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class=\"content\">
        <!-- BEGIN LOGIN FORM -->
        ";
        // line 17
        $this->displayBlock('fos_user_content', $context, $blocks);
        // line 66
        echo "    </div>
    <!-- END LOGIN -->
    <!-- BEGIN COPYRIGHT -->
    <div class=\"copyright\">
            2014 &copy; Najdah App
    </div>
    <!-- END COPYRIGHT -->

</body>
<!-- END BODY -->

";
    }

    // line 17
    public function block_fos_user_content($context, array $blocks = array())
    {
        // line 18
        echo "        <form class=\"form-vertical login-form\" action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("fos_user_security_check"), "html", null, true);
        echo "\" method=\"post\">
            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["csrf_token"]) ? $context["csrf_token"] : $this->getContext($context, "csrf_token")), "html", null, true);
        echo "\" />

                
                    
            <h3 class=\"form-title\">Login to your account</h3>
            <div class=\"alert alert-error hide\">
                <button class=\"close\" data-dismiss=\"alert\"></button>
                ";
        // line 26
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 27
            echo "                    <span>";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), array(), "FOSUserBundle"), "html", null, true);
            echo "</span>
                ";
        }
        // line 29
        echo "            </div>
            <div class=\"control-group\">
                
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label for=\"username\" class=\"control-label visible-ie8 visible-ie9\">";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.username", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                <div class=\"controls\">
                    <div class=\"input-icon left\">
                            <i class=\"icon-user\"></i>
                            <input class=\"m-wrap placeholder-no-fix\" type=\"text\" autocomplete=\"off\" placeholder=\"Username\" id=\"username\" name=\"_username\"  required=\"required\"/>
                    </div>
                </div>
            </div>
            <div class=\"control-group\">
                
                <label for=\"password\" class=\"control-label visible-ie8 visible-ie9\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.password", array(), "FOSUserBundle"), "html", null, true);
        echo "</label>
                <div class=\"controls\">
                    <div class=\"input-icon left\">
                        <i class=\"icon-lock\"></i>
                        <input class=\"m-wrap placeholder-no-fix\" type=\"password\" autocomplete=\"off\" placeholder=\"Password\" id=\"password\" name=\"_password\" required=\"required\"/>
                    </div>
                </div>
            </div>
            <div class=\"form-actions\">
                
                
                <label for=\"remember_me\" class=\"checkbox\">
                    <input type=\"checkbox\" id=\"remember_me\" name=\"_remember_me\" value=\"1\"/> ";
        // line 55
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.remember_me", array(), "FOSUserBundle"), "html", null, true);
        echo "
                </label>
                
                <button type=\"submit\" class=\"btn blue pull-right\" id=\"_submit\" name=\"_submit\" >
                    ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("security.login.submit", array(), "FOSUserBundle"), "html", null, true);
        echo " <i class=\"m-icon-swapright m-icon-white\"></i>
                </button>            
            </div>

        </form>
        <!-- END LOGIN FORM -->
        ";
    }

    // line 79
    public function block_javascript_ready($context, array $blocks = array())
    {
        // line 80
        echo "//alert('Cc');
App.init();
Login.init();
\$.backstretch([
    \"";
        // line 84
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/img/bg/mapp.jpg"), "html", null, true);
        echo "\",
    \"";
        // line 85
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/img/bg/2.jpg"), "html", null, true);
        echo "\",
    \"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/img/bg/3.jpg"), "html", null, true);
        echo "\",
    \"";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("assets/img/bg/4.jpg"), "html", null, true);
        echo "\"
    ], {
      fade: 1000,
      duration: 8000
});
";
    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Security:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  165 => 87,  161 => 86,  157 => 85,  153 => 84,  147 => 80,  144 => 79,  133 => 59,  126 => 55,  111 => 43,  98 => 33,  92 => 29,  86 => 27,  84 => 26,  74 => 19,  69 => 18,  66 => 17,  51 => 66,  49 => 17,  40 => 11,  33 => 6,  30 => 5,);
    }
}
