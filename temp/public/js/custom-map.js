var mapStyles =[
  {
    "featureType": "administrative",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8080ff"
      }
    ]
  },
  {
    "featureType": "landscape.man_made",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#cdcdcd"
      }
    ]
  },
  {
    "featureType": "poi.attraction",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.business",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.government",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.place_of_worship",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.school",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "poi.sports_complex",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#4e4e4e"
      },
      {
        "weight": 4.5
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#d7b38e"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#ff8040"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "weight": 3.5
      }
    ]
  },
  {
    "featureType": "transit",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.station.airport",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.station.bus",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "transit.station.rail",
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#31a7ce"
      }
    ]
  }
]
$.ajaxSetup({
    cache: true
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Homepage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function createHomepageGoogleMap(_latitude,_longitude){
    setMapHeight();
    if( document.getElementById('map') != null ){
        $.getScript("http://localhost/i-service/public/home/get_all_service_json", function(){
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 14,
                scrollwheel: false,
                center: new google.maps.LatLng(_latitude, _longitude),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: mapStyles
            });
            var i;
            var newMarkers = [];
            for (i = 0; i < locations.length; i++) {
                var pictureLabel = document.createElement("img");
                pictureLabel.src = locations[i][7];
                var boxText = document.createElement("div");
                infoboxOptions = {
                    content: boxText,
                    disableAutoPan: false,
                    //maxWidth: 150,
                    pixelOffset: new google.maps.Size(-100, 0),
                    zIndex: null,
                    alignBottom: true,
                    boxClass: "infobox-wrapper",
                    enableEventPropagation: true,
                    closeBoxMargin: "0px 0px -8px 0px",
                    closeBoxURL: "http://localhost/i-service/temp/public/img/close-btn.png",
                    infoBoxClearance: new google.maps.Size(1, 1)
                };
                var marker = new MarkerWithLabel({
                    title: locations[i][1],
                    position: new google.maps.LatLng(locations[i][2], locations[i][3]),
                    map: map,
                    icon: 'http://localhost/i-service/temp/public/img/marker.png',
                    labelContent: pictureLabel,
                    labelAnchor: new google.maps.Point(50, 0),
                    labelClass: "marker-style"
                });
                newMarkers.push(marker);
                boxText.innerHTML =
                    '<div class="infobox-inner">' +
                        '<a href="' + locations[i][0] + '">' +
                        '<div class="infobox-image" style="position: relative">' +
                        '<img src="' + locations[i][8] + '">' + '<div><span class="infobox-label">' + locations[i][1] + '</span></div>' +
                        '</div>' +
                        '</a>' +
                        '<div class="infobox-description">' +
                        '<div class="infobox-content"><b>Informasi Kontak</b>' +
                        '<br><br>'+
                            '<i class="fa fa-phone"> '+locations[i][4]+'</i>'+'</br>'+
                            '<i class="fa fa-envelope"> '+locations[i][5]+'</i>'+
                        '</br></br></br>'+
                        '<a href="" class="selanjutnya"> Lihat Informasi Selengkapnya >></a>'+
                        '</div>' +
                        '</div>' +
                        '</div>';
                //Define the infobox
                newMarkers[i].infobox = new InfoBox(infoboxOptions);
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        for (h = 0; h < newMarkers.length; h++) {
                            newMarkers[h].infobox.close();
                        }
                        newMarkers[i].infobox.open(map, this);
                    }
                })(marker, i));

            }
            var clusterStyles = [
                {
                    url: 'http://localhost/i-service/temp/public/img/cluster.png',
                    height: 37,
                    width: 37
                }
            ];
            var markerCluster = new MarkerClusterer(map, newMarkers, {styles: clusterStyles, maxZoom: 15});
            $('body').addClass('loaded');
            setTimeout(function() {
                $('body').removeClass('has-fullscreen-map');
            }, 1000);
            $('#map').removeClass('fade-map');

            //  Dynamically show/hide markers --------------------------------------------------------------

            google.maps.event.addListener(map, 'idle', function() {

                for (var i=0; i < locations.length; i++) {
                    if ( map.getBounds().contains(newMarkers[i].getPosition()) ){
                        // newMarkers[i].setVisible(true); // <- Uncomment this line to use dynamic displaying of markers

                        //newMarkers[i].setMap(map);
                        //markerCluster.setMap(map);
                    } else {
                        // newMarkers[i].setVisible(false); // <- Uncomment this line to use dynamic displaying of markers

                        //newMarkers[i].setMap(null);
                        //markerCluster.setMap(null);
                    }
                }
            });

            // Function which set marker to the user position
            function success(position) {
                var center = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                map.panTo(center);
                $('#map').removeClass('fade-map');
            }

        });
        // Enable Geo Location on button click
        $('.geo-location').on("click", function() {
            if (navigator.geolocation) {
                $('#map').addClass('fade-map');
                navigator.geolocation.getCurrentPosition(success);
            } else {
                error('Geo Location is not supported');
            }
        });
    }
}

// Function which set marker to the user position
function success(position) {
    createHomepageGoogleMap(position.coords.latitude, position.coords.longitude);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Property Detail
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function initMap(propertyId) {
    $.getScript("http://localhost/i-service/public/home/get_all_service_json", function(){
        var subtractPosition = 0;
        var mapWrapper = $('#property-detail-map.float');

        if (document.documentElement.clientWidth > 1200) {
            subtractPosition = 0.013;
        }
        if (document.documentElement.clientWidth < 1199) {
            subtractPosition = 0.006;
        }
        if (document.documentElement.clientWidth < 979) {
            subtractPosition = 0.001;
        }
        if (document.documentElement.clientWidth < 767) {
            subtractPosition = 0;
        }

        var mapCenter = new google.maps.LatLng(locations[propertyId][3],locations[propertyId][4]);

        if ( $("#property-detail-map").hasClass("float") ) {
            mapCenter = new google.maps.LatLng(locations[propertyId][3],locations[propertyId][4] - subtractPosition);
            mapWrapper.css('width', mapWrapper.width() + mapWrapper.offset().left )
        }

        var mapOptions = {
            zoom: 15,
            center: mapCenter,
            disableDefaultUI: false,
            scrollwheel: false,
            styles: mapStyles
        };
        var mapElement = document.getElementById('property-detail-map');
        var map = new google.maps.Map(mapElement, mapOptions);

        var pictureLabel = document.createElement("img");
        pictureLabel.src = locations[propertyId][7];
        var markerPosition = new google.maps.LatLng(locations[propertyId][3],locations[propertyId][4]);
        var marker = new MarkerWithLabel({
            position: markerPosition,
            map: map,
            icon: 'http://localhost/i-service/temp/public/img/marker.png',
            labelContent: pictureLabel,
            labelAnchor: new google.maps.Point(50, 0),
            labelClass: "marker-style"
        });
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Google Map - Contact
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function contactUsMap(){
    var mapCenter = new google.maps.LatLng(_latitude,_longitude);
    var mapOptions = {
        zoom: 15,
        center: mapCenter,
        disableDefaultUI: false,
        scrollwheel: false,
        styles: mapStyles
    };
    var mapElement = document.getElementById('contact-map');
    var map = new google.maps.Map(mapElement, mapOptions);

    var marker = new MarkerWithLabel({
        position: mapCenter,
        map: map,
        icon: 'http://localhost/i-service/temp/public/img/marker.png',
        //labelContent: pictureLabel,
        labelAnchor: new google.maps.Point(50, 0),
        labelClass: "marker-style"
    });
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// OpenStreetMap - Homepage
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function createHomepageOSM(_latitude,_longitude){
    setMapHeight();
    if( document.getElementById('map') != null ){
        $.getScript("http://localhost/i-service/public/home/get_all_service_json", function(){
            var map = L.map('map', {
                center: [_latitude,_longitude],
                zoom: 14,
                scrollWheelZoom: false
            });
            L.tileLayer('http://openmapsurfer.uni-hd.de/tiles/roadsg/x={x}&y={y}&z={z}', {
                //L.tileLayer('http://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                //subdomains: '0123',
                attribution: 'Imagery from <a href="http://giscience.uni-hd.de/">GIScience Research Group @ University of Heidelberg</a> &mdash; Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>'
            }).addTo(map);
            var markers = L.markerClusterGroup({
                showCoverageOnHover: false
            });
            for (var i = 0; i < locations.length; i++) {
                var _icon = L.divIcon({
                    html: '<img src="' + locations[i][7] +'">',
                    iconSize:     [40, 48],
                    iconAnchor:   [20, 48],
                    popupAnchor:  [0, -48]
                });
                var title = locations[i][0];
                var marker = L.marker(new L.LatLng(locations[i][3],locations[i][4]), {
                    title: title,
                    icon: _icon
                });
                marker.bindPopup(
                    '<div class="property">' +
                        '<a href="' + locations[i][5] + '">' +
                            '<div class="property-image">' +
                                '<img src="' + locations[i][6] + '">' +
                            '</div>' +
                            '<div class="overlay">' +
                                '<div class="info">' +
                                    '<div class="tag price"> ' + locations[i][2] + '</div>' +
                                    '<h3>' + locations[i][0] + '</h3>' +
                                    '<figure>' + locations[i][1] + '</figure>' +
                                '</div>' +
                            '</div>' +
                        '</a>' +
                    '</div>'
                );
                markers.addLayer(marker);
            }

            map.addLayer(markers);
            map.on('locationfound', onLocationFound);

            function locateUser() {
                $('#map').addClass('fade-map');
                map.locate({setView : true})
            }

            function onLocationFound(){
                $('#map').removeClass('fade-map');
            }

            $('.geo-location').on("click", function() {
                locateUser();
            });

            $('body').addClass('loaded');
            setTimeout(function() {
                $('body').removeClass('has-fullscreen-map');
            }, 1000);
            $('#map').removeClass('fade-map');
        });

    }
}
