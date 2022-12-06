/*window.onload=function(){
	var form=document.getElementById('form');
	var dt=new Date();
	form.titulo.focus();

	form.data.value=dt.getDate()+'/'+(eval(dt.getMonth()+1))+'/'+dt.getFullYear();
	form.hora.value=dt.getHours()+':'+dt.getMinutes()+':'+dt.getSeconds();		
	
	form.onsubmit=function(){
		
		if(form.titulo.value=="" || form.descricao.value==""|| form.data.value==""|| form.hora.value==""|| form.autor.value=="" || form.texto.value==""){
			document.getElementById('mensagens').innerHTML="Campo com (*)  tem preenchimento obrigatório!";
		
			return false;
		}

		document.getElementById('mensagens').innerHTML="";
		return true;
	}

}*/

function closeAlert() {
  document.getElementById('mensagem').style.display = 'none';
}

setTimeout(closeAlert, 2000);