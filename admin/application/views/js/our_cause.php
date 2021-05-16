<script type="text/javascript">
$(document).ready(function(){
    $("#activity_id").on("change",function(e){
        e.preventDefault();
   let activity_id=document.getElementById("activity_id").value;
              $.ajax({
             url:"<?= base_url("index.php/OurCause/RecentActivitesAjax") ?>",
             method:"POST",
             dataType:"json",
             data:{id:activity_id},
             success:function(data){
 document.getElementById('paragraph').value=data[0]['heading']
 document.getElementById('dates').value=data[0]['dates']
   document.getElementById('coming_soon').value=data[0]['coming_soon']
  document.getElementById('path').value=data[0]['path']
 document.getElementById('heading').innerHTML="Activity "+activity_id;

                }
              });
    });
});
</script>