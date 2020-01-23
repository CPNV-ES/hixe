<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\support\Facades\Hash;

class MakeUser extends Command
{
    /**
     * The firstname and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {firstname} {lastname} {email_address} {member_number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $firstname = $this->argument('firstname');
        $lastname = $this->argument('lastname');
        //$password = Hash::make($this->argument('password'));
        $email_address = $this->argument('email_address');
        $member_number = $this->argument('member_number');
        //$birthdate = $this->argument('birthdate');

        if(User::where('firstname', '=', $firstname)->exists()){
            $this->line("Erreur: l'utilisateur $firstname existe déjà");
        }else{
            $user = new User;
            $user->firstname = $firstname;
            $user->lastname = $lastname;
            //$user->password = $password;
            $user->email_address = $email_address;
            $user->member_number = $member_number;
            //$user->birthdate = $birthdate;
            $user->save();
            $this->line("L'utilisateur $firstname à été créé.");
        }
    }
}
