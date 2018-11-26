<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Authority</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?php 
                    echo $this->Html->link($user['name'], array('controller' => 'users', 'action' => 'view', $user['id']));
                    ?>
                </td>
                <td>
                    <?php
                    if($user['isAdmin']){
                        echo "Administrator";
                    } else{
                        echo "User";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    echo "unavailable";
                    //produceActions($this, $user);
                    ?>
                </td>        
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php producePagination($this); ?>
<p>
    <?php echo $this->Html->link('Add a User', array('action' => 'register'), array('class' => 'btn btn-primary')); ?>
</p>