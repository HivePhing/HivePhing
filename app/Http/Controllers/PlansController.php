<?php

namespace App\Http\Controllers;

use App\Plans;
use App\RegisterfeeModel;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlansController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $plans = Plans::all();
        return view('plans.index', compact('plans'));
    }

    public function view($id)
    {
        $plans = Plans::where('id', $id)->first();
        return view('plans.view', compact('plan'));
    }

    public function add_plan_form()
    {
        return view('plans.upload');

    }

    public function add_plan(Request $request)
    {
        $validation = Validator::make($request->all(), ['user_type' => 'required|min:1|max:2', 'plan_type' => 'required|min:1|max:3', 'start_date' => 'required', 'user_id' => 'required|unique:plans,user_id']);
        if ($validation->fails()) {
            return $validation->errors();
        }

        $input = $request->except('_token');

        $get_user_type = User::where('id', $request->user_id)->first();
        if ($get_user_type->type != $request->user_type) {
            return 'user type wrong';
        }

        if ($request->duration_month != 3 and $request->duration_month != 6 and $request->duration_month != 1 and $request->duration_month != 12) {
            return 'Duration month must be 1 or 3 or 6 or 12';
        }

        $get_reg_fee = RegisterfeeModel::where('user_id', $request->user_id);
        if ($get_reg_fee->count() == 0) {
            return 'please firstly fill registration fee of this user';
        }
        if ($request->user_type == 2 and $request->plan_type == 3) {
            return 'User Type AND PLAN TYPE WRONG';
        }

        if ($request->user_type == 1) {
            if ($request->plan_type == 1) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '50000') {
                        return 'insufficient fee! fee must be 50000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 50000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = 150000 * (8 / 100);
                    $new_amount = (150000 - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be 150000';

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = 300000 * (10 / 100);
                    $new_amount = (300000 - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be 300000';

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = 600000 * (12 / 100);
                    $new_amount = (600000 - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be 600000';

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
            if ($request->plan_type == 2) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '80000') {
                        return 'insufficient fee! fee must be 80000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 80000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (80000 * 3) * (8 / 100);
                    $new_amount = ((80000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (80000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (80000 * 6) * (10 / 100);
                    $new_amount = ((80000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (80000 * 12) * (12 / 100);
                    $new_amount = ((80000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
            if ($request->plan_type == 3) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '100000') {
                        return 'insufficient fee! fee must be 100000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 100000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (100000 * 3) * (8 / 100);
                    $new_amount = ((100000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (100000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (100000 * 6) * (10 / 100);
                    $new_amount = ((100000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (100000 * 12) * (12 / 100);
                    $new_amount = ((100000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
        }
        if ($request->user_type == 2) {
            if ($request->plan_type == 1) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '80000') {
                        return 'insufficient fee! fee must be 80000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 80000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (80000 * 3) * (8 / 100);
                    $new_amount = ((80000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (80000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (80000 * 6) * (10 / 100);
                    $new_amount = ((80000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (80000 * 12) * (12 / 100);
                    $new_amount = ((80000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
            if ($request->plan_type == 2) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '100000') {
                        return 'insufficient fee! fee must be 100000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 100000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (100000 * 3) * (8 / 100);
                    $new_amount = ((100000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (100000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (100000 * 6) * (10 / 100);
                    $new_amount = ((100000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (100000 * 12) * (12 / 100);
                    $new_amount = ((100000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }

        }
        $input['expire_date'] = $ex;
        Plans::create($input);


        return redirect('plans')->with('add', 'New Article was successfully added');

    }

    public function edit_plan_form($id)
    {
        $plan = Plans::where('id', $id)->first();
        return view('plans.edit', ['plan' => $plan]);


    }

    public function edit($id, Request $request)
    {
        $validation = Validator::make($request->all(), ['user_type' => 'required|min:1|max:2', 'plan_type' => 'required|min:1|max:3', 'start_date' => 'required', 'user_id' => 'required|unique:plans,user_id,' . $id]);
        if ($validation->fails()) {
            return $validation->errors();
        }

        $input = $request->except('_token');

        $get_user_type = User::where('id', $request->user_id)->first();
        if ($get_user_type->type != $request->user_type) {
            return 'user type wrong';
        }

        if ($request->duration_month != 3 and $request->duration_month != 6 and $request->duration_month != 1 and $request->duration_month != 12) {
            return 'Duration month must be 1 or 3 or 6 or 12';
        }

        $get_reg_fee = RegisterfeeModel::where('user_id', $request->user_id);
        if ($get_reg_fee->count() == 0) {
            return 'please firstly fill registration fee of this user';
        }


        if ($request->user_type == 1) {
            if ($request->plan_type == 1) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '50000') {
                        return 'insufficient fee! fee must be 50000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 50000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = 150000 * (8 / 100);
                    $new_amount = (150000 - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be 150000';

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = 300000 * (10 / 100);
                    $new_amount = (300000 - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be 300000';

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = 600000 * (12 / 100);
                    $new_amount = (600000 - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be 600000';

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
            if ($request->plan_type == 2) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '80000') {
                        return 'insufficient fee! fee must be 80000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 80000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (80000 * 3) * (8 / 100);
                    $new_amount = ((80000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (80000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (80000 * 6) * (10 / 100);
                    $new_amount = ((80000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (80000 * 12) * (12 / 100);
                    $new_amount = ((80000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
            if ($request->plan_type == 3) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '100000') {
                        return 'insufficient fee! fee must be 100000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 100000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (100000 * 3) * (8 / 100);
                    $new_amount = ((100000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (100000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (100000 * 6) * (10 / 100);
                    $new_amount = ((100000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (100000 * 12) * (12 / 100);
                    $new_amount = ((100000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
        }
        if ($request->user_type == 2) {
            if ($request->plan_type == 1) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '80000') {
                        return 'insufficient fee! fee must be 80000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 80000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (80000 * 3) * (8 / 100);
                    $new_amount = ((80000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (80000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (80000 * 6) * (10 / 100);
                    $new_amount = ((80000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (80000 * 12) * (12 / 100);
                    $new_amount = ((80000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (80000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }
            if ($request->plan_type == 2) {

                if ($request->duration_month == 1) {
                    if ($get_reg_fee->first()->amount < '100000') {
                        return 'insufficient fee! fee must be 100000';

                    } else {
                        $new_amount = $get_reg_fee->first()->amount - 100000;
                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(1);


                    }
                }
                if ($request->duration_month == 3) {
                    $dis = (100000 * 3) * (8 / 100);
                    $new_amount = ((100000 * 3) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be' . (100000 * 3);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(3);


                    }
                }
                if ($request->duration_month == 6) {
                    $dis = (100000 * 6) * (10 / 100);
                    $new_amount = ((100000 * 6) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 6);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
                if ($request->duration_month == 12) {
                    $dis = (100000 * 12) * (12 / 100);
                    $new_amount = ((100000 * 12) - $dis);
                    if ($get_reg_fee->first()->amount < $new_amount) {
                        return 'insufficient fee! fee must be ' . (100000 * 12);

                    } else {

                        RegisterfeeModel::where('user_id', $request->user_id)->update(['amount' => $new_amount]);
                        $ex = Carbon::parse($request->start_date)->addMonth(6);


                    }
                }
            }

        }
        $input['expire_date'] = $ex;
        Plans::where('id', $id)->update($input);


        return redirect('plans')->with('update', 'New Article was successfully edited');

    }
}
