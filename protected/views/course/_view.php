<div class="view course_view">
	<div class="cousetitle">
		<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
		<b><?php echo CHtml::link(CHtml::encode($data->title), array('course/view', 'id'=>$data->ID)); ?></b>
	</div>

	<div class="cousedesc">
		<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
		<?php echo $data->getDescription(30); ?>
	</div>

	<b><?php echo CHtml::encode($data->getAttributeLabel('createtimestamp')); ?>:</b>
	<?php echo CHtml::encode($data->createtimestamp); ?>
	<br />
	
	<?php echo CHtml::link('Become a Student :D', array('course/view', 'id'=>$data->ID,'letmein'=>'1')); ?>
	<br />
	
	<div class="couseusercount">
		<?php echo $data->UserCount(); ?> User(s) registered.
	</div>
	
</div>