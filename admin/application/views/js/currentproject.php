<script type="text/javascript">
$(document).ready(function(){
    $("#position_id").on("change",function(e){
        e.preventDefault();
   let position_id=document.getElementById("position_id").value;
              $.ajax({
             url:"<?= base_url("index.php/HomePage/CurrentProjectAjax") ?>",
             method:"POST",
             dataType:"json",
             data:{id:position_id},
             success:function(data){
 document.getElementById('cause_heading').value=data[0]['cause_heading']; 	
 document.getElementById('cause_paragraph').value=data[0]['cause_paragraph'];
  document.getElementById('cause_button').value=data[0]['cause_button'];
  document.getElementById('path').value=data[0]['path'];
 document.getElementById('heading').innerHTML="Position "+position_id;
                }
              });
    });
});
</script>