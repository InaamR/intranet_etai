! function(t) {
    "use strict";
$(document).ready(function(){
	
var table_companies = $('#table_niveau').dataTable({
		
	"bStateSave": false,
	
	
    "ajax": "table/php/data_liste_comm_dg.php?job=get_liste_comm_dg",
	
	
    "columns": [
	
	
		{ "data": "Niveau", "sClass": "" },
		
		{ "data": "Date_insertion", "sClass": "" },	
				
		{ "data": "bouton", "sClass": "" }
	  
    ],
	
	
    dom: 'Bfrtip',
	colReorder: true,
	"language": {
		"sEmptyTable":     "Aucune donnée disponible dans le tableau",
		"sInfo":           "Affichage de l'élément _START_ à _END_ sur _TOTAL_ éléments",
		"sInfoEmpty":      "Affichage de l'élément 0 à 0 sur 0 élément",
		"sInfoFiltered":   "(filtré à partir de _MAX_ éléments au total)",
		"sInfoPostFix":    "",
		"sInfoThousands":  ",",
		"sLengthMenu":     "Afficher _MENU_ éléments",
		"sLoadingRecords": "Chargement...",
		"sProcessing":     "Traitement...",
		"sSearch":         "Rechercher :",
		"sZeroRecords":    "Aucun élément correspondant trouvé",
		"oPaginate": {
			"sFirst":    "Premier",
			"sLast":     "Dernier",
			"sNext":     "Suivant",
			"sPrevious": "Précédent"
		},
		"oAria": {
			"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
			"sSortDescending": ": activer pour trier la colonne par ordre décroissant"
		}
	},
	buttons: [
		{
			extend: 'copyHtml5',
			exportOptions: {
				columns: [ 0, ':visible' ]
			}
		},
		{
			extend: 'pdfHtml5',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'print',
			exportOptions: {
				columns: ':visible'
			}
		},
		{
			extend: 'csv',
			exportOptions: {
				columns: ':visible'
			}
		}
	]
  });
  
 var form_company = $('#form_company');
  form_company.validate();
  
	$(document).on('click', '#refresh', function(e){
		table_companies.api().ajax.reload(function(){
		hide_loading_message();
		show_message("Rafraîchissement terminé", 'success');
		}, true);
	});
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
  
  // add new sidebar starts //	
  $(document).on('click', '#add_niveau', function(e){
	 e.preventDefault();
	 	
			$('#titre_h4').text("Ajouter un nouveau niveau");
			
			$('#form_company #btn_ok').text('Ajouter');
			
			$('#form_company').attr('class', 'form add');
			
			$('#form_company').attr('data-id', '');
			
			
			$('#form_company .field_container label.error').hide();	  
			$('#form_company .field_container').removeClass('valid').removeClass('error');
			
			$('#form_company #nom_niveau').val('');
			
			
			
			$(".add-new-data").addClass("show");
			$(".overlay-bg").addClass("show");
	  
	  
  });  
  
  
  // add new sidebar ends //	
  
  
  
    // hide new sidebar starts //	
  
  $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
    $(".add-new-data").removeClass("show")
    $(".overlay-bg").removeClass("show")
    $("#data-name, #data-price").val("")
    $("#data-category, #data-status").prop("selectedIndex", 0)
  })
  
    // hide new sidebar starts //	
  
   $(document).on('submit', '#form_company.add', function(e){
	  
    e.preventDefault();
	
	  			
      var form_data = $('#form_company').serialize();
	  
      var request   = $.ajax({
        url:          'table/php/data_liste_niveau.php?job=add_niveau',
        cache:        false,
        data:         form_data,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get'
      });
	  
      request.done(function(output){
        if (output.result == 'success'){
			
			$(".add-new-data").removeClass("show");
    		$(".overlay-bg").removeClass("show");			
			
			table_companies.api().ajax.reload(function(){
				Swal.fire({
				  title: "BRAVO !",
				  text: "Nouveau niveau ajouté avec succés",
				  type: "success",
				  confirmButtonClass: 'btn btn-primary',
				  buttonsStyling: false,
				});
   				//toastr.success('Nouvelle équipe ajoutée avec succés', 'succés', { positionClass: 'toast-bottom-full-width' , "progressBar": true , "closeButton": true }); 					
			}, true);
		  
        } else {
			Swal.fire({
			  title: "ERREUR !",
			  text: "ALERTE : " + output.message,
			  type: "error",
			  confirmButtonClass: 'btn btn-primary',
			  buttonsStyling: false,
			});
		  //toastr.warning("ALERTE : " + output.message, 'error', { positionClass: 'toast-bottom-full-width' , "progressBar": true , "closeButton": true });
        }
      });
	  
      request.fail(function(jqXHR, textStatus){
		Swal.fire({
		  title: "ERREUR !",
		  text: "ALERTE : " + output.message,
		  type: "error",
		  confirmButtonClass: 'btn btn-primary',
		  buttonsStyling: false,
		});  
        //toastr.warning("ALERTE : " + output.message, 'error', { positionClass: 'toast-bottom-full-width' , "progressBar": true , "closeButton": true });
      });
  });
  







$(document).on('click', '#confirm-color', function(e){
	
				
   
		Swal.fire({
		  title: 'Êtes-vous sûr ?',
		  text: "Vous ne pourrez pas annuler cela !",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Oui, supprimez-le !',
		  confirmButtonClass: 'btn btn-primary',
		  cancelButtonClass: 'btn btn-danger ml-1',
		  buttonsStyling: false,
		}).then(function (result) {
		  if (result.value) {
							e.preventDefault();
							var id      = $("#confirm-color").data('id');
							var name      = $("#confirm-color").data('name');
							var request = $.ajax({
							url:          'table/php/data_liste_niveau.php?job=del_niveau&id=' + id,
							cache:        false,
							dataType:     'json',
							contentType:  'application/json; charset=utf-8',
							type:         'get'
							});
							
							request.done(function(output){
								if (output.result == 'success'){
								  table_companies.api().ajax.reload(function(){
									  Swal.fire({
										  type: "success",
										  title: 'Supprimée!',
										  text: "Niveau '" + name + "' effacé avec succès.",
										  confirmButtonClass: 'btn btn-success',
										})
								  }, true);
								} else {
									Swal.fire({
									  title: 'Annulée',
									  text: "Une erreur s'est produite lors de l'enregistrement " + textStatus,
									  type: 'error',
									  confirmButtonClass: 'btn btn-success',
									})
								}
							});
							request.fail(function(jqXHR, textStatus){
								Swal.fire({
								  title: 'Annulée',
								  text: "Une erreur s'est produite lors de l'enregistrement " + textStatus,
								  type: 'error',
								  confirmButtonClass: 'btn btn-success',
								})
							})
			
		  }
		  else if (result.dismiss === Swal.DismissReason.cancel) {
			  
			Swal.fire({
			  title: 'Annulée',
			  text: 'Votre fichier est en sécurité',
			  type: 'error',
			  confirmButtonClass: 'btn btn-success',
			})
		  }
		})
	  });
	  










  $(document).on('click', '#function_edit_niveau', function(e){
		e.preventDefault();
		var id      = $(this).data('id');
		var name      = $(this).data('name');
		
		var request = $.ajax({
		  url:          'table/php/data_liste_niveau.php?job=get_niveau_edit',
		  cache:        false,
		  data:         'id=' + id,
		  dataType:     'json',
		  contentType:  'application/json; charset=utf-8',
		  type:         'get'
		});
		
		request.done(function(output){
		  if (output.result == 'success'){ 
			  
				$('#titre_h4').text("Modifier le niveau : " + name);
				
				$('#form_company #btn_ok').text('Modifier');
				
				$('#form_company').attr('class', 'form edit');
				
				$('#form_company').attr('data-id', id);
				
				$('#form_company #nom_niveau').val(output.data[0].nom_niveau);
				
				
				$(".add-new-data").addClass("show");
				$(".overlay-bg").addClass("show");
	
			
		  } else {
			hide_loading_message();
			show_message("Une erreur s'est produite lors de l'enregistrement", 'error');
		  }
		});
		
	  });


	  $(document).on('submit', '#form_company.edit', function(e){
		e.preventDefault();
		if (form_company.valid() == true){
		  var id        = $('#form_company').attr('data-id');
		  var form_data = $('#form_company').serialize();
		  var request   = $.ajax({
			url:          'table/php/data_liste_niveau.php?job=niveau_edit&id=' + id,
			cache:        true,
			data:         form_data,
			dataType:     'json',
			contentType:  'application/json; charset=utf-8',
			type:         'get'
		  });
		  request.done(function(output){
			if (output.result == 'success'){
				$(".add-new-data").removeClass("show");
    			$(".overlay-bg").removeClass("show");
				table_companies.api().ajax.reload(function(){
					Swal.fire({
					  title: "BRAVO !",
					  text: "Niveau modifié avec succés",
					  type: "success",
					  confirmButtonClass: 'btn btn-primary',
					  buttonsStyling: false,
					});
					//toastr.success('Nouvelle équipe ajoutée avec succés', 'succés', { positionClass: 'toast-bottom-full-width' , "progressBar": true , "closeButton": true }); 			
				}, true);
				
				       
			} else {
				
			  	Swal.fire({
				  title: 'Annulée',
				  text: 'La demande de modification a échoué : ' + textStatus,
				  type: 'error',
				  confirmButtonClass: 'btn btn-success',
				})
				
			}
		  });
		  
		  request.fail(function(jqXHR, textStatus){
			  
			  Swal.fire({
				  title: 'Annulée',
				  text: 'La demande de modification a échoué : ' + textStatus,
				  type: 'error',
				  confirmButtonClass: 'btn btn-success',
				})
				
		  });
		}
	  });












































  

 
  

});
}(jQuery);