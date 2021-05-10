(function(win,doc){
	'use strict';

//Faz arequisição na API e cria o select com os titulos do json retornado
	win.onload=function(){

		const showData = (result)=>{
			var option = "<option selected disabled>Selecione</option>"
			for(var i=0;i<result.length;i++){

				var title = result[i].title

				option +="<option value="+title+">"+title+"</option>";

			}

			document.getElementById('post').innerHTML = option;
		}

		var subtitle=doc.getElementById('title-page').innerText();
		if(subtitle === 'Cadastrar' || subtitle === 'Editar'){
			fetch('https://jsonplaceholder.typicode.com/posts')
				.then((response)=>{
					response.json().then(data => showData(data))
				})
				.catch(e => console.log('Deu Erro: '+ e.message))
			
		}
	}

	//Delete
	function confirmDel(event)
	{
		event.preventDefault();
		var token=doc.getElementsByName('_token')[0].value;
		if(confirm("Deseja mesmo apagar?")){
			var ajax=new XMLHttpRequest();
			ajax.open('DELETE', event.target.parentNode.href);
			ajax.setRequestHeader('X-CSRF-TOKEN', token);
			ajax.onreadystatechange=function(){
				if(ajax.readyState === 4 && ajax.status === 200){
					win.location.href="admin";
				}
			};
			ajax.send();
		}else{
			return false
		}
	}

	if(doc.querySelector('.js-del')){
		var btn=doc.querySelectorAll('.js-del');
		for(var i=0; i<btn.length; i++){
			btn[i].addEventListener('click', confirmDel,false);
		}
	}

})(window,document);