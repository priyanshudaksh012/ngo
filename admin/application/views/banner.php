
<div class="page-wrapper"> <!-- content -->
            <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Banner</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="<?= base_url("index.php/DashboardC"); ?>">Home</a></li>
                            <li class="list-inline-item"> Banner</li>
                        </ul>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <h4 class="card-title"></h4>

 <iframe src="../../index.php" style='border: 0px;' height="400rem;" width="100%"></iframe>

</div>
                         
  <h1 class='text-center text-info mt-4 '>Update Banners</h1>
   <?= form_open(base_url("index.php/BannerC/BannerUpdate"),array("method"=>"POST",'enctype'=>"multipart/form-data")); ?>
   <div class='form-row'>
<div class='col-xl-6'>
    <label class=''>Select Banner</label>
<select name='banner_id' id='banner_id' class="form-control">
<option value='1'>Banner 1</option>  
<option value='2'>Banner 2</option>  
<option value='3'>Banner 3</option>  

</select>
</div>
   </div>
<br>
<h3 id='heading' class='text-center text-info'>Banner 1</h3>
     <div class='form-row'>
<div class='col-xl-6'>
    <label class=''>Slide Cause</label>
<input type='text' name='slide_cause' id='slide_cause' class='form-control' value="<?= $B[0]['slide_cause'] ?>" />
</div>

<div class='col-xl-6'>
    <label class=''>Slide Heading</label>
<input type='text' name='slide_heading' id='slide_heading' class='form-control' value="<?= $B[0]['slide_heading'] ?>" />
</div>
   </div>

<br>
     <div class='form-row'>
<div class='col-xl-6'>
    <label class=''>Slide Title</label>
<input type='text' class='form-control' id='slide_title' name='slide_title' value="<?= $B[0]['slide_title'] ?>" />
</div>

<div class='col-xl-6'>
    <label class=''>Slide Paragraph</label>
    <textarea class='form-control' id='slide_paragraph' name='slide_paragraph'>
        <?= $B[0]['slide_paragraph'] ?>
    </textarea>
</div>
   </div> 
   <br>


      <div class='form-row'>
<div class='col-xl-6'>
    <label class=''>Slide Button</label>
<input type='text' class='form-control' id='slide_button' name='slide_button' value="<?= $B[0]['slide_button'] ?>" />
</div>

<input type='hidden' name='path' id='path' value="<?= $B[0]['path'] ?>" />
<div class='col-xl-6'>
    <label class=''>Banner Image</label>
   <input type='file' name='image' class='form-control' />

</div>
   </div> 
   <br>  

    
   <center><button class='btn btn-primary'>Update</button></center>
             <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
    <?php
    if(isset($_SESSION['msg'])){
      echo "<script>Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '$_SESSION[msg]',
  showConfirmButton: false,
  timer: 1500
})</script>";
unset($_SESSION['msg']);
    }
     ?>


