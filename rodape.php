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




<!-- <script>
let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });
</script> -->

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
