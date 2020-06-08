<?php

namespace App\Http\Controllers;

use App\AnalyticType;
use App\Imports\AppDataImport;
use App\Property;
use App\PropertyAnalytic;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;


class SetupApp extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //Import the data from supplied excel sheet
        Property::truncate();
        PropertyAnalytic::truncate();
        AnalyticType::truncate();
        Excel::import(new AppDataImport(), storage_path('/imports/testData.xlsx'));

        //create a user , log them in and create a token to be used for API calls
        User::truncate();
        $user = User::create([
            'name' => 'user',
            'email' => 'user@company.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        auth()->login($user);
        $token =  auth()->user()->createToken('forapi',  []);

        return $token;
    }
}
