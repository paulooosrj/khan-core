<?php

/* namespace.twig */
class __TwigTemplate_85e06337a3022575b2d7c89b4b769623413406317796553ed823d5789bf7b4e9 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "namespace.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_id' => array($this, 'block_page_id'),
            'below_menu' => array($this, 'block_below_menu'),
            'page_content' => array($this, 'block_page_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_84d0370d82d8805e93d93290304b710e305865cf98a22a7ace8d0dcd3d469f1d"] = $this->loadTemplate("macros.twig", "namespace.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ($context["namespace"] ?? $this->getContext($context, "namespace")), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "namespace";
    }

    // line 5
    public function block_page_id($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ("namespace:" . twig_replace_filter(($context["namespace"] ?? $this->getContext($context, "namespace")), array("\\" => "_"))), "html", null, true);
    }

    // line 7
    public function block_below_menu($context, array $blocks = array())
    {
        // line 8
        echo "  <ol class=\"breadcrumb\">
    ";
        // line 9
        echo $context["__internal_84d0370d82d8805e93d93290304b710e305865cf98a22a7ace8d0dcd3d469f1d"]->getbreadcrumbs(($context["namespace"] ?? $this->getContext($context, "namespace")));
        echo "
  </ol>
";
    }

    // line 13
    public function block_page_content($context, array $blocks = array())
    {
        // line 14
        echo "  <h1>";
        echo twig_escape_filter($this->env, ($context["namespace"] ?? $this->getContext($context, "namespace")), "html", null, true);
        echo "</h1>

  ";
        // line 16
        if (($context["subnamespaces"] ?? $this->getContext($context, "subnamespaces"))) {
            // line 17
            echo "    <h2>Namespaces</h2>
    <div class=\"namespace-list\">
      ";
            // line 19
            $context["last_name"] = "";
            // line 20
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["subnamespaces"] ?? $this->getContext($context, "subnamespaces")));
            foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
                // line 21
                echo "      ";
                $context["top_level"] = twig_first($this->env, twig_split_filter($this->env, $context["ns"], "\\"));
                // line 22
                echo "      ";
                if ((($context["top_level"] ?? $this->getContext($context, "top_level")) != ($context["last_name"] ?? $this->getContext($context, "last_name")))) {
                    // line 23
                    echo "      ";
                    if (($context["last_name"] ?? $this->getContext($context, "last_name"))) {
                        echo "</ul>";
                    }
                    // line 24
                    echo "      <h3>";
                    echo twig_escape_filter($this->env, ($context["top_level"] ?? $this->getContext($context, "top_level")), "html", null, true);
                    echo "</h3>
      <ul>
        ";
                    // line 26
                    $context["last_name"] = ($context["top_level"] ?? $this->getContext($context, "top_level"));
                    // line 27
                    echo "        ";
                }
                // line 28
                echo "        <li><a href=\"";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, $context["ns"]);
                echo "\">";
                echo twig_escape_filter($this->env, $context["ns"], "html", null, true);
                echo "</a></li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "      </ul>
    </div>
  ";
        }
        // line 33
        echo "
  ";
        // line 34
        if (($context["classes"] ?? $this->getContext($context, "classes"))) {
            // line 35
            echo "    <h2>Classes</h2>
    ";
            // line 36
            echo $context["__internal_84d0370d82d8805e93d93290304b710e305865cf98a22a7ace8d0dcd3d469f1d"]->getrender_classes(($context["classes"] ?? $this->getContext($context, "classes")));
            echo "
  ";
        }
        // line 38
        echo "
  ";
        // line 39
        if (($context["interfaces"] ?? $this->getContext($context, "interfaces"))) {
            // line 40
            echo "    <h2>Interfaces</h2>
    ";
            // line 41
            echo $context["__internal_84d0370d82d8805e93d93290304b710e305865cf98a22a7ace8d0dcd3d469f1d"]->getrender_classes(($context["interfaces"] ?? $this->getContext($context, "interfaces")));
            echo "
  ";
        }
        // line 43
        echo "
  ";
        // line 44
        if (($context["exceptions"] ?? $this->getContext($context, "exceptions"))) {
            // line 45
            echo "    <h2>Exceptions</h2>
    ";
            // line 46
            echo $context["__internal_84d0370d82d8805e93d93290304b710e305865cf98a22a7ace8d0dcd3d469f1d"]->getrender_classes(($context["exceptions"] ?? $this->getContext($context, "exceptions")));
            echo "
  ";
        }
        // line 48
        echo "
";
    }

    public function getTemplateName()
    {
        return "namespace.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 48,  162 => 46,  159 => 45,  157 => 44,  154 => 43,  149 => 41,  146 => 40,  144 => 39,  141 => 38,  136 => 36,  133 => 35,  131 => 34,  128 => 33,  123 => 30,  112 => 28,  109 => 27,  107 => 26,  101 => 24,  96 => 23,  93 => 22,  90 => 21,  85 => 20,  83 => 19,  79 => 17,  77 => 16,  71 => 14,  68 => 13,  61 => 9,  58 => 8,  55 => 7,  49 => 5,  43 => 4,  35 => 3,  31 => 1,  29 => 2,  11 => 1,);
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
{% from \"macros.twig\" import breadcrumbs, render_classes, class_link, namespace_link %}
{% block title %}{{ namespace }} | {{ parent() }}{% endblock %}
{% block body_class 'namespace' %}
{% block page_id 'namespace:' ~ (namespace|replace({'\\\\': '_'})) %}

{% block below_menu %}
  <ol class=\"breadcrumb\">
    {{ breadcrumbs(namespace) }}
  </ol>
{% endblock %}

{% block page_content %}
  <h1>{{ namespace }}</h1>

  {% if subnamespaces %}
    <h2>Namespaces</h2>
    <div class=\"namespace-list\">
      {% set last_name = '' %}
      {% for ns in subnamespaces %}
      {% set top_level = ns|split('\\\\')|first %}
      {% if top_level != last_name %}
      {% if last_name %}</ul>{% endif %}
      <h3>{{ top_level }}</h3>
      <ul>
        {% set last_name = top_level %}
        {% endif %}
        <li><a href=\"{{ namespace_path(ns) }}\">{{ ns }}</a></li>
        {% endfor %}
      </ul>
    </div>
  {% endif %}

  {% if classes %}
    <h2>Classes</h2>
    {{ render_classes(classes) }}
  {% endif %}

  {% if interfaces %}
    <h2>Interfaces</h2>
    {{ render_classes(interfaces) }}
  {% endif %}

  {% if exceptions %}
    <h2>Exceptions</h2>
    {{ render_classes(exceptions) }}
  {% endif %}

{% endblock %}
", "namespace.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/namespace.twig");
    }
}
