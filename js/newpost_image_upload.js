
$("input:file[name='images']").change(function(){
	var file_data = $("input:file[name='images']").prop('files')[0];   
	//console.log($("input:file[name='images']").prop('files')[0]);
	var form_data = new FormData();                  
	form_data.append('file', file_data);
     $.ajax({
     	url:"upload.php",
     	dataType: 'text',
     	type:"POST",
     	enctype:"multipart/form-data",
     	data: form_data,
     	timeout: 100000,
     	cache: false,
     	contentType: false,
     	processData: false,
     	success:function(response){
     		alert(response);
     		$("#post_image").val(response);
     		console.log(response);
     	}
     });
 });