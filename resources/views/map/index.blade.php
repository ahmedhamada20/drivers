@extends('layouts.app')
@section('header_extends')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" />
@endsection
@section('content')

    <div id="map" style='height:800px'></div>

@endsection
@section('footer_extends')



    <script type="text/javascript">
        function initializeMap() {
            const locations = <?php echo json_encode($locations) ?>;

            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 25,
                center: locations,

            });

            var infowindow = new google.maps.InfoWindow();
            var bounds = new google.maps.LatLngBounds();
            for (var location of locations) {
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(location.lat, location.lng),
                    map: map,

                });
                bounds.extend(marker.position);
                google.maps.event.addListener(marker, 'click', (function(marker, location) {
                    return function() {
                        infowindow.setContent(location.lat + " & " + location.lng);
                        infowindow.open(map, marker);
                    }
                })(marker, location));

            }
            map.fitBounds(bounds);
        }
    </script>

    <script type="text/javascript" src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initializeMap"></script>




@endsection
