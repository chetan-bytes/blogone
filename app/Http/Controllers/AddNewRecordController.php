<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Models\Dummy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class AddNewRecordController extends Controller
{

    public function saveWithDb(Request $request)
    {
        if (empty($request->input('username'))) {
            return response()->json(['status' => 'fail', 'msg' => 'Please provide suffiecient data.', 'example' => '?&username=chetanpatel&email=chetan.patel@gmail.com']);
        } else {
            try {
                DB::beginTransaction();

                $dummy = Dummy::create([
                    'firstname' => $request->input('username'),
                    'email' => $request->input('email'),
                ]);

                $newUser = User::create([
                    'name' => $request->input('username'),
                    'email' => $request->input('email'),
                    'password' => 'password',
                ]);

                $newAcct = Accounts::create([
                    'user_id' => $newUser->id,
                    'account_name' => $request->input('username'),
                ]);
                DB::commit();

                return response()->json([
                    'status' => 'success',
                    'msg' => 'Data added sucessfully.',
                ]);

            } catch (\Exception $exe) {
                DB::rollBack();
                return response()->json(['status' => 'Failed.', 'msg' => $exe->getMessage(),
                ]);
            }

        }

    }

}
