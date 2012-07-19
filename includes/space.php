<?php
function formatSize($size){
    switch (true){
    case ($size > 1099511627776):
        $size /= 1099511627776;
        $suffix = 'TB';
    break;
    case ($size > 1073741824):
        $size /= 1073741824;
        $suffix = 'GB';
    break;
    case ($size > 1048576):
        $size /= 1048576;
        $suffix = 'MB';   
    break;
    case ($size > 1024):
        $size /= 1024;
        $suffix = 'KB';
        break;
    default:
        $suffix = 'B';
    }
    return round($size, 2).$suffix;
}

$root = disk_free_space("/");
$ssd = disk_free_space("/mnt/ssd");
$tmp = disk_free_space("/lib/init/rw");

require_once("class_CPULoad.php");
$cpuload = new CPULoad();
$cpuload->get_load();

?>

<?php

 $data = shell_exec('uptime');
  $uptime = explode(' up ', $data);
  $uptime = explode(',', $uptime[1]);
  $uptime = $uptime[0].', '.$uptime[1];

?>


   Free Space on ( / ) - <?php echo formatSize($root); ?>
   <br>
   Free Space on ( /mnt/ssd ) - <?php echo formatSize($ssd); ?> 
<br>
   Free Space on ( /tmp ) - <?php echo formatSize($tmp); ?>
   <br>

<?php $cpuload->print_load(); ?>
<?php echo ('Current server uptime: '.$uptime.''); ?>




