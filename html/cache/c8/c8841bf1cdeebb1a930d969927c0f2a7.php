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

/* head-js.twig */
class __TwigTemplate_287d19507205e3c652c58cbcb5683572 extends \Twig\Template
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
        echo "<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
<script type=\"text/javascript\" src=\"/Assets/vendor/js/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/moment-with-locales.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/progressbar.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/echarts.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/tempusdominus-bootstrap.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/bootstrap.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/mqtt.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/index-browser.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/chart.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/leaflet.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/js/functions.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/js/sbadmin.js\"></script>";
    }

    public function getTemplateName()
    {
        return "head-js.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css\">
<script type=\"text/javascript\" src=\"/Assets/vendor/js/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/moment-with-locales.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/progressbar.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/echarts.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/tempusdominus-bootstrap.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/bootstrap.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/mqtt.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/index-browser.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/chart.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/vendor/js/leaflet.min.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/js/functions.js\"></script>
<script type=\"text/javascript\" src=\"/Assets/js/sbadmin.js\"></script>", "head-js.twig", "/var/www/App/Templates/head-js.twig");
    }
}
