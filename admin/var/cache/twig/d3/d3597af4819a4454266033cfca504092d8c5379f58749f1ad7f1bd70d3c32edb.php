<?php

/* ag_base/base.html.twig */
class __TwigTemplate_fbf47fd5cd806c05c52ef25a813cce4402643b45dccabc0cd30c1c1b8a0c6855 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'head_javascripts' => array($this, 'block_head_javascripts'),
            'body_params' => array($this, 'block_body_params'),
            'body' => array($this, 'block_body'),
            'header' => array($this, 'block_header'),
            'container' => array($this, 'block_container'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 8
        echo "        ";
        $this->displayBlock('head_javascripts', $context, $blocks);
        // line 9
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/favicon.ico\" />
    </head>
    <body ";
        // line 11
        $this->displayBlock('body_params', $context, $blocks);
        echo ">
        ";
        // line 12
        $this->displayBlock('body', $context, $blocks);
        // line 17
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 18
        echo "    </body>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Cifacom Admin";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 8
    public function block_head_javascripts($context, array $blocks = array())
    {
    }

    // line 11
    public function block_body_params($context, array $blocks = array())
    {
    }

    // line 12
    public function block_body($context, array $blocks = array())
    {
        // line 13
        echo "            ";
        $this->displayBlock('header', $context, $blocks);
        // line 14
        echo "            ";
        $this->displayBlock('container', $context, $blocks);
        // line 15
        echo "            ";
        $this->displayBlock('footer', $context, $blocks);
        // line 16
        echo "        ";
    }

    // line 13
    public function block_header($context, array $blocks = array())
    {
    }

    // line 14
    public function block_container($context, array $blocks = array())
    {
    }

    // line 15
    public function block_footer($context, array $blocks = array())
    {
    }

    // line 17
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "ag_base/base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 17,  112 => 15,  107 => 14,  102 => 13,  98 => 16,  95 => 15,  92 => 14,  89 => 13,  86 => 12,  81 => 11,  76 => 8,  71 => 7,  65 => 6,  59 => 18,  56 => 17,  54 => 12,  50 => 11,  44 => 9,  41 => 8,  39 => 7,  35 => 6,  28 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />*/
/*         <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>*/
/*         <title>{% block title %}Cifacom Admin{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         {% block head_javascripts %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ app.asset_path }}/favicon.ico" />*/
/*     </head>*/
/*     <body {% block body_params %}{% endblock %}>*/
/*         {% block body %}*/
/*             {% block header %}{% endblock %}*/
/*             {% block container %}{% endblock %}*/
/*             {% block footer %}{% endblock %}*/
/*         {% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
