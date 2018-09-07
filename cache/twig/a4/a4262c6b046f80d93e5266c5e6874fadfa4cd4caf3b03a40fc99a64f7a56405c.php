<?php

/* namespaces.twig */
class __TwigTemplate_7677c9224fff99e28b47344f87985cdafde1c547ec8feabbbaab1eb538e8e31d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "namespaces.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_content' => array($this, 'block_page_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Namespaces | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 3
    public function block_body_class($context, array $blocks = array())
    {
        echo "namespaces";
    }

    // line 5
    public function block_page_content($context, array $blocks = array())
    {
        // line 6
        echo "  <h1>Namespaces</h1>

  ";
        // line 8
        if (($context["namespaces"] ?? $this->getContext($context, "namespaces"))) {
            // line 9
            echo "    ";
            $context["last_name"] = "";
            // line 10
            echo "    <table class=\"table\">
    ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["namespaces"] ?? $this->getContext($context, "namespaces")));
            foreach ($context['_seq'] as $context["_key"] => $context["namespace"]) {
                // line 12
                echo "      ";
                $context["top_level"] = twig_first($this->env, twig_split_filter($this->env, $context["namespace"], "\\"));
                // line 13
                echo "      ";
                if ((($context["top_level"] ?? $this->getContext($context, "top_level")) != ($context["last_name"] ?? $this->getContext($context, "last_name")))) {
                    // line 14
                    echo "        <tr><td colspan=\"2\"><h2>";
                    echo twig_escape_filter($this->env, ($context["top_level"] ?? $this->getContext($context, "top_level")), "html", null, true);
                    echo "</h2></td></tr>
        ";
                    // line 15
                    $context["last_name"] = ($context["top_level"] ?? $this->getContext($context, "top_level"));
                    // line 16
                    echo "      ";
                }
                // line 17
                echo "      <tr>
        <td><div class=\"circle circle-n\">N</div></td>
        <td><a href=\"";
                // line 19
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, $context["namespace"]);
                echo "\">";
                echo twig_escape_filter($this->env, $context["namespace"], "html", null, true);
                echo "</a></td>
      </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['namespace'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 22
            echo "    </table>
  ";
        }
        // line 24
        echo "
";
    }

    public function getTemplateName()
    {
        return "namespaces.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 24,  93 => 22,  82 => 19,  78 => 17,  75 => 16,  73 => 15,  68 => 14,  65 => 13,  62 => 12,  58 => 11,  55 => 10,  52 => 9,  50 => 8,  46 => 6,  43 => 5,  37 => 3,  30 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout/layout.twig\" %}
{% block title %}Namespaces | {{ parent() }}{% endblock %}
{% block body_class 'namespaces' %}

{% block page_content %}
  <h1>Namespaces</h1>

  {% if namespaces %}
    {% set last_name = '' %}
    <table class=\"table\">
    {% for namespace in namespaces %}
      {% set top_level = namespace|split('\\\\')|first %}
      {% if top_level != last_name %}
        <tr><td colspan=\"2\"><h2>{{ top_level }}</h2></td></tr>
        {% set last_name = top_level %}
      {% endif %}
      <tr>
        <td><div class=\"circle circle-n\">N</div></td>
        <td><a href=\"{{ namespace_path(namespace) }}\">{{ namespace }}</a></td>
      </tr>
    {% endfor %}
    </table>
  {% endif %}

{% endblock %}
", "namespaces.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/namespaces.twig");
    }
}
