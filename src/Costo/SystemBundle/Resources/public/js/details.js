//Las funcionalidades se ejecutan una vez que el documento DOM isReady
var indice = 0;
var doc = ['BOLETA', 'FACTURA', 'GUIA DESPACHO'];

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
    var $removeFormA = $('<a href="#" class="remove">X</a>');
//    var $removeFormA = $('<p><a href="#" class="remove">X</a></p>');
    $divForm.append($removeFormA);

    $removeFormA.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();

        // remove the li for the tag form
        $divForm.remove();
    });
}

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
//Jquery -ui datepicker setaeado a spain lang y formateado se le asocia al id venta_fecha_venta
    $(function() {
        $.datepicker.setDefaults($.datepicker.regional[ "es" ]);
        // Datepicker
        $('#venta_fecha').datepicker();
    });
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
        // add a new tag form (see next code block)
        addDivForm($('div.detalle'), $newLinkp);
        $('input[name$="fecha_venta]"]').hide();
        $('input[name$="fecha_venta]"]').val($('#venta_fecha').val());

    });
    var Input = $('input[name*="total"]');
    Input.focus(function() {
        if ($(this).val() === 0)
            $(this).val("");
    });
    

                     
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
//Se recalculan los valores en el evento click
$('body').on('click', '.remove' ,function(e){
    e.preventDefault();
    var divToDel = $(this).parent('div');

    $('#deletion_venta').dialog({
        autoOpen: false,
        position: 'center',
        modal: true,
        width: 270,
        height: 240,
        buttons: {
            "Borrar": function() {
                $(this).data('divToDel').remove();
                $("form", $(this)).submit();
                return true;

            },
            "Cancelar": function() {
                $(this).dialog("close");
                return false;
            }
        }
    });
    // Dialog Link

    //Suma los netos cada vez que cambian
    if ($(this).attr('dbid'))
    {
        var valToDel = $(this).attr('dbid');

        $('#deletion_venta form.invisible').attr('action', '/aricagua/web/app_dev.php/venta/' + valToDel + '/ddetalle');
        $('#form_id').val(valToDel);

        $('#deletion_venta').data('divToDel', divToDel).dialog('open');
        
    }
    else
    {
        divToDel.remove();
        update();
    }
    
    
});
