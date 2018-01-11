function setAlert(text, type){
  if(text){
  var alert= document.getElementById("alert");
  var alertText= document.getElementById("alertText");
  var alertDiv= document.getElementById("alertDiv");
  var textAlert=text;
  var typeAlert=type;
  alert.style.display="block";
  alert.style.display="all 0.5s";
  alertText.innerHTML=textAlert;

/*Tipo 0 Sucesso
  Tipo 1 Erro
  Tipo 2 Outros
*/
  if(typeAlert==0){
    alertDiv.style.backgroundColor="#5AC436";
    alertDiv.style.color="white";
}else if(typeAlert==1){
  alertDiv.style.backgroundColor="#FF5450";
  alertDiv.style.color="white";

}

}else{
  alertText.innerHTML="Erro!";
}
}
function setDeleteWindow(){
  var hidden2= document.getElementById("hidden2");
  var hidden1= document.getElementById("hidden1");
  hidden1.style.display="none";
  hidden2.style.display="block";

}
function setAlertEditWindow(text){
  var edit=document.getElementById("edit");
  if(edit==0){
    setAlert(text,0);
  }else if(edit==1){
    setAlert(text,1);
  }

}
