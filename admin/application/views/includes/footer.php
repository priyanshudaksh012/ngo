<div class="sidebar-overlay" data-reff=""></div>
 <script type="text/javascript" src="<?= base_url("assets/adhyay/js/jquery-3.2.1.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/popper.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/bootstrap.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/jquery.dataTables.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/dataTables.bootstrap4.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/jquery.slimscroll.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/select2.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/moment.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/bootstrap-datetimepicker.min.js");?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/plugins/morris/morris.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/plugins/raphael/raphael-min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/fullcalendar.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/jquery.fullcalendar.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/chart.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/plugins/light-gallery/js/lightgallery-all.min.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/app.js"); ?>"></script>
<script type="text/javascript" src="<?= base_url("assets/adhyay/js/jquery.validate.js"); ?>"></script>
  <script src="../../js/slide.js"></script>
    <script src="../../js/help.js"></script>
    <script src="../../js/testimonial.js"></script>
    <script src="../../js/dropdown.js"></script>
</body>
<script type="text/javascript">
$(".select2").select2();
$('#myModal').modal('show');
    setTimeout(function() {
    $('#myModal').modal('hide');
}, 5000);

$("form").submit(function() {
    $(this).find('input[type="submit"]').prop("disabled", true);
});

</script>
</html>


<?php
  if($this->session->has_userdata('success')){ 
         $msg=$this->session->success;
         echo "<script>swal.fire('success','$msg','success')</script>";
        $this->session->unset_userdata('success');
     }

      if($this->session->has_userdata('danger')){ 
         $msg=$this->session->danger;
         echo "<script>swal.fire('danger','$msg','danger')</script>";
        $this->session->unset_userdata('danger');
     }
 ?>
 

