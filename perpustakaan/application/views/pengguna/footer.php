<footer>
    <div class="container">
        <div class="row">

            <div class="col-sm-6 col-md-6">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Perpustakaan IAI Al-Khairat</h5>
                        <p>
                            Perpustakaan milik Institut Agama Islam Al-Khairat.
                        </p>
                        <ul>
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                </span> Jl. Raya Palengaan (Paludding) No. 02 (9,41 km), Kab.Pamekasan 69301
                            </li>
                            <li>
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                                </span> (0324) 3515042
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 ">
                <div class="wow fadeInDown" data-wow-delay="0.1s">
                    <div class="widget">
                        <h5>Lokasi IAI Al-Khairat</h5>
                        <div id="map"></div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="sub-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                        <div class="text-left">
                            <p>&copy;Copyright 2019 - Bikea Technocraft.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                        <div class="text-right">

                        </div>
                        <!-- 
                        All links in the footer should remain intact. 
                        Licenseing information is available at: http://bootstraptaste.com/license/
                        You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Medicio
                    -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 300px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
</style>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC2kqVASiPcNKDyOzplhdKjqPXQqnxXw2E&callback=initMap">
</script>
<script>
    function initMap() {
        var uluru = {
            lat: -7.0996619,
            lng: 113.4728553
        };
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 9,
            center: uluru
        });

        var contentString = '<div id="content">' +
            '<div id="siteNotice">' +
            '</div>' +
            '<h3 id="firstHeading" class="firstHeading">IAI Al-Khairat</h3>' +
            '</div>' +
            '</div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString
        });

        var marker = new google.maps.Marker({
            position: uluru,
            map: map,
            title: 'Uluru (Ayers Rock)'
        });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });
    }
</script>