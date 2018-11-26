<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->create($job); ?>
            <div class="form-group">
                <?php
                echo $this->Form->input('name', array('class' => 'form-control'));
                echo $this->Form->input('project_id', array(
                    'class' => 'form-control',
                    'type' => 'select',
                    'options' => $projects,
                    'empty' => true
                ));
                echo $this->Form->input('user_id', array(
                    'class' => 'form-control',
                    'type' => 'select',
                    'options' => $users,
                    'empty' => true
                ));
                echo $this->Form->input('duration', array('class' => 'form-control', 'label' => 'Duration (hours)'));
                echo $this->Form->input('text', array('class' => 'form-control', 'label' => 'Description'));
                ?>
            </div>
            <?= $this->Form->button('Add Job', array('class' => 'btn btn-success')) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-md-6">
        </div>
    </div>
</div>