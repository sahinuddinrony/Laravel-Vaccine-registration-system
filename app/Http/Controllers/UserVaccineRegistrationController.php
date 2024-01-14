<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailNotificationUser;
use Illuminate\Http\Request;
use App\Models\VaccineCenter;
use App\Models\UserVaccineRegistration;
use App\Http\Requests\RegistrationRequest;

class UserVaccineRegistrationController extends Controller
{
    public function index()
    {
        $vaccine_centers = VaccineCenter::all();

        return view('index', compact('vaccine_centers'));
    }

    public function store(RegistrationRequest $request)
    {
        // dd($request->all());
   /*   $this->validate($request,[

        ]); */

        $data = $request->validated();
        // UserVaccineRegistration::create($data);
        UserVaccineRegistration::create($data);
        // $UserVaccineRegistration = UserVaccineRegistration::create($data);

        // SendEmailNotificationUser::dispatch($UserVaccineRegistration);


        // UserVaccineRegistration::create(
        //    [
        //     'vaccine_center_id'         => $data['vaccine_center_id'],
        //     'name'                      => $data['name'],
        //     'phone_number'              => $data['phone_number'],
        //     'nid'                       => $data['nid'],
        //     'email'                     => $data['email'],

        //    ]);

        //toastr()->success('Vaccine Registration Successful!', 'Congrats');

        return redirect()->route('index')->with(['success' => 'Registration Successful!']);
    }
}
