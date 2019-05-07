$(document).ready(function(){
	$('.setData').css('display','none');
	$('.ask').css('display','none');
	$('.formChange').css('display','none');
	$('.removeAll').css('display','none');
	$('a').click(function(e){
		// $('.formChange').css('display','block');
		var a = $(this).html();

		$('#nameChoose').attr('value',a);
		$('.setData').css('display','block');
		$('.ask').css('display','block');
	});



	$('#oldName').change(function(){

		var data =  document.getElementById('newName').value;
		if(data) 
		{
			$('#btnChange').css('display','block');
		}
		else if( data === " ")
		{
			$('#btnChange').css('display','none');
		}
	});
	$('#btnName').click(function(){
		var data = 0;
		data = 90 + data;
		$('#btnName>i').css("transform", "rotate("+data+"deg)");
		data = 0;
	});
	

});

function onShowButton() {
		var data =  document.getElementById('newName').value;
		if(data) 
		{
			$('#btnChange').css('display','block');
		}
		else if( data === null || data === "")
		{
			$('#btnChange').css('display','none');
		}
}

function ChangeClick() {

		var a = document.getElementById('nameChoose').value;
		$('#oldName').attr('value',a);

		$('.formChange').css('display','block');
		$('.removeAll').css('display','none');

		$('#btnChangeClick').css('display','none');
		$('#btnDeleteClick').css('display','block');
}

function DeleteClick() {
		var a = document.getElementById('nameChoose').value;
		$('#deleteName').attr('value',a);


		$('.formChange').css('display','none');
		$('.removeAll').css('display','block');
		$('#btnDeleteClick').css('display','none');
		$('#btnChangeClick').css('display','block');
}

function deleteForm() {
	var test = confirm('Cảnh báo !!! Bạn có chắc muốn xóa không ?');
	if(test)
	{
		alert('Chúc mừng bạn đã xóa thành công các file hoặc folder');
		return true;
	}
	else
	{

		return false;
	}
	
	return false;
}

function changeForm() {
		var test = confirm('Cảnh báo !!! Bạn có chắc muốn thay đổi không ?');
	if(test)
	{
		alert('Chúc mừng bạn đã thay đổi thành công các file hoặc folder');
		return true;
	}
	else
	{

		return false;
	}
	
	return false;
}