
//USANDO METHOD GET
function entrar(){
    var enviado_user = $("#input-user").val();
    var enviado_pass = $("#input-pass").val();
    var enviado_token = $("#input-token").val();
	$.get("autenticar.php",{user: enviado_user, pass: enviado_pass, _token:enviado_token}, function(data){
	   alert("Olá");
       console.log(data);

       if(data.status == false){
       	  $(".mensagem").hide();
          $(".mensagem").html(" "+data.msg);
          $(".mensagem").show();
       }else{
       	  $(".mensagem").hide();
       	  $(".mensagem").html(" "+data.msg);
       	  $(".mensagem").show();
       }
	}, "JSON");
	
}

// //USANDO $.POST

// function entrar(){
//     var enviado_user = $("#input-user").val();
//     var enviado_pass = $("#input-pass").val();
// 	$.post("autenticar.php",{user: enviado_user, pass: enviado_pass}, function(data){
// 	   alert("Olá");
//        console.log(data);

//        if(data.status == false){
//        	  $(".mensagem").hide();
//           $(".mensagem").html(" "+data.msg);
//           $(".mensagem").show();
//        }else{
//        	  $(".mensagem").hide();
//        	  $(".mensagem").html(" "+data.msg);
//        	  $(".mensagem").show();
//        }
// 	}, "JSON");
	
// }