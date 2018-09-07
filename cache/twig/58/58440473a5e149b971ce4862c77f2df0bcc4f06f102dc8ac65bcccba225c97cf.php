<?php

/* layout/layout.twig */
class __TwigTemplate_9284e267204d972902a013566fda3222aedc2f508f163b24096bdeed44f57e76 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/base.twig", "layout/layout.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'page_content' => array($this, 'block_page_content'),
            'menu' => array($this, 'block_menu'),
            'below_menu' => array($this, 'block_below_menu'),
            'leftnav' => array($this, 'block_leftnav'),
            'control_panel' => array($this, 'block_control_panel'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "  ";
        $this->displayBlock("menu", $context, $blocks);
        echo "
  <div class=\"container\">
    <div class=\"row\">
      ";
        // line 7
        $this->displayBlock("control_panel", $context, $blocks);
        echo "
      ";
        // line 8
        $this->displayBlock("leftnav", $context, $blocks);
        echo "
    </div>
    <div class=\"row\">
      ";
        // line 11
        $this->displayBlock('page_content', $context, $blocks);
        // line 12
        echo "    </div>
    <div class=\"row\">
      ";
        // line 14
        $this->displayBlock("footer", $context, $blocks);
        echo "
    </div>
  </div>
";
    }

    // line 11
    public function block_page_content($context, array $blocks = array())
    {
        echo "";
    }

    // line 19
    public function block_menu($context, array $blocks = array())
    {
        // line 20
        echo "  <nav>
    <div class=\"container\">
      <div class=\"title\">
        <a href=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "index.html"), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "config", array(0 => "title"), "method"), "html", null, true);
        echo "</a>
      </div>
      <ul>
        <li><a href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "classes.html"), "html", null, true);
        echo "\">Classes</a></li>
        ";
        // line 27
        if (($context["has_namespaces"] ?? $this->getContext($context, "has_namespaces"))) {
            // line 28
            echo "          <li><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "namespaces.html"), "html", null, true);
            echo "\">Namespaces</a></li>
        ";
        }
        // line 30
        echo "        <li><a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "interfaces.html"), "html", null, true);
        echo "\">Interfaces</a></li>
        <li><a href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "traits.html"), "html", null, true);
        echo "\">Traits</a></li>
        <li><a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "doc-index.html"), "html", null, true);
        echo "\">Index</a></li>
        <li><a href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, "search.html"), "html", null, true);
        echo "\">Search</a></li>
      </ul>
      ";
        // line 35
        $this->displayBlock('below_menu', $context, $blocks);
        // line 36
        echo "    </div>
  </nav>
";
    }

    // line 35
    public function block_below_menu($context, array $blocks = array())
    {
    }

    // line 40
    public function block_leftnav($context, array $blocks = array())
    {
        // line 41
        echo "  <div id=\"api-tree\"></div>
";
    }

    // line 44
    public function block_control_panel($context, array $blocks = array())
    {
        // line 45
        echo "  <div id=\"control-panel\">
    ";
        // line 46
        if ((twig_length_filter($this->env, $this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "versions", array())) > 1)) {
            // line 47
            echo "      <form action=\"#\" method=\"GET\">
        <select id=\"version-switcher\" name=\"version\">
          ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "versions", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["version"]) {
                // line 50
                echo "            <option
                value=\"";
                // line 51
                echo twig_escape_filter($this->env, $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForStaticFile($context, (("../" . $context["version"]) . "/index.html")), "html", null, true);
                echo "\"";
                echo ((($context["version"] == $this->getAttribute(($context["project"] ?? $this->getContext($context, "project")), "version", array()))) ? (" selected") : (""));
                echo ">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["version"], "longname", array()), "html", null, true);
                echo "</option>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['version'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "        </select>
      </form>
    ";
        }
        // line 56
        echo "  </div>
";
    }

    // line 59
    public function block_footer($context, array $blocks = array())
    {
        // line 60
        echo "  <div id=\"footer\">
    Generated by <a href=\"http://sami.sensiolabs.org/\">Sami, the API Documentation Generator</a> using <a href=\"https://github.com/nochso/sami-theme\">nochso/sami-theme</a>.
  </div>
";
    }

    public function getTemplateName()
    {
        return "layout/layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 60,  182 => 59,  177 => 56,  172 => 53,  160 => 51,  157 => 50,  153 => 49,  149 => 47,  147 => 46,  144 => 45,  141 => 44,  136 => 41,  133 => 40,  128 => 35,  122 => 36,  120 => 35,  115 => 33,  111 => 32,  107 => 31,  102 => 30,  96 => 28,  94 => 27,  90 => 26,  82 => 23,  77 => 20,  74 => 19,  68 => 11,  60 => 14,  56 => 12,  54 => 11,  48 => 8,  44 => 7,  37 => 4,  34 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout/base.twig\" %}

{% block content %}
  {{ block('menu') }}
  <div class=\"container\">
    <div class=\"row\">
      {{ block('control_panel') }}
      {{ block('leftnav') }}
    </div>
    <div class=\"row\">
      {% block page_content '' %}
    </div>
    <div class=\"row\">
      {{ block('footer') }}
    </div>
  </div>
{% endblock %}

{% block menu %}
  <nav>
    <div class=\"container\">
      <div class=\"title\">
        <a href=\"{{ path('index.html') }}\">{{ project.config('title') }}</a>
      </div>
      <ul>
        <li><a href=\"{{ path('classes.html') }}\">Classes</a></li>
        {% if has_namespaces %}
          <li><a href=\"{{ path('namespaces.html') }}\">Namespaces</a></li>
        {% endif %}
        <li><a href=\"{{ path('interfaces.html') }}\">Interfaces</a></li>
        <li><a href=\"{{ path('traits.html') }}\">Traits</a></li>
        <li><a href=\"{{ path('doc-index.html') }}\">Index</a></li>
        <li><a href=\"{{ path('search.html') }}\">Search</a></li>
      </ul>
      {% block below_menu %}{% endblock %}
    </div>
  </nav>
{% endblock %}

{% block leftnav %}
  <div id=\"api-tree\"></div>
{% endblock %}

{% block control_panel %}
  <div id=\"control-panel\">
    {% if project.versions|length > 1 %}
      <form action=\"#\" method=\"GET\">
        <select id=\"version-switcher\" name=\"version\">
          {% for version in project.versions %}
            <option
                value=\"{{ path('../' ~ version ~ '/index.html') }}\"{{ version == project.version ? ' selected' : '' }}>{{ version.longname }}</option>
          {% endfor %}
        </select>
      </form>
    {% endif %}
  </div>
{% endblock %}

{% block footer %}
  <div id=\"footer\">
    Generated by <a href=\"http://sami.sensiolabs.org/\">Sami, the API Documentation Generator</a> using <a href=\"https://github.com/nochso/sami-theme\">nochso/sami-theme</a>.
  </div>
{% endblock %}
", "layout/layout.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/layout/layout.twig");
    }
}
