<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title) ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        /* ---------- Colors ---------- */
        :root {
            --ink: #1c1b1f;
            --muted: #6b6672;
            --frame: #c976ff;        /* outer purple frame */
            --panel: #d08bff;        /* inner purple panel */
            --lilac: #fdf7fe;        /* lilac card background */
            --lilac-line: #e9b6fb;   /* lilac card border */
            --cream: #fefdf4;        /* cream card background */
            --cream-line: #fcea76;   /* yellow card border */
        }

        /* ---------- Base ---------- */
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #ffffff;
            color: var(--ink);
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, Arial, sans-serif;
            line-height: 1.5;
        }

        a:focus-visible {
            outline: 3px solid #7a2fd0;
            outline-offset: 3px;
        }

        /* ---------- Top bar ---------- */
        .topbar-inner {
            max-width: 1100px;
            margin: 0 auto;
            padding: 18px 24px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }

        .brand {
            font-weight: 600;
            font-size: 1.05rem;
            color: var(--ink);
            text-decoration: none;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .nav a {
            padding: 7px 16px;
            border-radius: 999px;
            color: var(--ink);
            text-decoration: none;
            font-size: 0.95rem;
        }

        .nav a:hover { background: #f3e3ff; }
        .nav a.active { background: var(--panel); font-weight: 500; }

        /* ---------- Page title and purple frame ---------- */
        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 24px 40px;
        }

        .page-title {
            text-align: center;
            font-size: clamp(1.9rem, 4vw, 2.7rem);
            font-weight: 500;
            letter-spacing: -0.02em;
            margin: 28px 0 28px;
        }

        .frame {
            background: var(--frame);
            border-radius: 36px;
            padding: 12px;
        }

        .panel {
            background: var(--panel);
            border-radius: 26px;
            padding: 48px;
        }

        /* ---------- Cards ---------- */
        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
            align-items: start;
        }

        .span-2 { grid-column: 1 / -1; }

        .card {
            border-radius: 18px;
            border: 2px solid;
            padding: 30px 32px 34px;
        }

        .card.lilac { background: var(--lilac); border-color: var(--lilac-line); }
        .card.cream { background: var(--cream); border-color: var(--cream-line); }

        .card h2 {
            font-size: 1.35rem;
            font-weight: 500;
            letter-spacing: -0.01em;
            margin: 0;
        }

        .card .muted { color: var(--muted); font-size: 0.9rem; margin: 4px 0 0; }

        .group-title {
            font-size: 1.05rem;
            font-weight: 500;
            margin: 26px 0 10px;
        }

        /* ---------- To-do list ---------- */
        .todo {
            list-style: none;
            margin: 14px 0 0;
            padding: 0;
        }

        .group-title + .todo { margin-top: 0; }

        .todo li {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 0;
            font-size: 0.95rem;
        }

        .todo-title { flex: 1; }

        .box {
            flex: none;
            width: 17px;
            height: 17px;
            border: 1.5px solid #3b3a40;
            border-radius: 4px;
            background: #ffffff;
            position: relative;
        }

        .is-done .box { background: #3b3a40; }

        .is-done .box::after {
            content: '';
            position: absolute;
            left: 4.5px;
            top: 1px;
            width: 4px;
            height: 9px;
            border: solid #ffffff;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }

        .is-done .todo-title { color: var(--muted); text-decoration: line-through; }

        /* ---------- Small status pills ---------- */
        .pill {
            display: inline-block;
            padding: 2px 11px;
            border-radius: 999px;
            font-size: 0.78rem;
            font-weight: 500;
            white-space: nowrap;
            vertical-align: middle;
        }

        .pill.pending     { background: #f1e4fb; color: #5b2a78; }
        .pill.in-progress { background: #fff3a8; color: #5a4a00; }
        .pill.done        { background: #dcf3e2; color: #1d5a32; }
        .pill.today       { background: var(--panel); color: #2a0f40; margin-left: 8px; }

        /* ---------- Progress and stats (Welcome page) ---------- */
        .bar {
            height: 10px;
            background: #f4efc2;
            border-radius: 999px;
            overflow: hidden;
            margin: 18px 0 8px;
        }

        .bar-fill { height: 100%; background: var(--frame); border-radius: 999px; }

        .stats {
            list-style: none;
            margin: 18px 0 0;
            padding: 0;
        }

        .stats li {
            display: flex;
            justify-content: space-between;
            padding: 9px 0;
            border-top: 1px solid #f1e9a8;
            font-size: 0.95rem;
        }

        /* ---------- Profile and About ---------- */
        .avatar {
            width: 84px;
            height: 84px;
            border-radius: 50%;
            background: var(--panel);
            color: #2a0f40;
            font-size: 2rem;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }

        .details { margin: 18px 0 0; }
        .details dt { color: var(--muted); font-size: 0.85rem; margin-top: 16px; }
        .details dd { margin: 2px 0 0; font-size: 1rem; }

        .about-text { margin: 14px 0 0; font-size: 0.97rem; }
        .about-text + .about-text { margin-top: 10px; }

        .tags { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; }
        .tags span {
            background: #f1e4fb;
            color: #5b2a78;
            padding: 5px 14px;
            border-radius: 999px;
            font-size: 0.88rem;
            font-weight: 500;
        }

        /* ---------- Footer ---------- */
        .footer {
            text-align: center;
            color: var(--muted);
            font-size: 0.85rem;
            padding: 0 24px 36px;
        }

        /* ---------- Phones and small screens ---------- */
        @media (max-width: 800px) {
            .grid { grid-template-columns: 1fr; gap: 24px; }
            .panel { padding: 22px; }
            .frame { border-radius: 28px; }
            .card { padding: 24px 22px 28px; }
        }
    </style>
</head>
<body>

<header>
    <div class="topbar-inner">
        <a class="brand" href="<?= base_url() ?>">🌟 Tasks for Today</a>
        <nav class="nav">
            <a class="<?= uri_string() == '' ? 'active' : '' ?>" href="<?= base_url() ?>">Welcome</a>
            <a class="<?= uri_string() == 'tasks' ? 'active' : '' ?>" href="<?= base_url('tasks') ?>">Task List</a>
            <a class="<?= uri_string() == 'profile' ? 'active' : '' ?>" href="<?= base_url('profile') ?>">Profile</a>
            <a class="<?= uri_string() == 'about' ? 'active' : '' ?>" href="<?= base_url('about') ?>">About</a>
        </nav>
    </div>
</header>

<main class="page">
    <h1 class="page-title"><?= $this->renderSection('heading') ?></h1>

    <div class="frame">
        <div class="panel">
            <?= $this->renderSection('content') ?>
        </div>
    </div>
</main>

<footer class="footer">
    IT0049 - Web System Technologies | Tasks for Today Management System
</footer>

</body>
</html>