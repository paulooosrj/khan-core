<?php

/* traits.twig */
class __TwigTemplate_2c7e107ba92bb0b0b379bdf0f07c72ed1505786ee89e7708b3dcf49ce3a326db extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "traits.twig", 1);
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
        $context["__internal_623ddb1feb436995142493ad4757ed76ceddfc2bf8f93b4608259aa15d260733"] = $this->loadTemplate("macros.twig", "traits.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Traits | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "traits";
    }

    // line 6
    public function block_page_content($context, array $blocks = array())
    {
        // line 7
        echo "  <h1>Traits</h1>

  <table class=\"table\">
  ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["classes"] ?? $this->getContext($context, "classes")));
        foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
            // line 11
            echo "    ";
            if ($this->getAttribute($context["class"], "trait", array())) {
                // line 12
                echo "      <tr>
      <td>";
                // line 13
                echo $context["__internal_623ddb1feb436995142493ad4757ed76ceddfc2bf8f93b4608259aa15d260733"]->getclass_link($context["class"], true);
                echo "</td>
      <td>";
                // line 14
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["class"], "shortdesc", array()), $context["class"]);
                echo "</td>
      </tr>
    ";
            }
            // line 17
            echo "  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "  </table>
";
    }

    public function getTemplateName()
    {
        return "traits.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  80 => 18,  74 => 17,  68 => 14,  64 => 13,  61 => 12,  58 => 11,  54 => 10,  49 => 7,  46 => 6,  40 => 4,  33 => 3,  29 => 1,  27 => 2,  11 => 1,);
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
{% from \"macros.twig\" import class_link %}
{% block title %}Traits | {{ parent() }}{% endblock %}
{% block body_class 'traits' %}

{% block page_content %}
  <h1>Traits</h1>

  <table class=\"table\">
  {% for class in classes %}
    {% if class.trait %}
      <tr>
      <td>{{ class_link(class, true) }}</td>
      <td>{{ class.shortdesc|desc(class) }}</td>
      </tr>
    {% endif %}
  {% endfor %}
  </table>
{% endblock %}
", "traits.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/traits.twig");
    }
}
