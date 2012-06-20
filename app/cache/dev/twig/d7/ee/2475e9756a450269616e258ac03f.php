<?php

/* CostoSystemBundle:Cuenta:list.html.twig */
class __TwigTemplate_d7ee2475e9756a450269616e258ac03f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CostoSystemBundle::layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CostoSystemBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    <h1>Listado de Cuentas Existentes</h1>
";
        // line 5
        if (array_key_exists("cuentas", $context)) {
            // line 6
            echo "<table id=\"tcuentas\" class=\"ui-widget ui-widget-content\" summary=\"Listado de Cuentas\">
<thead>
 \t<tr class=\"ui-widget-header \">
            <th scope=\"col\" class=\"rounded-company\">Nombre de la Cuenta</th>
            <th scope=\"col\" class=\"rounded-q1\">Valor de la Cuenta</th>
            <th scope=\"col\" class=\"rounded-q2\">Tipo de la Cuenta</th>
            <th class=\"rounded-q4\" colspan=\"3\" ><center>Acciones</center></th>
        </tr>
</thead>
<tfoot>
    \t<tr>
        \t<td colspan=\"5\" class=\"rounded-foot-left\" align=\"center\"><em>Existen ";
            // line 17
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "cuentas")), "html", null, true);
            echo " Cuentas</em></td>
        \t<td class=\"rounded-foot-right\">&nbsp;</td>
        </tr>
</tfoot>
<tbody>
    ";
            // line 22
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "cuentas"));
            foreach ($context['_seq'] as $context["_key"] => $context["cuenta"]) {
                // line 23
                echo "<tr>
            <td>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cuenta"), "nombreCuenta"), "html", null, true);
                echo "</td>
            <td>";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cuenta"), "ValorCuenta"), "html", null, true);
                echo "</td>
            <td>";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "cuenta"), "TipoCuenta"), "html", null, true);
                echo "</td>
            <td>actualizar</td>
            <td>borrar</td>
            <td>Gestionar Gastos</td>
<tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['cuenta'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 32
            echo "    </tbody>
</table>
";
        }
    }

    public function getTemplateName()
    {
        return "CostoSystemBundle:Cuenta:list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 32,  70 => 26,  66 => 25,  62 => 24,  59 => 23,  55 => 22,  47 => 17,  34 => 6,  32 => 5,  29 => 4,  26 => 3,);
    }
}
