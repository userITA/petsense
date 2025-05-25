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

/* dashboard/dashboard-view-users.twig */
class __TwigTemplate_1ab2bcf3c1f11bb55e39201555b2673d extends \Twig\Template
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
        echo "<div id=\"cardDataDashUsers\" style=\"display: flex; justify-content: center; gap: 2rem; margin-top: 2rem;\">

  <!-- CARD 1: Ubicación -->
  <div style=\"text-align: center; background: #f8f9fa; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 150px;\">
    <div style=\"font-size: 2rem;\">
      📍
      <strong>
        GPS
      </strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Latº:
      <strong id=\"strongDashLat\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Lngº:
      <strong id=\"strongDashLong\"></strong>
    </div>
  </div>

  <!-- CARD: Medioambiente -->
  <div style=\"text-align: center; background: #f8f9fa; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 200px;\">
    <div style=\"font-size: 2rem;\">
      🌱
      <strong>
        Medioambiente
      </strong>
    </div>
    <div style=\"font-size: 1.2rem; margin-top: 0.5rem;\">
      Temperatura:
      <strong id=\"envTemperature\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Humedad:
      <strong id=\"envHumidity\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Presión:
      <strong id=\"envPressure\"></strong>
    </div>
  </div>

  <!-- CARD 3: Batería -->
  <div style=\"text-align: center; background: #f8f9fa; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 150px;\">
    <div style=\"font-size: 2rem;\">
      🔋
      <strong>
        Battery
      </strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Battery:
      <strong id=\"strongDashBattery\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Voltaje:
      <strong id=\"strongDashVoltage\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Tensión:
      <strong id=\"strongDashTension\"></strong>
    </div>
  </div>

  <div style=\"background: #f8f9fa; padding: 1rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 260px;\">
    <div style=\"font-weight: bold; text-align: center; margin-bottom: 0.5rem;font-size: 2rem;\">
      🐕
      <strong>
        Activity
      </strong>
    </div>
    <div style=\"display: flex; justify-content: space-between; gap: 1rem;\">
      <!-- Acelerómetro -->
      <div style=\"font-size: 1.1rem;\">
        Eje X:
        <strong id=\"strongAccelAxisX\"></strong>
      </div>
      <div style=\"font-size: 1.1rem;\">
        Eje Y:
        <strong id=\"strongAccelAxisY\"></strong>
      </div>
      <div style=\"font-size: 1.1rem;\">
        Eje Z:
        <strong id=\"strongAccelAxisZ\"></strong>
      </div>
    </div>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "dashboard/dashboard-view-users.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"cardDataDashUsers\" style=\"display: flex; justify-content: center; gap: 2rem; margin-top: 2rem;\">

  <!-- CARD 1: Ubicación -->
  <div style=\"text-align: center; background: #f8f9fa; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 150px;\">
    <div style=\"font-size: 2rem;\">
      📍
      <strong>
        GPS
      </strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Latº:
      <strong id=\"strongDashLat\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Lngº:
      <strong id=\"strongDashLong\"></strong>
    </div>
  </div>

  <!-- CARD: Medioambiente -->
  <div style=\"text-align: center; background: #f8f9fa; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 200px;\">
    <div style=\"font-size: 2rem;\">
      🌱
      <strong>
        Medioambiente
      </strong>
    </div>
    <div style=\"font-size: 1.2rem; margin-top: 0.5rem;\">
      Temperatura:
      <strong id=\"envTemperature\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Humedad:
      <strong id=\"envHumidity\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Presión:
      <strong id=\"envPressure\"></strong>
    </div>
  </div>

  <!-- CARD 3: Batería -->
  <div style=\"text-align: center; background: #f8f9fa; padding: 1.5rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 150px;\">
    <div style=\"font-size: 2rem;\">
      🔋
      <strong>
        Battery
      </strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Battery:
      <strong id=\"strongDashBattery\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Voltaje:
      <strong id=\"strongDashVoltage\"></strong>
    </div>
    <div style=\"font-size: 1.2rem;\">
      Tensión:
      <strong id=\"strongDashTension\"></strong>
    </div>
  </div>

  <div style=\"background: #f8f9fa; padding: 1rem; border-radius: 1rem; box-shadow: 0 0 10px rgba(0,0,0,0.1); min-width: 260px;\">
    <div style=\"font-weight: bold; text-align: center; margin-bottom: 0.5rem;font-size: 2rem;\">
      🐕
      <strong>
        Activity
      </strong>
    </div>
    <div style=\"display: flex; justify-content: space-between; gap: 1rem;\">
      <!-- Acelerómetro -->
      <div style=\"font-size: 1.1rem;\">
        Eje X:
        <strong id=\"strongAccelAxisX\"></strong>
      </div>
      <div style=\"font-size: 1.1rem;\">
        Eje Y:
        <strong id=\"strongAccelAxisY\"></strong>
      </div>
      <div style=\"font-size: 1.1rem;\">
        Eje Z:
        <strong id=\"strongAccelAxisZ\"></strong>
      </div>
    </div>
  </div>

</div>
", "dashboard/dashboard-view-users.twig", "/var/www/App/Templates/dashboard/dashboard-view-users.twig");
    }
}
