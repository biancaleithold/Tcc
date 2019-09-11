<!-- <script
  src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
 </script> -->

<script  type="text/javascript"
  src="js/jquery.min.js">
</script>

<script type="text/javascript" src="Semantic-UI-CSS-master/package.js"></script>
<script type="text/javascript" src="Semantic-UI-CSS-master/semantic.js"></script>
<script type="text/javascript" src="Semantic-UI-CSS-master/semantic.min.js"></script>
<script type="text/javascript" src="Semantic-UI-CSS-master/package.json"></script>


<script type="text/javascript">
$('.label.ui.dropdown')
  .dropdown();

$('.no.label.ui.dropdown')
  .dropdown({
  useLabels: false
});

$('.ui.button').on('click', function () {
  $('.ui.dropdown')
    .dropdown('restore defaults')
});

</script>

<script type="text/javascript">
$('ui.search.dropdown')
  .dropdown();

$('.no.ui.search.dropdown')
  .dropdown({
  useLabels: false
});

</script>

<script type="text/javascript">
  $('.ui.modal')
  .modal('attach events', '.test.button','show');
</script>

<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
	var x = document.getElementById("navDemo");
  	if (x.className.indexOf("w3-show") == -1) {
    	x.className += " w3-show";
  	} else { 
    	x.className = x.className.replace(" w3-show", "");
  	}
}

</script>

<footer class="w3-container w3-padding-64 w3-center">  
	<div class="w3-xlarge w3-padding-32">
    	<i class="fa fa-facebook-official w3-hover"></i>
    	<i class="fa fa-instagram w3-hover"></i>
    	<i class="fa fa-pinterest-p w3-hover"></i>
 	</div>
 	<p>Bianca - Elizabeth - Karen</p>
</footer>

</body>

</html>
