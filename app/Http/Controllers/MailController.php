<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller {
    public static function basic_email() {
        $data = array('name'=>"Virat Gandhi");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo json_encode(['message' => "Mail sent!", 'type' => 'success']);
    }
    public static function html_email($data) {
        $data2 = $data;

        Mail::send('mail', $data2, function($message) use ($data) {
            $message->to('abc@gmail.com','Test mail')->subject
            ('Order');
            $message->from($data['user']->email, $data['user']->name);
        });
        echo json_encode(['message' => "Mail sent!", 'type' => 'success']);
    }
    public static function html_email2($data) {
        $data2 = $data;

        Mail::send('mail2', $data2, function($message) use ($data) {
            $message->to('test@test.com','Test mail')->subject
            ($data['request']->subject);
            $message->from($data['request']->email, $data['request']->fname);
        });
    }
    public function attachment_email() {
        $data = array('name'=>"Virat Gandhi");
        Mail::send('mail', $data, function($message) {
            $message->to('abc@gmail.com', 'Tutorials Point')->subject
            ('Laravel Testing Mail with Attachment');
            $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
            $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
            $message->from('xyz@gmail.com','Virat Gandhi');
        });
        echo json_encode(['message' => "Mail sent!", 'type' => 'success']);
    }
}
