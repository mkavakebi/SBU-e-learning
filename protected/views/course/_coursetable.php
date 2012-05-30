<?php 
foreach($CourseList as $key=>$item){?>
	<?php echo $this->renderPartial('/course/_view', $item); ?>
<?php }?>