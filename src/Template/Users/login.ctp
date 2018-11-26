<div class="users form">
    <?= $this->Flash->render('auth') ?>
    <?= $this->Form->create('User') ?>

    <div class="form-group">
        <?= $this->Form->input('name', array('class' => 'form-control')) ?>
        <?= $this->Form->input('password', array('class' => 'form-control')) ?>
    </div>    
    <div class="btn-group">
        <?= $this->Form->button('Login', array('type' => 'submit', 'class' => 'btn btn-success')) ?>
        <?= $this->Html->link('Register', array('action' => 'register'), array ('class' => 'btn btn-primary')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>