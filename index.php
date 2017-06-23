<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Randonnée à la Réunion</title>
  <link rel="stylesheet" href="css/basics.css" type="text/CSS">
  <link href="https://fonts.googleapis.com/css?family=Bangers|Josefin+Sans" rel="stylesheet">
  <script src="jquery.js"></script>
</head>

<body>

<div class="nav">
  <h1>Bienvenue sur Rando'Reunion</h1>
</div>

<div class="menu">
  <ul>
    <li>Visite guidée</li>
    <li><a id="create">Creation randonnées</a></li>
    <li><a href="update.php">Mettre à jour une randonnée</a></li>
    <li><a id="reader">Liste des randonnées</a></li>
  </ul>
</div>
<div class="main">
<div class="container2"></div>

<div class="container"></div>
</div>
<div class="second"></div>

<script>

$("#create").click(function(){
    $(".container2").html(
      '<h3>Création randonnée</h3>'+
      '<form id="my_form" action="create.php" method="post">'+
    		'<div>'+
    			'<label for="name">Name</label>'+
    			'<input type="text" name="name" value="">'+
    	'</div>'+
    	'<div>'+
    		'<label for="difficulty">Difficulté</label>'+
    		'<select name="difficulty">'+
    		'<option value="tres facile">Très facile</option>'+
    			'<option value="facile">Facile</option>'+
    				'<option value="moyen">Moyen</option>'+
    				'<option value="difficile">Difficile</option>'+
            '<option value="tres difficile">Très difficile</option>'+
    		'</select>'+
    		'</div>'+
    		'<div>'+
    			'<label for="distance">Distance</label>'+
    			'<input type="text" name="distance" value="">'+
    		'</div>'+
    		'<div>'+
    			'<label for="duration">Durée</label>'+
    			'<input type="duration" name="duration" value="">'+
    		'</div>'+
    		'<div>'+
    			'<label for="height_difference">Dénivelé</label>'+
    			'<input type="text" name="height_difference" value="">'+
    		'</div>'+
    		'<button id="btn" type="submit" name="submit">Valider</button>'+
    	'</form>'
  );


  function traitement(){
  	$.ajax({
  		 url : 'reader.php',
  		 type : 'get',
  		success: function(data){
  			$(".second").html('<h3>Liste des randonnées</h3>' + data);
  	// -----------------SUPPRESSION---------------------
  			$(".delete").click(function(){
  				var idrandonnee = $(this).attr("id");
  				$.post('delete.php', {id:idrandonnee}, function(response){
  					traitement();
  				});
  			});
  		},
  		error : function() {
  			$('.second').html('<h3>ERROR !!!!!!!!!!!!!!!!!!!!!</h3>');
  		}
  	});
  }




  $('#my_form').on('submit', function (e) {
          // On empêche le navigateur de soumettre le formulaire
          e.preventDefault();
          var $form = $(this);
          var formdata = (window.FormData) ? new FormData($form[0]) : null;
          var data = (formdata !== null) ? formdata : $form.serialize();
          $.ajax({
              url: $form.attr('action'),
              type: $form.attr('method'),
              contentType: false, // obligatoire pour de l'upload
              processData: false, // obligatoire pour de l'upload
              data: data,
              success: function (response) {
                  // La réponse du serveur
                  alert("Randonnée ajouté !");

              }
          });
      });

      $("#reader").click(function(){
      traitement();
       });
  });


  // -------------------------------------------------------------------------------------------------- //

                      $('.container2,.container').hide()
                                        $('#create').on('click', function(){
                                          $(this).toggleClass('active');
                                          $('.container2').slideToggle(600);
                                          $('.container').slideToggle(600);
                                        });
                                        $('.second').hide()
                                                $("#reader").on('click', function(){
                                                  $(this).toggleClass('active');
                                                  $('.second').slideToggle(600);
                                                });





                                          </script>

</body>
</html>
