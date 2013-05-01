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
        $('#venta_fecha').datepicker({
//            numberOfMonths: 2
//            changeMonth: true,
//            changeYear: true,
//            showOtherMonths: true,
//            selectOtherMonths: true
});
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
        var fecha = $('#venta_fecha').val()
        if (fecha == ""){
            alert('Se debe ingresar la fecha de venta previamente');
        return false;
        }
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

//Validacion de la fecha

$('body').on('change','#venta_fecha' , function(){
                $.ajax({
                    type: "GET",
                    url: '/aricagua/web/app_dev.php/venta/' + $(this).val() + '/exists',
                    dataType: "json"
                }).done(function(data){
                    if (data.exists == 1){
                        alert('La fecha ya se encuentra en la base de datos debe seleccionar otra fecha');
                        $('#venta_fecha').val('');
                        return false;
                    }
                    if(data.exists == 0){
                        return true;
                    }
                    
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

$('body').on('click', 'a.open_detail', function(event){
    event.preventDefault();
    var id = $(this).data('id');
    if($('textarea#'+id).length){
                $('textarea#'+id).jqte();
    }
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
                
                $.ajax({
                    type: "GET",
                    url: '/aricagua/web/app_dev.php/venta/' + $('#deletion_venta').data('IdToDel') + '/deletedet',
                    dataType: "json"
                }).done(function(msj){
                    if(msj.codeResponse==200 && msj.success==true){
                        $('#deletion_venta').data('divToDel').remove(); 
                        update();
                        $('#deletion_venta').dialog('close');
                    }
                });
                return false;
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
        $('#deletion_venta').data('divToDel', divToDel).data('IdToDel', $(this).attr('dbid')).dialog('open');
    }
    else
    {
        divToDel.remove();
        update();
    }
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

var back_value;
$('body').on('focus', 'input[id^="venta_total"]', function(){
   back_value = $(this).val();
   $(this).val("");
   $(this).forceNumeric();
});
$('body').on('focusout', 'input[id^="venta_total"]', function(){
   if($(this).val() == "") $(this).val(back_value);
});

$('body').on('change', 'input[id^="venta_total"]', function(){
    if($(this).val()== 0) {
        return false;
    }else{
        if($($('.new_detalle').length == 0)){
            alert("Aun no se ha ingresado ningun degloce de ventas\nNo se pueden modificar");
            $(this).val("0");
            return false;
        }else
            return false;
    }
});