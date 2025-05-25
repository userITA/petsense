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

/* head-style.twig */
class __TwigTemplate_f52c15432fa57e5af6e81bb91f0d4661 extends \Twig\Template
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
        echo "<style>
    .hovergallery img{
-webkit-transform:scale(1.0); 
-moz-transform:scale(1.0); 
-o-transform:scale(1.0); 
-ms-transform:scale(1.0); 
-webkit-transition-duration: 0.5s; 
-moz-transition-duration: 0.5s; 
-o-transition-duration: 0.5s; 
-ms-transition-duration: 0.5s;
margin: 0 10px 5px 0; /*Margen entre las imágenes*/
}

.hovergallery img:hover{
-webkit-transform:scale(1.5); /*Webkit: Escala de aumento de la imagen 1.2x tamaño original*/
-moz-transform:scale(1.5); 
-o-transform:scale(1.5); 
-ms-transform:scale(1.5); 
box-shadow:0px 0px 30px gray; /*Sombra sobre toda la imagen*/
-webkit-box-shadow:0px 0px 30px gray; 
-moz-box-shadow:0px 0px 30px gray;
-ms-box-shadow:0px 0px 30px gray; 
margin: 0 30px 25px 0; /*Margen entre las imágenes*/
}
  </style>";
    }

    public function getTemplateName()
    {
        return "head-style.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<style>
    .hovergallery img{
-webkit-transform:scale(1.0); 
-moz-transform:scale(1.0); 
-o-transform:scale(1.0); 
-ms-transform:scale(1.0); 
-webkit-transition-duration: 0.5s; 
-moz-transition-duration: 0.5s; 
-o-transition-duration: 0.5s; 
-ms-transition-duration: 0.5s;
margin: 0 10px 5px 0; /*Margen entre las imágenes*/
}

.hovergallery img:hover{
-webkit-transform:scale(1.5); /*Webkit: Escala de aumento de la imagen 1.2x tamaño original*/
-moz-transform:scale(1.5); 
-o-transform:scale(1.5); 
-ms-transform:scale(1.5); 
box-shadow:0px 0px 30px gray; /*Sombra sobre toda la imagen*/
-webkit-box-shadow:0px 0px 30px gray; 
-moz-box-shadow:0px 0px 30px gray;
-ms-box-shadow:0px 0px 30px gray; 
margin: 0 30px 25px 0; /*Margen entre las imágenes*/
}
  </style>", "head-style.twig", "/var/www/App/Templates/head-style.twig");
    }
}
