<?php

/* login.html.twig */
class __TwigTemplate_b87c5bd830882bfc31a6863b6e767b817be35463eec591ac46af6ca03c52b93c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("ag_base/backend.html.twig", "login.html.twig", 1);
        $this->blocks = array(
            'body_params' => array($this, 'block_body_params'),
            'container' => array($this, 'block_container'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ag_base/backend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body_params($context, array $blocks = array())
    {
        echo "class=\"skin-black\"";
    }

    // line 5
    public function block_container($context, array $blocks = array())
    {
        // line 6
        echo "
    <div class=\"wrapper row-offcanvas row-offcanvas-left\">

        <aside class=\"left-side sidebar-offcanvas\" style=\"min-height: 100%;\"></aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <aside class=\"right-side\">
            <!-- Content Header (Page header) -->
            <section class=\"content-header\">
                <h1>
                    Connexion
                </h1>
            </section>

            <!-- Main content -->
            <section class=\"content\">

                <div class=\"row\">
                    <div class=\"col-md-6\">

                        <form method=\"POST\" action=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("user.login_check");
        echo "\">
                            <div class=\"box box-info\">
                                <div class=\"box-header\"></div>
                                <div class=\"box-body\">

                                    ";
        // line 31
        if ((isset($context["error"]) ? $context["error"] : $this->getContext($context, "error"))) {
            // line 32
            echo "                                        <div class=\"alert alert-danger\">";
            echo nl2br(twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : $this->getContext($context, "error")), "html", null, true));
            echo "</div>
                                    ";
        }
        // line 34
        echo "
                                    <div class=\"form-group\">
                                        <label class=\"required\" for=\"inputEmail\">Email</label>
                                        <input class=\"form-control\" name=\"_username\" type=\"text\" id=\"inputEmail\" placeholder=\"Email\" required value=\"";
        // line 37
        echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : $this->getContext($context, "last_username")), "html", null, true);
        echo "\">
                                    </div>

                                    <div class=\"form-group\">
                                        <label class=\"required\" for=\"inputPassword\">Mot de passe</label>
                                        <input class=\"form-control\" name=\"_password\" type=\"password\" id=\"inputPassword\" required placeholder=\"Mot de passe\">
                                    </div>

                                    ";
        // line 45
        if ((isset($context["allowRememberMe"]) ? $context["allowRememberMe"] : $this->getContext($context, "allowRememberMe"))) {
            // line 46
            echo "                                        <div class=\"form-group\">
                                            <label>
                                                <input type=\"checkbox\" name=\"_remember_me\" value=\"true\" checked> Se souvenir de moi
                                            </label>
                                        </div>
                                    ";
        }
        // line 52
        echo "
                                </div><!-- ./box-body -->
                                <div class=\"box-footer\">
                                    <button type=\"submit\" class=\"btn btn-primary\">Connexion</button>
                                    ";
        // line 56
        if ((isset($context["allowPasswordReset"]) ? $context["allowPasswordReset"] : $this->getContext($context, "allowPasswordReset"))) {
            // line 57
            echo "                                        <a style=\"margin-left: 10px;\" href=\"";
            echo $this->env->getExtension('routing')->getPath("user.forgot-password");
            echo "\">Mot de passe oublié ?</a>
                                    ";
        }
        // line 59
        echo "                                </div>
                            </div>
                        </form>

                    </div>
                </div>

            </section><!-- /.content -->
        </aside><!-- /.right-side -->
    </div><!-- ./wrapper -->

";
    }

    public function getTemplateName()
    {
        return "login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 59,  110 => 57,  108 => 56,  102 => 52,  94 => 46,  92 => 45,  81 => 37,  76 => 34,  70 => 32,  68 => 31,  60 => 26,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'ag_base/backend.html.twig' %}*/
/* */
/* {% block body_params %}class="skin-black"{% endblock %}*/
/* */
/* {% block container %}*/
/* */
/*     <div class="wrapper row-offcanvas row-offcanvas-left">*/
/* */
/*         <aside class="left-side sidebar-offcanvas" style="min-height: 100%;"></aside>*/
/* */
/*         <!-- Right side column. Contains the navbar and content of the page -->*/
/*         <aside class="right-side">*/
/*             <!-- Content Header (Page header) -->*/
/*             <section class="content-header">*/
/*                 <h1>*/
/*                     Connexion*/
/*                 </h1>*/
/*             </section>*/
/* */
/*             <!-- Main content -->*/
/*             <section class="content">*/
/* */
/*                 <div class="row">*/
/*                     <div class="col-md-6">*/
/* */
/*                         <form method="POST" action="{{ path('user.login_check') }}">*/
/*                             <div class="box box-info">*/
/*                                 <div class="box-header"></div>*/
/*                                 <div class="box-body">*/
/* */
/*                                     {% if error %}*/
/*                                         <div class="alert alert-danger">{{ error|nl2br }}</div>*/
/*                                     {% endif %}*/
/* */
/*                                     <div class="form-group">*/
/*                                         <label class="required" for="inputEmail">Email</label>*/
/*                                         <input class="form-control" name="_username" type="text" id="inputEmail" placeholder="Email" required value="{{ last_username }}">*/
/*                                     </div>*/
/* */
/*                                     <div class="form-group">*/
/*                                         <label class="required" for="inputPassword">Mot de passe</label>*/
/*                                         <input class="form-control" name="_password" type="password" id="inputPassword" required placeholder="Mot de passe">*/
/*                                     </div>*/
/* */
/*                                     {% if allowRememberMe %}*/
/*                                         <div class="form-group">*/
/*                                             <label>*/
/*                                                 <input type="checkbox" name="_remember_me" value="true" checked> Se souvenir de moi*/
/*                                             </label>*/
/*                                         </div>*/
/*                                     {% endif %}*/
/* */
/*                                 </div><!-- ./box-body -->*/
/*                                 <div class="box-footer">*/
/*                                     <button type="submit" class="btn btn-primary">Connexion</button>*/
/*                                     {% if allowPasswordReset %}*/
/*                                         <a style="margin-left: 10px;" href="{{ path('user.forgot-password') }}">Mot de passe oublié ?</a>*/
/*                                     {% endif %}*/
/*                                 </div>*/
/*                             </div>*/
/*                         </form>*/
/* */
/*                     </div>*/
/*                 </div>*/
/* */
/*             </section><!-- /.content -->*/
/*         </aside><!-- /.right-side -->*/
/*     </div><!-- ./wrapper -->*/
/* */
/* {% endblock %}*/
/* */
