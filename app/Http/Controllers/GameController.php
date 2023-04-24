<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class GameController extends Controller
{
    public function index()
    {
    // Llamamos a todos los usuarios
        $users = User::all();
    // Retornamos vista de usuarios
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
        if($user_choice == 'Rock') {
             switch ($machine_choice) {
                case 'Rock':
                $answer = 'Its a tie';
                  break;

                 case 'Paper':
                $answer = 'You lose';
                $user->losser += 1;
                
                  break;

                 case 'Scissors':
                 $answer = 'You win';
                 $user->winner += 1;
                 
                  break;                  
        }
        // Guardamos los datos del usuario en la base del datos
         $user->save();

        

        } elseif($user_choice == 'Paper') {
            switch ($machine_choice) {
               case 'Paper':
               $answer = 'Its a tie';
                 break;

                case 'Scissors':
               $answer = 'You lose';
               $user->losser += 1;
               
                 break;

                case 'Rock':
                $answer = 'You win';
                $user->winner += 1;
                
                 break;                  
       }
       
        $user->save();

       } else {
        switch ($machine_choice) {
           case 'Scissors':
           $answer = 'Its a tie';
             break;

            case 'Rock':
           $answer = 'You lose';
           $user->losser += 1;
           
             break;

            case 'Paper':
            $answer = 'You win';
            $user->winner += 1;
            
             break;                  
        }
   
        $user->save();
       
        
       }
    // El compact al retornar una vista, devuelve una variable a la vista que hayas seleccionado
    // se utilizando cuando en la vista tienes que jugar con la variable, sino no
    return view('results', compact('answers', 'machine_choice'));
    }


    public function game(Request $request) {
        $options = ['Rock', 'Paper', 'Scissors'];
        $machine_choice = array_rand($options);
        // Por la URL
        $user_choice = $request->choice;
        $id_user = $request->id;
        // $this es para llamar a funciones 
        $this->result($machine_choice, $user_choice, $id_user);

    
    }
    public function choice() {
        return view('game');
    }

  

}

