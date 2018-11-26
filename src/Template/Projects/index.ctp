<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Client</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($projects as $project): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($project['name'], array('controller' => 'projects', 'action' => 'view', $project['id']));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Html->link($project->client['name'], array('controller' => 'clients', 'action' => 'view', $project->client['id']));
                    ?>
                </td>
                <td>
                    <?php
                    produceActions($this, $project);
                    ?>
                </td>      
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php producePagination($this); ?>
<p>
    <?php echo $this->Html->link('Add a Project', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</p>
