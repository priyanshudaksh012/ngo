
<div class="page-wrapper"> <!-- content -->
            <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Current Projects</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="<?= base_url("index.php/DashboardC"); ?>">Home</a></li>
                            <li class="list-inline-item">Current Projects</li>
                        </ul>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <h4 class="card-title"></h4>

 <iframe src="../../../index.php" style='border: 0px;' height="400rem;" width="100%"></iframe>

</div>
                         
  <h1 class='text-center text-info mt-4 '>Update Current Projects</h1>
   <?= form_open(base_url("index.php/HomePage/CurrentProjectUpdate"),array("method"=>"POST",'enctype'=>"multipart/form-data")); ?>
<div class='form-row'>
<div class='col-xl-6'>
<label class=''>Select Position</label>
<select name='position_id' id='position_id' class="form-control">
<option value='1'>Position 1</option>  
<option value='2'>Position 2</option>  
<option value='3'>Position 3</option>  
</select>
</div>
</div>
<br>
<h3 id='heading' class='text-center text-info'>Position 1</h3>

<div class='form-row'>
<div class='col-xl-6'>
<label>Cause Heading</label>
<input type='text' name='cause_heading' class='form-control' id='cause_heading' value="<?= $D[0]['cause_heading'] ?>"/>
</div>

<div class='col-xl-6'>
<label>Cause Paragraph</label>
<textarea class='form-control'  name='cause_paragraph' id='cause_paragraph'>
<?= $D[0]['cause_paragraph'] ?>
</textarea>
</div>
</div><br>


<div class='form-row'>
<div class='col-xl-6'>
<label>Cause Button</label>
<input type='text' name='cause_button' class='form-control' id='cause_button' value="<?= $D[0]['cause_button'] ?>"/>
</div>

<input type='hidden' value="<?= $D[0]['path'] ?>" name='path' id='path'>
<div class='col-xl-6'>
<label>Image</label>
<input type='file' class='form-control' name='image' id='image'/>
<small class='text-danger'>Image Size (600 * 400 )px</small>
</div>
</div><br>


    
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


