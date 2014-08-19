<?php

/* @WebProfiler/Profiler/toolbar_js.html.twig */
class __TwigTemplate_9e700bab92ab6d58a271f0453fec4a9f6dc241748c82fc43150845c7b7d53708 extends Twig_Template
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
        // line 1
        echo "<div id=\"sfwdt";
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "\" class=\"sf-toolbar\" style=\"display: none\"></div>
";
        // line 2
        $this->env->loadTemplate("@WebProfiler/Profiler/base_js.html.twig")->display($context);
        // line 3
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    (function () {
        ";
        // line 5
        if (("top" == (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")))) {
            // line 6
            echo "            var sfwdt = document.getElementById('sfwdt";
            echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
            echo "');
            document.body.insertBefore(
                document.body.removeChild(sfwdt),
                document.body.firstChild
            );
        ";
        }
        // line 12
        echo "
        Sfjs.load(
            'sfwdt";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "',
            '";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_wdt", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
        echo "',
            function(xhr, el) {
                el.style.display = -1 !== xhr.responseText.indexOf('sf-toolbarreset') ? 'block' : 'none';

                if (el.style.display == 'none') {
                    return;
                }

                if (Sfjs.getPreference('toolbar/displayState') == 'none') {
                    document.getElementById('sfToolbarMainContent-";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfToolbarClearer-";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'none';
                    document.getElementById('sfMiniToolbar-";
        // line 26
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'block';
                } else {
                    document.getElementById('sfToolbarMainContent-";
        // line 28
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfToolbarClearer-";
        // line 29
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'block';
                    document.getElementById('sfMiniToolbar-";
        // line 30
        echo twig_escape_filter($this->env, (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")), "html", null, true);
        echo "').style.display = 'none';
                }
            },
            function(xhr) {
                if (xhr.status !== 0) {
                    confirm('An error occurred while loading the web debug toolbar (' + xhr.status + ': ' + xhr.statusText + ').\\n\\nDo you want to open the profiler?') && (window.location = '";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_profiler", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))), "html", null, true);
        echo "');
                }
            }
        );
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/toolbar_js.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  79 => 29,  75 => 28,  70 => 26,  50 => 15,  46 => 14,  32 => 6,  26 => 3,  19 => 1,  482 => 150,  479 => 149,  469 => 140,  465 => 139,  461 => 138,  457 => 137,  453 => 136,  449 => 135,  445 => 134,  441 => 133,  437 => 132,  433 => 131,  429 => 130,  425 => 129,  421 => 128,  417 => 127,  413 => 126,  409 => 125,  405 => 124,  401 => 123,  397 => 122,  391 => 119,  387 => 118,  383 => 117,  379 => 116,  374 => 114,  370 => 113,  366 => 112,  362 => 111,  356 => 108,  352 => 107,  348 => 106,  344 => 105,  340 => 104,  336 => 103,  332 => 102,  328 => 101,  324 => 100,  320 => 99,  316 => 98,  312 => 97,  308 => 96,  304 => 95,  300 => 94,  296 => 93,  290 => 90,  286 => 89,  282 => 88,  276 => 85,  272 => 84,  268 => 83,  264 => 82,  259 => 80,  255 => 79,  250 => 77,  246 => 76,  242 => 75,  237 => 73,  233 => 72,  229 => 70,  226 => 69,  221 => 65,  218 => 64,  211 => 56,  207 => 55,  203 => 54,  199 => 53,  195 => 52,  191 => 51,  187 => 50,  183 => 49,  179 => 48,  175 => 47,  170 => 45,  164 => 42,  159 => 40,  154 => 38,  148 => 35,  140 => 33,  136 => 32,  132 => 31,  120 => 25,  116 => 24,  112 => 23,  108 => 22,  104 => 21,  100 => 20,  96 => 19,  88 => 17,  85 => 16,  82 => 15,  76 => 11,  67 => 149,  62 => 24,  60 => 69,  56 => 67,  54 => 64,  47 => 60,  44 => 59,  42 => 12,  35 => 11,  24 => 2,  165 => 87,  161 => 86,  157 => 85,  153 => 84,  147 => 80,  144 => 34,  133 => 59,  126 => 28,  111 => 43,  98 => 33,  92 => 18,  86 => 27,  84 => 26,  74 => 19,  69 => 151,  66 => 25,  51 => 66,  49 => 17,  40 => 11,  33 => 6,  30 => 5,);
    }
}
