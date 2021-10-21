<?php 
if(isset($_COOKIE['success'])){
?>
    <div class="alert m-1 me-3 ms-3 alert-success alert-dismissible fade show" role="alert">
    <?php echo $_COOKIE['success']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php 
}
else if(isset($_COOKIE['faild'])){
?>
    <div class="alert m-1 me-3 ms-3 alert-danger alert-dismissible fade show" role="alert">
    <?php echo $_COOKIE['faild']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php }?>

