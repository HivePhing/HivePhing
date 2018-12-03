<?php

namespace App\Http\Controllers;

use App\FirebaseModel;
use App\Mail\Mailsfunction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ConfirmserviceController extends FirebasehelperController
{    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function confirm_service($id)
    {
        if (auth()->guard('admin')->user()->role == 'op') {
            $check_is = DB::table('relation_user_post_and_op')->where([['op_id', '=', auth()->guard('admin')->user()->id], ['post_id', '=', $id]])->count();
            if ($check_is == 0) {
                return 'You are not authorized';
            }

        }

        DB::table('relation_user_post_and_op')->where([['op_id', '=', auth()->guard('admin')->user()->id], ['post_id', '=', $id]])->update(['process' => 'confirmed']);

        if (DB::connection('mysql_service')->table('for_repair')->where('id', $id)->update(['confirm' => 'confirmed'])) {

        }
        $get_project_data = DB::connection('mysql_service')->table('for_repair')->where('id', $id)->first();
        switch ($get_project_data->fr_type) {
            case 'fr4':
                $fr = 1;
                break;
            case 'rb4':
                $fr = 1;
                break;
            case 'fr3':

                $fr = 2;
                break;
            case 'rb3':
                $fr = 2;
                break;
            case 'fr5':
                $fr = 3;

                break;
            case 'fr1':
                $fr = 4;
                break;
            case 'rb2':
                $fr = 4;
                break;
            case 'fr7':
                $fr = 5;
                break;

            case 'fr8':
                $fr = 6;
                break;
            case 'rb5':
                $fr = 6;
                break;

            case 'fn1':
                $fr = 7;
                break;
            case 'fn2':
                $fr = 7;
                break;
            case 'fn3':
                $fr = 7;
                break;
            case 'fn4':
                $fr = 7;
                break;
            case 'fr6':
                $fr = 8;
                break;
            case 'fn2':
                $fr = 8;
                break;
            case 'fn3':
                $fr = 8;
                break;
            case 'fn4':
                $fr = 8;
                break;
            case 'rb1':
                $fr = 9;
                break;
            case 'b1':
                $fr = 9;
                break;
            case 'b2':
                $fr = 9;
                break;
            case 'b3':
                $fr = 9;
                break;
            case 'fr8':
                $fr = 10;
                break;
            case 'rb5':
                $fr = 10;
                break;

        }
        $title = $get_project_data->name;
        $des = str_limit($get_project_data->description, '120', '...');


        $get_com = DB::table('company')->where([['business_hub', '=', $fr], ['city_id', '=', $get_project_data->city]])->get();
        $send_user_token=['cxazY5DQbTI:APA91bEfG487MjtLbIyLuiTvQR60h4CtDKUAEe9QRkklwmkh2tVoflb1DJDd4XKC2nBOwlGytYvbgomrAyFAIvPGGd53Kx7axwV1kA2EKj8iWkhM_kyiVnqNVsIXnscoyayKkT49Fnap'];
        foreach ($get_com as $gc) {

//            if (Mail::to($gc->email)->send(new Mailsfunction($title, $des))) {
//            } else {
//                continue;
//            }

            //for firebase
            $check_for_firebase = FirebaseModel::where('user_id', $gc->user_id);
            if ($check_for_firebase->count() > 0) {
               $send_user_token=$check_for_firebase->first()->token;

            } else {
                continue;
            }
            //end for firebase
        }
        if(!empty($send_user_token)) {
            FirebasehelperController::sendnotimsg($body = 'body test', $title = $get_project_data->name, $token = $send_user_token);
        }
        return redirect('confirmed_service');

    }

    public function test_mail()
    {
        $get_project_data = DB::connection('mysql_service')->table('for_repair')->where('id', 230)->first();
        $title = $get_project_data->name;
        $des = str_limit($get_project_data->description, '120', '...');

        Mail::to('koluchaw@gmail.com')->send(new Mailsfunction($title, $des));
        return 'good';
    }

}
