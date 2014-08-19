<?php

/* @WebProfiler/Profiler/base_js.html.twig */
class __TwigTemplate_a449e5de7e911ea0e23850f0bd524fbf474272c5188db0a71d62aac170dcec79 extends Twig_Template
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
        echo "<script type=\"text/javascript\">/*<![CDATA[*/
    Sfjs = (function() {
        \"use strict\";

        var noop = function() {},

            profilerStorageKey = 'sf2/profiler/',

            request = function(url, onSuccess, onError, payload, options) {
                var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                options = options || {};
                xhr.open(options.method || 'GET', url, true);
                xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
                xhr.onreadystatechange = function(state) {
                    if (4 === xhr.readyState && 200 === xhr.status) {
                        (onSuccess || noop)(xhr);
                    } else if (4 === xhr.readyState && xhr.status != 200) {
                        (onError || noop)(xhr);
                    }
                };
                xhr.send(payload || '');
            },

            hasClass = function(el, klass) {
                return el.className.match(new RegExp('\\\\b' + klass + '\\\\b'));
            },

            removeClass = function(el, klass) {
                el.className = el.className.replace(new RegExp('\\\\b' + klass + '\\\\b'), ' ');
            },

            addClass = function(el, klass) {
                if (!hasClass(el, klass)) { el.className += \" \" + klass; }
            },

            getPreference = function(name) {
                if (!window.localStorage) {
                    return null;
                }

                return localStorage.getItem(profilerStorageKey + name);
            },

            setPreference = function(name, value) {
                if (!window.localStorage) {
                    return null;
                }

                localStorage.setItem(profilerStorageKey + name, value);
            };

        return {
            hasClass: hasClass,

            removeClass: removeClass,

            addClass: addClass,

            getPreference: getPreference,

            setPreference: setPreference,

            request: request,

            load: function(selector, url, onSuccess, onError, options) {
                var el = document.getElementById(selector);

                if (el && el.getAttribute('data-sfurl') !== url) {
                    request(
                        url,
                        function(xhr) {
                            el.innerHTML = xhr.responseText;
                            el.setAttribute('data-sfurl', url);
                            removeClass(el, 'loading');
                            (onSuccess || noop)(xhr, el);
                        },
                        function(xhr) { (onError || noop)(xhr, el); },
                        options
                    );
                }

                return this;
            },

            toggle: function(selector, elOn, elOff) {
                var i,
                    style,
                    tmp = elOn.style.display,
                    el = document.getElementById(selector);

                elOn.style.display = elOff.style.display;
                elOff.style.display = tmp;

                if (el) {
                    el.style.display = 'none' === tmp ? 'none' : 'block';
                }

                return this;
            }
        }
    })();
/*]]>*/</script>
";
    }

    public function getTemplateName()
    {
        return "@WebProfiler/Profiler/base_js.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  91 => 35,  83 => 30,  79 => 29,  75 => 28,  70 => 26,  50 => 15,  46 => 14,  32 => 6,  26 => 3,  19 => 1,  482 => 150,  479 => 149,  469 => 140,  465 => 139,  461 => 138,  457 => 137,  453 => 136,  449 => 135,  445 => 134,  441 => 133,  437 => 132,  433 => 131,  429 => 130,  425 => 129,  421 => 128,  417 => 127,  413 => 126,  409 => 125,  405 => 124,  401 => 123,  397 => 122,  391 => 119,  387 => 118,  383 => 117,  379 => 116,  374 => 114,  370 => 113,  366 => 112,  362 => 111,  356 => 108,  352 => 107,  348 => 106,  344 => 105,  340 => 104,  336 => 103,  332 => 102,  328 => 101,  324 => 100,  320 => 99,  316 => 98,  312 => 97,  308 => 96,  304 => 95,  300 => 94,  296 => 93,  290 => 90,  286 => 89,  282 => 88,  276 => 85,  272 => 84,  268 => 83,  264 => 82,  259 => 80,  255 => 79,  250 => 77,  246 => 76,  242 => 75,  237 => 73,  233 => 72,  229 => 70,  226 => 69,  221 => 65,  218 => 64,  211 => 56,  207 => 55,  203 => 54,  199 => 53,  195 => 52,  191 => 51,  187 => 50,  183 => 49,  179 => 48,  175 => 47,  170 => 45,  164 => 42,  159 => 40,  154 => 38,  148 => 35,  140 => 33,  136 => 32,  132 => 31,  120 => 25,  116 => 24,  112 => 23,  108 => 22,  104 => 21,  100 => 20,  96 => 19,  88 => 17,  85 => 16,  82 => 15,  76 => 11,  67 => 149,  62 => 24,  60 => 69,  56 => 67,  54 => 64,  47 => 60,  44 => 59,  42 => 12,  35 => 11,  24 => 2,  165 => 87,  161 => 86,  157 => 85,  153 => 84,  147 => 80,  144 => 34,  133 => 59,  126 => 28,  111 => 43,  98 => 33,  92 => 18,  86 => 27,  84 => 26,  74 => 19,  69 => 151,  66 => 25,  51 => 66,  49 => 17,  40 => 11,  33 => 6,  30 => 5,);
    }
}
