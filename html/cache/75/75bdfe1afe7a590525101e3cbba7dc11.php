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

/* activity.twig */
class __TwigTemplate_ce1e1165a49beb8c51de9e336ba68e60 extends \Twig\Template
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
        <canvas id=\"acelerometerGraph\" style=\"width: 300%; height: 600px;\"></canvas>
      </div>
      <!-- ÍNDICES LED -->
      <div class=\"axis-index text-center my-3\">
        <span class=\"dataAxisX\">
          X:
          <span id=\"x_axis\"></span>
        </span>
        <span class=\"dataAxisY\">
          Y:
          <span id=\"y_axis\"></span>
        </span>
        <span class=\"dataAxisZ\">
          Z:
          <span id=\"z_axis\"></span>
        </span>
      </div>
    </div>
    <div class=\"col col-lg-3\">
      <div class=\"d-flex flex-column align-items-center my-5 gap-4\">
        <div class=\"w-100 text-center\">
          <img id=\"dog-still\" width=\"200\" height=\"200\">
            <div class=\"w-100 text-center\">
              <img id=\"dog-walk\" width=\"200\" height=\"200\"></div>
            </div>
          </div>
        </div>
        <!-- CARD DE INFORMACIÓN DINÁMICA -->
        <div class=\"card shadow p-3 rounded-4\" id=\"motionCard\">
          <div class=\"card-body text-center\">
            <h5 class=\"card-title\">
              <strong>
                Estado de Movimiento:
              </strong>
            </h5>
            <p id=\"movementStatus\"></p>
            <hr>
              <p>
                <strong>
                  ODBA - Overall Dynamic Body Acceleration -
                </strong>
                <strong>
                  Rango:
                </strong>
                <span id=\"sensitivityRange\">
                  ±2g (0.976 mg/digit)
                </span>
              </p>
            </div>
          </div>
          ";
    }

    public function getTemplateName()
    {
        return "activity.twig";
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
        <canvas id=\"acelerometerGraph\" style=\"width: 300%; height: 600px;\"></canvas>
      </div>
      <!-- ÍNDICES LED -->
      <div class=\"axis-index text-center my-3\">
        <span class=\"dataAxisX\">
          X:
          <span id=\"x_axis\"></span>
        </span>
        <span class=\"dataAxisY\">
          Y:
          <span id=\"y_axis\"></span>
        </span>
        <span class=\"dataAxisZ\">
          Z:
          <span id=\"z_axis\"></span>
        </span>
      </div>
    </div>
    <div class=\"col col-lg-3\">
      <div class=\"d-flex flex-column align-items-center my-5 gap-4\">
        <div class=\"w-100 text-center\">
          <img id=\"dog-still\" width=\"200\" height=\"200\">
            <div class=\"w-100 text-center\">
              <img id=\"dog-walk\" width=\"200\" height=\"200\"></div>
            </div>
          </div>
        </div>
        <!-- CARD DE INFORMACIÓN DINÁMICA -->
        <div class=\"card shadow p-3 rounded-4\" id=\"motionCard\">
          <div class=\"card-body text-center\">
            <h5 class=\"card-title\">
              <strong>
                Estado de Movimiento:
              </strong>
            </h5>
            <p id=\"movementStatus\"></p>
            <hr>
              <p>
                <strong>
                  ODBA - Overall Dynamic Body Acceleration -
                </strong>
                <strong>
                  Rango:
                </strong>
                <span id=\"sensitivityRange\">
                  ±2g (0.976 mg/digit)
                </span>
              </p>
            </div>
          </div>
          ", "activity.twig", "/var/www/App/Templates/activity.twig");
    }
}
