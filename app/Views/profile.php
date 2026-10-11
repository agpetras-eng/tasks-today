<?= $this->extend('layout') ?>

<?= $this->section('heading') ?>Profile<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php if ($user) : ?>

    <div class="grid">

        <section class="card lilac">
            <div class="avatar" aria-hidden="true"><?= esc(mb_strtoupper(mb_substr($user['full_name'], 0, 1))) ?></div>
            <h2><?= esc($user['full_name']) ?></h2>
            <p class="muted">@<?= esc($user['username']) ?></p>
        </section>

        <section class="card cream">
            <h2>Account details</h2>
            <dl class="details">
                <dt>Full name</dt>
                <dd><?= esc($user['full_name']) ?></dd>

                <dt>Username</dt>
                <dd>@<?= esc($user['username']) ?></dd>

                <dt>Email</dt>
                <dd><?= esc($user['email']) ?></dd>

                <dt>Member since</dt>
                <dd><?= date('F j, Y', strtotime($user['created_at'])) ?></dd>
            </dl>
        </section>

    </div>

<?php else : ?>

    <div class="grid">
        <section class="card lilac span-2">
            <h2>No user found</h2>
            <p class="muted">Run the UserSeeder to add the demo user: php spark db:seed UserSeeder</p>
        </section>
    </div>

<?php endif; ?>

<?= $this->endSection() ?>