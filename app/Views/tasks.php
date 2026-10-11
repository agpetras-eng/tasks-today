<?= $this->extend('layout') ?>

<?= $this->section('heading') ?>All tasks<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if ($total == 0) : ?>

    <div class="grid">
        <section class="card lilac span-2">
            <h2>No tasks yet</h2>
            <p class="muted">Tasks you add will be listed here, ordered by date.</p>
        </section>
    </div>

<?php else : ?>

    <div class="grid">
        <?php $i = 0; ?>
        <?php foreach ($groups as $date => $dayTasks) : ?>

            <section class="card <?= $i % 2 == 0 ? 'lilac' : 'cream' ?>">
                <h2>
                    <?= date('l, M j', strtotime($date)) ?>
                    <?php if ($date == date('Y-m-d')) : ?>
                        <span class="pill today">Today</span>
                    <?php endif; ?>
                </h2>
                <p class="muted"><?= count($dayTasks) ?> task(s)</p>

                <ul class="todo">
                    <?php foreach ($dayTasks as $task) : ?>
                        <li class="<?= $task['status'] == 'done' ? 'is-done' : '' ?>">
                            <span class="box" aria-hidden="true"></span>
                            <span class="todo-title"><?= esc($task['title']) ?></span>
                            <span class="pill <?= str_replace(' ', '-', $task['status']) ?>"><?= ucfirst($task['status']) ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </section>

            <?php $i++; ?>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

<?= $this->endSection() ?>