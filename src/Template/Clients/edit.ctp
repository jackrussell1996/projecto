<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->create($client); ?>
            <div class="form-group">
            <?php
            echo $this->Form->input('name', array('class'=>'form-control'));
            echo $this->Form->input('website', array('class'=>'form-control'));
            echo $this->Form->input('contactname', array('label'=>'Contact Name', 'class'=>'form-control'));
            echo $this->Form->input('contactnum', array('label'=>'Contact Number', 'class'=>'form-control'));
            ?>
            </div>
            <?= $this->Form->button('Update Client', array('class' => 'btn btn-success')) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>