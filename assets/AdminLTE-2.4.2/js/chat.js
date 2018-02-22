/* 
Created by: Kenrick Beckett

Name: Chat Engine
*/

var instanse = false;
var state;
var file;


function Chat () {
	this.update = updateChat;
	this.send = sendChat;
	this.getState = getStateOfChat;
}

//gets the state of the chat
function getStateOfChat(){
	if(!instanse){
		instanse = true;

		$.ajax({
			type: "POST",
			url: "Process/getState",
			data: {  
					'file': file
			},
			dataType: "json",

			success: function(data){
				state = data.state;
				instanse = false;

				if(data.text){
					imprimirMensagens(data);
				}
			},
			fail: function(data){
				alert("Falhou ao receber o states");
			}
		});
	}
	setInterval(function(){
		// otimizarXml();
		}
	, 10000);
}

//Updates the chat
function updateChat(){
	if(!instanse){
		instanse = true;

		$.ajax({
			type: "POST",
			url: "Process/update",
			data: {  
	   			'state': state,
	   			'file': file
	   		},
	   		dataType: "json",
	   		success: function(data){

	   			if(data.text){
	   				imprimirMensagens(data);	   				
	   			}
	   			instanse = false;
	   			state = data.state;
	   		},
	   	});
	}else{
		setTimeout(updateChat, 1500);
	}
}

//send the message
function sendChat(message)
{
	updateChat();
	$.ajax({
		type: "POST",
		url: "process/send",
		data: {  
			'message': message,
			'file': file
		},
		dataType: "json",
		success: function(data){
			updateChat();
		},
	});
}

function imprimirMensagens(data){
	$('#amigoDigitando').fadeOut(100);
	for (var i = 0; i < data.text.length; i++) {
		$('#direct-chat-messages').fadeIn().append(
			$(data.text[i]).hide().fadeIn(500)
		);
	}
	$("[data-toggle=\'tooltip\']").tooltip();
	document.getElementById('direct-chat-messages').scrollTop = document.getElementById('direct-chat-messages').scrollHeight;
}

function otimizarXml(){
	
		$.ajax({
			type: "POST",
			url: "process/otimizarXml",
			data: {  
				
			},
			dataType: "json",
			success: function(data){
				// alert("Qtde de i: "+data.i);
			},
		});
}

/*********************************************/


$(document).ready(function(){
	// Fazer requisições do chat apenas se existir bloco do chat no html
	if($('.direct-chat').length > 0){
		var siape = $("#siape").html();

		var name = siape;
		// strip tags
		name = name.replace(/(<([^>]+)>)/ig,"");

		// kick off chat
		var chat =  new Chat();
		$(function() {
			chat.getState();
		});

		$('.direct-chat').find('form').submit(function(e){
			inputMensagem = $(this).find('#mensagem');
			chat.send(inputMensagem.val(), name);
			inputMensagem.val("");

			return false;
		});

		$.ajax({url: "sessao/iniciar/"+siape, success: function(result){
			  // $("#resultado").html(result);
		}});

		$("#mensagem").keypress(function(){
			$.ajax({url: "sessao/digitando/"+siape, success: function(result){
			      // $("#resultado").html(result);
			  }});
		});

		var siapeChat = $('.direct-chat div h3').html();
		setInterval(
			function(){
				$.ajax({url: "sessao/amigoDigitando/"+siapeChat, dataType: "json", success: function(data){
					// alert(data.digitando);
					if(data.digitando){
						$("#amigoDigitando").fadeIn(500).html('<i class="fa fa-spinner fa-pulse"></i> Seu amigo está digitando...');
					}else{
						// alert("false");
						$("#amigoDigitando").fadeOut(100);
					}
				}});
				chat.update();
			}
		, 1000);
	}
});