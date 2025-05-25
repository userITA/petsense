<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* head-base.twig */
class __TwigTemplate_35eb2d943ff52c9c796a45efa84306c6 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"robots\" content=\"noindex\">
    <meta http-equiv=\"Pragma\" content=\"no-cache\">

    <title>";
        // line 7
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
    
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/vendor/css/tempusdominus-bootstrap.min.css\" />
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/vendor/css/bootstrap.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/vendor/css/leaflet.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/css/styles.css\"/>

    ";
        // line 14
        $this->loadTemplate("head-style.twig", "head-base.twig", 14)->display($context);
        // line 15
        echo "</head>";
    }

    public function getTemplateName()
    {
        return "head-base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 15,  55 => 14,  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<head>
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"robots\" content=\"noindex\">
    <meta http-equiv=\"Pragma\" content=\"no-cache\">

    <title>{{ title }}</title>
    
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/vendor/css/tempusdominus-bootstrap.min.css\" />
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/vendor/css/bootstrap.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/vendor/css/leaflet.min.css\"/>
    <link type=\"text/css\" rel=\"stylesheet\" href=\"/Assets/css/styles.css\"/>

    {% include 'head-style.twig' %}
</head>", "head-base.twig", "/var/www/App/Templates/head-base.twig");
    }
}
