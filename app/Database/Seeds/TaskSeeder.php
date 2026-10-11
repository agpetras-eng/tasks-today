<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Dates are built from today, so the sample data always includes today
        $today     = date('Y-m-d');
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        $tomorrow  = date('Y-m-d', strtotime('+1 day'));
        $nextWeek  = date('Y-m-d', strtotime('+7 days'));
        $now       = date('Y-m-d H:i:s');

        $tasks = [
            ['title' => 'Submit weekly progress report', 'status' => 'done',        'task_date' => $yesterday, 'created_at' => $now],
            ['title' => 'Fix login page bug',            'status' => 'done',        'task_date' => $yesterday, 'created_at' => $now],
            ['title' => 'Team stand-up meeting at 9 AM', 'status' => 'done',        'task_date' => $today,     'created_at' => $now],
            ['title' => 'Design database schema',        'status' => 'in progress', 'task_date' => $today,     'created_at' => $now],
            ['title' => 'Write README documentation',    'status' => 'pending',     'task_date' => $today,     'created_at' => $now],
            ['title' => 'Reply to client emails',        'status' => 'pending',     'task_date' => $today,     'created_at' => $now],
            ['title' => 'Prepare sprint demo slides',    'status' => 'pending',     'task_date' => $tomorrow,  'created_at' => $now],
            ['title' => 'Code review for teammates',     'status' => 'pending',     'task_date' => $tomorrow,  'created_at' => $now],
            ['title' => 'Deploy the system to hosting',  'status' => 'pending',     'task_date' => $nextWeek,  'created_at' => $now],
            ['title' => "Plan next month's tasks",       'status' => 'pending',     'task_date' => $nextWeek,  'created_at' => $now],
        ];

        // Empty the table first so running the seeder again never creates duplicates
        $this->db->table('tasks')->truncate();
        $this->db->table('tasks')->insertBatch($tasks);
    }
}
