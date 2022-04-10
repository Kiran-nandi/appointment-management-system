<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Patients;
use App\Models\Admins;
use App\Models\Doctors;
use App\Models\Appointments;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index() {
        return view('RegistraionPage');
    }

    public function registration(Request $request) {
        $patients = new Patients;
        $email = $request->post('email');
        if($patients->checkemail($email) == 'unique') {
            $patients->name = $request->post('name');
        $patients->email = $email;
        $patients->number = $request->post('number');
        $patients->age = $request->post('age');
        $patients->gender = $request->post('gender');
        $patients->address = $request->post('address');
        $password = $request->post('password');
        $repassword = $request->post('repassword');
        
        if($password == $repassword) {
            $patients->password = md5($password);
            if($patients->save()) {
                echo "<script>
                    window.alert('Registered Successfully');
                    window.location.replace('" . url('/sign-in') . "');
                   </script>";
            } else {
                echo "<script>
                    window.alert('Something Went wrong!! Please try again');
                    window.history.back();
                   </script>";
            }
        } else {
            echo "<script>
                window.alert('Your password and re-enter password does not match');
                window.history.back();
               </script>";
        } 
        } else {
            echo "<script>
                window.alert('This Email Already exist!!');
                window.history.back();
               </script>";
        }       
    }

    public function signin(Request $request) {
        if(!empty($request->session()->get('patient'))) {
            echo "<script>
                    window.location.replace('" . url('patient-create-appointment') . "');
                   </script>";
        } else {
            return view('SignIn');
        }
    }

    public function signinprocess(Request $request) {
        $patients = new Patients;
        $email = $request->post('email');
        $password = $request->post('password');
        $checkauth = $patients->checkauth($email, $password);
        if($checkauth !== 'failed') {
            $request->session()->put('patient',$checkauth);
            echo "<script>
                    window.alert('Logged In Successfully');
                    window.location.replace('" . url('patient-create-appointment') . "');
                   </script>";
        } else {
            echo "<script>
                window.alert('Please Re-check Your Credentials');
                window.history.back();
               </script>";
        }
    }

    public function admin() {
        return view('admin/adminlogin');
    }

    public function adminloginprocess(Request $request) {
        $username = $request->post('username');
        $password = $request->post('password');
        $admin = new Admins;
        $checkauth = $admin->checkauth($username, $password); 
        if($checkauth !== 'failed') {
            $request->session()->put('admin',$checkauth);
            echo "<script>
                    window.alert('Logged In Successfully');
                    window.location.replace('" . url('admin-patients-list') . "');
                   </script>";
        } else {
            echo "<script>
                window.alert('Please Re-check Your Credentials');
                window.history.back();
               </script>";
        }
    }

    public function adminpatientslist() {
        $patients = Patients::all();
        return view('admin/patientslist', ['patients' => $patients]);
    }

    public function admindoctorslist() {
        $doctors = Doctors::all();
        return view('admin/doctorslist',['doctors' => $doctors]);
    }

    public function admindeletepatient(Request $request, $id) {
        $patients = Patients::find($id);
        if($patients->delete()) {
            echo "<script>
                window.alert('Deleted Successfully');
                window.location.replace('" . url('/admin-patients-list') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }

    public function admindeletedoctor(Request $request, $id) {
        $doctors = Doctors::find($id);
        if($doctors->delete()) {
            echo "<script>
                window.alert('Deleted Successfully');
                window.location.replace('" . url('/admin-doctors-list') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }

    public function adminlistappointment() {
        $appointment = Appointments::all();
        return view('admin/appointmentlist',['appointment' => $appointment]);
    }

    public function admindeleteappointment(Request $request, $id) {
        $appointment = Appointments::find($id);
        if($appointment->delete()) {
            echo "<script>
                window.alert('Deleted Successfully');
                window.location.replace('" . url('/admin-list-appointment') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }


    public function doctorregistration() {
        return view('doctors/registration');
    }

    public function adminlogout(Request $request) {
        $request->session()->flush('admin');
        echo "<script>
                window.alert('Logged Out Successfully');
                window.location.replace('" . url('admin') . "');
               </script>";
    }

    public function doctorregistrationprocess(Request $request) {
        $doctors = new Doctors;
        $email = $request->post('email');
        if($doctors->checkemail($email) == 'unique') {
            $doctors->name = $request->post('name');
        $doctors->email = $email;
        $doctors->speciality = $request->post('speciality');
        $doctors->number = $request->post('number');
        $doctors->age = $request->post('age');
        $doctors->gender = $request->post('gender');
        $doctors->address = $request->post('address');
        $password = $request->post('password');
        $repassword = $request->post('repassword');
        
        if($password == $repassword) {
            $doctors->password = md5($password);
            if($doctors->save()) {
                echo "<script>
                    window.alert('Registered Successfully');
                    window.location.replace('" . url('/doctor-signin') . "');
                   </script>";
            } else {
                echo "<script>
                    window.alert('Something Went wrong!! Please try again');
                    window.history.back();
                   </script>";
            }
        } else {
            echo "<script>
                window.alert('Your password and re-enter password does not match');
                window.history.back();
               </script>";
        } 
        } else {
            echo "<script>
                window.alert('This Email Already exist!!');
                window.history.back();
               </script>";
        }
    }

    public function doctorsignin(Request $request) {
        if(!empty($request->session()->get('doctor'))) {
            echo "<script>
                window.location.replace('" . url('doctor-appointmentlist') . "');
               </script>";
        }
        return view('doctors/doctorsignin');
    }

    public function doctorsigninprocess(Request $request) {
        $doctors = new Doctors();
        $email = $request->post('email');
        $password = $request->post('password');
        $checkauth = $doctors->checkauth($email, $password);
        if($checkauth !== 'failed') {
            $request->session()->put('doctor',$checkauth);
            echo "<script>
                    window.alert('Logged In Successfully');
                    window.location.replace('" . url('doctor-appointmentlist') . "');
                   </script>";
        } else {
            echo "<script>
                window.alert('Please Re-check Your Credentials');
                window.history.back();
               </script>";
        }
    }

    public function admincrateappointment() {
        $doctors = Doctors::all();
        return view('admin/createappointment', ['doctor' => $doctors]);
    }

    public function patientcreateappointment() {
        $doctors = Doctors::all();
        return view('patientcreateappointment', ['doctor' => $doctors]);
    }

    public function logout(Request $request) {
        $request->session()->flush('patient');
        echo "<script>
                window.alert('Logged Out Successfully');
                window.location.replace('" . url('/sign-in') . "');
               </script>";
    }

    public function createappointementprocess(Request $request) {
        $detials = $request->session()->get('patient');        
        $date = $request->post('time');
        $date = explode('T', $date);
        $appointment = new Appointments;
        $appointment->patientdeletecurrent($detials->email);
        $appointment->name = $request->post('name');
        $appointment->email = $detials->email;
        $appointment->number = $request->post('number');
        $appointment->doctor = $request->post('doctor');
        $appointment->date = $date[0];
        $appointment->time = $date[1];
        $appointment->message = $request->post('message');
        if($appointment->save()) {
            echo "<script>
                window.alert('Appoinment Successfull');
                window.location.replace('" . url('patient-appointmentlist') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }

    public function admincreateappointementprocess(Request $request) {
        $date = $request->post('time');
        $date = explode('T', $date);
        $appointment = new Appointments;
        $appointment->patientdeletecurrent($request->post('email'));
        $appointment->name = $request->post('name');
        $appointment->email = $request->post('email');
        $appointment->number = $request->post('number');
        $appointment->doctor = $request->post('doctor');
        $appointment->date = $date[0];
        $appointment->time = $date[1];
        $appointment->message = $request->post('message');
        if($appointment->save()) {
            echo "<script>
                window.alert('Appoinment Successfull');
                window.location.replace('" . url('admin-list-appointment') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }

    public function guestappointementprocess(Request $request) {
        $date = $request->post('time');
        $date = explode('T', $date);
        $appointment = new Appointments;
        $appointment->patientdeletecurrent($request->post('email'));
        $appointment->name = $request->post('name');
        $appointment->email = $request->post('email');
        $appointment->number = $request->post('number');
        $appointment->doctor = $request->post('doctor');
        $appointment->date = $date[0];
        $appointment->time = $date[1];
        $appointment->message = $request->post('message');
        if($appointment->save()) {
            echo "<script>
                window.alert('Appoinment Successfull');
                window.location.replace('" . url('guest-appointment') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }

    public function guestappointment() {
        $doctors = Doctors::all();
        return view('guestappointment', ['doctor' => $doctors]);
    }

    public function patientappointmentlist(Request $request) {
        $appointment = new Appointments;
        $detials = $request->session()->get('patient');
        $list = $appointment->filterlist($detials->email);
        return view('patientappointmentlist', ['list' => $list]);
    }

    public function deletepatientappointment(Request $request, $id) {
        $appointment = Appointments::find($id);
        if($appointment->delete()) {
            echo "<script>
                window.alert('Deleted Successfully');
                window.location.replace('" . url('patient-create-appointment') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }

    public function doctorappointmentlist(Request $request) {
        $appointment = new Appointments;
        $doctordetials = $request->session()->get('doctor');
        $list = $appointment->filterdoctorlist($doctordetials->name);
        return view('doctors/doctorappointmentlist', ['list' => $list]);
    }

    public function doctorlogout(Request $request) {
        $request->session()->flush('doctor');
        echo "<script>
                window.alert('Logged Out Successfully');
                window.location.replace('" . url('doctor-signin') . "');
               </script>";
    }

    public function deletedoctorappointment(Request $request, $id) {
        $appointment = Appointments::find($id);
        if($appointment->delete()) {
            echo "<script>
                window.alert('Deleted Successfully');
                window.location.replace('" . url('doctor-appointmentlist') . "');
               </script>";
        } else {
            echo "<script>
                window.alert('Something Went wrong!! Please try again');
                window.history.back();
               </script>";
        }
    }

    public function upadatestatus(Request $request) {
        $appointment = Appointments::find($request->post('id'));
        $appointment->status = $request->post('status');
        $appointment->save();
        if($appointment->save()) {
            $message = 'success';
        } else {
            $message = 'failed';
        }
        return json_encode($message);
    }

    


}
