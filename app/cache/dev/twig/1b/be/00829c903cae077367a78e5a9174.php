<?php

/* CostoSystemBundle::layout.html.twig */
class __TwigTemplate_1bbe00829c903cae077367a78e5a9174 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content_header' => array($this, 'block_content_header'),
            'content_header_more' => array($this, 'block_content_header_more'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <link rel=\"stylesheet\" href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/acmedemo/css/demo.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        <link rel=\"stylesheet\" href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/costosystem/css/jquery-ui-1.8.21.custom.css"), "html", null, true);
        echo "\" type=\"text/css\" media=\"all\" />
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"shortcut icon\" href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        <div id=\"symfony-wrapper\">
            <div id=\"symfony-header\">
                <a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_welcome"), "html", null, true);
        echo "\">
                    <img src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/costosystem/images/logo_small.png"), "html", null, true);
        echo "\" alt=\"Poncab\">
                </a>
                <form id=\"symfony-search\" method=\"GET\" action=\"http://symfony.com/search\">
                    <label for=\"symfony-search-field\"><span>Search on Symfony Website</span></label>
                    <input name=\"q\" id=\"symfony-search-field\" type=\"search\" placeholder=\"Search on Symfony website\" class=\"medium_txt\">
                    <input type=\"submit\" class=\"symfony-button-grey\" value=\"OK\" />
                </form>
            </div>

            ";
        // line 23
        if ($this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method")) {
            // line 24
            echo "                <div class=\"flash-message\">
                    <em>Notice</em>: ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getContext($context, "app"), "session"), "flash", array(0 => "notice"), "method"), "html", null, true);
            echo "
                </div>
            ";
        }
        // line 28
        echo "
            ";
        // line 29
        $this->displayBlock('content_header', $context, $blocks);
        // line 38
        echo "
            <div class=\"symfony-content\">
                ";
        // line 40
        $this->displayBlock('content', $context, $blocks);
        // line 42
        echo "            </div>
        </div>
    </body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Demo Bundle";
    }

    // line 29
    public function block_content_header($context, array $blocks = array())
    {
        // line 30
        echo "                <ul id=\"menu\">
                    ";
        // line 31
        $this->displayBlock('content_header_more', $context, $blocks);
        // line 34
        echo "                </ul>

                <div style=\"clear: both\"></div>
            ";
    }

    // line 31
    public function block_content_header_more($context, array $blocks = array())
    {
        // line 32
        echo "                        <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_demo"), "html", null, true);
        echo "\">Demo Home</a></li>
                    ";
    }

    // line 40
    public function block_content($context, array $blocks = array())
    {
        // line 41
        echo "                ";
    }

    public function getTemplateName()
    {
        return "CostoSystemBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  127 => 41,  124 => 40,  117 => 32,  114 => 31,  107 => 34,  105 => 31,  102 => 30,  99 => 29,  93 => 7,  85 => 42,  83 => 40,  79 => 38,  77 => 29,  74 => 28,  68 => 25,  65 => 24,  63 => 23,  51 => 14,  47 => 13,  39 => 8,  35 => 7,  31 => 6,  27 => 5,  21 => 1,);
    }
}
