<script type="text/javascript">
$(document).ready(function(){
    $("#banner_id").on("change",function(e){
        e.preventDefault();
   let banner_id=document.getElementById("banner_id").value;
              $.ajax({
             url:"<?= base_url("index.php/BannerC/BannerAjax") ?>",
             method:"POST",
             dataType:"json",
             data:{id:banner_id},
             success:function(data){
 document.getElementById('slide_cause').value=data[0]['slide_cause']; 	
 document.getElementById('slide_heading').value=data[0]['slide_heading'];
  document.getElementById('slide_title').value=data[0]['slide_title'];
  document.getElementById('slide_paragraph').value=data[0]['slide_paragraph'];
 document.getElementById('slide_button').value=data[0]['slide_button'];
  document.getElementById('path').value=data[0]['path'];
 document.getElementById('heading').innerHTML="Banner "+banner_id;

                }
              });
    });
});
</script>