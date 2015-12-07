<?php

/* ag_base/backend.html.twig */
class __TwigTemplate_12cdd859a7d474ad1a1e2dfb30e725975366ea6453828a39ebca860456907e43 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("ag_base/base.html.twig", "ag_base/backend.html.twig", 1);
        $this->blocks = array(
            'stylesheets' => array($this, 'block_stylesheets'),
            'body_params' => array($this, 'block_body_params'),
            'header' => array($this, 'block_header'),
            'container' => array($this, 'block_container'),
            'footer' => array($this, 'block_footer'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "ag_base/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 4
        echo "    <!-- bootstrap 3.0.2 -->
    <link href=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/bootstrap.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- font Awesome -->
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- Ionicons -->
    <link href=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/ionicons.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- Morris chart -->
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/morris/morris.css\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- jvectormap -->
    <link href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/jvectormap/jquery-jvectormap-1.2.2.css\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- DATA TABLES -->
    <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/datatables/dataTables.bootstrap.css\" rel=\"stylesheet\" type=\"text/css\" />    
    <!-- bootstrap wysihtml5 - text editor -->
    <link href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/chosen/chosen.css\" rel=\"stylesheet\" type=\"text/css\" />
    <link href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css\" rel=\"stylesheet\" type=\"text/css\" />
    <!-- Theme style -->
    <link href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/css/AdminLTE.css\" rel=\"stylesheet\" type=\"text/css\" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src=\"https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js\"></script>
      <script src=\"https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js\"></script>
    <![endif]-->

";
    }

    // line 31
    public function block_body_params($context, array $blocks = array())
    {
        echo "class=\"skin-black\"";
    }

    // line 33
    public function block_header($context, array $blocks = array())
    {
        // line 34
        $this->loadTemplate("ag_header.html.twig", "ag_base/backend.html.twig", 34)->display($context);
    }

    // line 37
    public function block_container($context, array $blocks = array())
    {
    }

    // line 40
    public function block_footer($context, array $blocks = array())
    {
        // line 41
        $this->loadTemplate("ag_footer.html.twig", "ag_base/backend.html.twig", 41)->display($context);
    }

    // line 44
    public function block_javascripts($context, array $blocks = array())
    {
        // line 45
        echo "    <!-- jQuery 2.0.2 -->
    <script src=\"http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js\"></script>
    <!-- jQuery UI 1.10.3 -->
    <script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/jquery-ui-1.10.3.min.js\" type=\"text/javascript\"></script>
    <!-- Bootstrap -->
    <script src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/bootstrap.min.js\" type=\"text/javascript\"></script>
    <!-- Morris.js charts -->
    <script src=\"//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js\"></script>
    <script src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/morris/morris.min.js\" type=\"text/javascript\"></script>
    <!-- Sparkline -->
    <script src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/sparkline/jquery.sparkline.min.js\" type=\"text/javascript\"></script>
    <!-- jvectormap -->
    <script src=\"";
        // line 57
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 58
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js\" type=\"text/javascript\"></script>
    <!-- jQuery Knob Chart -->
    <script src=\"";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/jqueryKnob/jquery.knob.js\" type=\"text/javascript\"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src=\"";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js\" type=\"text/javascript\"></script>
    <!-- iCheck -->
    <script src=\"";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/iCheck/icheck.min.js\" type=\"text/javascript\"></script>
    <!-- DATA TABES SCRIPT -->
    <script src=\"//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 67
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/datatables/dataTables.bootstrap.js\" type=\"text/javascript\"></script>
    <script src=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/plugins/chosen/chosen.jquery.min.js\" type=\"text/javascript\"></script>
    <!-- AdminLTE App -->
    <script src=\"";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "asset_path", array()), "html", null, true);
        echo "/js/AdminLTE/app.js\" type=\"text/javascript\"></script>

    <script type=\"text/javascript\">
        \$(function() {
            \$(\".textarea\").wysihtml5();
        });
    </script>

    <script>

        (function(\$) {

            \$(document).ready(function(){
                \$(\".chosen-select\").chosen({include_group_label_in_selected:false});
            });


        })(jQuery);
    </script>

";
    }

    public function getTemplateName()
    {
        return "ag_base/backend.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 70,  175 => 68,  171 => 67,  165 => 64,  160 => 62,  155 => 60,  150 => 58,  146 => 57,  141 => 55,  136 => 53,  130 => 50,  125 => 48,  120 => 45,  117 => 44,  113 => 41,  110 => 40,  105 => 37,  101 => 34,  98 => 33,  92 => 31,  78 => 20,  73 => 18,  69 => 17,  64 => 15,  59 => 13,  54 => 11,  49 => 9,  44 => 7,  39 => 5,  36 => 4,  33 => 3,  11 => 1,);
    }
}
/* {% extends 'ag_base/base.html.twig' %}*/
/* */
/* {% block stylesheets %}*/
/*     <!-- bootstrap 3.0.2 -->*/
/*     <link href="{{ app.asset_path }}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />*/
/*     <!-- font Awesome -->*/
/*     <link href="{{ app.asset_path }}/css/font-awesome.min.css" rel="stylesheet" type="text/css" />*/
/*     <!-- Ionicons -->*/
/*     <link href="{{ app.asset_path }}/css/ionicons.min.css" rel="stylesheet" type="text/css" />*/
/*     <!-- Morris chart -->*/
/*     <link href="{{ app.asset_path }}/css/morris/morris.css" rel="stylesheet" type="text/css" />*/
/*     <!-- jvectormap -->*/
/*     <link href="{{ app.asset_path }}/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />*/
/*     <!-- DATA TABLES -->*/
/*     <link href="{{ app.asset_path }}/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />    */
/*     <!-- bootstrap wysihtml5 - text editor -->*/
/*     <link href="{{ app.asset_path }}/js/plugins/chosen/chosen.css" rel="stylesheet" type="text/css" />*/
/*     <link href="{{ app.asset_path }}/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />*/
/*     <!-- Theme style -->*/
/*     <link href="{{ app.asset_path }}/css/AdminLTE.css" rel="stylesheet" type="text/css" />*/
/* */
/*     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->*/
/*     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->*/
/*     <!--[if lt IE 9]>*/
/*       <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>*/
/*       <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>*/
/*     <![endif]-->*/
/* */
/* {% endblock %}*/
/* */
/* {% block body_params %}class="skin-black"{% endblock %}*/
/* */
/* {% block header %}*/
/* {% include 'ag_header.html.twig' %}*/
/* {% endblock %}*/
/* */
/* {% block container %}*/
/* {% endblock %}*/
/* */
/* {% block footer %}*/
/* {% include 'ag_footer.html.twig' %}*/
/* {% endblock %}*/
/* */
/* {% block javascripts %}*/
/*     <!-- jQuery 2.0.2 -->*/
/*     <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>*/
/*     <!-- jQuery UI 1.10.3 -->*/
/*     <script src="{{ app.asset_path }}/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>*/
/*     <!-- Bootstrap -->*/
/*     <script src="{{ app.asset_path }}/js/bootstrap.min.js" type="text/javascript"></script>*/
/*     <!-- Morris.js charts -->*/
/*     <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>*/
/*     <script src="{{ app.asset_path }}/js/plugins/morris/morris.min.js" type="text/javascript"></script>*/
/*     <!-- Sparkline -->*/
/*     <script src="{{ app.asset_path }}/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>*/
/*     <!-- jvectormap -->*/
/*     <script src="{{ app.asset_path }}/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>*/
/*     <script src="{{ app.asset_path }}/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>*/
/*     <!-- jQuery Knob Chart -->*/
/*     <script src="{{ app.asset_path }}/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>*/
/*     <!-- Bootstrap WYSIHTML5 -->*/
/*     <script src="{{ app.asset_path }}/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>*/
/*     <!-- iCheck -->*/
/*     <script src="{{ app.asset_path }}/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>*/
/*     <!-- DATA TABES SCRIPT -->*/
/*     <script src="//cdn.datatables.net/1.10.3/js/jquery.dataTables.min.js" type="text/javascript"></script>*/
/*     <script src="{{ app.asset_path }}/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>*/
/*     <script src="{{ app.asset_path }}/js/plugins/chosen/chosen.jquery.min.js" type="text/javascript"></script>*/
/*     <!-- AdminLTE App -->*/
/*     <script src="{{ app.asset_path }}/js/AdminLTE/app.js" type="text/javascript"></script>*/
/* */
/*     <script type="text/javascript">*/
/*         $(function() {*/
/*             $(".textarea").wysihtml5();*/
/*         });*/
/*     </script>*/
/* */
/*     <script>*/
/* */
/*         (function($) {*/
/* */
/*             $(document).ready(function(){*/
/*                 $(".chosen-select").chosen({include_group_label_in_selected:false});*/
/*             });*/
/* */
/* */
/*         })(jQuery);*/
/*     </script>*/
/* */
/* {% endblock %}*/
