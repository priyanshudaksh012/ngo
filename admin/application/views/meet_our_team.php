
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
                         
  <h1 class='text-center text-info mt-4 '>Meet Our Team</h1>
   <?= form_open(base_url("index.php/About/MeetOurTeamUpdate"),array("method"=>"POST",'enctype'=>"multipart/form-data")); ?>

<div class='form-row'>
<div class='col-xl-6'>
<label class=''>Select Member</label>
<select name='member_id' id='member_id' class="form-control">
<option value='1'>Member 1</option>  
<option value='2'>Member 2</option>  
<option value='3'>Member 3</option>  
</select>
</div>
</div>
<br>
<h3 id='heading' class='text-center text-info'>Member 1</h3>


<div class='form-row'>
<div class='col-xl-6'>
<label>Name</label>
<input type='text' name='name' class='form-control' id='name' value="<?= $D[0]['name'] ?>"/>
</div>

</div><br>

<div class='form-row'>

<div class='col-xl-6'>
<label>Facebook Link</label>
<input type='text' name='facebook' class='form-control' id='facebook' value="<?= $D[0]['facebook'] ?>"/>
</div>
<div class='col-xl-6'>
<label>Instagram Link</label>
<input type='text' name='instagram' class='form-control' id='instagram' value="<?= $D[0]['instagram'] ?>"/>
</div>
</div><br>

<div class='form-row'>
<div class='col-xl-12'>
<label>About Team Member</label>
<textarea class='form-control'  name='paragraph' id='paragraph'>
<?= $D[0]['paragraph'] ?>
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
  
  


