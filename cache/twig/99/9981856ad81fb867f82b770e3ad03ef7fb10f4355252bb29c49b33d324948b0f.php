<?php

/* layout/base.twig */
class __TwigTemplate_290b99c44a1692d13828256bb45e446ee3c62a89616365ae05bcbf16b76505e1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
            'html' => array($this, 'block_html'),
            'body_class' => array($this, 'block_body_class'),
            'page_id' => array($this, 'block_page_id'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        ob_start();
        // line 2
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\" />
    <meta name=\"robots\" content=\"index, follow, all\" />
    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

    ";
        // line 9
        $this->displayBlock('head', $context, $blocks);
        // line 19
        echo "
    ";
        // line 20
        if ($this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "config", array(0 => "favicon"), "method")) {
            // line 21
            echo "        <link rel=\"shortcut icon\" href=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "config", array(0 => "favicon"), "method"), "html", null, true);
            echo "\" />
    ";
        }
        // line 23
        echo "
    ";
        // line 24
        if ($this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "config", array(0 => "base_url"), "method")) {
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "versions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 26
                echo "<link rel=\"search\"
                  type=\"application/opensearchdescription+xml\"
                  href=\"";
                // line 28
                echo twig_escape_filter($this->env, twig_replace_filter($this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "config", array(0 => "base_url"), "method"), array("%version%" => $context["version"])), "html", null, true);
                echo "/opensearch.xml\"
                  title=\"";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "config", array(0 => "title"), "method"), "html", null, true);
                echo " (";
                echo twig_escape_filter($this->env, $context["version"], "html", null, true);
                echo ")\" />
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 32
        echo "</head>

";
        // line 34
        $this->displayBlock('html', $context, $blocks);
        // line 39
        echo "
</html>
";
        $extension = $this->env->getExtension('HtmlCompressTwig');
        echo $extension->compress($this->env, ob_get_clean());
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "config", array(0 => "title"), "method"), "html", null, true);
    }

    // line 9
    public function block_head($context, array $blocks = array())
    {
        // line 10
        echo "        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "css/normalize.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "css/min.css"), "html", null, true);
        echo "\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "css/prism.css"), "html", null, true);
        echo "\">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,400italic' rel='stylesheet' type='text/css'>
        <script src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "js/prism.js"), "html", null, true);
        echo "\"></script>
        <meta name=\"MobileOptimized\" content=\"width\">
        <meta name=\"HandheldFriendly\" content=\"true\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">
    ";
    }

    // line 34
    public function block_html($context, array $blocks = array())
    {
        // line 35
        echo "    <body id=\"";
        $this->displayBlock('body_class', $context, $blocks);
        echo "\" data-name=\"";
        $this->displayBlock('page_id', $context, $blocks);
        echo "\" data-root-path=\"";
        echo twig_escape_filter($this->env, ($context["root_path"] ?? $this->getContext($context, "root_path")), "html", null, true);
        echo "\">
        ";
        // line 36
        $this->displayBlock('content', $context, $blocks);
        // line 37
        echo "    </body>
";
    }

    // line 35
    public function block_body_class($context, array $blocks = array())
    {
        echo "";
    }

    public function block_page_id($context, array $blocks = array())
    {
        echo "";
    }

    // line 36
    public function block_content($context, array $blocks = array())
    {
        echo "";
    }

    public function getTemplateName()
    {
        return "layout/base.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 36,  145 => 35,  140 => 37,  138 => 36,  129 => 35,  126 => 34,  117 => 14,  112 => 12,  108 => 11,  103 => 10,  100 => 9,  94 => 7,  86 => 39,  84 => 34,  80 => 32,  69 => 29,  65 => 28,  61 => 26,  57 => 25,  55 => 24,  52 => 23,  46 => 21,  44 => 20,  41 => 19,  39 => 9,  34 => 7,  27 => 2,  25 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% htmlcompress %}
<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\" />
    <meta name=\"robots\" content=\"index, follow, all\" />
    <title>{% block title project.config('title') %}</title>

    {% block head %}
        <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ path('css/normalize.css') }}\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ path('css/min.css') }}\">
        <link rel=\"stylesheet\" type=\"text/css\" href=\"{{ path('css/prism.css') }}\">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700,400italic' rel='stylesheet' type='text/css'>
        <script src=\"{{ path('js/prism.js') }}\"></script>
        <meta name=\"MobileOptimized\" content=\"width\">
        <meta name=\"HandheldFriendly\" content=\"true\">
        <meta name=\"viewport\" content=\"width=device-width,initial-scale=1,maximum-scale=1\">
    {% endblock %}

    {% if project.config('favicon') %}
        <link rel=\"shortcut icon\" href=\"{{ project.config('favicon') }}\" />
    {% endif %}

    {% if project.config('base_url') %}
        {%- for version in project.versions -%}
            <link rel=\"search\"
                  type=\"application/opensearchdescription+xml\"
                  href=\"{{ project.config('base_url')|replace({'%version%': version}) }}/opensearch.xml\"
                  title=\"{{ project.config('title') }} ({{ version }})\" />
        {% endfor -%}
    {% endif %}
</head>

{% block html %}
    <body id=\"{% block body_class '' %}\" data-name=\"{% block page_id '' %}\" data-root-path=\"{{ root_path }}\">
        {% block content '' %}
    </body>
{% endblock %}

</html>
{% endhtmlcompress %}", "layout/base.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/layout/base.twig");
    }
}
