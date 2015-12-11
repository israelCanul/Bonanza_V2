function initialize() {
    var txtLatitud = 20.792036;
    var txtLongitud = -86.94469029999999;
    var nombreServ = "Rancho Bonanza";
    var styleArray = [{
        featureType: "all",
        stylers: [{
            saturation: -80
        }]
    }, {
        featureType: "road.arterial",
        elementType: "geometry",
        stylers: [{
            hue: "#00ffee"
        }, {
            saturation: 50
        }]
    }, {
        featureType: "poi.business",
        elementType: "labels",
        stylers: [{
            visibility: "on"
        }]
    }];
    var mapOptions = {
        zoom: 16,
        mapTypeControl: true,
        center: new google.maps.LatLng(txtLatitud, txtLongitud),
        mapTypeId: google.maps.MapTypeId.HYBRID,
    }
    var map = new google.maps.Map(document.getElementById('mapHotel'), mapOptions);
    var image = '/images/iconos/punterobonanza.png';
    var myLatLng = new google.maps.LatLng(txtLatitud, txtLongitud);
    var beachMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        icon: image,
        title: nombreServ
    });
}

$(window).ready(function(){
        $("#btnSubmit").on("click", function() {
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var country = $("#country").val();
        var message = $("#comentarios").val();
        if (name == "" || email == "" || phone == "" || country == "" || message == "") {
            alert("You need to fill all fields to continue");
            return false
        }
        var datos = 'name=' + name + "&email=" + email + "&phone=" + phone + "&country=" + country + "&message=" + message;
        $.ajax({
            url: "/site/enviar",
            type: 'post',
            data: datos,
            dataType: 'html',
            success: function(dataResponse) {
                if (dataResponse == 0) {
                    //alert("Email sended");
                    Materialize.toast('<span >Email sended</span>', 6000,'','');
                    $("#name").val("");
                    $("#email").val("");
                    $("#phone").val("");
                    $("#country").val("");
                    $("#comentarios").val("")
                } else {
                    //alert("We failed to send the current email");
                    Materialize.toast('<span >We failed to send the current email</span>', 6000,'','');
                }
            }
        })
    });  
});