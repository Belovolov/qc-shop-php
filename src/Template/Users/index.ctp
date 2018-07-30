<?php
    $this->assign('title', 'Users');
?>

<div class="my-2">
    <label for="status">Select status filter</label>
    <?= $this->Form->select("status", ["All", "Active", "Blocked"], ['id'=>'status', 'val'=>$status]) ?>
</div>
<table class="table">
    <thead>
        <tr>
            <th>
                Email
            </th>
            <th>
                UserName
            </th>
            <th>
                Name
            </th>
            <th>
                Email confirmed
            </th>
            <th>
                Status
            </th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td>
                    <?= $user->Email ?>
                </td>
                <td>
                    <?= $user->UserName ?>
                </td>
                <td>
                    <?= $user->FullName ?>
                </td>
                <td>
                    <?= $user->EmailConfirmed ? "Yes":"No" ?>
                </td>
                <td>
                    <?php if ($user->IsLocked): ?>
                        <span title="Blocked" class="badge badge-dark"><i class="fas fa-ban"></i></span>
                    <?php else:?>
                        <span title="Active" class="badge badge-success"><i class="fas fa-check"></i></span>
                    <?php endif;?>
                </td>
                <td>
                    <?php if ($user->IsLocked): ?>
                        <?= $this->Html->link(
                            'Unlock', 
                            ['controller'=> 'users', 'action' => 'unlock', $user->Id ]) 
                        ?>
                <?php else: ?>
                        <?= $this->Html->link(
                            'Block', 
                            ['controller'=> 'users', 'action' => 'block', $user->Id ]) 
                        ?>
                <?php endif; ?>
                    |
                    <?= $this->Html->link(
                        'Details', 
                        ['controller'=> 'users', 'action' => 'details', $user->Id ]) 
                    ?>                  
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->Html->script('userFiltering', ['block' => 'scriptsBottom']) ?>