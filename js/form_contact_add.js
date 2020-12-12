$("#btnAddContact").on("click", function() {
	var name = $("#name").val().trim();
	var phone = $("#phone").val().trim();
	//var datetime = $("#datetime");
	
	if(name == ""){
		$("#errMessage").text("Имя контакта не указано");
		return false;
	} else if(phone == ""){
		$("#errMessage").text("Телефон контакта не указан");
		return false;
	}
	
	$("#errMessage").text("");
	
	$.ajax({
		url: 'ajax/contact_add.php',
		type: 'POST',
		cache: false,
		data: {'name': name, 'phone': phone},
		dataType: 'html',
		beforeSend: function(){
			$("#btnAddContact").prop("disabled", true);
		},
		success: function(data){
			if(!data)
				$("#errMessage").text("Что-то пошло не так. Попробуйте ещё раз.");
			else
				//$("#errMessage").text("Контакт добавлен.");
				//alert("Контакт добавлен.");
				$("#form_contact_add").trigger("reset");
				
			$("#btnAddContact").prop("disabled", false);
		}
	});
	
	  $.ajax({
		url: 'ajax/contact_list.php',
		type: "POST",
		cache: false,
		data: $(this).serialize(),
		success: function (data) {
		  $('#table_contact_list').html(data);
		  //$('#table_contact_list').html(append);
		}
	  });
	  return false; // !!!
	
});