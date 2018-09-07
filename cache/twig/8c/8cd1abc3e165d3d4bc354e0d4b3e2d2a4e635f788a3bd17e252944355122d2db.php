<?php

/* doc-index.twig */
class __TwigTemplate_2afc846665e5a3a164d2435db35a572eab765028c52f67475ff16c00518c07cf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "doc-index.twig", 1);
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
        // line 2
        $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"] = $this->loadTemplate("macros.twig", "doc-index.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Index | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "doc-index";
    }

    // line 6
    public function block_page_content($context, array $blocks = array())
    {
        // line 7
        echo "
  <h1>Index</h1>

  <p>This is an index of the following types:</p>
  <ul>
    <li>Class</li>
    <li>Interface</li>
    <li>Method</li>
    <li>Property</li>
    <li>Trait</li>
  </ul>
  <p>The first column is the type's initial character.</p>
  <hr />
  <ul class=\"pagination\">
    ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? $this->getContext($context, "items")));
        foreach ($context['_seq'] as $context["letter"] => $context["elements"]) {
            // line 22
            echo "      ";
            if (($this->getAttribute(($context["items"] ?? null), $context["letter"], array(), "array", true, true) && (twig_length_filter($this->env, $this->getAttribute(($context["items"] ?? $this->getContext($context, "items")), $context["letter"], array(), "array")) > 1))) {
                // line 23
                echo "        <li><a href=\"#letter";
                echo twig_escape_filter($this->env, $context["letter"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["letter"], "html", null, true);
                echo "</a></li>
      ";
            } else {
                // line 25
                echo "        <li class=\"disabled\"><a href=\"#letter";
                echo twig_escape_filter($this->env, $context["letter"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $context["letter"], "html", null, true);
                echo "</a></li>
      ";
            }
            // line 27
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['letter'], $context['elements'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "  </ul>

  ";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? $this->getContext($context, "items")));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["letter"] => $context["elements"]) {
            // line 31
            echo "<h2 id=\"letter";
            echo twig_escape_filter($this->env, $context["letter"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["letter"], "html", null, true);
            echo "</h2>
    <table class=\"table\">
      ";
            // line 33
            if ($this->getAttribute($context["loop"], "first", array())) {
                // line 34
                echo "        <tr>
          <th></th>
          <th>Name</th>
          <th>Origin</th>
          <th>Description</th>
        </tr>
      ";
            }
            // line 41
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["elements"]);
            foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
                // line 42
                echo "        <tr>";
                // line 43
                $context["type"] = $this->getAttribute($context["element"], 0, array(), "array");
                // line 44
                $context["value"] = $this->getAttribute($context["element"], 1, array(), "array");
                // line 45
                if (("class" == ($context["type"] ?? $this->getContext($context, "type")))) {
                    // line 46
                    echo "<td><div class=\"circle circle-";
                    echo twig_escape_filter($this->env, twig_lower_filter($this->env, $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->gettype_short(($context["value"] ?? $this->getContext($context, "value")))), "html", null, true);
                    echo "\">";
                    echo $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->gettype_short(($context["value"] ?? $this->getContext($context, "value")));
                    echo "</div></td>
          <td>";
                    // line 47
                    echo $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->getclass_link(($context["value"] ?? $this->getContext($context, "value")));
                    echo "</td>
          <td>";
                    // line 48
                    if (($context["has_namespaces"] ?? $this->getContext($context, "has_namespaces"))) {
                        echo $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->getnamespace_link($this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "namespace", array()));
                    }
                    echo "</td>
          <td>";
                    // line 49
                    echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "shortdesc", array()), ($context["value"] ?? $this->getContext($context, "value")));
                    echo "</td>";
                } elseif (("method" ==                 // line 50
($context["type"] ?? $this->getContext($context, "type")))) {
                    // line 51
                    echo "<td><div class=\"circle circle-m\">M</div></td>
          <td>";
                    // line 52
                    echo $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->getmethod_link_short(($context["value"] ?? $this->getContext($context, "value")));
                    echo "()</td>
          <td>";
                    // line 53
                    echo $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->getclass_link($this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "class", array()));
                    echo "</td>
          <td>";
                    // line 54
                    echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "shortdesc", array()), $this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "class", array()));
                    echo "</td>";
                } elseif (("property" ==                 // line 55
($context["type"] ?? $this->getContext($context, "type")))) {
                    // line 56
                    echo "<td><div class=\"circle circle-p\">P</div></td>
          <td>\$";
                    // line 57
                    echo $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->getproperty_link(($context["value"] ?? $this->getContext($context, "value")));
                    echo "</td>
          <td>";
                    // line 58
                    echo $context["__internal_26f469a4e1b467dbb34ae1115f20e1a987fd351797c99d5404de35e086302a02"]->getclass_link($this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "class", array()));
                    echo "</td>
          <td>";
                    // line 59
                    echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "shortdesc", array()), $this->getAttribute(($context["value"] ?? $this->getContext($context, "value")), "class", array()));
                    echo "</td>";
                }
                // line 61
                echo "        </tr>";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "    </table>";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['letter'], $context['elements'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "doc-index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 63,  199 => 61,  195 => 59,  191 => 58,  187 => 57,  184 => 56,  182 => 55,  179 => 54,  175 => 53,  171 => 52,  168 => 51,  166 => 50,  163 => 49,  157 => 48,  153 => 47,  146 => 46,  144 => 45,  142 => 44,  140 => 43,  138 => 42,  134 => 41,  125 => 34,  123 => 33,  115 => 31,  98 => 30,  94 => 28,  88 => 27,  80 => 25,  72 => 23,  69 => 22,  65 => 21,  49 => 7,  46 => 6,  40 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
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
{% from \"macros.twig\" import class_link, namespace_link, method_link, method_link_short, property_link, type_short %}
{% block title %}Index | {{ parent() }}{% endblock %}
{% block body_class 'doc-index' %}

{% block page_content %}

  <h1>Index</h1>

  <p>This is an index of the following types:</p>
  <ul>
    <li>Class</li>
    <li>Interface</li>
    <li>Method</li>
    <li>Property</li>
    <li>Trait</li>
  </ul>
  <p>The first column is the type's initial character.</p>
  <hr />
  <ul class=\"pagination\">
    {% for letter, elements in items %}
      {% if items[letter] is defined and items[letter]|length > 1 %}
        <li><a href=\"#letter{{ letter }}\">{{ letter }}</a></li>
      {% else %}
        <li class=\"disabled\"><a href=\"#letter{{ letter }}\">{{ letter }}</a></li>
      {% endif %}
    {% endfor %}
  </ul>

  {% for letter, elements in items -%}
    <h2 id=\"letter{{ letter }}\">{{ letter }}</h2>
    <table class=\"table\">
      {% if loop.first %}
        <tr>
          <th></th>
          <th>Name</th>
          <th>Origin</th>
          <th>Description</th>
        </tr>
      {% endif %}
      {%- for element in elements %}
        <tr>
        {%- set type = element[0] %}
        {%- set value = element[1] %}
        {%- if 'class' == type -%}
          <td><div class=\"circle circle-{{ type_short(value)|lower }}\">{{ type_short(value) }}</div></td>
          <td>{{ class_link(value) }}</td>
          <td>{% if has_namespaces %}{{ namespace_link(value.namespace) }}{% endif %}</td>
          <td>{{ value.shortdesc|desc(value) }}</td>
        {%- elseif 'method' == type -%}
          <td><div class=\"circle circle-m\">M</div></td>
          <td>{{ method_link_short(value) }}()</td>
          <td>{{ class_link(value.class) }}</td>
          <td>{{ value.shortdesc|desc(value.class) }}</td>
        {%- elseif 'property' == type -%}
          <td><div class=\"circle circle-p\">P</div></td>
          <td>\${{ property_link(value) }}</td>
          <td>{{ class_link(value.class) }}</td>
          <td>{{ value.shortdesc|desc(value.class) }}</td>
        {%- endif %}
        </tr>
      {%- endfor %}
    </table>
  {%- endfor %}
{% endblock %}
", "doc-index.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/doc-index.twig");
    }
}
