
<form class="" action="#" method="post">
  <input type="checkbox" class="flat" name="cek" > > cek ?><br>
  <input type="submit" name="submit">
</form>
<?php if (isset($_POST['submit'])){
  echo $_POST['cek'];

} ?>
  
