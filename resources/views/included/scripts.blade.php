  
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.easing.1.3.js')}}"></script>
    
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
{{-- <script src="assets/js/bootstrap.min.js"></script> --}}
    <script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>

    <script async>(function(w, d) { w.CollectId = "5ca48a06b906024bb01d3def"; var h = d.head || d.getElementsByTagName("head")[0]; var s = d.createElement("script"); s.setAttribute("type", "text/javascript"); s.setAttribute("src", "https://collectcdn.com/launcher.js"); h.appendChild(s); })(window, document);</script>

    <script>

    function initMap(){
   
      var options = {
        zoom:7,
        center:{
            lat:52.2053,lng:-0.1218
        }
      }

      //New map instance
      var map = new google.maps.Map(document.getElementById('map'), options);

      addMarker({lat:52.2053,lng:-0.1218});

        // Add Marker Function
        function addMarker(coords){
            var marker = new google.maps.Marker({
            position:coords,
            map:map
            });
        }
    }
    </script>
    <!-- uses initMap Function -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcSQGsMac0RmMtrC_n-yCj7CEM9H3Acn4&callback=initMap"></script>