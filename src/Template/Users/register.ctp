<?php echo $this->Form->create('User', array('action' => 'register')); ?>
<div class="form-group">
    <?php
    echo $this->Form->input('name', array('class' => 'form-control'));
    echo $this->Form->input('password', array('class' => 'form-control'));
    ?><label>Administrator</label><br>
    <?php
    echo $this->Form->checkbox('isAdmin', array('Yes', 'No'));
    ?>
</div>
<?= $this->Form->button('Submit', array('class' => 'btn btn-success')); ?>
<?= $this->Form->end() ?>