google.maps.event.addDomListener(window, 'load', init);

var map;

function init() {
	
	var mapOptions = {
		
		center: new google.maps.LatLng(27.915835,78.079945),
		zoom: 17,
		zoomControl: true,
		zoomControlOptions: {
			style: google.maps.ZoomControlStyle.SMALL,
		},
		
		disableDoubleClickZoom: true,
		mapTypeControl: true,
		mapTypeControlOptions: {
			style: google.maps.MapTypeControlStyle.DROPDOWN_MENU,
		},
		scaleControl: false,
		scrollwheel: true,
		streetViewControl: true,
		draggable : true,
		overviewMapControl: false,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
		styles: [
		{
			featureType: "landscape",
			stylers: [
			{ saturation: -100 },
			{ lightness: 65 },
			{ visibility: "on" }
			]
		},{
			featureType: "poi",
			stylers: [
			{ saturation: -100 },
			{ lightness: 51 },
			{ visibility: "simplified" }
			]
		},{
			featureType: "road.highway",
			stylers: [
			{ saturation: -100 },
			{ visibility: "simplified" }
			]
		},{
			featureType: "road.arterial",
			stylers: [
			{ saturation: -100 },
			{ lightness: 30 },
			{ visibility: "on" }
			]
		},{
			featureType: "road.local",
			stylers: [
			{ saturation: -100 },
			{ lightness: 40 },
			{ visibility: "on" }
			]
		},{
			featureType: "transit",
			stylers: [
			{ saturation: -100 },
			{ visibility: "simplified" }
			]
		},{
			featureType: "administrative.province",
			stylers: [
			{ visibility: "off" }
			]
	/** /
		},{
			featureType: "administrative.locality",
			stylers: [
				{ visibility: "off" }
			]
		},{
			featureType: "administrative.neighborhood",
			stylers: [
				{ visibility: "on" }
			]
			/**/
		},{
			featureType: "water",
			elementType: "labels",
			stylers: [
			{ visibility: "on" },
			{ lightness: -25 },
			{ saturation: -100 }
			]
		},{
			featureType: "water",
			elementType: "geometry",
			stylers: [
			{ hue: "#ffff00" },
			{ lightness: -25 },
			{ saturation: -97 }
			]
		}
		],
		
	}
	
	var mapElement = document.getElementById('map');
	var map = new google.maps.Map(mapElement, mapOptions);
	var image = 'assets/images/map-icon.png';
	var marker = new google.maps.Marker({
          position: map.getCenter(),
          icon: image,
		  animation: google.maps.Animation.DROP,
		  verticalAlign: 'bottom',
		  horizontalAlign: 'center',
		  backgroundColor: '#3e8bff',
          draggable: true,
		  
          map: map
        });

	infowindow = new google.maps.InfoWindow({content:"<b>Electronics Engineering Dept.</b>" });
	google.maps.event.addListener(marker, "click", function()
	{
		infowindow.open(map,marker);
		});
		infowindow.open(map,marker);
		
		google.maps.event.addDomListener(window, 'load', init_map);
}
