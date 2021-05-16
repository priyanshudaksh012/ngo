
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
                         
  <h1 class='text-center text-info mt-4 '>Update Latest News</h1>
   <?= form_open(base_url("index.php/HomePage/LatestNewsUpdate"),array("method"=>"POST",'enctype'=>"multipart/form-data")); ?>
<div class='form-row'>
<div class='col-xl-6'>
<label class=''>Select News</label>
<select name='news_id' id='news_id' class="form-control">
<option value='1'>News 1</option>  
<option value='2'>News 2</option>  
<option value='3'>News 3</option>  
</select>
</div>
</div>
<br>
<h3 id='heading' class='text-center text-info'>News 1</h3>

<div class='form-row'>
<div class='col-xl-6'>
<label>News Paragraph</label>
<textarea name='news_paragraph' class='form-control' id='news_paragraph'>
<?= $D[0]['news_paragraph'] ?>
</textarea>
</div>

<div class='col-xl-6'>
<label>News Date</label>
<input type='text' class='form-control'  name='news_dates' id='news_dates' value="<?= $D[0]['news_dates'] ?>
"/>
</div>
</div><br>


<div class='form-row'>
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


