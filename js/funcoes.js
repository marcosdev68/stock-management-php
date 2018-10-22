function validarFormVazio(formulario){
		dados=$('#' + formulario).serialize();
		d=dados.split('&');
		vazios=0;
		for(i=0;i< d.length;i++){
				controles=d[i].split("=");
				if(controles[1]=="A" || controles[1]==""){
					vazios++;
				}
		}
		return vazios;
	}