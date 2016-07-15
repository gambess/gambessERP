//Las funcionalidades se ejecutan una vez que el documento DOM isReady
var indice = 0;
var doc = ['BOLETA', 'FACTURA', 'GUIA DESPACHO'];

//Agrega el div detalle al body
function addDivForm(collectionHolder, $newLinkp) {
    // Get the data-prototype explained earlier
    var prototype = collectionHolder.data('prototype');
    // get the new index
    var index = collectionHolder.data('index');
    // Replace '$$name$$' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/\$\$name\$\$/g, index);
    // increase the index with one for the next item
    collectionHolder.data('index', index + 1);
    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormDiv = $('<div id="new_detalle_' + index + '" class="new_detalle"></div>');
    addDetailFormDeleteDiv($newFormDiv);
    $newFormDiv.append(newForm);
    $newLinkp.before($newFormDiv);
}

//añadir la x para borrar el elemento
function addDetailFormDeleteDiv($divForm) {
    var $removeFormA = $('<span class="remove ui-icon ui-icon-closethick" style="display:inline-block"></span>');
//    var $removeFormA = $('<p><a href="#" class="remove">X</a></p>');
    $divForm.append($removeFormA);
    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();
        // remove the li for the tag form
        $divForm.remove();
    });
}

//Actualiza los tototales de acuerdo a cada cambio
function updateTotales(total_doc, total_no_doc, total_neto, total_real){
    $('input[name="venta[total_neto_documentada]"]').val((total_doc / 1.19).toFixed(0));
    $('input[name="venta[total_iva_documentada]"]').val((((total_doc)/1.19) * .19).toFixed(0));
    $('input[name="venta[total_documentada]"]').val((total_doc).toFixed(0));
    
    $('input[name="venta[total_neto_no_documentada]"]').val((total_no_doc / 1.19).toFixed(0));
    $('input[name="venta[total_iva_no_documentada]"]').val((((total_no_doc) /1.19) * .19).toFixed(0));
    $('input[name="venta[total_no_documentada]"]').val((total_no_doc).toFixed(0));
    
    $('input[name="venta[total_neto]"]').val(((total_doc / 1.19) + total_no_doc ).toFixed(0));
    $('input[name="venta[total_iva]"]').val((((total_doc)/1.19) * .19).toFixed(0));
    $('input[name="venta[total]"]').val((total_neto).toFixed(0));
    
    $('input[name="venta[total_neto_real]"]').val((total_real / 1.19).toFixed(0));
    $('input[name="venta[total_iva_real]"]').val((((total_real) /1.19 )* .19).toFixed(0));
    $('input[name="venta[total_real]"]').val((total_real).toFixed(0));
}

//Realiza una llamada a la actualizacion de los montos
function update(){
    var total_neto = 0;
    var total_doc = 0;
    var total_no_doc = 0;
    var total_real = 0;
    
    $('input[name$="total_venta]"]').each(function() {
        if ($.inArray($(this).prev().find('option:selected').text(), doc) > -1) {
            total_doc += parseFloat(Number($(this).val()));
        }
        if ($(this).prev().find('option:selected').text() === "NO DOC.") {
            total_no_doc += parseFloat(Number($(this).val()));
        }
        if ($(this).prev().find('option:selected').text() === "REAL") {
            total_real += parseFloat(Number($(this).val()));
        }
    });
    total_neto = total_doc + total_no_doc;
    updateTotales(total_doc, total_no_doc, total_neto, total_real);
}
//Las funcionalidades se ejecutan una vez que el documento DOM isReady
$(document).ready(function() {
    var $addDetailLink = $('<a href="#" class="add_detail">Nuevo</a>');
    var $newLinkp = $('<p></p>').append($addDetailLink);
    $('input[name$="fecha_venta]"]').hide();
    if($('#venta_fecha').attr('view')!== 'showupdate'){
        //Jquery -ui datepicker setaeado a spain lang y formateado se le asocia al id venta_fecha_venta
        $(function() {$.datepicker.setDefaults($.datepicker.regional[ "es" ]);
            // Datepicker
            $('#venta_fecha').datepicker({});
        });
    }
    //Este bloque se ejecuta si aparece el mensaje de error de fecha utilizada
    if ($('.error_list').length > 0) {
        var error = $('.error_list');
        //all  dar el foco al elemento se borra el mensaje y se borra la fecha
        $('#venta_fecha').focus(function() {
            error.remove();
            $('#venta_fecha').val("");
        });
    }
    //Collection Handler
    $('div.detalle').append($newLinkp);
    $('div.detalle').data('index', $('.new_detalle').length);
    $addDetailLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();
        
        var fecha = $('#venta_fecha').val()
        if (fecha == ""){
            alert('Se debe ingresar la fecha de venta previamente');
        return false;
        }
        // add a new tag form (see next code block)
        addDivForm($('div.detalle'), $newLinkp);
        $('input[name$="fecha_venta]"]').hide();
        $('input[name$="fecha_venta]"]').val($('#venta_fecha').val());
        var id = parseInt($('div.detalle').data('index')) - 1;
        $('input#venta_detalleVentas_'+id+'_total_venta').val(0);

    });
    var Input = $('input[name$="][total_venta]"]');
    Input.focus(function() {
        if ($(this).val() === 0)
            $(this).val("");
    });
});


// forceNumeric() plug-in implementation
jQuery.fn.forceNumeric = function () {

    return this.each(function () {
        $(this).keydown(function (e) {
            var key = e.which || e.keyCode;

            if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
            // numbers   
                key >= 48 && key <= 57 ||
            // Numeric keypad
                key >= 96 && key <= 105 ||
            // comma, period and minus, . on keypad
               key == 190 || key == 188 || key == 109 || key == 110 ||
            // Backspace and Tab and Enter
               key == 8 || key == 9 || key == 13 ||
            // Home and End
               key == 35 || key == 36 ||
            // left and right arrows
               key == 37 || key == 39 ||
            // Del and Ins
               key == 46 || key == 45)
                return true;

            return false;
        });
    });
}

var back_value = 0;
$('body').on('click', 'input[name$="][total_venta]"]', function(){
   if($(this).val() != ""){
       back_value = $(this).val();
   }
   $(this).val("");
   $(this).forceNumeric();
});
$('body').on('focusout', 'input[name$="][total_venta]"]', function(){
    if($(this).val() != "") return false;
    if($(this).val() == "") $(this).val(back_value);
    return false;
});
//Se recalculan los valores en el evento change
$('body').on('change', 'input[name$="total_venta]"], select[name$="][ventaForma]"]', function(){
    var id = $(this).parent().attr("id");
    var indix = id.replace('new_detalle_', '');
    var iva = parseFloat(Number(($(this).val()) / 1.19)* .19);
    var neto = parseFloat(Number($(this).val()) / 1.19);
        //Input ocultos
    $('input[id$="' + indix + '_total_iva_venta"]').val(iva.toFixed(0));
    $('input[id$="' + indix + '_total_neto_venta"]').val(neto.toFixed(0));
    
    //Suma los netos cada vez que cambian
    update();
});

$('body').on('click', 'a.open_detail', function(event){
    event.preventDefault();
    var id = $(this).data('id');
    if($('textarea#'+id).length){
                $('textarea#'+id).jqte({css:"jqte_green"});
    }
});


$('body').on('focus', '#venta_fecha', function(e){
    e.preventDefault();
    if($(this).attr('view') === 'showupdate'){
        $(this).attr('title','No se puede modificar la fecha\nSeleccione Buscar e Ir');
        alert($(this).attr('title'));      
    }
});

