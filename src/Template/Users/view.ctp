<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="sub-header"><?php echo $user['name']; ?></h1>
            <ul>
                <li>
                    ID: <?php echo $user['id']; ?>
                </li>
                <li>
                    Authority: <?php
                    if ($user['isAdmin']) {
                        echo "Administrator";
                    } else {
                        echo "User";
                    }
                    ?>
                </li>
                <li>
                    Created: <?php echo $user['created']; ?>
                </li>
                <li>
                    Modified: <?php echo $user['modified']; ?>
                </li>
            </ul>
            <?php produceButtons($this, $user, $referer); ?>
        </div>
        <div class="col-md-6">
            <h1 class="sub-header">Users Jobs</h1>
            <?php
            if (isEmptyArray($user->jobs)) {
                echo "There are currently no jobs associated with this user.<br>";
            }
            ?>
            <ul>
                <?php foreach ($user->jobs as $job): ?>
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