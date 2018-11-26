<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Project</th>
            <th>User</th>
            <th>Duration</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($jobs as $job): ?>
            <tr>
                <td>
                    <?php 
                    echo $this->Html->link($job['name'], array('controller' => 'jobs', 'action' => 'view', $job['id']));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Html->link($job->project['name'], array('controller' => 'projects', 'action' => 'view', $job->project['id']));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Html->link($job->user['name'], array('controller' => 'users', 'action' => 'view', $job->user['id']));
                    ?>
                </td>
                <td>
                    <?php
                    echo $job['duration'].' hrs';
                    ?>
                </td>
                <td>
                    <?php
                    produceActions($this, $job);
                    ?>
                </td>        
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php producePagination($this); ?>
<p>
    <?php echo $this->Html->link('Add a Job', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</p>