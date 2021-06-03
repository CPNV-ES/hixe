<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attribute admin role to a specific user';

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
        $name = $this->argument('name');

        if(!empty($name)){
            $user = User::firstWhere('firstname','like',$name.'%');
            if($user) $result = $user->setRole('admin');
            else {
                print("L'utilisateur n'a pas été trouvé" . PHP_EOL);
            }
        }
    }
}
