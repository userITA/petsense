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

/* map-data-search.twig */
class __TwigTemplate_596db862cec4985bae60fe195254b86b extends \Twig\Template
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
        echo "<div class=\"btn-group mr-2\" role=\"group\" aria-label=\"First group\">
    <label for=\"basic-msg\" class=\"form-label\" style=\"margin-top:5px;width:300px;\">
        <strong>
            Introduzca la fecha:
        </strong>
    </label>
    <div class=\"input-group\">
        <span class=\"input-group-addon\">
            <span class=\"glyphicon glyphicon-calendar\"></span>
        </span>
        <input type='date' name=\"dateValue\" id='dateSearchGps' class=\"form-control\">
        <input type='submit' class=\"btn btn-primary\" id=\"buttonValueDate\" name=\"buttonValueDate\" value=\"Buscar\"/>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "map-data-search.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"btn-group mr-2\" role=\"group\" aria-label=\"First group\">
    <label for=\"basic-msg\" class=\"form-label\" style=\"margin-top:5px;width:300px;\">
        <strong>
            Introduzca la fecha:
        </strong>
    </label>
    <div class=\"input-group\">
        <span class=\"input-group-addon\">
            <span class=\"glyphicon glyphicon-calendar\"></span>
        </span>
        <input type='date' name=\"dateValue\" id='dateSearchGps' class=\"form-control\">
        <input type='submit' class=\"btn btn-primary\" id=\"buttonValueDate\" name=\"buttonValueDate\" value=\"Buscar\"/>
    </div>
</div>
", "map-data-search.twig", "/var/www/App/Templates/map-data-search.twig");
    }
}
