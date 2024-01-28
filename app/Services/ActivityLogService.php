<?php

namespace App\Services;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;

class ActivityLogService
{

    /**
     * Add record for activity logs table.
     *
     * @param $action
     * @param $payload
     * @return mixed
     */
    public function addLog($action, $payload)
    {
        return ActivityLog::create([
            'user_id' => Auth::user()->id,
            'action' => $action,
            'payload' => $payload,
        ]);
    }

}
