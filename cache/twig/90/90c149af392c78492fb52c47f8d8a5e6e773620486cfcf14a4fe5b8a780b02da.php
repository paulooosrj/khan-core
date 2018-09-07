<?php

/* class.twig */
class __TwigTemplate_ebc8bda84bc14c1555f3ea36352344ac876d836edf425711687c1da7c2b33a64 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout/layout.twig", "class.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_class' => array($this, 'block_body_class'),
            'page_id' => array($this, 'block_page_id'),
            'below_menu' => array($this, 'block_below_menu'),
            'page_content' => array($this, 'block_page_content'),
            'class_signature' => array($this, 'block_class_signature'),
            'method_signature' => array($this, 'block_method_signature'),
            'method_parameters_signature' => array($this, 'block_method_parameters_signature'),
            'parameters' => array($this, 'block_parameters'),
            'return' => array($this, 'block_return'),
            'exceptions' => array($this, 'block_exceptions'),
            'see' => array($this, 'block_see'),
            'constants' => array($this, 'block_constants'),
            'properties' => array($this, 'block_properties'),
            'methods' => array($this, 'block_methods'),
            'methods_details' => array($this, 'block_methods_details'),
            'method' => array($this, 'block_method'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 2
        $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"] = $this->loadTemplate("macros.twig", "class.twig", 2);
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "name", array()), "html", null, true);
        echo " | ";
        $this->displayParentBlock("title", $context, $blocks);
    }

    // line 4
    public function block_body_class($context, array $blocks = array())
    {
        echo "class";
    }

    // line 5
    public function block_page_id($context, array $blocks = array())
    {
        echo twig_escape_filter($this->env, ("class:" . twig_replace_filter($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "name", array()), array("\\" => "_"))), "html", null, true);
    }

    // line 7
    public function block_below_menu($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        if ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "namespace", array())) {
            // line 9
            echo "        <ol class=\"breadcrumb\">
            ";
            // line 10
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getbreadcrumbs($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "namespace", array()));
            echo "
            <li>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "shortname", array()), "html", null, true);
            echo "</li>
        </ol>
    ";
        }
    }

    // line 16
    public function block_page_content($context, array $blocks = array())
    {
        // line 17
        echo "    <h1>";
        echo twig_escape_filter($this->env, twig_last($this->env, twig_split_filter($this->env, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "name", array()), "\\")), "html", null, true);
        echo "</h1>

    <p>";
        // line 19
        $this->displayBlock("class_signature", $context, $blocks);
        echo "</p>

    ";
        // line 21
        if (($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "shortdesc", array()) || $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "longdesc", array()))) {
            // line 22
            echo "        ";
            if ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "shortdesc", array())) {
                // line 23
                echo "<p>";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "shortdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
                echo "</p>";
            }
            // line 25
            echo "        ";
            if ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "longdesc", array())) {
                // line 26
                echo "<p>";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "longdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
                echo "</p>";
            }
            // line 28
            echo "    ";
        }
        // line 29
        echo "
    ";
        // line 30
        if (($context["traits"] ?? $this->getContext($context, "traits"))) {
            // line 31
            echo "        <h2>Traits</h2>

        ";
            // line 33
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getrender_classes(($context["traits"] ?? $this->getContext($context, "traits")));
            echo "
    ";
        }
        // line 35
        echo "
    ";
        // line 36
        if (($context["constants"] ?? $this->getContext($context, "constants"))) {
            // line 37
            echo "        <h2>Constants</h2>

        ";
            // line 39
            $this->displayBlock("constants", $context, $blocks);
            echo "
    ";
        }
        // line 41
        echo "
    ";
        // line 42
        if (($context["properties"] ?? $this->getContext($context, "properties"))) {
            // line 43
            echo "        <h2>Properties</h2>

        ";
            // line 45
            $this->displayBlock("properties", $context, $blocks);
            echo "
    ";
        }
        // line 47
        echo "
    ";
        // line 48
        if (($context["methods"] ?? $this->getContext($context, "methods"))) {
            // line 49
            echo "        <h2>Methods</h2>

        ";
            // line 51
            $this->displayBlock("methods", $context, $blocks);
            echo "

        <h2>Details</h2>

        ";
            // line 55
            $this->displayBlock("methods_details", $context, $blocks);
            echo "
    ";
        }
        // line 57
        echo "
    <h2>Source code</h2>
    <pre class=\"language-php line-numbers\" id=\"source\"><code>";
        // line 59
        echo twig_escape_filter($this->env, file_get_contents($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "file", array())), "html", null, true);
        echo "</code></pre>
";
    }

    // line 62
    public function block_class_signature($context, array $blocks = array())
    {
        // line 63
        if (( !$this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "interface", array()) && $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "abstract", array()))) {
            echo "abstract ";
        }
        // line 64
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "categoryName", array()), "html", null, true);
        echo "
    <strong>";
        // line 65
        echo twig_escape_filter($this->env, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "shortname", array()), "html", null, true);
        echo "</strong>";
        // line 66
        if ($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "parent", array())) {
            // line 67
            echo "        extends ";
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getclass_link($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "parent", array()));
        }
        // line 69
        if ((twig_length_filter($this->env, $this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "interfaces", array())) > 0)) {
            // line 70
            echo "        implements
        ";
            // line 71
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["class"] ?? $this->getContext($context, "class")), "interfaces", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["interface"]) {
                // line 72
                echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getclass_link($context["interface"]);
                // line 73
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['interface'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 76
        echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getsource_link(($context["project"] ?? $this->getContext($context, "project")), ($context["class"] ?? $this->getContext($context, "class")));
        echo "
";
    }

    // line 79
    public function block_method_signature($context, array $blocks = array())
    {
        // line 80
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "final", array())) {
            echo "final ";
        }
        // line 81
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "abstract", array())) {
            echo "abstract ";
        }
        // line 82
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "protected", array())) {
            echo "protected ";
        }
        // line 83
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "private", array())) {
            echo "private ";
        }
        // line 84
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "public", array())) {
            echo "public ";
        }
        // line 85
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "static", array())) {
            echo "static ";
        }
        // line 86
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "hint", array())) {
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->gethint_link($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "hint", array()));
            echo "&nbsp;";
        }
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "name", array()), "html", null, true);
        $this->displayBlock("method_parameters_signature", $context, $blocks);
    }

    // line 90
    public function block_method_parameters_signature($context, array $blocks = array())
    {
        // line 91
        $context["__internal_cc3b2701eba95a41c432998e1a882398f13cc5dfd6ad08257fa6129f37733446"] = $this->loadTemplate("macros.twig", "class.twig", 91);
        // line 92
        echo $context["__internal_cc3b2701eba95a41c432998e1a882398f13cc5dfd6ad08257fa6129f37733446"]->getmethod_parameters_signature(($context["method"] ?? $this->getContext($context, "method")));
    }

    // line 95
    public function block_parameters($context, array $blocks = array())
    {
        // line 96
        echo "    <table class=\"table\">
        ";
        // line 97
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "parameters", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["parameter"]) {
            // line 98
            echo "            <tr>
                <td>";
            // line 99
            if ($this->getAttribute($context["parameter"], "hint", array())) {
                echo "<code class=\"language-php\">";
                echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->gethint_link($this->getAttribute($context["parameter"], "hint", array()));
                echo "</code>";
            }
            echo "</td>
                <td><code class=\"language-php\">\$";
            // line 100
            echo twig_escape_filter($this->env, $this->getAttribute($context["parameter"], "name", array()), "html", null, true);
            echo "</code></td>
                <td>";
            // line 101
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["parameter"], "shortdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['parameter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 104
        echo "    </table>
";
    }

    // line 107
    public function block_return($context, array $blocks = array())
    {
        // line 108
        echo "    <table class=\"table\">
        <tr>
            <td><code class=\"language-php\">";
        // line 110
        echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->gethint_link($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "hint", array()));
        echo "</code></td>
            <td>";
        // line 111
        echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "hintDesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
        echo "</td>
        </tr>
    </table>
";
    }

    // line 116
    public function block_exceptions($context, array $blocks = array())
    {
        // line 117
        echo "    <table class=\"table\">
        ";
        // line 118
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "exceptions", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["exception"]) {
            // line 119
            echo "            <tr>
                <td>";
            // line 120
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getclass_link($this->getAttribute($context["exception"], 0, array(), "array"));
            echo "</td>
                <td>";
            // line 121
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["exception"], 1, array(), "array"), ($context["class"] ?? $this->getContext($context, "class")));
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['exception'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "    </table>
";
    }

    // line 127
    public function block_see($context, array $blocks = array())
    {
        // line 128
        echo "    <table class=\"table\">
        ";
        // line 129
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "tags", array(0 => "see"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["tag"]) {
            // line 130
            echo "            <tr>
                <td>";
            // line 131
            echo twig_escape_filter($this->env, $this->getAttribute($context["tag"], 0, array(), "array"), "html", null, true);
            echo "</td>
                <td>";
            // line 132
            echo twig_escape_filter($this->env, twig_join_filter(twig_slice($this->env, $context["tag"], 1, null), " "), "html", null, true);
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tag'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "    </table>
";
    }

    // line 138
    public function block_constants($context, array $blocks = array())
    {
        // line 139
        echo "    <table class=\"table\">
        ";
        // line 140
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["constants"] ?? $this->getContext($context, "constants")));
        foreach ($context['_seq'] as $context["_key"] => $context["constant"]) {
            // line 141
            echo "            <tr>
                <td><code class=\"language-php\">";
            // line 142
            echo twig_escape_filter($this->env, $this->getAttribute($context["constant"], "name", array()), "html", null, true);
            echo " = ";
            echo twig_escape_filter($this->env, nochso\SamiTheme\Theme::getConstantSource($context["constant"]), "html", null, true);
            echo "</code></td>
                <td>
                    <p><em>";
            // line 144
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["constant"], "shortdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
            echo "</em></p>
                    <p>";
            // line 145
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["constant"], "longdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
            echo "</p>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['constant'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 149
        echo "    </table>
";
    }

    // line 152
    public function block_properties($context, array $blocks = array())
    {
        // line 153
        echo "    <table class=\"table\">
        ";
        // line 154
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["properties"] ?? $this->getContext($context, "properties")));
        foreach ($context['_seq'] as $context["_key"] => $context["property"]) {
            // line 155
            echo "            <tr>
                <td id=\"property_";
            // line 156
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
            echo "\">
                    <code class=\"language-php\">";
            // line 157
            if ($this->getAttribute($context["property"], "static", array())) {
                echo "static";
            }
            // line 158
            echo "                    ";
            if ($this->getAttribute($context["property"], "protected", array())) {
                echo "protected";
            }
            // line 159
            echo "                    ";
            if ($this->getAttribute($context["property"], "private", array())) {
                echo "private";
            }
            // line 160
            echo "                    ";
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->gethint_link($this->getAttribute($context["property"], "hint", array()));
            echo "</code>
                </td>
                <td><code class=\"language-php\">\$";
            // line 162
            echo twig_escape_filter($this->env, $this->getAttribute($context["property"], "name", array()), "html", null, true);
            echo "</code></td>
                <td>";
            // line 163
            echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["property"], "shortdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
            echo "</td>
                <td>";
            // line 165
            if ( !($this->getAttribute($context["property"], "class", array()) === ($context["class"] ?? $this->getContext($context, "class")))) {
                // line 166
                echo "<small>from&nbsp;";
                echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getproperty_link($context["property"], false, true);
                echo "</small>";
            }
            // line 168
            echo "</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['property'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "    </table>
";
    }

    // line 174
    public function block_methods($context, array $blocks = array())
    {
        // line 175
        echo "    <table class=\"table\">
    ";
        // line 176
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["methods"] ?? $this->getContext($context, "methods")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 177
            echo "        <tr>
            <td>
                <code class=\"language-php\">
                    ";
            // line 180
            if ($this->getAttribute($context["method"], "final", array())) {
                echo "final";
            }
            // line 181
            echo "                    ";
            if ($this->getAttribute($context["method"], "abstract", array())) {
                echo "abstract";
            }
            // line 182
            echo "                    ";
            if ($this->getAttribute($context["method"], "public", array())) {
                echo "public";
            } elseif ($this->getAttribute(            // line 183
$context["method"], "protected", array())) {
                echo "protected";
            } elseif ($this->getAttribute(            // line 184
$context["method"], "private", array())) {
                echo "private";
            }
            // line 185
            echo "                    ";
            if ($this->getAttribute($context["method"], "static", array())) {
                echo "static";
            }
            // line 186
            echo "                </code>
            </td>
            <td class=\"text-right\"><code class=\"language-php\">";
            // line 188
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->gethint_link($this->getAttribute($context["method"], "hint", array()));
            echo "</code></td>
            <td>
                <code class=\"language-php\"><a href=\"#method_";
            // line 190
            echo twig_escape_filter($this->env, $this->getAttribute($context["method"], "name", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["method"], "name", array()), "html", null, true);
            echo "</a>";
            $this->displayBlock("method_parameters_signature", $context, $blocks);
            echo "</code>
            </td>
            <td>
                ";
            // line 193
            if ( !$this->getAttribute($context["method"], "shortdesc", array())) {
                // line 194
                echo "                    No description
                ";
            } else {
                // line 196
                echo "                    ";
                echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute($context["method"], "shortdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
            }
            // line 198
            echo "            </td>
            <td>";
            // line 200
            if ( !($this->getAttribute($context["method"], "class", array()) === ($context["class"] ?? $this->getContext($context, "class")))) {
                // line 201
                echo "<small>from&nbsp;";
                echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getmethod_link($context["method"], false, true);
                echo "</small>";
            }
            // line 203
            echo "</td>
        </tr>
    ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 206
        echo "    </table>
";
    }

    // line 209
    public function block_methods_details($context, array $blocks = array())
    {
        // line 210
        echo "    <div id=\"method-details\">
        ";
        // line 211
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["methods"] ?? $this->getContext($context, "methods")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["method"]) {
            // line 212
            echo "            ";
            $this->displayBlock("method", $context, $blocks);
            echo "
        ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['method'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 214
        echo "    </div>
";
    }

    // line 217
    public function block_method($context, array $blocks = array())
    {
        // line 218
        echo "    <div>
        <div class=\"float-right\">
            ";
        // line 220
        if ( !($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "class", array()) === ($context["class"] ?? $this->getContext($context, "class")))) {
            // line 221
            echo "                in ";
            echo $context["__internal_30f1dcbadd157c90743510e2008537c71eed4e88b7083575705a616f67e30b2a"]->getmethod_link(($context["method"] ?? $this->getContext($context, "method")), false, true);
            echo " at line ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "line", array()), "html", null, true);
            echo "
            ";
        } else {
            // line 223
            echo "                at line <a href=\"#source.";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "line", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "line", array()), "html", null, true);
            echo "</a>
            ";
        }
        // line 225
        echo "        </div>
        <div>
            <h3 id=\"method_";
        // line 227
        echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "name", array()), "html", null, true);
        echo "\"><code class=\"language-php\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "name", array()), "html", null, true);
        echo "()</code></h3>
            <code class=\"language-php\">";
        // line 228
        $this->displayBlock("method_signature", $context, $blocks);
        echo "</code>
        </div>
    </div>

    <div class=\"details\">
        ";
        // line 233
        if (($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "shortdesc", array()) || $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "longdesc", array()))) {
            // line 234
            echo "            <div>
                ";
            // line 235
            if (( !$this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "shortdesc", array()) &&  !$this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "longdesc", array()))) {
                // line 236
                echo "                    <p>No description</p>
                ";
            } else {
                // line 238
                echo "                    ";
                if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "shortdesc", array())) {
                    // line 239
                    echo "<p>";
                    echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "shortdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
                    echo "</p>";
                }
                // line 241
                echo "                    ";
                if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "longdesc", array())) {
                    // line 242
                    echo "<p>";
                    echo $this->env->getExtension('Sami\Renderer\TwigExtension')->parseDesc($context, $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "longdesc", array()), ($context["class"] ?? $this->getContext($context, "class")));
                    echo "</p>";
                }
            }
            // line 245
            echo "            </div>
        ";
        }
        // line 247
        echo "        ";
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "parameters", array())) {
            // line 248
            echo "            <h4>Parameters</h4>

            ";
            // line 250
            $this->displayBlock("parameters", $context, $blocks);
            echo "
        ";
        }
        // line 252
        echo "
        ";
        // line 253
        if (($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "hintDesc", array()) || $this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "hint", array()))) {
            // line 254
            echo "            <h4>Return Value</h4>

            ";
            // line 256
            $this->displayBlock("return", $context, $blocks);
            echo "
        ";
        }
        // line 258
        echo "
        ";
        // line 259
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "exceptions", array())) {
            // line 260
            echo "            <h4>Exceptions</h4>

            ";
            // line 262
            $this->displayBlock("exceptions", $context, $blocks);
            echo "
        ";
        }
        // line 264
        echo "
        ";
        // line 265
        if ($this->getAttribute(($context["method"] ?? $this->getContext($context, "method")), "tags", array(0 => "see"), "method")) {
            // line 266
            echo "            <h4>See also</h4>

            ";
            // line 268
            $this->displayBlock("see", $context, $blocks);
            echo "
        ";
        }
        // line 270
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "class.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  821 => 270,  816 => 268,  812 => 266,  810 => 265,  807 => 264,  802 => 262,  798 => 260,  796 => 259,  793 => 258,  788 => 256,  784 => 254,  782 => 253,  779 => 252,  774 => 250,  770 => 248,  767 => 247,  763 => 245,  757 => 242,  754 => 241,  749 => 239,  746 => 238,  742 => 236,  740 => 235,  737 => 234,  735 => 233,  727 => 228,  721 => 227,  717 => 225,  709 => 223,  701 => 221,  699 => 220,  695 => 218,  692 => 217,  687 => 214,  670 => 212,  653 => 211,  650 => 210,  647 => 209,  642 => 206,  626 => 203,  621 => 201,  619 => 200,  616 => 198,  612 => 196,  608 => 194,  606 => 193,  596 => 190,  591 => 188,  587 => 186,  582 => 185,  578 => 184,  575 => 183,  571 => 182,  566 => 181,  562 => 180,  557 => 177,  540 => 176,  537 => 175,  534 => 174,  529 => 171,  521 => 168,  516 => 166,  514 => 165,  510 => 163,  506 => 162,  500 => 160,  495 => 159,  490 => 158,  486 => 157,  482 => 156,  479 => 155,  475 => 154,  472 => 153,  469 => 152,  464 => 149,  454 => 145,  450 => 144,  443 => 142,  440 => 141,  436 => 140,  433 => 139,  430 => 138,  425 => 135,  416 => 132,  412 => 131,  409 => 130,  405 => 129,  402 => 128,  399 => 127,  394 => 124,  385 => 121,  381 => 120,  378 => 119,  374 => 118,  371 => 117,  368 => 116,  360 => 111,  356 => 110,  352 => 108,  349 => 107,  344 => 104,  335 => 101,  331 => 100,  323 => 99,  320 => 98,  316 => 97,  313 => 96,  310 => 95,  306 => 92,  304 => 91,  301 => 90,  296 => 87,  291 => 86,  287 => 85,  283 => 84,  279 => 83,  275 => 82,  271 => 81,  267 => 80,  264 => 79,  258 => 76,  241 => 73,  239 => 72,  222 => 71,  219 => 70,  217 => 69,  213 => 67,  211 => 66,  208 => 65,  203 => 64,  199 => 63,  196 => 62,  190 => 59,  186 => 57,  181 => 55,  174 => 51,  170 => 49,  168 => 48,  165 => 47,  160 => 45,  156 => 43,  154 => 42,  151 => 41,  146 => 39,  142 => 37,  140 => 36,  137 => 35,  132 => 33,  128 => 31,  126 => 30,  123 => 29,  120 => 28,  115 => 26,  112 => 25,  107 => 23,  104 => 22,  102 => 21,  97 => 19,  91 => 17,  88 => 16,  80 => 11,  76 => 10,  73 => 9,  70 => 8,  67 => 7,  61 => 5,  55 => 4,  47 => 3,  43 => 1,  41 => 2,  11 => 1,);
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
{% from \"macros.twig\" import render_classes, breadcrumbs, namespace_link, class_link, property_link, method_link, hint_link, source_link %}
{% block title %}{{ class.name }} | {{ parent() }}{% endblock %}
{% block body_class 'class' %}
{% block page_id 'class:' ~ (class.name|replace({'\\\\': '_'})) %}

{% block below_menu %}
    {% if class.namespace %}
        <ol class=\"breadcrumb\">
            {{ breadcrumbs(class.namespace) }}
            <li>{{ class.shortname }}</li>
        </ol>
    {% endif %}
{% endblock %}

{% block page_content %}
    <h1>{{ class.name|split('\\\\')|last }}</h1>

    <p>{{ block('class_signature') }}</p>

    {% if class.shortdesc or class.longdesc %}
        {% if class.shortdesc -%}
            <p>{{ class.shortdesc|desc(class) }}</p>
        {%- endif %}
        {% if class.longdesc -%}
            <p>{{ class.longdesc|desc(class) }}</p>
        {%- endif %}
    {% endif %}

    {% if traits %}
        <h2>Traits</h2>

        {{ render_classes(traits) }}
    {% endif %}

    {% if constants %}
        <h2>Constants</h2>

        {{ block('constants') }}
    {% endif %}

    {% if properties %}
        <h2>Properties</h2>

        {{ block('properties') }}
    {% endif %}

    {% if methods %}
        <h2>Methods</h2>

        {{ block('methods') }}

        <h2>Details</h2>

        {{ block('methods_details') }}
    {% endif %}

    <h2>Source code</h2>
    <pre class=\"language-php line-numbers\" id=\"source\"><code>{{ file_get_contents(class.file) }}</code></pre>
{% endblock %}

{% block class_signature -%}
    {% if not class.interface and class.abstract %}abstract {% endif %}
    {{ class.categoryName }}
    <strong>{{ class.shortname }}</strong>
    {%- if class.parent %}
        extends {{ class_link(class.parent) }}
    {%- endif %}
    {%- if class.interfaces|length > 0 %}
        implements
        {% for interface in class.interfaces %}
            {{- class_link(interface) }}
            {%- if not loop.last %}, {% endif %}
        {%- endfor %}
    {%- endif %}
    {{- source_link(project, class) }}
{% endblock %}

{% block method_signature -%}
{% if method.final %}final {% endif %}
{% if method.abstract %}abstract {% endif %}
{% if method.protected %}protected {% endif %}
{% if method.private %}private {% endif %}
{% if method.public %}public {% endif %}
{% if method.static %}static {% endif %}
{% if method.hint %}{{ hint_link(method.hint) }}&nbsp;{% endif %}
{{ method.name }}{{ block('method_parameters_signature') }}
{%- endblock %}

{% block method_parameters_signature -%}
    {%- from \"macros.twig\" import method_parameters_signature -%}
    {{ method_parameters_signature(method) }}
{%- endblock %}

{% block parameters %}
    <table class=\"table\">
        {% for parameter in method.parameters %}
            <tr>
                <td>{% if parameter.hint %}<code class=\"language-php\">{{ hint_link(parameter.hint) }}</code>{% endif %}</td>
                <td><code class=\"language-php\">\${{ parameter.name }}</code></td>
                <td>{{ parameter.shortdesc|desc(class) }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block return %}
    <table class=\"table\">
        <tr>
            <td><code class=\"language-php\">{{ hint_link(method.hint) }}</code></td>
            <td>{{ method.hintDesc|desc(class) }}</td>
        </tr>
    </table>
{% endblock %}

{% block exceptions %}
    <table class=\"table\">
        {% for exception in method.exceptions %}
            <tr>
                <td>{{ class_link(exception[0]) }}</td>
                <td>{{ exception[1]|desc(class) }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block see %}
    <table class=\"table\">
        {% for tag in method.tags('see') %}
            <tr>
                <td>{{ tag[0] }}</td>
                <td>{{ tag[1:]|join(' ') }}</td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block constants %}
    <table class=\"table\">
        {% for constant in constants %}
            <tr>
                <td><code class=\"language-php\">{{ constant.name }} = {{ constant_source(constant) }}</code></td>
                <td>
                    <p><em>{{ constant.shortdesc|desc(class) }}</em></p>
                    <p>{{ constant.longdesc|desc(class) }}</p>
                </td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block properties %}
    <table class=\"table\">
        {% for property in properties %}
            <tr>
                <td id=\"property_{{ property.name }}\">
                    <code class=\"language-php\">{% if property.static %}static{% endif %}
                    {% if property.protected %}protected{% endif %}
                    {% if property.private %}private{% endif %}
                    {{ hint_link(property.hint) }}</code>
                </td>
                <td><code class=\"language-php\">\${{ property.name }}</code></td>
                <td>{{ property.shortdesc|desc(class) }}</td>
                <td>
                    {%- if property.class is not same as(class) -%}
                        <small>from&nbsp;{{ property_link(property, false, true) }}</small>
                    {%- endif -%}
                </td>
            </tr>
        {% endfor %}
    </table>
{% endblock %}

{% block methods %}
    <table class=\"table\">
    {% for method in methods %}
        <tr>
            <td>
                <code class=\"language-php\">
                    {% if method.final %}final{% endif %}
                    {% if method.abstract %}abstract{% endif %}
                    {% if method.public %}public
                    {%- elseif method.protected %}protected
                    {%- elseif method.private %}private{% endif %}
                    {% if method.static %}static{% endif %}
                </code>
            </td>
            <td class=\"text-right\"><code class=\"language-php\">{{- hint_link(method.hint) -}}</code></td>
            <td>
                <code class=\"language-php\"><a href=\"#method_{{ method.name }}\">{{ method.name }}</a>{{ block('method_parameters_signature') }}</code>
            </td>
            <td>
                {% if not method.shortdesc %}
                    No description
                {% else %}
                    {{ method.shortdesc|desc(class) }}
                {%- endif %}
            </td>
            <td>
                {%- if method.class is not same as(class) -%}
                    <small>from&nbsp;{{ method_link(method, false, true) }}</small>
                {%- endif -%}
            </td>
        </tr>
    {% endfor %}
    </table>
{% endblock %}

{% block methods_details %}
    <div id=\"method-details\">
        {% for method in methods %}
            {{ block('method') }}
        {% endfor %}
    </div>
{% endblock %}

{% block method %}
    <div>
        <div class=\"float-right\">
            {% if method.class is not same as(class) %}
                in {{ method_link(method, false, true) }} at line {{ method.line }}
            {% else %}
                at line <a href=\"#source.{{ method.line }}\">{{ method.line }}</a>
            {% endif %}
        </div>
        <div>
            <h3 id=\"method_{{ method.name }}\"><code class=\"language-php\">{{ method.name }}()</code></h3>
            <code class=\"language-php\">{{ block('method_signature') }}</code>
        </div>
    </div>

    <div class=\"details\">
        {% if method.shortdesc or method.longdesc %}
            <div>
                {% if not method.shortdesc and not method.longdesc %}
                    <p>No description</p>
                {% else %}
                    {% if method.shortdesc -%}
                        <p>{{ method.shortdesc|desc(class) }}</p>
                    {%- endif %}
                    {% if method.longdesc -%}
                        <p>{{ method.longdesc|desc(class) }}</p>
                    {%- endif %}
                {%- endif %}
            </div>
        {% endif %}
        {% if method.parameters %}
            <h4>Parameters</h4>

            {{ block('parameters') }}
        {% endif %}

        {% if method.hintDesc or method.hint %}
            <h4>Return Value</h4>

            {{ block('return') }}
        {% endif %}

        {% if method.exceptions %}
            <h4>Exceptions</h4>

            {{ block('exceptions') }}
        {% endif %}

        {% if method.tags('see') %}
            <h4>See also</h4>

            {{ block('see') }}
        {% endif %}
    </div>
{% endblock %}
", "class.twig", "/home/cabox/workspace/core/vendor/nochso/sami-theme/class.twig");
    }
}
