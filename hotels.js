$(function() {
	
	/* 
	 * when NEW EXTRA IS ADDED through manage hotels the following code is used to
	 * save it's value in the database and redirect back to the source url
	 * using getContent(). The room id in such case is always taken as a static value of -1
	 * as set in the manage_hotels view.
	 */
	$('.btn-add-extras-hotel').click(function() {
		
		var add_extras_hotels = [];
		
		$('div.new-save-item-extra').each(function() {
			var row = {};
			$(this).find('input,select,textarea').each(function() {
				if ($(this).is(':checkbox')) {
					if ($(this).is(':checked')) {
						row[$(this).attr('name')] = 1;
					}
					else {
						row[$(this).attr('name')] = 0;
					}
				} 
				else {
					row[$(this).attr('name')] = $(this).val();
				}
			});
			add_extras_hotels.push(row);
			
		});
	
	var extra_name 	= $('#extra_name').val();
	var rate		= $('#rate').val();
	var rate_type	= $('#rate_type').val();
	var coefficient	= $('#coefficient').val();
	var category	= $('#category').val();
	var operators	= $('#operators').val();
	
	if(extra_name == ''){
		$('#invalid_extra_name').show();
		$('#extra_name').focus();
		$('#label_extra_name').css('color', '#B94A48');
		return
	}

	if(rate == ''){
		$('#invalid_rate').show();
		$('#rate').focus();
		$('#label_rate').css('color', '#B94A48');
		return
	}

	if(rate_type == ''){
		$('#invalid_rate_type').show();
		$('#rate_type').focus();
		$('#label_rate_type').css('color', '#B94A48');
		return
	}

	if(coefficient == ''){
		$('#invalid_coefficient').show();
		$('#coefficient').focus();
		$('#label_coefficient').css('color', '#B94A48');
		return
	}
	
	if(isNaN(coefficient)){
			$('#invalid_num_coefficient').show();
			$('#coefficient').focus();
			$('#label_coefficient').css('color', '#B94A48');
			return
	}

	if(category == ''){
		$('#invalid_category').show();
		$('#category').focus();
		$('#label_category').css('color', '#B94A48');
		return
	}
	
	if(operators == ''){
		$('#invalid_operators').show();
		$('#operators').focus();
		$('#label_operators').css('color', '#B94A48');
		return
	}
		
	var id 			= $('#id').val();
	var hotel_id 	= $('#hotel_id').val();
	var room_id 	= $('#room_id').val();
		
	$.post( base_url + "hotels/manage_hotels/" + hotel_id, { 
				
				add_extras_hotels: JSON.stringify(add_extras_hotels),
			}).fail(function(response) {
			if (response.status == 400) {
				showErrors($.parseJSON(response.responseText).errors, '#form-status-placeholder');
			} else {
				alert(unknownError);
			}
		}).success(function(response) {
			
			getContent(base_url+'/hotels/manage_hotels/'+ hotel_id);
			
		});
	
	 });

});

	/*
	 * Function To Show Delete Confirmation And Execute Callback Function.
	 *
	 */
	function confirm_delete(extra_id, hotel_id, room_id){
		$("#delete_confirm").dialog({
			  dialogClass: 'ui-dialog-green',
			  autoOpen: true,
			  resizable: false,
			  height: 210,
			  modal: true,
			  buttons: [
				{
					'class' : 'btn red',	
					"text" : "Delete",
					click: function() {
						$.post( base_url + '/hotels/delete_extras/' + extra_id).success(function(response) {
							if(room_id == -1){
								getContent(base_url+'/hotels/manage_hotels/'+hotel_id);	
							}else{													
								getContent(base_url+'/hotels/manage_extras/'+hotel_id+'/'+room_id);
							}
						});
						$(this).dialog( "close" );
					}
				},
				{
					'class' : 'btn',
					"text" : "Cancel",
					click: function() {
						$(this).dialog( "close" );
					}
				}
			  ]
		});
		$('.ui-dialog button').blur();
	}
