<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;

class FormsController extends Controller
{
    public function login(){
        return view('login');
    }

    public function frmValidateUser(Request $request){
        try {
            $email=trim($request->input("email"));
            session()->put('email', $email);
            # FIND THE USER USUN EMAIL LIKE KEY TO FIND
            $user = DB::table('users')->where('email',DB::raw("'$email'"))->first();
            # IDENTIFY IF USER EXISTE ON TABLE USERS
            if ($user === null) {
                return '|0|Usuario sin registo en el sistema';
            }else{
                return '|1|Usuario registrado en el sistema';
            }
        } catch (\Exception $e) {
            return '|0|Problema al actualizar el Conciliador seleccionado <br>'.$e;
        }
    }

    
    public function singIn(){
        $data = array("email" => session()->get('email'));
        return((String)View::make("sing_in", array("data" => $data)));
    }

    public function singInSave(Request $request){
        try {
            # SAVE NEW RECORD ON USERS TABLE
            DB::table('users')->insert([
                'email' => trim($request->input("email")),
                'document' => $request->input("identification"),
                'name' => $request->input("first_name"),
                'last_name' => $request->input("last_name"),
                'phone' => $request->input("phone"),
                'deparment' => $request->input("departamento"),
                'city' => $request->input("municipio"),
                'birth_date' => $request->input("birth_date"),
                'have_children' => $request->input("hijos"),
                'gener' => $request->input("genero"),
            ]);
            return '|1|<b>¡ Has registrado tus datos!</b> <br> Muchas gracias por tu registro <br>u';
        } catch (\Exception $e) {
            return '|0|Problema al registrar la informacion <br>'.$e;
        }
    }

    public function editProfile(){
        # RETURN MATCH INFORMATION OF THE USER TO FIND
        $email = session()->get('email');
        $user = DB::table('users')->where('email',DB::raw("'$email'"))->first();
        $data = array("user" => $user);
        return((String)View::make("edit_profile", array("data" => $data)));
    }

    public function editProfileSave(Request $request){
        try {
            $email = trim($request->input("email"));
            $user = DB::table('users')->where('email',DB::raw("'$email'"))->first();

            if($user->is_edit != 0){
                return '|0| El usuario ya realizo la primer y unica actualizacion de datos permitida <br>';
            }
            # UPDATE HE INFROMATION AND BURN THE OPTION TO UPDATE AGAIN
            DB::table('users')
            ->where('email',DB::raw("'$email'"))
            ->update(['birth_date' =>  $request->input("birth_date"), 'is_edit' => 1]);

            return '|1|<b>¡ Has actualizado tus datos!</b> <br> Muchas gracias por tu actualización <br>';
            
        } catch (\Exception $e) {
            return '|0|Problema al actualizar el Conciliador seleccionado <br>'.$e;
        }
    }
    
}