/**
 * DataTables Basic
 */

 $(function () {
	'use strict';
	$(document).ready(function(){
	var dt_basic_table = $('.datatables-basic'),
	  	dt_date_table = $('.dt-date'),
	  	assetPath = '../app-assets/';
	
	var form_comm = $('#form_comm');
  
	
  
	// DataTable with buttons
	// --------------------------------------------------------------------
	if (dt_basic_table.length) {
	  var dt_basic = dt_basic_table.DataTable({
		ajax: 'table/php/data_liste_message.php?job=get_liste_message',
		columns: [    
		  { data: 'responsive_id' },
		  { data: 'id' },
		  { data: 'id' }, 
		  { data: 'full_name' },
		  { data: 'etat' },
		  { data: 'date' },
		  { data: 'titre' },
		  { data: 'Actions' }
		],
		stateSave: true,
		columnDefs: [
		  {
			// For Responsive
			className: 'control',
			orderable: false,
			responsivePriority: 2,
			targets: 0
		  },
		  {
			targets: 2,
			visible: false
		  },
		  {
			// Avatar image/badge, Name and post
			targets: 3,
			responsivePriority: 4,
			render: function (data, type, full, meta) {
			  var $user_img = full['avatar'],
				$name = full['full_name'];
			  if ($user_img) {
				// For Avatar image
				var $output =
				  '<img src="' + assetPath + 'images/portrait/small/man.png" alt="Avatar" width="32" height="32">';
			  } else {
				// For Avatar badge
				var stateNum = full['status'];
				var states = ['success', 'danger', 'warning', 'info', 'dark', 'primary', 'secondary'];
				var $state = states[stateNum],
				  $name = full['full_name'],
				  $initials = $name.match(/\b\w/g) || [];
				$initials = (($initials.shift() || '') + ($initials.pop() || '')).toUpperCase();
				$output = '<span class="avatar-content">' + $initials + '</span>';
			  }
  
			  var colorClass = $user_img === '' ? ' bg-light-' + $state + ' ' : '';
			  // Creates full output for row
			  var $row_output =
				'<div class="d-flex  align-items-center">' +'<div class="avatar ' +
				colorClass +
				' mr-1">' +
				$output +
				'</div>' +
				'<div class="d-flex flex-column">' +
				'<span class="emp_name text-truncate font-weight-bold">' +
				$name +
				'</span>' +
				'</div>' +
				'</div>';
			  return $row_output;
			}
		  },
		  {
			responsivePriority: 1,
			targets: 4
		  }
		],
		order: [[2, 'desc']],
		dom:
		  '<"card-header border-bottom p-1"<"head-label"><"dt-action-buttons text-right"B>><"d-flex justify-content-between align-items-center mx-0 row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>t<"d-flex justify-content-between mx-0 row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
		displayLength: 7,
		lengthMenu: [7, 10, 25, 50, 75, 100],
		buttons: [
		  {
			extend: 'collection',
			className: 'btn btn-outline-secondary dropdown-toggle mr-0',
			text: feather.icons['share'].toSvg({ class: 'font-small-4 mr-50' }) + 'Export',
			buttons: [
			  {
				extend: 'print',
				text: feather.icons['printer'].toSvg({ class: 'font-small-4 mr-50' }) + 'Print',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6, 7] }
			  },
			  {
				extend: 'csv',
				text: feather.icons['file-text'].toSvg({ class: 'font-small-4 mr-50' }) + 'Csv',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6, 7] }
			  },
			  {
				extend: 'excel',
				text: feather.icons['file'].toSvg({ class: 'font-small-4 mr-50' }) + 'Excel',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6, 7] }
			  },
			  {
				extend: 'pdf',
				text: feather.icons['clipboard'].toSvg({ class: 'font-small-4 mr-50' }) + 'Pdf',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6, 7] }
			  },
			  {
				extend: 'copy',
				text: feather.icons['copy'].toSvg({ class: 'font-small-4 mr-50' }) + 'Copy',
				className: 'dropdown-item',
				exportOptions: { columns: [3, 4, 5, 6, 7] }
			  }
			],
			init: function (api, node, config) {
			  $(node).removeClass('btn-secondary');
			  $(node).parent().removeClass('btn-group');
			  setTimeout(function () {
				$(node).closest('.dt-buttons').removeClass('btn-group').addClass('d-inline-flex');
			  }, 50);
			}
		  },
		  {
			text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'Nouveau message',
			className: 'create-new btn btn-primary ml-1',
			attr: {
			  'data-toggle': 'modal',
			  'data-target': '#modals-slide-in',
			  'id': 'message_solo'
			},
			init: function (api, node, config) {
			  $(node).removeClass('btn-secondary');
			}
		  },
		  {
			text: feather.icons['plus'].toSvg({ class: 'mr-50 font-small-4' }) + 'Envoyer un message à tous le monde',
			className: 'create-new btn btn-success ml-1',
			attr: {
			  'data-toggle': 'modal',
			  'data-target': '#modals-slide-in-1'
			},
			init: function (api, node, config) {
			  $(node).removeClass('btn-secondary');
			}
		  }
		],
		responsive: {
		  details: {
			display: $.fn.dataTable.Responsive.display.modal({
			  header: function (row) {
				var data = row.data();
				return 'Details of ' + data['full_name'];
			  }
			}),
			type: 'column',
			renderer: function (api, rowIdx, columns) {
			  var data = $.map(columns, function (col, i) {
				console.log(columns);
				return col.title !== '' // ? Do not show row in modal popup if title is blank (for check box)
				  ? '<tr data-dt-row="' +
					  col.rowIndex +
					  '" data-dt-column="' +
					  col.columnIndex +
					  '">' +
					  '<td>' +
					  col.title +
					  ':' +
					  '</td> ' +
					  '<td>' +
					  col.data +
					  '</td>' +
					  '</tr>'
				  : '';
			  }).join('');
  
			  return data ? $('<table class="table"/>').append(data) : false;
			}
		  }
		},
		language: {
		  paginate: {
			previous: '&nbsp;',
			next: '&nbsp;', 
		  },
		  info: "Affichage page _PAGE_ jusqu'à _PAGES_",
		  lengthMenu: "Affichage _MENU_ lignes par page",
		  search: "Recherche :",
		  zeroRecords: "Aucunes données disponibles !",
		  infoEmpty: "Aucun enregistrement disponible",
		  infoFiltered: "(filtré depuis _MAX_ total des enregistrements)",
		  loadingRecords: "Veuillez patienter - chargement ..."
		}
	  });
	  $('div.head-label').html('<h6 class="mb-0">Liste des messages reçus</h6>');
	
	}
	// Flat Date picker
	if (dt_date_table.length) {
	  dt_date_table.flatpickr({
		monthSelectorType: 'static',
		dateFormat: 'm/d/Y'
	  });
	}

	var form_company = $('#form_message');
	// hide new sidebar starts //	
	// add new sidebar starts //	
	$(document).on('click', '#message_solo', function(e){

		e.preventDefault();
			
		$('#exampleModalLabel').text("Nouveau message :");
		
		$('#form_message #btn_envoie_message_single').text('Envoyer le Message');	
		$('#form_message #btn_envoie_message_single_annule').text('Annuler');	
		
		
		$('#form_message #basic-icon-default-post').val('');
		
		 
		 
	});  


	$(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function() {
		$(".add-new-data").removeClass("show")
		$(".overlay-bg").removeClass("show")
		$("#data-name, #data-price").val("")
		$("#data-category, #data-status").prop("selectedIndex", 0)
	})
	
	$(document).on('submit', '#form_message', function(e){
		e.preventDefault();
		
					  
		  var form_data = $('#form_message').serialize();
		  var onSuccess = function (data) {
			console.log('Success');
			
			$("#modals-slide-in").removeClass("show");

			$(".modal-backdrop").removeClass("show");

			var table = dt_basic_table.DataTable();
			table.ajax.reload(function(){
				Swal.fire({
					title: "BRAVO !",
					text: "Votre message est bien envoyé !",
					type: "success",
					confirmButtonClass: 'btn btn-primary',
					buttonsStyling: false,
				});
			}, true);
		
		  };
		  var onError = function (jqXHR, textStatus, errorThrown) {
			  console.log(jqXHR);
			  console.log(textStatus);
			  console.log(errorThrown);
			  alert("Probléme de mise à jour de la base de donnée");
		  
		  };
		  
		  var onBeforeSend = function () {
			  console.log("Loading");          
			  $.blockUI({
				message: '<div class="spinner-border text-white" role="status"></div>',
				timeout: 1000,
				css: {
				  backgroundColor: 'transparent',
				  border: '0'
				},
				overlayCSS: {
				  opacity: 0.5
				}
			  });
		  };
		  var request   = $.ajax({
			url:          'table/php/data_liste_message.php?job=add_message',
			data:         form_data,
			type:         'post',
			async: false,
			beforeSend: onBeforeSend,
			error: onError,
			success: onSuccess
		  });
	});
	
	$(document).on('submit', '#form_message_all', function(e){
		e.preventDefault();
		
					  
		  var form_data = $('#form_message_all').serialize();
		  var onSuccess = function (data) {
			console.log('Success');
			
			$("#modals-slide-in-1").removeClass("show");

			$(".modal-backdrop").removeClass("show");

			var table = dt_basic_table.DataTable();
			table.ajax.reload(function(){
				Swal.fire({
					title: "BRAVO !",
					text: "Votre message est bien envoyé à tous le monde!",
					type: "success",
					confirmButtonClass: 'btn btn-primary',
					buttonsStyling: false,
				});
			}, true);
		
		  };
		  var onError = function (jqXHR, textStatus, errorThrown) {
			  console.log(jqXHR);
			  console.log(textStatus);
			  console.log(errorThrown);
			  alert("Probléme de mise à jour de la base de donnée");
		  
		  };
		  
		  var onBeforeSend = function () {
			  console.log("Loading");          
			  $.blockUI({
				message: '<div class="spinner-border text-white" role="status"></div>',
				timeout: 1000,
				css: {
				  backgroundColor: 'transparent',
				  border: '0'
				},
				overlayCSS: {
				  opacity: 0.5
				}
			  });
		  };
		  var request   = $.ajax({
			url:          'table/php/data_liste_message.php?job=add_message_all',
			data:         form_data,
			type:         'post',
			async: false,
			beforeSend: onBeforeSend,
			error: onError,
			success: onSuccess
		  });
	});

	$(document).on('click', '#id_lire', function(e){
		
		e.preventDefault();

		var id      = $(this).data('id');	

		var request = $.ajax({
			url:          'table/php/data_liste_message.php?job=get_message_lecture',
			cache:        false,
			data:         'id=' + id,
			dataType:     'json',
			contentType:  'application/json; charset=utf-8',
			type:         'get'
		});
		
		request.done(function(output){
		  if (output.result == 'success'){ 
			  
			$('#exampleModalLabel-2').text("Message réçu :");
		
			$('#form_message_lecture #btn_envoie_message_single_repondre').text('Répondre');	
			$('#form_message_lecture #btn_envoie_message_single_effacer').text('Effacer');	
			
			
			$('#form_message_lecture #basic-icon-default-exp').val(output.data[0].nom_exp);	
			$('#form_message_lecture #basic-icon-default-post-read').val(output.data[0].nom_titre);
			$('#form_message_lecture #editor_2').val(output.data[0].nom_txt);	
	
			
		  } else {
		  }
		});		
			
		
	});

	$(document).on('submit', '#form_message_repondre', function(e){
		e.preventDefault();
		
					  
		  var form_data = $('#form_message_repondre').serialize();
		  var onSuccess = function (data) {
			console.log('Success');
			
			$("#modals-slide-in-repondre").removeClass("show");

			$(".modal-backdrop").removeClass("show");

			var table = dt_basic_table.DataTable();
			table.ajax.reload(function(){
				Swal.fire({
					title: "BRAVO !",
					text: "Votre message est bien envoyé !",
					type: "success",
					confirmButtonClass: 'btn btn-primary',
					buttonsStyling: false,
				});
			}, true);
		
		  };
		  var onError = function (jqXHR, textStatus, errorThrown) {
			  console.log(jqXHR);
			  console.log(textStatus);
			  console.log(errorThrown);
			  alert("Probléme de mise à jour de la base de donnée");
		  
		  };
		  
		  var onBeforeSend = function () {
			  console.log("Loading");          
			  $.blockUI({
				message: '<div class="spinner-border text-white" role="status"></div>',
				timeout: 1000,
				css: {
				  backgroundColor: 'transparent',
				  border: '0'
				},
				overlayCSS: {
				  opacity: 0.5
				}
			  });
		  };
		  var request   = $.ajax({
			url:          'table/php/data_liste_message.php?job=add_message',
			data:         form_data,
			type:         'post',
			async: false,
			beforeSend: onBeforeSend,
			error: onError,
			success: onSuccess
		  });
	});
	 
  });
  });  