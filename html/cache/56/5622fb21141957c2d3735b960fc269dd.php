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

/* dashboard/dashboard-view-admin.twig */
class __TwigTemplate_6dc8b3fb3f53db455170ee5f8609614f extends \Twig\Template
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
        echo "<h2 class=\"mb-4\">Ejemplo de Tabla Responsive con DataTable</h2>
<div class=\"table-responsive\">
    <table id=\"miTabla\" class=\"table table-striped table-bordered\">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Ciudad</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Juan Pérez</td>
                <td>28</td>
                <td>Madrid</td>
                <td>juan@example.com</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Laura García</td>
                <td>34</td>
                <td>Barcelona</td>
                <td>laura@example.com</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Carlos Ruiz</td>
                <td>41</td>
                <td>Sevilla</td>
                <td>carlos@example.com</td>
            </tr>
            <!-- Agrega más filas si lo deseas -->
        </tbody>
    </table>
</div>";
    }

    public function getTemplateName()
    {
        return "dashboard/dashboard-view-admin.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h2 class=\"mb-4\">Ejemplo de Tabla Responsive con DataTable</h2>
<div class=\"table-responsive\">
    <table id=\"miTabla\" class=\"table table-striped table-bordered\">
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Ciudad</th>
                <th>Correo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Juan Pérez</td>
                <td>28</td>
                <td>Madrid</td>
                <td>juan@example.com</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Laura García</td>
                <td>34</td>
                <td>Barcelona</td>
                <td>laura@example.com</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Carlos Ruiz</td>
                <td>41</td>
                <td>Sevilla</td>
                <td>carlos@example.com</td>
            </tr>
            <!-- Agrega más filas si lo deseas -->
        </tbody>
    </table>
</div>", "dashboard/dashboard-view-admin.twig", "/var/www/App/Templates/dashboard/dashboard-view-admin.twig");
    }
}
