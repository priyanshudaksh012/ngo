<script type="text/javascript">
$(document).ready(function(){
    $("#member_id").on("change",function(e){
        e.preventDefault();
   let member_id=document.getElementById("member_id").value;
              $.ajax({
             url:"<?= base_url("index.php/About/AboutAjax") ?>",
             method:"POST",
             dataType:"json",
             data:{id:member_id},
             success:function(data){
 document.getElementById('name').value=data[0]['name']; 	
 document.getElementById('facebook').value=data[0]['facebook'];
  document.getElementById('instagram').value=data[0]['instagram'];
  document.getElementById('paragraph').value=data[0]['paragraph'];
 document.getElementById('path').value=data[0]['path'];
 
                }
              });
    });
});
</script>