<?php

/* macros.twig */
class __TwigTemplate_e0b9a796cc4a442a19016b189865dac699874d338fcf79f646e66696e8861cbd extends Twig_Template
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
        // line 4
        echo "
";
        // line 14
        echo "
";
        // line 20
        echo "
";
        // line 24
        echo "
";
        // line 30
        echo "
";
        // line 34
        echo "
";
        // line 56
        echo "
";
        // line 68
        echo "
";
        // line 72
        echo "
";
        // line 78
        echo "
";
        // line 93
        echo "
";
    }

    // line 1
    public function getnamespace_link($__namespace__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "namespace" => $__namespace__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "<a href=\"";
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, ($context["namespace"] ?? $this->getContext($context, "namespace")));
            echo "\">";
            echo twig_escape_filter($this->env, ($context["namespace"] ?? $this->getContext($context, "namespace")), "html", null, true);
            echo "</a>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 5
    public function getclass_link($__class__ = null, $__absolute__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "absolute" => $__absolute__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 6
            if ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "projectclass", array())) {
                // line 7
                echo "<a href=\"";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForClass($context, ($context["class"] ?? $this->getContext($context, "class")));
                echo "\">";
            } elseif ($this->getAttribute(            // line 8
($context["class"] ?? $this->getContext($context, "class")), "phpclass", array())) {
                // line 9
                echo "<a target=\"_blank\" href=\"http://php.net/";
                echo twig_escape_filter($this->env, ($context["class"] ?? $this->getContext($context, "class")), "html", null, true);
                echo "\">";
            }
            // line 11
            echo $this->getAttribute($this, "abbr_class", array(0 => ($context["class"] ?? $this->getContext($context, "class")), 1 => (((isset($context["absolute"]) || array_key_exists("absolute", $context))) ? (_twig_default_filter(($context["absolute"] ?? $this->getContext($context, "absolute")), false)) : (false))), "method");
            // line 12
            if (($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "projectclass", array()) || $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "phpclass", array()))) {
                echo "</a>";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 15
    public function getmethod_link($__method__ = null, $__absolute__ = null, $__classonly__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $__method__,
            "absolute" => $__absolute__,
            "classonly" => $__classonly__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 16
            echo "<a href=\"";
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForMethod($context, ($context["method"] ?? $this->getContext($context, "method")));
            echo "\">";
            // line 17
            echo $this->getAttribute($this, "abbr_class", array(0 => $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "class", array())), "method");
            if ( !(((isset($context["classonly"]) || array_key_exists("classonly", $context))) ? (_twig_default_filter(($context["classonly"] ?? $this->getContext($context, "classonly")), false)) : (false))) {
                echo "::";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "name", array()), "html", null, true);
            }
            // line 18
            echo "</a>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 21
    public function getmethod_link_short($__method__ = null, $__absolute__ = null, $__classonly__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $__method__,
            "absolute" => $__absolute__,
            "classonly" => $__classonly__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 22
            echo "  <a href=\"";
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForMethod($context, ($context["method"] ?? $this->getContext($context, "method")));
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "name", array()), "html", null, true);
            echo "</a>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 25
    public function getproperty_link($__property__ = null, $__absolute__ = null, $__classonly__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "property" => $__property__,
            "absolute" => $__absolute__,
            "classonly" => $__classonly__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 26
            echo "<a href=\"";
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForProperty($context, ($context["property"] ?? $this->getContext($context, "property")));
            echo "\">";
            // line 27
            echo $this->getAttribute($this, "abbr_class", array(0 => $this->getAttribute(($context["property"] ?? $this->getContext($context, "property")), "class", array())), "method");
            if ( !(((isset($context["classonly"]) || array_key_exists("classonly", $context))) ? (_twig_default_filter(($context["classonly"] ?? $this->getContext($context, "classonly")), true)) : (true))) {
                echo "#";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["property"] ?? $this->getContext($context, "property")), "name", array()), "html", null, true);
            }
            // line 28
            echo "</a>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 31
    public function getabbr_class($__class__ = null, $__absolute__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "absolute" => $__absolute__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 32
            echo "<abbr title=\"";
            echo twig_escape_filter($this->env, ($context["class"] ?? $this->getContext($context, "class")), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, (((((isset($context["absolute"]) || array_key_exists("absolute", $context))) ? (_twig_default_filter(($context["absolute"] ?? $this->getContext($context, "absolute")), false)) : (false))) ? (($context["class"] ?? $this->getContext($context, "class"))) : ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "shortname", array()))), "html", null, true);
            echo "</abbr>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 35
    public function getrender_classes($__classes__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "classes" => $__classes__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 37
            echo "<table class=\"table\">
    ";
            // line 38
            $context["prev_namespace"] = "";
            // line 39
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["classes"] ?? $this->getContext($context, "classes")));
            foreach ($context['_seq'] as $context["_key"] => $context["class"]) {
                // line 40
                echo "      ";
                $context["curr_namespace"] = twig_join_filter(twig_split_filter($this->env, $context["class"], "\\",  -1), "\\");
                // line 41
                echo "      ";
                if ((($context["prev_namespace"] ?? $this->getContext($context, "prev_namespace")) != ($context["curr_namespace"] ?? $this->getContext($context, "curr_namespace")))) {
                    // line 42
                    echo "        <tr>
          <td><div class=\"circle circle-n\">N</div></td>
          <td colspan=\"2\"><h3>";
                    // line 44
                    echo twig_escape_filter($this->env, ($context["curr_namespace"] ?? $this->getContext($context, "curr_namespace")), "html", null, true);
                    echo "</h3></td>
        </tr>
    ";
                }
                // line 47
                echo "    <tr>
      <td><div class=\"circle circle-";
                // line 48
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this, "type_short", array(0 => $context["class"]), "method")), "html", null, true);
                echo "\">";
                echo $this->getAttribute($this, "type_short", array(0 => $context["class"]), "method");
                echo "</div></td>
      <td>";
                // line 49
                echo $this->getAttribute($this, "class_link", array(0 => $context["class"], 1 => false), "method");
                echo "</td>
      <td>";
                // line 50
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["class"], "shortdesc", array()), $context["class"]);
                echo "</td>
    </tr>
      ";
                // line 52
                $context["prev_namespace"] = ($context["curr_namespace"] ?? $this->getContext($context, "curr_namespace"));
                // line 53
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['class'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 54
            echo "  </table>";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 57
    public function getbreadcrumbs($__namespace__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "namespace" => $__namespace__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 58
            echo "  ";
            $context["current_ns"] = "";
            // line 59
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, ($context["namespace"] ?? $this->getContext($context, "namespace")), "\\"));
            foreach ($context['_seq'] as $context["_key"] => $context["ns"]) {
                // line 60
                echo "    ";
                if (($context["current_ns"] ?? $this->getContext($context, "current_ns"))) {
                    // line 61
                    echo "      ";
                    $context["current_ns"] = ((($context["current_ns"] ?? $this->getContext($context, "current_ns")) . "\\") . $context["ns"]);
                    // line 62
                    echo "    ";
                } else {
                    // line 63
                    echo "      ";
                    $context["current_ns"] = $context["ns"];
                    // line 64
                    echo "    ";
                }
                // line 65
                echo "    <li><a href=\"";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->pathForNamespace($context, ($context["current_ns"] ?? $this->getContext($context, "current_ns")));
                echo "\">";
                echo twig_escape_filter($this->env, $context["ns"], "html", null, true);
                echo "</a></li>
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ns'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 69
    public function gettype_short($__class__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "class" => $__class__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 70
            if ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "isInterface", array())) {
                echo "I";
            } elseif ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "trait", array())) {
                echo "T";
            } else {
                echo "C";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 73
    public function getsource_link($__project__ = null, $__class__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "project" => $__project__,
            "class" => $__class__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 74
            if ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "sourcepath", array())) {
                // line 75
                echo "    (<a href=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "sourcepath", array()), "html", null, true);
                echo "\">View source</a>)";
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 79
    public function gethint_link($__hints__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "hints" => $__hints__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 80
            $context["__internal_6b112fd4bf5524fb3c6289a4f521344b99d8d9ea141236eeba014d0d1aee5f40"] = $this;
            // line 81
            if (($context["hints"] ?? $this->getContext($context, "hints"))) {
                // line 82
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["hints"] ?? $this->getContext($context, "hints")));
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
                foreach ($context['_seq'] as $context["_key"] => $context["hint"]) {
                    // line 83
                    if ($this->getAttribute($context["hint"], "class", array())) {
                        // line 84
                        echo $context["__internal_6b112fd4bf5524fb3c6289a4f521344b99d8d9ea141236eeba014d0d1aee5f40"]->getclass_link($this->getAttribute($context["hint"], "name", array()));
                    } elseif ($this->getAttribute(                    // line 85
$context["hint"], "name", array())) {
                        // line 86
                        echo $this->env->getExtension('Sami\Renderer\TwigExtension')->abbrClass($this->getAttribute($context["hint"], "name", array()));
                    }
                    // line 88
                    if ($this->getAttribute($context["hint"], "array", array())) {
                        echo "[]";
                    }
                    // line 89
                    if ( !$this->getAttribute($context["loop"], "last", array())) {
                        echo "|";
                    }
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
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['hint'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 94
    public function getmethod_parameters_signature($__method__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "method" => $__method__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 95
            $context["__internal_220e18274ed22634cf8515f77449a907434240840c976ffb44ccfcb5f0e20ea8"] = $this->loadTemplate("macros.twig", "macros.twig", 95);
            // line 96
            echo "(";
            // line 97
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "parameters", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
                // line 98
                if ($this->getAttribute($context["parameter"], "hashint", array())) {
                    echo $context["__internal_220e18274ed22634cf8515f77449a907434240840c976ffb44ccfcb5f0e20ea8"]->gethint_link($this->getAttribute($context["parameter"], "hint", array()));
                    echo " ";
                }
                // line 99
                echo "\$";
                echo twig_escape_filter($this->env, $this->getAttribute($context["parameter"], "name", array()), "html", null, true);
                // line 100
                if ($this->getAttribute($context["parameter"], "default", array())) {
                    echo " = ";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["parameter"], "default", array()), "html", null, true);
                }
                // line 101
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo ", ";
                }
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 103
            echo ")";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  615 => 103,  599 => 101,  594 => 100,  591 => 99,  586 => 98,  569 => 97,  567 => 96,  565 => 95,  553 => 94,  523 => 89,  519 => 88,  516 => 86,  514 => 85,  512 => 84,  510 => 83,  493 => 82,  491 => 81,  489 => 80,  477 => 79,  459 => 75,  457 => 74,  444 => 73,  423 => 70,  411 => 69,  387 => 65,  384 => 64,  381 => 63,  378 => 62,  375 => 61,  372 => 60,  367 => 59,  364 => 58,  352 => 57,  337 => 54,  331 => 53,  329 => 52,  324 => 50,  320 => 49,  314 => 48,  311 => 47,  305 => 44,  301 => 42,  298 => 41,  295 => 40,  290 => 39,  288 => 38,  285 => 37,  273 => 35,  254 => 32,  241 => 31,  226 => 28,  220 => 27,  216 => 26,  202 => 25,  183 => 22,  169 => 21,  154 => 18,  148 => 17,  144 => 16,  130 => 15,  113 => 12,  111 => 11,  106 => 9,  104 => 8,  100 => 7,  98 => 6,  85 => 5,  66 => 2,  54 => 1,  49 => 93,  46 => 78,  43 => 72,  40 => 68,  37 => 56,  34 => 34,  31 => 30,  28 => 24,  25 => 20,  22 => 14,  19 => 4,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% macro namespace_link(namespace) -%}
  <a href=\"{{ namespace_path(namespace) }}\">{{ namespace }}</a>
{%- endmacro %}

{% macro class_link(class, absolute) -%}
  {%- if class.projectclass -%}
    <a href=\"{{ class_path(class) }}\">
  {%- elseif class.phpclass -%}
    <a target=\"_blank\" href=\"http://php.net/{{ class }}\">
  {%- endif %}
  {{- _self.abbr_class(class, absolute|default(false)) }}
  {%- if class.projectclass or class.phpclass %}</a>{% endif %}
{%- endmacro %}

{% macro method_link(method, absolute, classonly) -%}
  <a href=\"{{ method_path(method) }}\">
    {{- _self.abbr_class(method.class) }}{% if not classonly|default(false) %}::{{ method.name }}{% endif -%}
  </a>
{%- endmacro %}

{% macro method_link_short(method, absolute, classonly) %}
  <a href=\"{{ method_path(method) }}\">{{ method.name }}</a>
{%- endmacro %}

{% macro property_link(property, absolute, classonly) -%}
  <a href=\"{{ property_path(property) }}\">
    {{- _self.abbr_class(property.class) }}{% if not classonly|default(true) %}#{{ property.name }}{% endif -%}
  </a>
{%- endmacro %}

{% macro abbr_class(class, absolute) -%}
  <abbr title=\"{{ class }}\">{{ absolute|default(false) ? class : class.shortname }}</abbr>
{%- endmacro %}

{% macro render_classes(classes) -%}

  <table class=\"table\">
    {% set prev_namespace = '' %}
    {% for class in classes %}
      {% set curr_namespace = class|split('\\\\', -1)|join('\\\\')  %}
      {% if prev_namespace != curr_namespace %}
        <tr>
          <td><div class=\"circle circle-n\">N</div></td>
          <td colspan=\"2\"><h3>{{ curr_namespace }}</h3></td>
        </tr>
    {% endif %}
    <tr>
      <td><div class=\"circle circle-{{ _self.type_short(class)|lower }}\">{{ _self.type_short(class) }}</div></td>
      <td>{{ _self.class_link(class, false) }}</td>
      <td>{{ class.shortdesc|desc(class) }}</td>
    </tr>
      {% set prev_namespace = curr_namespace %}
    {% endfor %}
  </table>
{%- endmacro %}

{% macro breadcrumbs(namespace) %}
  {% set current_ns = '' %}
  {% for ns in namespace|split('\\\\') %}
    {% if current_ns %}
      {% set current_ns = current_ns ~ '\\\\' ~ ns %}
    {% else %}
      {% set current_ns = ns %}
    {% endif %}
    <li><a href=\"{{ namespace_path(current_ns) }}\">{{ ns }}</a></li>
  {% endfor %}
{% endmacro %}

{% macro type_short(class) %}
{%- if class.isInterface %}I{% elseif class.trait %}T{% else %}C{% endif -%}
{% endmacro %}

{% macro source_link(project, class) -%}
  {% if class.sourcepath %}
    (<a href=\"{{ class.sourcepath }}\">View source</a>)
  {%- endif %}
{%- endmacro %}

{% macro hint_link(hints) -%}
  {% from _self import class_link %}
  {%- if hints %}
    {%- for hint in hints %}
      {%- if hint.class %}
        {{- class_link(hint.name) }}
      {%- elseif hint.name %}
        {{- abbr_class(hint.name) }}
      {%- endif %}
      {%- if hint.array %}[]{% endif %}
      {%- if not loop.last %}|{% endif %}
    {%- endfor %}
  {%- endif %}
{%- endmacro %}

{% macro method_parameters_signature(method) -%}
  {%- from \"macros.twig\" import hint_link -%}
  (
  {%- for parameter in method.parameters %}
    {%- if parameter.hashint %}{{ hint_link(parameter.hint) }} {% endif -%}
    \${{ parameter.name }}
    {%- if parameter.default %} = {{ parameter.default }}{% endif %}
    {%- if not loop.last %}, {% endif %}
  {%- endfor -%}
  )
{%- endmacro %}
", "macros.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/macros.twig");
    }
}
