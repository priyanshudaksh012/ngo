
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
                            <li class="list-inline-item">Recent Activites</li>
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
                         
  <h1 class='text-center text-info mt-4 '>Recent Activites</h1>
   <?= form_open(base_url("index.php/OurCause/RecentActivitesUpdate"),array("method"=>"POST",'enctype'=>"multipart/form-data")); ?>

<div class='form-row'>
<div class='col-xl-6'>
<label class=''>Select Recent Activites</label>
<select name='activity_id' id='activity_id' class="form-control">
<option value='1'>Activity 1</option>  
<option value='2'>Activity 2</option>  
<option value='3'>Activity 3</option>  
</select>
</div>
</div>
<br>
<h3 id='heading' class='text-center text-info'>Activity 1</h3>


<div class='form-row'>
<div class='col-xl-6'>
<label>Paragraph</label>
<input type='text' name='heading' class='form-control' id='paragraph' value="<?= $D[0]['heading'] ?>"/>
</div>
<div class='col-xl-6'>
<label>Date</label>
<input type='text' name='dates' class='form-control' id='dates' value="<?= $D[0]['dates'] ?>"/>
</div>
</div><br>

<div class='form-row'>


<div class='col-xl-6'>
<label>Coming Soon</label>
<input type='text' name='coming_soon' class='form-control' id='coming_soon' value="<?= $D[0]['coming_soon'] ?>"/>
</div>

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
  
  


