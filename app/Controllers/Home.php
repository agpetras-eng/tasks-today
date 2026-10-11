<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    // Welcome page (/) - shows only today's tasks
    public function index()
    {
        $taskModel = new TaskModel();

        $data['title'] = 'Welcome - Tasks for Today';
        $data['today'] = date('l, F j, Y');
        $data['tasks'] = $taskModel->getTodayTasks();

        return view('home', $data);
    }
}
