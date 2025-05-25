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

/* map/map-data-live.twig */
class __TwigTemplate_6cee2342c7498173c7f420ec20e9202d extends \Twig\Template
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
        echo "<div class=\"d-flex justify-content-start align-items-center gap-2\">
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box azul-oscuro\"></span>
        <span>
            LAT:
            <strong id=\"textLat\"></strong>
        </span>
    </div>
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box azul-claro\"></span>
        <span>
            LONG:
            <strong id=\"textLong\"></strong>
        </span>
    </div>
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box amarillo\"></span>
        <span>
            HDOP:
            <strong id=\"textHdop\"></strong>
        </span>
    </div>
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box rojo\"></span>
        <span>
            Satelites:
            <strong id=\"textSatellites\"></strong>
        </span>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "map/map-data-live.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"d-flex justify-content-start align-items-center gap-2\">
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box azul-oscuro\"></span>
        <span>
            LAT:
            <strong id=\"textLat\"></strong>
        </span>
    </div>
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box azul-claro\"></span>
        <span>
            LONG:
            <strong id=\"textLong\"></strong>
        </span>
    </div>
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box amarillo\"></span>
        <span>
            HDOP:
            <strong id=\"textHdop\"></strong>
        </span>
    </div>
    <div class=\"d-flex align-items-center gap-2\">
        <span class=\"color-box rojo\"></span>
        <span>
            Satelites:
            <strong id=\"textSatellites\"></strong>
        </span>
    </div>
</div>
", "map/map-data-live.twig", "/var/www/App/Templates/map/map-data-live.twig");
    }
}
