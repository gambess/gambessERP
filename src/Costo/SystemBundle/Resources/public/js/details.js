//collection with the prototype data
//var collectionHolder = $('div.detalle');
// setup an "add a detail" link
var indice = 0;
var $addDetailLink = $('<a href="#" class="add_detail">Nuevo</a>');
var $newLinkp = $('<p></p>').append($addDetailLink);

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

//Las funcionalidades se ejecutan una vez que el documento DOM isReady
$(document).ready(function() {
    $('#detalles').hide();
//    $('#totales').hide();
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

    $('#venta_fecha').change(function() {
        //$(this).data('fecha', $(this).val())
        $('#detalles').show();
        $('#totales').show();
        //$("input [name~='fecha_venta']").val($(this).val());  
    });

    //Collection Handler
    $('div.detalle').append($newLinkp);
    $('div.detalle').data('index', $('div.detalle').find(':input').length);
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
    //$(document).on('focusout','div.new_detalle', function() {                        
});
var doc = ['BOLETA', 'FACTURA', 'GUIA DESPACHO'];
//var no_doc = ['NO DOC.'];
//var real = ['REAL'];

//calcular el iva y total de cada detalle
$(document).on('change', 'input[name$="total_venta]"], select[name$="][ventaForma]"]', function() {
//                            $("div.new_detalle").on(change,'select[name$="ventaForma]"]',function(){
//                                alert ("Select change");
//                            });
//alert("Cambio: " + $(this).attr('name'));
    var id = $(this).parent().attr("id");
    var indix = id.replace('new_detalle_', '');
    var iva = parseFloat(Number(($(this).val()) / 1.19)* .19);
    var neto = parseFloat(Number($(this).val()) / 1.19);

    //Input ocultos
    $('input[id$="' + indix + '_total_iva_venta"]').val(iva.toFixed(0));
    $('input[id$="' + indix + '_total_neto_venta"]').val(neto.toFixed(0));

    //Suma los netos cada vez que cambian
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
    
//    total_neto += parseFloat(Number($(this).val()));
//    total_neto = total_doc + total_no_doc;
    total_neto = total_doc + total_no_doc;
    
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


    

    //Suma los iva totales cada vez que cambia
//    var iva_total = 0;
//    $('input[name$="total_iva_venta]"]').each(function() {
//        iva_total += parseFloat(Number($(this).val()));
//    });
//    $('input[name="venta[total_iva]"]').val(iva_total.toFixed(0));
    
    //Suma los totales cada vez que cambian
//    var suma_total = 0;
//    $('input[name$="total_venta]"]').each(function() {
//        suma_total += parseFloat(Number($(this).val()));
//    });
//    $('input[name="venta[total]"]').val(suma_total.toFixed(0));

    //Totales reales
//    $('input[name="venta[total_neto_real]"]').val(total_real.toFixed(0));
    
//    $('input[name="venta[total_iva_real]"]').val((total_real * .19).toFixed(0));
//    $('input[name="venta[total_real]"]').val((total_real + (total_real * .19)).toFixed(0));
});


//                          $('#venta_total').focusout(function(){
//                            var neto = $(this).val();
//                            var iva = $('#venta_total_iva');
//                            if( iva.val() != 0){
//                                $('#venta_total_iva').val(0);
//                            }
//                            var i = parseFloat(Number(neto))*.19;
//                            $('#venta_total_iva').val(i.toFixed(0));
//                            
//                            var total = $('#venta_total').val();
//                            if (total == 0){
//                                $('#venta_total').val(Number(iva.val())+Number(neto));
//                            }if(total === "")
//                                $('#venta_total').val("");
//                        });

//alert ("iva:"+iv + " total:" + tot);

//    if ($.inArray($('select[id$="' + indix + '_ventaForma"] :selected').text(), no_doc) > -1) {
//        total_no_doc += parseFloat(Number($(this).val()));
//    }
//    if ($.inArray($('select[id$="' + indix + '_ventaForma"] :selected').text(), real) > -1) {
//        total_real += parseFloat(Number($(this).val()));
//    }

    //Totales documentada
//    $('input[name="venta[total_neto_documentada]"]').val(total_doc.toFixed(0));
//    $('input[name="venta[total_iva_documentada]"]').val((total_doc * .19).toFixed(0));
//    $('input[name="venta[total_documentada]"]').val((total_doc + (total_doc * .19)).toFixed(0));


    //Totales no_documentada
//    $('input[name="venta[total_neto_no_documentada]"]').val(total_no_doc.toFixed(0));
//    $('input[name="venta[total_iva_no_documentada]"]').val((total_no_doc * .19).toFixed(0));
//    $('input[name="venta[total_no_documentada]"]').val((total_no_doc + (total_no_doc * .19)).toFixed(0));