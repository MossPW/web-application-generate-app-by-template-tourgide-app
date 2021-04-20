<!doctyp html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Get Latitude and Longitude</title>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCR35-UWnQNx_F6uO85_8LjLteDHodNFkE
&libraries=places&region=uk&language=th&sensor=true"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>
<body>

Address:
<input id="searchTextField" type="text" size="50" style="text-align: left;width:357px;direction: ltr;">
<br>
            latitude:<input name="latitude" class="MapLat" value="" type="text" placeholder="Latitude" style="width: 161px;" disabled>
            longitude:<input name="longitude" class="MapLon" value="" type="text" placeholder="Longitude" style="width: 161px;" disabled>

    <div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>




<script src="myjs.js"></script>
</body>
</html>
