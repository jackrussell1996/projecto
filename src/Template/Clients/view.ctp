<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h1 class="sub-header"><?php echo $client['name']; ?></h1>
            <ul>
                <li>
                    Client ID: <?php echo $client['id']; ?>
                </li>
                <li>
                    Website: <?php
                    echo $this->Html->link($client['website'], 'http://' . $client['website'], array('target' => '_blank'));
                    ?>
                </li>
                <li>
                    Contact Person: <?php echo $client['contactname']; ?>
                </li>
                <li>
                    Contact Number: <?php echo $this->Html->link($client['contactnum'], 'tel:' . $client['contactnum']);
                    ?>
                </li>
                <li>
                    Created: <?php echo $client['created']; ?>
                </li>
                <li>
                    Modified: <?php echo $client['modified']; ?>
                </li>
            </ul>

            <?php produceButtons($this, $client, $referer); ?>
        </div>
        <div class="col-md-6">

            <h1 class="sub-header">Projects</h1>
            <?php
            if (isEmptyArray($client->projects)) {
            echo "There are currently no projects associated with this client.<br>";
            }
            ?>
            <ul>
                <?php foreach ($client->projects as $project): ?>
                <li>
                    <?php echo $this->Html->link($project['name'], array('controller' => 'projects', 'action' => 'view', $project['id'])) ?>
                </li>
                <?php endforeach; ?>
            </ul>
            <?php
            echo $this->Html->link('Add a project', array('controller' => 'projects', 'action' => 'add'), array('class' => 'btn btn-success'));
            ?>
        </div>
    </div>

</div>