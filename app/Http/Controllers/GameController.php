<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class GameController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('users', compact('users'));
    }

    public function store()
    {
    
    }

    public function result($machine_choice, $user_choice, $id_user) {
        $answer = '';
    // Gracias al campo id obtengo todos los datos del usuario
        $user = User::findOrFail($id_user);
            
    // Aqui decimos que si el usuario es rock los diferentes escenarios:
        if($user_choice == 'rock') {
             switch ($machine_choice) {
                case 'rock':
                $answer = 'Its a tie';
                  break;

                 case 'paper':
                $answer = 'You lose';
                $user->losser += 1;
                
                  break;

                 case 'scissors':
                 $answer = 'You win';
                 $user->winner += 1;
                 
                  break;                  
        }
        // Guardamos los datos del usuario en la base del datos
         $user->save();

        

        } elseif($user_choice == 'paper') {
            switch ($machine_choice) {
               case 'paper':
               $answer = 'Its a tie';
                 break;

                case 'scissors':
               $answer = 'You lose';
               $user->losser += 1;
               
                 break;

                case 'rock':
                $answer = 'You win';
                $user->winner += 1;
                
                 break;                  
       }
       
        $user->save();

       } else {
        switch ($machine_choice) {
           case 'scissors':
           $answer = 'Its a tie';
             break;

            case 'rock':
           $answer = 'You lose';
           $user->losser += 1;
           
             break;

            case 'paper':
            $answer = 'You win';
            $user->winner += 1;
            
             break;                  
        }
   
        $user->save();

       }
    return view('result');
    }

    public function game(Request $request) {
        $options = ['rock', 'paper', 'scissors'];
        $machine_choice = array_rand($options);
        // Por la URL
        $user_choice = $request->choice;
        $id_user = $request->id;
        // $this es para llamar a funciones 
        $this->result($machine_choice, $user_choice, $id_user);

    }

  

}

