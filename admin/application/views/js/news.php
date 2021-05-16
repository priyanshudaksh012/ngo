<script type="text/javascript">
$(document).ready(function(){
    $("#news_id").on("change",function(e){
        e.preventDefault();
   let news_id=document.getElementById("news_id").value;
              $.ajax({
             url:"<?= base_url("index.php/HomePage/LatestNewsUpdateAjax") ?>",
             method:"POST",
             dataType:"json",
             data:{id:news_id},
             success:function(data){
 document.getElementById('news_paragraph').value=data[0]['news_paragraph']; 	

  document.getElementById('news_dates').value=data[0]['news_dates'];
  document.getElementById('path').value=data[0]['path'];
 document.getElementById('heading').innerHTML="News "+news_id;
                }
              });
    });
});
</script>