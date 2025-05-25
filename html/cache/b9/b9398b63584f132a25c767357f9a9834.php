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

/* ambiental.twig */
class __TwigTemplate_c949f11a692cdf54eb2455b4d50d737a extends \Twig\Template
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
        echo "<div class=\"container-fluid\"><br>

  <div class=\"row\">
    <div class=\"col\">
      <h3><strong>Temperatura (°C): <span id=\"tempValue\"></span></strong></h3>
      <div style=\"height: 300px;\">
        <canvas id=\"tempChart\"></canvas>
      </div>
    </div>
  </div>

  <div class=\"row\">
    <div class=\"col\">
      <h3><strong>Humedad (%): <span id=\"humValue\"></span></strong></h3>
      <div style=\"height: 300px;\">
        <canvas id=\"humidityChart\"></canvas>
      </div>
    </div>
  </div>

  <div class=\"row\">
    <div class=\"col\">
      <h3><strong>Presión (hPa): <span id=\"pressValue\"></span></strong></h3>
      <div style=\"height: 300px;\">
        <canvas id=\"pressureChart\"></canvas>
      </div>
    </div>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "ambiental.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"container-fluid\"><br>

  <div class=\"row\">
    <div class=\"col\">
      <h3><strong>Temperatura (°C): <span id=\"tempValue\"></span></strong></h3>
      <div style=\"height: 300px;\">
        <canvas id=\"tempChart\"></canvas>
      </div>
    </div>
  </div>

  <div class=\"row\">
    <div class=\"col\">
      <h3><strong>Humedad (%): <span id=\"humValue\"></span></strong></h3>
      <div style=\"height: 300px;\">
        <canvas id=\"humidityChart\"></canvas>
      </div>
    </div>
  </div>

  <div class=\"row\">
    <div class=\"col\">
      <h3><strong>Presión (hPa): <span id=\"pressValue\"></span></strong></h3>
      <div style=\"height: 300px;\">
        <canvas id=\"pressureChart\"></canvas>
      </div>
    </div>
  </div>

</div>
", "ambiental.twig", "/var/www/App/Templates/ambiental.twig");
    }
}
