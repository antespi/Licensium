<?php
/* @var $this ModuleController */
/* @var $model Module */
/* @var $form CActiveForm */
/* @var $projectid Project ID */
?>

<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'module-form',
    'htmlOptions' => array('class' => 'general-form'),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
));
?>
  <?php echo $form->errorSummary($model); ?>
<fieldset>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model, 'name', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->textField($model, 'name', array('class' => 'type-text form-control', 'maxlength' => 100)); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model, 'name'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model,'license_id', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->dropDownList($model,'license_id',
                          CHtml::listData(License::getAll(), 'id', function($license) {
                              return e($license->name);
                          }),
                        array('class'=>'col-md-6 col-xs-12 commom-dropdpown','empty' => Yii::t('app', 'Others'))); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model,'license_id'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model, 'licenseother', array('class' => 'col-md-6 col-xs-12 input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->textField($model, 'licenseother', array('class' => 'type-text form-control', 'maxlength' => 256)); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model, 'licenseother'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model, 'website', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->textField($model, 'website', array('class' => 'type-text form-control', 'maxlength' => 256)); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model, 'website'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model, 'repo', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->textField($model, 'repo', array('class' => 'type-text form-control', 'maxlength' => 256)); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model, 'repo'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model,'relation', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->dropDownList($model,'relation',
                          CHtml::listData(Module::getList('relations'), 'code', function($item) {
                              return e($item->name);
                          }),
                          array('class'=>'commom-dropdpown','empty' => '')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model,'relation'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model,'type', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->dropDownList($model,'type',
                          CHtml::listData(Module::getList('types'), 'code', function($item) {
                              return e($item->name);
                          }),
                          array('class'=>'commom-dropdpown','empty' => '')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model,'type'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12">
            <div class="field input-group input-group-md">
                <label class="input-group-addon">
                    <?php echo Yii::t('app', 'Integration date'); ?>
                    <span class="required">*</span>
                </label>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model,'day', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->dropDownList($model,'day',
                          CHtml::listData(dayList(), 'id', function($item) {
                              return e($item->name);
                          }),
                          array('class'=>'commom-dropdpown','empty' => '')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model,'day', array('class' => 'input-group-addon')); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model,'month', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->dropDownList($model,'month',
                          CHtml::listData(monthList(), 'id', function($item) {
                              return e($item->name);
                          }),
                          array('class'=>'col-md-6 col-xs-12 commom-dropdpown','empty' => '')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model,'month'); ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="field input-group input-group-md">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php echo $form->labelEx($model,'year', array('class' => 'input-group-addon')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->dropDownList($model,'year',
                          CHtml::listData(yearList(), 'id', function($item) {
                              return e($item->name);
                          }),
                          array('class'=>'col-md-6 col-xs-12 commom-dropdpown','empty' => '')); ?>
                    </div>
                    <div class="col-xs-12">
                        <?php echo $form->error($model,'year'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</fieldset>
<fieldset>
    <div class="row">
        <div class="submit">
            <div class="col-md-9 col-sm-6">
              <?php if ($model->isNewRecord) {
                  echo CHtml::linkButton(Yii::t('app', 'Cancel'),
                    array('class'       => 'btn btn-link btn-cancel',
                          'data-action' => 'clear'));
              } else {
                  echo CHtml::linkButton(Yii::t('app', 'Cancel'),
                    array('class'       => 'btn btn-link btn-cancel',
                          'data-action' => 'view',
                          'data-target' => '/module/view/projectid/' . $projectid,
                          'data-id'     => e($model->id)));
              } ?>
            </div>
            <div class="col-md-3 col-sm-6">
              <?php if ($model->isNewRecord) {
                  echo CHtml::submitButton(Yii::t('app', 'Create'),
                    array('class'       => 'btn btn-success btn-create',
                          'data-action' => 'create',
                          'data-target' => '/module/create/projectid/' . $projectid,));
              } else {
                  echo CHtml::submitButton(Yii::t('app', 'Save'),
                    array('class'       => 'btn btn-success btn-create',
                          'data-action' => 'update',
                          'data-target' => '/module/update/projectid/' . $projectid,
                          'data-id'     => e($model->id)));
              } ?>
            </div>
        </div>
    </div>
</fieldset>

<?php $this->endWidget(); ?>

