$(document).ready(function(){
  $("#plans").on("change",function(e){
   var plan=this.value;
   var arr=plan.split(',');

       if(arr[0]=="day"){
         document.getElementById('price').value=arr[2];
       }else if(arr[0]=="month"){
    document.getElementById('price').value=arr[2];
       }else if(arr[0]=="year"){
         document.getElementById('price').value=arr[2];
       }
  });
});
