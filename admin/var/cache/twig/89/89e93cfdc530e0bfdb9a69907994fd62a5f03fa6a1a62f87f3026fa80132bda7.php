<?php

/* ag_header.html.twig */
class __TwigTemplate_6652b6b1ee9adedefdf42e2c2edf49804d3686aac3a94a4e3186664b67723b50 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<header class=\"header\">
    <a href=\"\" class=\"logo\">Cifacom Admin</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class=\"navbar navbar-static-top\" role=\"navigation\">

        <!-- Sidebar toggle button-->
        <a href=\"#\" class=\"navbar-btn sidebar-toggle\" data-toggle=\"offcanvas\" role=\"button\">
            <span class=\"sr-only\">Toggle navigation</span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
            <span class=\"icon-bar\"></span>
        </a>

        <ul class=\"nav navbar-nav navbar-right\" style=\"margin-right: 0;\">

            ";
        // line 16
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array())) {
            // line 17
            echo "                <li class=\"dropdown\">
                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                        Bonjour, ";
            // line 19
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "displayName", array()), "html", null, true);
            echo "
                        <span class=\"caret\"></span>
                    </a>
                    <ul class=\"dropdown-menu\" role=\"menu\">
                        <li><a href=\"";
            // line 23
            echo $this->env->getExtension('routing')->getPath("user");
            echo "\"><span class=\"glyphicon glyphicon-user\"></span> Voir votre profil</a></li>
                        <li><a href=\"";
            // line 24
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user.edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "id", array()))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-edit\"></span> Modifier votre profil</a></li>
                        <li><a href=\"";
            // line 25
            echo $this->env->getExtension('routing')->getPath("user.logout");
            echo "\"><span class=\"glyphicon glyphicon-off\"></span> Déconnexion</a></li>
                    </ul>
                </li>
            ";
        }
        // line 29
        echo "        </ul>

    </nav>
</header>";
    }

    public function getTemplateName()
    {
        return "ag_header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 29,  57 => 25,  53 => 24,  49 => 23,  42 => 19,  38 => 17,  36 => 16,  19 => 1,);
    }
}
/* <header class="header">*/
/*     <a href="" class="logo">Cifacom Admin</a>*/
/*     <!-- Header Navbar: style can be found in header.less -->*/
/*     <nav class="navbar navbar-static-top" role="navigation">*/
/* */
/*         <!-- Sidebar toggle button-->*/
/*         <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">*/
/*             <span class="sr-only">Toggle navigation</span>*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*             <span class="icon-bar"></span>*/
/*         </a>*/
/* */
/*         <ul class="nav navbar-nav navbar-right" style="margin-right: 0;">*/
/* */
/*             {% if app.user %}*/
/*                 <li class="dropdown">*/
/*                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">*/
/*                         Bonjour, {{ app.user.displayName }}*/
/*                         <span class="caret"></span>*/
/*                     </a>*/
/*                     <ul class="dropdown-menu" role="menu">*/
/*                         <li><a href="{{ path('user') }}"><span class="glyphicon glyphicon-user"></span> Voir votre profil</a></li>*/
/*                         <li><a href="{{ path('user.edit', { id: app.user.id }) }}"><span class="glyphicon glyphicon-edit"></span> Modifier votre profil</a></li>*/
/*                         <li><a href="{{ path('user.logout') }}"><span class="glyphicon glyphicon-off"></span> Déconnexion</a></li>*/
/*                     </ul>*/
/*                 </li>*/
/*             {% endif %}*/
/*         </ul>*/
/* */
/*     </nav>*/
/* </header>*/
