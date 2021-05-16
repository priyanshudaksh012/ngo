
<div class="page-wrapper"> <!-- content -->
            <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">About</h5>
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

 <iframe src="../../../about.php" style='border: 0px;' height="400rem;" width="100%"></iframe>

</div>
                         
  <h1 class='text-center text-info mt-4 '>Who We Are ?</h1>
   <?= form_open(base_url("index.php/About/whoWeAreUpdate"),array("method"=>"POST",'enctype'=>"multipart/form-data")); ?>

<div class='form-row'>
<div class='col-xl-6'>
<label>Heading</label>
<input type='text' name='heading' class='form-control' id='heading' value="<?= $D[0]['heading'] ?>"/>
</div>
</div><br>

<div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph1</label>
<textarea class='form-control'  name='paragraph1' id='paragraph1'>
<?= $D[0]['paragraph1'] ?>
</textarea>
</div>
</div><br>


<div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph2</label>
<textarea class='form-control'  name='paragraph2' id='paragraph2'>
<?= $D[0]['paragraph2'] ?>
</textarea>
</div>
</div><br>



<div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph3</label>
<textarea class='form-control'  name='paragraph3' id='paragraph3'>
<?= $D[0]['paragraph3'] ?>
</textarea>
</div>
</div><br>

<div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph4</label>
<textarea class='form-control'  name='paragraph4' id='paragraph4'>
<?= $D[0]['paragraph4'] ?>
</textarea>
</div>
</div><br>


<div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph5</label>
<textarea class='form-control'  name='paragraph5' id='paragraph5'>
<?= $D[0]['paragraph5'] ?>
</textarea>
</div>
</div><br>


<div class='form-row'>

<input type='hidden' value="<?= $D[0]['path'] ?>" name='path' id='path'>
<div class='col-xl-6'>
<label>Image</label>
<input type='file' class='form-control' name='image' id='image'/>
<small class='text-danger'>Image Max Size (1920 * 1277 )px</small>
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


