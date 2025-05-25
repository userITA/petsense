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

/* footer.twig */
class __TwigTemplate_9f7cdf1013322ead557b7ba9ec0d5535 extends \Twig\Template
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
        echo "<footer class=\"py-4 bg-light mt-auto\">
    <div class=\"container-fluid\">
        <div class=\"d-flex align-items-center justify-content-between small\">
            <div class=\"text-muted\"></div>
        </div>
    </div>
</footer>";
    }

    public function getTemplateName()
    {
        return "footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<footer class=\"py-4 bg-light mt-auto\">
    <div class=\"container-fluid\">
        <div class=\"d-flex align-items-center justify-content-between small\">
            <div class=\"text-muted\"></div>
        </div>
    </div>
</footer>", "footer.twig", "/var/www/App/Templates/footer.twig");
    }
}
