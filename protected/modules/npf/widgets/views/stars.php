<?php
/**
 * Created by PhpStorm.
 * User: Cranky4
 * Date: 26.08.2015
 * Time: 7:05
 */
if($stars>5) {
    $stars = 5;
}
?>

<?php for ($i = 0; $i < $stars; $i++): ?>
    <i class="fa fa-star"></i>
<?php endfor; ?>
<?php for ($i = $stars; $i < 5; $i++): ?>
    <i class="fa fa-star-o"></i>
<?php endfor; ?>

