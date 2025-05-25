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

/* header.twig */
class __TwigTemplate_8088557b5e17716438b2f76c01b2ad0b extends \Twig\Template
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
        echo "<nav class=\" sb-topnav navbar navbar-expand navbar-dark bg-dark\">
\t<a\tclass=\"navbar-brand\" href=\"/dashboard\">
\t\t<button\tclass=\"btn btn-link btn-sm ml-2\" id=\"sidebarToggle\"\thref=\"#\">
\t\t\t<i\tclass=\"fas fa-bars\"></i>
\t\t</button>
\t\t<i\tclass=\"fa fa-paw\" aria-hidden=\"true\"></i>
\t\t";
        // line 7
        echo twig_escape_filter($this->env, ($context["maintitle"] ?? null), "html", null, true);
        echo "
\t</a>
</nav>
";
    }

    public function getTemplateName()
    {
        return "header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<nav class=\" sb-topnav navbar navbar-expand navbar-dark bg-dark\">
\t<a\tclass=\"navbar-brand\" href=\"/dashboard\">
\t\t<button\tclass=\"btn btn-link btn-sm ml-2\" id=\"sidebarToggle\"\thref=\"#\">
\t\t\t<i\tclass=\"fas fa-bars\"></i>
\t\t</button>
\t\t<i\tclass=\"fa fa-paw\" aria-hidden=\"true\"></i>
\t\t{{ maintitle }}
\t</a>
</nav>
", "header.twig", "/var/www/App/Templates/header.twig");
    }
}
