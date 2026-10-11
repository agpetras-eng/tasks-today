<?= $this->extend('layout') ?>

<?= $this->section('heading') ?>About<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?php
// EDIT THESE THREE LINES with your own details
$developer = 'Aris Matthew Petras';
$section   = 'TB32';
$professor = 'Joseph Calleja';
?>

<div class="grid">

    <section class="card lilac">
        <h2>🌟 Tasks for Today Management System</h2>
        <p class="about-text">A small web application that helps a team track daily to-do items.</p>
        <p class="about-text">The Welcome page shows only today's tasks, while the Task List page shows every task in the database, ordered by date.</p>
        <p class="about-text">It was built for IT0049 (Web System Technologies), Technical Summative Assessment 1.</p>
    </section>

    <section class="card cream">
        <h2>☕ Developer</h2>
        <dl class="details">
            <dt>Name</dt>
            <dd><?= esc($developer) ?></dd>

            <dt>Section</dt>
            <dd><?= esc($section) ?></dd>

            <dt>Professor</dt>
            <dd><?= esc($professor) ?></dd>

            <dt>College</dt>
            <dd>College of Computer Studies and Multimedia Arts</dd>
        </dl>
    </section>

    <section class="card lilac span-2">
        <h2>🧋 Built with</h2>
        <div class="tags">
            <span>CodeIgniter 4</span>
            <span>PHP</span>
            <span>MySQL</span>
            <span>MVC structure</span>
        </div>
    </section>

</div>

<?= $this->endSection() ?>