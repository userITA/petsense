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

/* health.twig */
class __TwigTemplate_cdb738fef79aac3b4eaa57149db6c513 extends \Twig\Template
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
        echo "<div class=\"container-fluid\">
<!-- GRÁFICO -->
<div class=\"row\">
    <div class=\"col\">
        <div>
            <canvas id=\"chart-container\"></canvas>
        </div>

        <!-- ÍNDICES LED -->
        <div class=\"led-index text-center my-3\">
            <span class=\"led-data\">🔴 Red: <span id=\"red-value\"></span></span>
            <span class=\"led-data\">🌑 IR: <span id=\"ir-value\"></span></span>
        </div>
    </div>
    <div class=\"col col-lg-3\">
        <div class=\"d-flex flex-column align-items-center my-5 gap-4\">
            <div class=\"w-100 text-center\">
                <label for=\"progress1\" class=\"form-label fw-bold fs-5 d-block mb-2\"><i class=\"fas fa-heartbeat\"></i> BPM</label>
                <div style=\"width: 250px; height: 140px; margin: 0 auto;\">
                    <div id=\"containerBPM\"></div>
                </div>
            </div>
            <div class=\"w-100 text-center\">
                <label for=\"progress2\" class=\"form-label fw-bold fs-5 d-block mb-2\"><i class=\"fas fa-lungs\"></i> SPO2 %</label>
                <div style=\"width: 250px; height: 140px; margin: 0 auto;\">
                    <div id=\"containerSPO2\"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>";
    }

    public function getTemplateName()
    {
        return "health.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"container-fluid\">
<!-- GRÁFICO -->
<div class=\"row\">
    <div class=\"col\">
        <div>
            <canvas id=\"chart-container\"></canvas>
        </div>

        <!-- ÍNDICES LED -->
        <div class=\"led-index text-center my-3\">
            <span class=\"led-data\">🔴 Red: <span id=\"red-value\"></span></span>
            <span class=\"led-data\">🌑 IR: <span id=\"ir-value\"></span></span>
        </div>
    </div>
    <div class=\"col col-lg-3\">
        <div class=\"d-flex flex-column align-items-center my-5 gap-4\">
            <div class=\"w-100 text-center\">
                <label for=\"progress1\" class=\"form-label fw-bold fs-5 d-block mb-2\"><i class=\"fas fa-heartbeat\"></i> BPM</label>
                <div style=\"width: 250px; height: 140px; margin: 0 auto;\">
                    <div id=\"containerBPM\"></div>
                </div>
            </div>
            <div class=\"w-100 text-center\">
                <label for=\"progress2\" class=\"form-label fw-bold fs-5 d-block mb-2\"><i class=\"fas fa-lungs\"></i> SPO2 %</label>
                <div style=\"width: 250px; height: 140px; margin: 0 auto;\">
                    <div id=\"containerSPO2\"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>", "health.twig", "/var/www/App/Templates/health.twig");
    }
}
