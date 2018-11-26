<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="sub-header"><?php echo $project['name']; ?></h1>
            <ul>
                <li>
                    Project ID: <?php echo $project['id']; ?>
                </li>
                <li>
                    Client: <?php
                    echo $this->Html->link($project->client['name'], array('controller' => 'clients', 'action' => 'view',
                        $project->client['id']));
                    ?>
                </li>
                <li>
                    Starting date: <?php echo $project['startdate']; ?>
                </li>
                <li>
                    Finishing date: <?php echo $project['finishdate']; ?>
                </li>
                <li>
                    Created: <?php echo $project['created']; ?>
                </li>
                <li>
                    Modified: <?php echo $project['modified']; ?>
                </li>
            </ul>

            <?php produceButtons($this, $project, $referer); ?>
        </div>
        <div class="col-md-6">

            <h1 class="sub-header">Jobs</h1>
            <?php
            if (isEmptyArray($project->jobs)) {
                echo "There are currently no jobs associated with this project.<br>";
            }
            ?>
            <ul>
                <?php foreach ($project->jobs as $job): ?>
                    <li>
                        <?php echo $this->Html->link($job['name'], array('controller' => 'jobs', 'action' => 'view', $job['id'])) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php
            echo $this->Html->link('Add a job', array('controller' => 'jobs', 'action' => 'add'), array('class' => 'btn btn-success'));
            ?>
        </div>
    </div>
</div>
