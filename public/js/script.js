$(document).ready(function(){

	$('.formChange').css('display','none');

	$('a').click(function(){
		$('.formChange').css('display','block');
		var a = $(this).html();
		$('#oldName').attr('value',a);
	});

	$('#newName').change(function(){

		var data =  document.getElementById('newName').value;
		if(data) 
		{
			$('#btnChange').css('display','block');
		}
		else
		{
			$('#btnChange').css('display','none');
		}
	});

	$('#oldName').change(function(){

		var data =  document.getElementById('newName').value;
		if(data) 
		{
			$('#btnChange').css('display','block');
		}
		else
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