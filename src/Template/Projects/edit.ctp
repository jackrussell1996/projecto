<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->create($project); ?>
            <div class="form-group">
                <?php
                echo $this->Form->input('name', array('class' => 'form-control'));
                echo $this->Form->input('client_id', array(
                    'class' => 'form-control',
                    'type' => 'select',
                    'options' => $clients,
                    'empty' => true
                ));
                produceDatepicker($this, "Starting Date", 'startdate');
                produceDatepicker($this, "Finishing Date", 'finishdate');
                ?>
            </div>
            <?= $this->Form->button('Update Project', array('class' => 'btn btn-success')) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>