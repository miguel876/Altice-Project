function setAlert(text, type){
  if(text){
  var alert= document.getElementById("alert");
  var alertText= document.getElementById("alertText");
  var alertDiv= document.getElementById("alertDiv");
  var textAlert=text;
  var typeAlert=type;
  alert.style.display="block";
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
  hidden2.style.display("block");

}
function setAlertEditWindow(text){
  var edit=document.getElementById("edit");
  if(edit==0){
    setAlert(text,0);
  }else if(edit==1){
    setAlert(text,1);
  }

}
