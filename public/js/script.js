$(document).ready(function(){
	$('.control').css('display','none');
	$('.formChange').css('display','none');
	$('.removeAll').css('display','none');

	$('a').click(function(){
		$('.formChange').css('display','block');
		var a = $(this).html();
		$('#oldName').attr('value',a);
		$('.control').css('display','block');
		$('#btnChangeClick').css('display','none');
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
	$('.formChange').css('display','block');
	$('.removeAll').css('display','none');
	$('#btnDeleteClick').css('display','block');
	$('#btnChangeClick').css('display','none');
}

function DeleteClick() {
	$('.formChange').css('display','none');
	$('.removeAll').css('display','block');
	$('#btnDeleteClick').css('display','none');
	$('#btnChangeClick').css('display','block');
}

