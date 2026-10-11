<?= $this->extend('layout') ?>

<?= $this->section('heading') ?>Tasks for today<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// The three statuses: emoji and label for each group heading
$groups = [
    'in progress' => ['🌟', 'In progress'],
    'pending'     => ['☕', 'Pending'],
    'done'        => ['✅', 'Done'],
];

// Count how many of today's tasks are in each status
$counts = ['in progress' => 0, 'pending' => 0, 'done' => 0];
foreach ($tasks as $task) {
    if (isset($counts[$task['status']])) {
        $counts[$task['status']]++;
    }
}

$total   = count($tasks);
$percent = $total > 0 ? round($counts['done'] / $total * 100) : 0;
?>

<?php if ($total == 0) : ?>

    <div class="grid">
        <section class="card lilac span-2">
            <h2><?= $today ?></h2>
            <p class="muted">Nothing is planned for today. Tasks dated today will show up here.</p>
        </section>
    </div>

<?php else : ?>

    <div class="grid">

        <section class="card lilac">
            <h2><?= $today ?></h2>
            <p class="muted">Here is what is on your list today</p>

            <?php foreach ($groups as $status => $group) : ?>
                <?php if ($counts[$status] > 0) : ?>
                    <h3 class="group-title"><?= $group[0] ?> <?= $group[1] ?></h3>
                    <ul class="todo">
                        <?php foreach ($tasks as $task) : ?>
                            <?php if ($task['status'] == $status) : ?>
                                <li class="<?= $status == 'done' ? 'is-done' : '' ?>">
                                    <span class="box" aria-hidden="true"></span>
                                    <span class="todo-title"><?= esc($task['title']) ?></span>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            <?php endforeach; ?>
        </section>

        <section class="card cream">
            <h2>Today at a glance</h2>
            <p class="muted"><?= $counts['done'] ?> of <?= $total ?> tasks done</p>

            <div class="bar" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="<?= $percent ?>">
                <div class="bar-fill" style="width: <?= $percent ?>%"></div>
            </div>

            <ul class="stats">
                <li><span>🌟 In progress</span> <strong><?= $counts['in progress'] ?></strong></li>
                <li><span>☕ Pending</span> <strong><?= $counts['pending'] ?></strong></li>
                <li><span>✅ Done</span> <strong><?= $counts['done'] ?></strong></li>
            </ul>
        </section>

    </div>

<?php endif; ?>

<?= $this->endSection() ?>