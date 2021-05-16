
<div class="page-wrapper"> <!-- content -->
            <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                        <h5 class="text-uppercase">Our Cause</h5>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                        <ul class="list-inline breadcrumb float-right">
                            <li class="list-inline-item"><a href="<?= base_url("index.php/DashboardC"); ?>">Home</a></li>
                            <li class="list-inline-item">Greening the Planet</li>
                        </ul>
                    </div>
                </div>
            </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-box">
                           <h4 class="card-title"></h4>

 <iframe src="../../../sustainable.php" style='border: 0px;' height="400rem;" width="100%"></iframe>

</div>
                         
  <h1 class='text-center text-info mt-4 '>Greening Planet</h1>
   <?= form_open(base_url("index.php/OurCause/GreeningPlanetUpdate"),array("method"=>"POST",'enctype'=>"multipart/form-data")); ?>



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
    <h4>Paragraph2 points</h4>
<ul type='dark-circle'>
  <li><div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph2 (A)</label>
<textarea class='form-control'  name='paragraph2a' id='paragraph2a'>
<?= $D[0]['paragraph2a'] ?>
</textarea>
</div>
</div></li>

  <li><div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph2 (B)</label>
<textarea class='form-control'  name='paragraph2b' id='paragraph2b'>
<?= $D[0]['paragraph2b'] ?>
</textarea>
</div>
</div></li>

  <li><div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph2 (C)</label>
<textarea class='form-control'  name='paragraph2c' id='paragraph2c'>
<?= $D[0]['paragraph2c'] ?>
</textarea>
</div>
</div></li>

  <li><div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph2 (D)</label>
<textarea class='form-control'  name='paragraph2d' id='paragraph2d'>
<?= $D[0]['paragraph2d'] ?>
</textarea>
</div>
</div></li>
</ul>

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
<div class='col-xl-12'>
<label>Paragraph6</label>
<textarea class='form-control'  name='paragraph6' id='paragraph6'>
<?= $D[0]['paragraph6'] ?>
</textarea>
</div>
</div><br>

<div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph7</label>
<textarea class='form-control'  name='paragraph7' id='paragraph7'>
<?= $D[0]['paragraph7'] ?>
</textarea>
</div>
</div><br>

<div class='form-row'>
<div class='col-xl-12'>
<label>Paragraph8</label>
<textarea class='form-control'  name='paragraph8' id='paragraph8'>
<?= $D[0]['paragraph8'] ?>
</textarea>
</div>
</div><br>

<div class='form-row'>
<div class='col-xl-12'>
<label>Heading</label>
<input class='form-control'  name='heading' id='heading' value='<?= $D[0]['heading'] ?>'>
</div>
</div><br>

<h4>Heading Points</h4>
<ul class='dark-circle'>
<li><div class='form-row'>
<div class='col-xl-12'>
<label>Heading (A)</label>
<input class='form-control'  name='headinga' id='headinga' value='<?= $D[0]['headinga'] ?>'>
</div>
</div><br></li>
<li><div class='form-row'>
<div class='col-xl-12'>
<label>Heading (B)</label>
<input class='form-control'  name='headingb' id='headingb' value='<?= $D[0]['headingb'] ?>'>
</div>
</div><br></li>
<li><div class='form-row'>
<div class='col-xl-12'>
<label>Heading (C)</label>
<input class='form-control'  name='headingc' id='headingc' value='<?= $D[0]['headingc'] ?>'>
</div>
</div><br></li>

</ul>


<div class='form-row'>

<input type='hidden' value="<?= $D[0]['path1'] ?>" name='path1' id='path1'>
<input type='hidden' value="<?= $D[0]['path2'] ?>" name='path2' id='path2'>
<div class='col-xl-6'>
<label>Image 1</label>
<input type='file' class='form-control' name='image1' id='image1'/>
<small class='text-danger'>Image Max Size (1920 * 1277 )px</small>
</div>

<div class='col-xl-6'>
<label>Image 2</label>
<input type='file' class='form-control' name='image2' id='image2'/>
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


