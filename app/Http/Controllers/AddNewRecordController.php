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
        try {
            DB::beginTransaction();
            // Code start from here
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
            
            // Code end here
            DB::commit();
            // Response of API or return VIEW

            return response()->json([
				'status' => 'success',
				'msg'    => 'Data added sucessfully.'
			]);

        } catch (\Exception $exe) {
            DB::rollBack();
            // Exceptional response
            return response()->json([
				'status' => 'Failed.',
				'msg'    => $exe->getMessage()
			]);
        }

    }

}
