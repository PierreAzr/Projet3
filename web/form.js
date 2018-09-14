
//****Fonction pour la page single****
//affiche le formulaire pour repondre a un commentaire
	  function afficher(idVar){
		  document.getElementById('form'+idVar).style.display = "block";
		  document.getElementById('btRepondre'+idVar).style.display = "none";
		  document.getElementById('bts'+idVar).style.display = "none";
	  }
//annule l'affichage du formulaire
	  function enlever(idVar){
		  document.getElementById('form'+idVar).style.display = "none";
		  document.getElementById('btRepondre'+idVar).style.display = "block";
			document.getElementById('btRepondre'+idVar).style.display = "inline";
		  document.getElementById('bts'+idVar).style.display = "block";
			document.getElementById('bts'+idVar).style.display = "inline";
	  }

//****Fonction pour la page admin****
//Affiche le message de confirmation et les boutons pour la suppression
		function sureArt(idVar){
			document.getElementById('formArtDelead'+idVar).style.display = "block";
			document.getElementById('deleadArt'+idVar).style.display = "none";
		}

		function sureCom(idVar){
			document.getElementById('formComDelead'+idVar).style.display = "block";
			document.getElementById('deleadCom'+idVar).style.display = "none";
		}

//annule le message de confirmation pour la suppression
		function notArt(idVar){
			document.getElementById('formArtDelead'+idVar).style.display = "none";
			document.getElementById('deleadArt'+idVar).style.display = "block";

		}

		function notCom(idVar){
			document.getElementById('formComDelead'+idVar).style.display = "none";
			document.getElementById('deleadCom'+idVar).style.display = "block";
		}
