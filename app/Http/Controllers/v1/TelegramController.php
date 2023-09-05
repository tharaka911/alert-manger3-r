<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GuzzleController;
use App\Models\Log;
use App\Models\Project;
use App\Models\Telegram;
use Illuminate\Http\Request;
use stdClass;

class TelegramController extends Controller
{
    public function index($project_api_key, Request $request)
    {

        $jsonData = $request->json()->all();
        $error_msg = $jsonData['error_msg'];
        $severity_level = $jsonData['severity_level'];
        $project = Project::where('project_api_key', '=', $project_api_key)->first();
        $project_id = $project->id;

        $telegram_details = Telegram::where('project_id', '=', $project_id)->first();

        $msg_content = new stdClass();
        $msg_content->bot_api_key = $telegram_details->bot_api_key;
        $msg_content->channel_id = $telegram_details->channel_id;
        $msg_content->project_name = $project->project_name;
        $msg_content->domain_name = $project->domain_name;
        $msg_content->domain = $project->domain_name;
        $msg_content->severity = $severity_level;
        $msg_content->error_msg = $error_msg;

        Log::create([
            'project_id' => $project_id,
            'severity_level' => $severity_level,
            'msg_content' => $error_msg
        ]);

        $requst = new GuzzleController();
        $response = $requst->send_alert($msg_content);

        return $msg_content;
    }
}
