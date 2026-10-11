<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Tasks extends BaseController
{
    // Task List page (/tasks) - shows every task, one card per date
    public function index()
    {
        $taskModel = new TaskModel();
        $tasks     = $taskModel->getAllTasks();

        // Put the tasks into groups by date (they are already ordered by date)
        $groups = [];
        foreach ($tasks as $task) {
            $groups[$task['task_date']][] = $task;
        }

        $data['title']  = 'All Tasks';
        $data['groups'] = $groups;
        $data['total']  = count($tasks);

        return view('tasks', $data);
    }
}
