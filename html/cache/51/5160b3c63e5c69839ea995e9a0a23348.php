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

/* sidebar.twig */
class __TwigTemplate_259bed769c7dcba02c45d114b295128d extends \Twig\Template
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
        echo "<div id=\"layoutSidenav_nav\">
    <nav class=\"sb-sidenav accordion sb-sidenav-dark\" id=\"sidenavAccordion\">
        <div class=\"sb-sidenav-menu\">
            <div class=\"nav\">
                <a class=\"nav-link\" href=\"/dashboard\">
                    <div class=\"sb-nav-link-icon\"><i class=\"fas fa-tachometer-alt\"></i></div>
                    Inicio
                </a>
                <div class=\"sb-sidenav-menu-heading\">Servicios</div>
                <a class=\"nav-link\" href=\"/geolocation/\"><div class=\"sb-nav-link-icon\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i></div>Geolocalizacion (GPS)</a>
                <a class=\"nav-link\" href=\"/health/\"><div class=\"sb-nav-link-icon\"><i class=\"fas fa-heartbeat\" aria-hidden=\"true\"></i></div>Salud</a>
                <a class=\"nav-link\" href=\"/activity/\"><div class=\"sb-nav-link-icon\"><i class=\"fa fa-fast-forward\" aria-hidden=\"true\"></i></div>Actividad</a>
                <a class=\"nav-link\" href=\"/ambiental/\"> <div class=\"sb-nav-link-icon\"><i class=\"fas fa-leaf\"></i></div>Medioambiente</a>
            </div>
        <div class=\"sb-sidenav-footer\" style=\"position: fixed; bottom: 0; left: 0; width: 225px;\">
            <span>
                <a href=\"/user/logout\" class=\"logout-button\"><em class=\"fa fa-power-off\"></em>&nbsp;&nbsp;Hola,&nbsp;";
        // line 17
        echo twig_escape_filter($this->env, ($context["username"] ?? null), "html", null, true);
        echo "</a>
            </span>
        </div>
    </nav>
</div>
";
    }

    public function getTemplateName()
    {
        return "sidebar.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 17,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"layoutSidenav_nav\">
    <nav class=\"sb-sidenav accordion sb-sidenav-dark\" id=\"sidenavAccordion\">
        <div class=\"sb-sidenav-menu\">
            <div class=\"nav\">
                <a class=\"nav-link\" href=\"/dashboard\">
                    <div class=\"sb-nav-link-icon\"><i class=\"fas fa-tachometer-alt\"></i></div>
                    Inicio
                </a>
                <div class=\"sb-sidenav-menu-heading\">Servicios</div>
                <a class=\"nav-link\" href=\"/geolocation/\"><div class=\"sb-nav-link-icon\"><i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i></div>Geolocalizacion (GPS)</a>
                <a class=\"nav-link\" href=\"/health/\"><div class=\"sb-nav-link-icon\"><i class=\"fas fa-heartbeat\" aria-hidden=\"true\"></i></div>Salud</a>
                <a class=\"nav-link\" href=\"/activity/\"><div class=\"sb-nav-link-icon\"><i class=\"fa fa-fast-forward\" aria-hidden=\"true\"></i></div>Actividad</a>
                <a class=\"nav-link\" href=\"/ambiental/\"> <div class=\"sb-nav-link-icon\"><i class=\"fas fa-leaf\"></i></div>Medioambiente</a>
            </div>
        <div class=\"sb-sidenav-footer\" style=\"position: fixed; bottom: 0; left: 0; width: 225px;\">
            <span>
                <a href=\"/user/logout\" class=\"logout-button\"><em class=\"fa fa-power-off\"></em>&nbsp;&nbsp;Hola,&nbsp;{{username}}</a>
            </span>
        </div>
    </nav>
</div>
", "sidebar.twig", "/var/www/App/Templates/sidebar.twig");
    }
}
