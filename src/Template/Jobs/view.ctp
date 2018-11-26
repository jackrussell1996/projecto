<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="sub-header"><?php echo $job['name']; ?></h1>
            <ul>
                <li>
                    Project: <?php
                    echo $this->Html->link($job->project['name'], array('controller' => 'projects', 'action' => 'view', $job->project['id']), array('escape' => false));
                    ?>
                </li>
                <li>
                    User: <?php
                    echo $this->Html->link($job->user['name'], array('controller' => 'users', 'action' => 'view', $job->user['id']), array('escape' => false));
                    ?>
                </li>
                <li>
                    Duration: <?php echo $job['duration'] . ' hours'; ?>
                </li>
                <li>
                    Notes: <?php echo $job['text']; ?>
                </li>
                <li>
                    Created: <?php echo $job['created']; ?>
                </li>
                <li>
                    Modified: <?php echo $job['modified']; ?>
                </li>

            </ul>

            <?php produceButtons($this, $job, $referer); ?>
        </div>
        <div class="col-md-6">

            <h1 class="sub-header">Other Jobs from <?php echo $this->Html->link($job->project['name'], array('controller' => 'projects', 'action' => 'view', $job->project['id']));
            ?></h1>
            <?php
            if (isEmptyArray($other_project_jobs)) {
                echo "There are no other jobs associated with this project.<br>";
            }
            ?>
            <ul>
                <?php foreach ($other_project_jobs as $other_project_job): ?>
                    <li>
                        <?php
                        echo $this->Html->link($other_project_job['name'], array('controller' => 'jobs', 'action' => 'view', $other_project_job['id']));
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php echo $this->Html->link('View all', array('controller' => 'projects', 'action' => 'view', $job->project['id']), array('class' => 'btn btn-success'));
            ?>
        </div>
        <div class="col-md-6">

            <h1 class="sub-header">Other Jobs from <?php echo $this->Html->link($job->user['name'], array('controller' => 'users', 'action' => 'view', $job->user['id']));
            ?></h1>
                <?php
                if (isEmptyArray($other_users_jobs)) {
                    echo "There are no other jobs associated with this user.<br>";
                }
                ?>
            <ul>
                <?php foreach ($other_users_jobs as $other_users_job): ?>
                    <li>
                        <?php
                        echo $this->Html->link($other_users_job['name'], array('controller' => 'jobs', 'action' => 'view', $other_users_job['id']));
                        ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php echo $this->Html->link('View all', array('controller' => 'users', 'action' => 'view', $job->user['id']), array('class' => 'btn btn-success'));
            ?>
        </div>
    </div>
</div>