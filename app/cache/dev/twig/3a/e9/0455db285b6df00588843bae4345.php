<?php

/* PropelBundle:Collector:propel.html.twig */
class __TwigTemplate_3ae90455db285b6df00588843bae4345 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("WebProfilerBundle:Profiler:layout.html.twig");

        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "WebProfilerBundle:Profiler:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        // line 5
        echo "    ";
        $context["icon"] = ('' === $tmp = "        <img alt=\"Propel\" style=\"border-width: 0; vertical-align: middle; margin-right: 5px;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAcCAYAAAB2+A+pAAACzmlDQ1BJQ0MgUHJvZmlsZQAAeNqNk8trFFkUh7/q3KCQIAy0r14Ml1lIkCSUDzQiPtJJbKKxbcpEkyBIp/p2d5mb6ppb1XEUEcnGpc4we/GxcOEf4MKFK90oEXwhiHsVRRTcqLSL6nRX8HlWX/3Oub9zzi0udNrFINApCXN+ZJxcVk5OTcsVz0ixni4ydBXdMBgsFMYAikGg+SY+PsECeNj3/fxPo6sUunNgrYTU+5IKXej4DNQqk1PTIDSQPhkFEYhzQNrE+v9Aeibm60DajDtDIG4Bq9zARCDuAQNutViCTgH0VhI1Mwme03W3Oc8fQLfyJw4DGyB1VoUjTbYWSsXhA0A/WK9KangE6AXretnbNwr0AM/LZt9EzNZGLxodjzl1xNf5sSav82fyh5qeIoiyzpJ/OH94ZEk/UdxfADJgObO1Aw6wBlJ7T1fHj8Zs6dPVoXyTH5m6MwH8BalrgS6MxbOl7jCFRuHho/CROOTI0keAoUYZDw+NRw6Fj8LgETL73UpNIcGSHC/xeYnB42/qKCQOR8jmWehtOUj7qf3Gfmxftq/Zry9m6j3tzII57rmLF95RQGFavs1sc6bY36XGIBpNBcVca6cwMWliurJ/MdN2chcvvFPn8x8TW6pEpz5mUITMYvCYR6EJUQwmuv3o9hT67plb69q9Houbxx523z2z7K5q32ylWlst/27XJc8r8afYJEbFgNiBFHvEXrFbDIsBsVOMtU5M4ONxEoUhpIjG5xRy2f9bqiV+awCkc8pXxnOlk8vKgqmVPa0ST/QX6d+MyalpGdN0HW6EsHZrW/vgYAHWmsW2Fh2EXW+h40Fb68nA6ktwc5tbN/NNa8u6D5H6JwIYqgWnjFepRnKzbW+Xg0GglRz13f5eWdRaGq9SjUJpVKjMvCr1E5a3bI5durPQ+aLR+LABVvwHX/5tND5daTS+XIWO53BbfwXAvP1FP6ZP5AAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAG9gAABvYBDBXjEwAAAAd0SU1FB9sEBhQVGSw3+igAAAWFSURBVEjH3VdfTFtVGP+d09v2jna0pYzC7EbpmsBguAw6+kCydJJh4nhYiMaYKInbNMvigpo49+CDL0bji89LlhgWH8TFaII004VIMmDAKGF/Ojr5t1YYpfS2pZTb295/vgACg4Hb9MHzdr/zfd/v/r7zO+d8B/i/jWQyueXcvXv3/h3QyclJspm9p6eHjIyMUABgXgTQ4OAg6urqcPv2bQ3HcXA6nTIAjI+PV8disUZVVc+m0+mKxcXFrMlkegfANfK8oAMDA/B4POtsIyMjJwVBOJtKpV4VBGGXoigghMBoNM6Wl5cfstvt8WdmnEgkcOXKlXWgfr//eCKR+DwSiRzL5XKQZRmEEAUAZVkWJSUlZ+12e3x4eFjzTMAPHjzQtLS0KB0dHery2p3I5XJfRSKRGlmWIUkSCCGglEKn01FKqWgymV6vrKz0VVZWoqamRib/RKVms3nj2r6RSqXO53I5bzabBQBoNBqwLAtK6RTDMCMGgyFotVp/dDqd/uWqoLa2dntxhcNhDAwMrAO9f//+W3Nzc5disdjLoigCACwWCzQaTS+ltJ1SOujxeMYppdyaLUSMRqNaVlYGAHgqY1VVQcjfLkNDQ69KknQ1nU4XZbNZ6PX6P81m87DJZPoulUpdr62tTa/4jo2NFTAMc0Kv15v37t17eWOuLRlnMplVxzt37rwmiuK5paWlGlEUg2az+arNZvt+3759/g0/ag0EAqclSWpJJBKHeJ6HVqudEUWxkxAyvdZ3O8a6aDTanEwma+bn5wMOh6Pfbrc/3Og3OzvriUajrTzP10uStD+Xy0FVVeh0Olgslm+qq6s/7u3t1dTX18s7BaahUMjicDi4zeYnJibqFhYWPuV5vlmWZSiKAkVRBAAswzDIz8/3HTly5CQAxGIxFBYWbl9qnudX9uAToKOjow1LS0vnHz9+3CxJElRVhaqqAACWZVlKKQwGw0B1dfV5AAgEAutAt2UcDAZRUVGx+j09PX18Zmbmg1wu1yyK4qoGWJYFwzAhrVY7RCm9vnv37kmHw9FLCMkCgCAIYFl2XW5mi0Mera2tq6Acx3nC4fDXU1NTxwBAlmWwLBs3GAwhlmU7M5nM5cOHD0cIIdLaPGNjY9Tlcilr1bwl40gkQoqLi9XlwKp4PP4RIeTM8vr5jUbjWH5+/g+lpaW/EkL4NXEv+f3+g4uLi2U2my3t9Xp/IoQIW1VzHeO5uTlis9lUjuOq4vH4Z6IoHmMYZpQQ8mFxcfHdkpKSHkKIuDbm1q1b9clk8mJPT0+NLMv2bDaLTCbzB4BfAOwM2Gazqel0Ok8QhFcopdd4nv/E7XZPbwwSRdHQ19f3Nsdx56ampg7KsqxfEVleXl5mz5497xNCFp+mnydKHYvFSGFhobrFeW3p7+9/M51OX8pkMqUralYURQFA9Xo9bDbb6YaGhm/dbjd8Ph+Kioq2B15YWIDJZNpsP7M+n+8Cz/NnBEEolyQJlFKoqgpK6Yqqx3Q63RdNTU1tO7l0nmDc1dVFGhoa1GVAY1dX13vz8/MXRFEsWwFavoGiOp2uW6/XX1dVtdflcnFOp5MDgM7OTmi1WjQ2Nm4NHAgEUFVVheHhYRIOh8mpU6cUALh582ZrNBr9kuf5XQzDgBAyYzQapzUazc9VVVUD+/fv/32zhN3d3fB6vdsz5jgOVqt11XDjxo13U6nURUpphSRJI3l5eX0ajab76NGjd61W68PNkrS3t8PtduPAgQM7bibI0NAQ3G43gsFgUywWuygIgqooym9arbbD6/VOEkJWr7qysjLS1tZG7Xa74nQ61efuEkOhUOHExMSJ/v5+22bz0Wj0xffAoVBoU3tBQcFTm/LnHQQAHj16BEVRiKIoqsvl+k9eGn8BMMeiAFTierUAAAAASUVORK5CYII=\" />
    ") ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 8
        echo "    ";
        ob_start();
        // line 9
        echo "        <span class=\"count\">
          <span>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "querycount"), "html", null, true);
        echo "</span>
        </span>
    ";
        $context["text"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 13
        echo "    ";
        $this->env->loadTemplate("WebProfilerBundle:Profiler:toolbar_item.html.twig")->display(array_merge($context, array("link" => $this->getContext($context, "profiler_url"))));
    }

    // line 16
    public function block_menu($context, array $blocks = array())
    {
        // line 17
        echo "    ";
        // line 18
        echo "    <span class=\"label\">
        <span class=\"icon\"><img src=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/propel/images/profiler/propel.png"), "html", null, true);
        echo "\" alt=\"\" /></span>
        <strong>Propel</strong>
        <span class=\"count\">
            <span>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "collector"), "querycount"), "html", null, true);
        echo "</span>
        </span>
    </span>
";
    }

    // line 27
    public function block_panel($context, array $blocks = array())
    {
        // line 28
        echo "    ";
        // line 29
        echo "    <style type=\"text/css\">
    .SQLKeyword {
        color: blue;
        white-space: nowrap;
    }
    .SQLName {
        color: #464646;
        white-space: nowrap;
    }
    .SQLInfo, .SQLComment {
        color: gray;
        display: block;
        font-size: 0.9em;
        margin: 3px 0;
    }
    </style>

    <h2>Queries</h2>
    <table summary=\"Show logged queries\">
        <thead>
            <tr>
                <th>SQL queries</th>
            </tr>
        </thead>
        <tbody>
        ";
        // line 54
        if ((!$this->getAttribute($this->getContext($context, "collector"), "querycount"))) {
            // line 55
            echo "            <tr><td>No queries.</td></tr>
        ";
        } else {
            // line 57
            echo "            ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getContext($context, "collector"), "queries"));
            foreach ($context['_seq'] as $context["_key"] => $context["query"]) {
                // line 58
                echo "            <tr>
                <td>
                    <code>";
                // line 60
                echo $this->env->getExtension('propel_syntax_extension')->formatSQL($this->getAttribute($this->getContext($context, "query"), "sql"));
                echo "</code>
                    <div class=\"SQLInfo\">Time: ";
                // line 61
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "query"), "time"), "html", null, true);
                echo " - Memory: ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "query"), "memory"), "html", null, true);
                echo "</div>
                </td>
            </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['query'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 65
            echo "        ";
        }
        // line 66
        echo "        </tbody>
    </table>

    ";
        // line 69
        echo $this->env->getExtension('actions')->renderAction("PropelBundle:Panel:configuration", array("collector" => $this->getContext($context, "collector")), array());
    }

    public function getTemplateName()
    {
        return "PropelBundle:Collector:propel.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 69,  110 => 55,  76 => 27,  40 => 9,  209 => 84,  205 => 82,  192 => 78,  176 => 70,  165 => 63,  152 => 58,  148 => 57,  141 => 55,  134 => 50,  127 => 61,  93 => 33,  78 => 25,  124 => 41,  88 => 29,  122 => 46,  116 => 42,  108 => 54,  102 => 37,  70 => 20,  51 => 13,  26 => 3,  150 => 43,  135 => 54,  94 => 33,  85 => 28,  61 => 17,  47 => 11,  34 => 5,  157 => 55,  133 => 44,  130 => 48,  113 => 40,  104 => 38,  90 => 32,  79 => 28,  62 => 19,  59 => 18,  32 => 6,  29 => 4,  24 => 3,  81 => 29,  73 => 21,  56 => 14,  54 => 16,  48 => 10,  45 => 9,  42 => 10,  36 => 8,  332 => 137,  329 => 136,  323 => 135,  321 => 134,  314 => 133,  310 => 132,  306 => 130,  304 => 129,  301 => 128,  298 => 127,  296 => 126,  288 => 124,  286 => 123,  282 => 121,  276 => 117,  238 => 99,  236 => 98,  231 => 95,  229 => 94,  224 => 91,  222 => 90,  217 => 87,  213 => 85,  203 => 81,  201 => 80,  196 => 79,  194 => 76,  189 => 77,  183 => 69,  180 => 68,  177 => 67,  175 => 66,  170 => 56,  161 => 61,  158 => 57,  156 => 56,  145 => 56,  142 => 66,  126 => 39,  123 => 60,  120 => 39,  118 => 36,  114 => 57,  103 => 36,  97 => 34,  92 => 37,  72 => 17,  66 => 19,  52 => 12,  69 => 20,  63 => 18,  58 => 16,  37 => 8,  20 => 1,  139 => 65,  131 => 44,  128 => 43,  121 => 40,  115 => 39,  107 => 36,  99 => 34,  96 => 34,  91 => 31,  87 => 28,  84 => 28,  82 => 27,  75 => 24,  67 => 19,  57 => 17,  50 => 12,  44 => 10,  39 => 8,  33 => 5,  30 => 4,  27 => 6,  271 => 114,  262 => 111,  258 => 110,  255 => 109,  250 => 108,  248 => 107,  235 => 107,  228 => 103,  221 => 99,  214 => 95,  207 => 83,  200 => 87,  185 => 76,  178 => 71,  171 => 67,  164 => 59,  154 => 45,  151 => 53,  143 => 49,  140 => 52,  137 => 51,  132 => 49,  129 => 50,  125 => 36,  119 => 58,  111 => 37,  109 => 39,  106 => 35,  100 => 39,  95 => 30,  89 => 29,  86 => 28,  83 => 26,  80 => 26,  77 => 25,  74 => 21,  71 => 21,  68 => 22,  65 => 18,  60 => 16,  55 => 13,  49 => 13,  46 => 10,  43 => 10,  41 => 9,  38 => 8,  35 => 7,  31 => 4,  28 => 3,);
    }
}
