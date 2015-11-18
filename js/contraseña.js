function comprobarClave(){ 
   	pass = document.f1.pass.value 
   	pass2 = document.f1.pass2.value 

   	if (pass == pass2) 
      	return true; 
   	else 
      	alert("Las contraseñas deben coincidir");
      	return false;
} 