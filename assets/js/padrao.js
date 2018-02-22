function dump(obj) {
    var out = '';
    for (var i in obj) {
    	// if(i == 'responseText'){
        	out += i + ": " + obj[i] + "<br><br>";
    	// }
    }

    return out;
    // alert(out);
}

$('form').submit(function() {
	form = $(this);
	form.find('.form_result').html('Processando...');
	$.post(form.attr('action'), form.serialize() ,function (retorno){
		form.find('.form_result').html(retorno);
	})
	.fail(function(e) {
		form.find('.form_result').html('<div class="alert alert-danger"><strong>Status do erro: </strong>'+e.status+'<br>\
			<strong>Mensagem: </strong>'+e.statusText+'</div>'+e.responseText);
	});
	return false;
});