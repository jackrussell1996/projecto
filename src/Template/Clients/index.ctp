<table class="table table-striped">
    <thead>
        <tr>
            <th>Name</th>
            <th>Website</th>
            <th>Contact Number</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($client['name'], array('controller' => 'clients', 'action' => 'view', $client['id']));
                    ?>
                </td>
                <td>
                    <?php
                    echo $this->Html->link($client['website'], 'http://' . $client['website'], array('target' => '_blank'));
                    ?>
                </td>
                <td>
                    <?php
                    if ($client['contactnum']) {
                        echo $this->Html->link('<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>' . "  " . $client['contactnum'], 'tel:' . $client['contactnum'], array('escape' => false));
                    } else {
                        echo "none";
                    }
                    ?>
                </td>
                <td>
                    <?php
                    produceActions($this, $client);
                    ?>
                </td>        
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>
<?php producePagination($this); ?>
<p>
    <?php echo $this->Html->link('Add a Client', array('action' => 'add'), array('class' => 'btn btn-primary')); ?>
</p>