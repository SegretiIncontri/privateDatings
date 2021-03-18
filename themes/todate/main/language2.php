<?php
$language = Dataset::load('language');
if (isset($language) && !empty($language)) {
    $i = 1;
    foreach ($language as $key => $val) {?>

        <li class="lang_item" data-value="<?php echo $i;?>"><a href="?language=<?php echo $key;?>"><i class="<?php echo $key;?> flag"></i><?php echo $val;?></a></li>

        <?php  $i++;  }
}
?>
