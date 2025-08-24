<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* core/themes/stable9/templates/field/responsive-image.html.twig */
class __TwigTemplate_719b0cdd7afe60b0a83ad8bd968ca9f6 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 15
        if ((($tmp = ($context["output_image_tag"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["img_element"] ?? null), "html", null, true);
            yield "
";
        } else {
            // line 18
            yield "  <picture>
    ";
            // line 19
            if ((($tmp = ($context["sources"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 20
                yield "      ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(($context["sources"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["source_attributes"]) {
                    // line 21
                    yield "        <source";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $context["source_attributes"], "html", null, true);
                    yield "/>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['source_attributes'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 23
                yield "    ";
            }
            // line 24
            yield "    ";
            // line 25
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["img_element"] ?? null), "html", null, true);
            yield "
  </picture>
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["output_image_tag", "img_element", "sources"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/themes/stable9/templates/field/responsive-image.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  76 => 25,  74 => 24,  71 => 23,  62 => 21,  57 => 20,  55 => 19,  52 => 18,  46 => 16,  44 => 15,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/themes/stable9/templates/field/responsive-image.html.twig", "/var/www/html/web/core/themes/stable9/templates/field/responsive-image.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 15, "for" => 20];
        static $filters = ["escape" => 16];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
