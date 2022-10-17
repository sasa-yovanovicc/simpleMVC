<h3><?php echo $heading ?></h3>
<div class="table">
  <div class="row">
    <div class="col strong">ID</div>
    <div  class="col strong">User ID</div>
    <div  class="col strong">Ad title</div>
  </div>
<?php foreach($rows as $row) { extract($row); ?>
  <div class="row">
  <div class="col"><?php echo $id; ?></div>
    <div  class="col"><?php echo $name; ?></div>    
    <div  class="col"><a href='<?php echo APP_INNER_DIRECTORY;?>/Ads/?uid=<?php echo $id; ?>'>See ads</a></div>   
  </div>
<?php } ?>
</div>
