$(window).ready(function(){
	// inisializar el pickadate
  $('.datepicker').pickadate({
    selectMonths: true,// Creates a dropdown to control month
    selectYears: 15,// Creates a dropdown of 15 years to control year
    min:2,
    // The title label to use for the month nav buttons
    labelMonthNext: 'Next Month',
    labelMonthPrev: 'Beforre Month',
    // The title label to use for the dropdown selectors
    labelMonthSelect: 'Select a Month',
    labelYearSelect: 'Select a year',
    // Months and weekdays
    //monthsFull: [ 'Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
    //monthsShort: [ 'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez' ],
    //weekdaysFull: [ 'Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado' ],
    //weekdaysShort: [ 'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab' ],
    // Materialize modified
    //weekdaysLetter: [ 'D', 'S', 'T', 'Q', 'Q', 'S', 'S' ],
    // Today and clear
    today: 'Today',
    clear: 'Clear',
    close: 'Enter',
    // The format to show on the `input` element
      format: 'mm/dd/yyyy',
      onOpen: function() {
            //console.log('Opened up!')
      },
      onClose: function() {
        //console.log('Closed now')
          verificafecha();
      },
      onRender: function() {
        //    
      },
      onStart: function() {
        //console.log('Hello there :)')
      },
      onStop: function() {
        //console.log('See ya')
      },
      onSet: function(thingSet) {
          
      }    
  });


  // desplegar o ocultar el bookin
  $(".Book_form").on('click',function(){
    if($("#bookin").hasClass('bookin-active')){
      $("#bookin").switchClass('bookin-active','bookin-inactive',500);
    }else{
      $("#bookin").switchClass('bookin-inactive','bookin-active',1000);
    }
  });
  // inicializar el autocomplet de los hoteles
  cargarHotelesPaquetes();
  //evento para resetear los valores al realizar algun cambio 
  $(".etiqueta").change(function() {
        inicioBookin()
  });
  $("#bntCost").on("click", function() {
        if ($("#saliendo").val() == "") {
            alert("You must select a departure hotel");
            $("#saliendo").focus();
            return
        }
        if ($("#adults").val() == "") {
            alert("You must select an adults number");
            $("#adults").focus();
            return
        }
        if ($("#departures").val() == "") {
            alert("You must select a departure time");
            $("#departures").focus();
            return
        }
        if ($("#arrival").val() == "") {
            alert("You must select an arrival date");
            //$("#arrival").focus();
            return
        }
        finBookin();
  });


});

  function cargarHotelesPaquetes() {
    $.ajax({
        url: "/tour/cargar_hoteles_venta",
        type: 'post',
        dataType: 'json',
        success: function(xml) {
            txtsource = xml;
            $.widget("custom.MixCombo", $.ui.autocomplete, {
                _create: function() {
                    this._super();
                    this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)")
                },
                _renderItem: function(ul, item) {
                    return $("<li>").attr("data-value", item.value).data("ui-autocomplete-item", item).data("item", item).append(item.label).appendTo(ul)
                },
                _renderMenu: function(e, t) {
                    var n = this,
                        r = "";
                    $.each(t, function(t, i) {
                        if (i.categoria != r) {
                            e.append("<li class='ui-autocomplete-category ui-autocomplete-destination'>Hotels</li>");
                            r = i.categoria
                        }
                        n._renderItem(e, i)
                    })
                }
            });
            var accentMap = {
                "á": "a",
                "é": "e",
                "í": "i",
                "ó": "o",
                "ú": "u"
            };
            var normalize = function(e) {
                for (var t = "", o = 0; o < e.length; o++) t += accentMap[e.charAt(o)] || e.charAt(o);
                return t
            };
            $("#saliendo").MixCombo({
                delay: 0,
                minLength: 3,
                source: function(e, t) {
                    var o = new RegExp($.ui.autocomplete.escapeRegex(e.term), "i");
                    t($.grep(xml, function(e) {
                        return e = e.label || e.value || e, o.test(e) || o.test(normalize(e))
                    }))
                },
                change: function(e, t) {},
                select: function(e, t) {
                    $("#zona").val(t.item.data)
                }
            })
        }
    })
  }
function verificafecha() {
    datos = "dte=" + $("#arrival").val();
    $.ajax({
        url: "/tour/verifica_fecha",
        type: 'post',
        data: datos,
        dataType: 'html',
        success: function(dataResponse) {
            if (dataResponse == 1) {
              Materialize.toast('<span >The tour is available on this day</span>', 4000,'','');
            } else {
                Materialize.toast('<span >The tour is not available on this day</span>', 4000,'','');
                //alert("The tour is not available on this day");
                $("#arrival").val("");
                $("#arrival").focus()
            }
                
            
        }
    })
}

function inicioBookin() {
    $("#bntCost").removeAttr("disabled");
    $("#dtllBookin").addClass("hide");
    $("#cstAdult").html("");
    $("#cstChild").html("");
    $("#cstTotal").html("")
}

function finBookin() {
    datos = $("#frmBookin").serialize();
    $.ajax({
        url: "/procesa_datos.html",
        type: 'post',
        data: datos,
        dataType: 'json',
        success: function(jsonResponse) {
            console.log(jsonResponse.booking);
            $("#cstAdult").html("$ " + jsonResponse.booking.tarifas.tar_adult + " USD");
            $("#cstChild").html("$ " + jsonResponse.booking.tarifas.tar_child + " USD");
            $("#cstTotal").html(jsonResponse.booking.txtTotal)
        }
    });
    $("#bntCost").attr("disabled", "disabled");
    $("#dtllBookin").removeClass("hide");
}