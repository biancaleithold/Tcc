<!-- <script
  src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous">
 </script> -->

<script  type="text/javascript"
  src="js/jquery.min.js">
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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


<script>
   function clique(img){
        var modal=document.getElementById('janelaModal');
        var modalImg=document.getElementById("imgModal");
        var btFechar=document.getElementsByClassName("fechar")[0];
        
        modal.style.display="block";
        modalImg.src=img.src;
             
        
        btFechar.onclick=function(){
        modal.style.display="none";
      }
   }
        
</script>

<script>
var slideIndex = 1;
showSlides(slideIndex);

  function plusSlides(n) {
  showSlides(slideIndex += n);
  ga('send', 'event', 'galeria', 'next_prev', 'Titulo da página');
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {
    slideIndex = 1
  }
  if (n < 1) {
    slideIndex = slides.length
  }
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slides[slideIndex - 1].style.display = "block";
}
</script>

<script>
 function formatar(mascara, documento){
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)
  
  if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  }
  
}
</script>

<script type="text/javascript">
//Script by klonder (em uma noite inspirada!!!)
function mascara(l,m,i){
//l: local do objeto --> this;
//m: máscara;
//i: caractere inicial (posição zero da máscara;

var iCount = l.value.length;

//Digite os símbolos especiais que permanecerão em seus locais corretos:
var simbolosEspeciais = "()/-.";	
	
	if (iCount < m.length) {
		 //Verificando se foi passado o parâmetro inicial "i":
		if (iCount == 1 && i != ""){
			l.value = i+l.value;	
		} else {
		
			if (simbolosEspeciais.indexOf(m.substr(iCount,1)) != -1) {
				l.value = l.value+m.substr(iCount,1);
			
				if (m.substr(iCount+1,1) == " ") {
				l.value = l.value+" ";
				}
			}
		
			if (m.substr(iCount,1) == " ") {
				l.value = l.value+" ";
			}
		}

	} else {
		l.value = l.value.substr(0,m.length);
	}
} 
</script>

<footer class="w3-container w3-center" style="margin: 2%;">  
	
  <img class="w3-xlarge" style="width: 20%; margin-top: 2%;" src="imagens/logo.png"> 	
 	<p>Bianca - Elizabeth - Karen</p>
  <p>2019</p>

</footer>

</body>

</html>
