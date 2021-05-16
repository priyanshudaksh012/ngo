<?php require('header.php'); ?>


<div class='container-fluid'>

<h1 class='text-center text-info'>Swami Avdesh Anand Admin Panel</h1>
<div class='container'>

<div class='card card-primary'>
<div class='card-header'>Upload Your Latest Audio</div>
<div class='card-body'>

<form  method='post' enctype='multipart/form-data'>
<div class='form-row'>
<div class='col-xl-8 col-12'>
  <label>Chapter Name</label>
  <input type='text' name='chapter_name' placeholder="Chapter Name" autofocus required class='form-control'>
</div>

<div class='col-xl-8 col-12'>
  <br><label>Choose Audio</label>
  <input type='file' name='audio' autofocus required class='form-control'>
</div>
</div><br>

<input type='submit' value='Upload' name='upload' class='btn btn-primary'/>
</form>
</div>
</div>




</div>
</div>
<?php require('footer.php'); ?>
<?php
require('connect.php');
 if(isset($_POST['upload'])):
  $chapter_name=$_POST['chapter_name'];
  $name=$_FILES['audio']['name'];
  $tmp_name=$_FILES['audio']['tmp_name'];
  $path="audio/".$name;
  $link="https://swami.adhyay.co.in/audio/".$name;
move_uploaded_file($tmp_name,$path);
$insert="INSERT INTO audio(chapter_name,path)values('$chapter_name','$name')";
if(mysqli_query($con,$insert)):
?>
<script>
Swal.fire({
  title: 'Audio Uploaded Successfully....',
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  }
})
</script>
<?php
endif;
endif; ?>
