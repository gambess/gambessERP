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
    var $newFormLi = $('<div id="new_detalle_'+index+'" class="new_detalle"></div>').append(newForm);
    $newLinkp.before($newFormLi);
}

    
    var doc = ['BOLETA','FACTURA','GUIA DESPACHO'];
    var no_doc = ['NO DOC.'];
    var real = ['REAL'];
    
//Las funcionalidades se ejecutan una vez que el documento DOM isReady
    $(document).ready(function() {
                        $('#detalles').hide();
                        
//Jquery -ui datepicker setaeado a spain lang y formateado se le asocia al id venta_fecha_venta
			$(function(){
                                $.datepicker.setDefaults( $.datepicker.regional[ "es" ] );
				// Datepicker
				$('#venta_fecha').datepicker({
                                        altFormat: "dd/mm/yyyy"
				});
			});
                        //Este bloque se ejecuta si aparece el mensaje de error de fecha utilizada
                        /*
                         if ($('.error_list').length > 0){
                            var error = $('.error_list');
                            //all  dar el foco al elemento se borra el mensaje y se borra la fecha
                            $('#venta_fecha').focus(function(){
                                error.remove();
                                $('#venta_fecha').val("");
                            });
                        }
                         */
                        $('#venta_fecha').change(function(){
                            //$(this).data('fecha', $(this).val())
                            $('#detalles').show();
                          //$("input [name~='fecha_venta']").val($(this).val());  
                        });
                        
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
                            if($(this).val() === 0) $(this).val("");
                        });
                        
                                             
                        $('#venta_total').focusout(function(){
                            var neto = $(this).val();
                            var iva = $('#venta_total_iva');
                            if( iva.val() != 0){
                                $('#venta_total_iva').val(0);
                            }
                            var i = parseFloat(Number(neto))*.19;
                            $('#venta_total_iva').val(i.toFixed(0));
                            
                            var total = $('#venta_total').val();
                            if (total == 0){
                                $('#venta_total').val(Number(iva.val())+Number(neto));
                            }if(total === "")
                                $('#venta_total').val("");
                        });
                        //$(document).on('focusout','div.new_detalle', function() {
                        $(document).on('change','input[name$="total_neto_venta]"]', function() {
                                var id = $(this).parent().attr("id");
                                var indix = id.replace('new_detalle_','');
                                
                                var iv = parseFloat(Number($(this).val())*.19);
                                var tot = parseFloat(Number($(this).val()) + iv);
                                
                                alert ("iva:"+iv + " total:" + tot);
                             $('input[id$="'+indix+'_total_iva_venta"]').val(iv.toFixed(0));
                            $('input[id$="'+indix+'_total_venta"]').val(tot.toFixed(0));
                            });
    

                        
});
                        