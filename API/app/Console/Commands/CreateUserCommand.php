<?php

namespace App\Console\Commands;

use App\Models\roles;
use App\Models\User;
use App\Models\user_roles;
use GuzzleHttp\Promise\Create;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new User';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user['name'] = $this->ask('Enter the name of a user');
        $user['email'] = $this->ask('Enter the email of a user');
        $user['password'] = Hash::make($this->secret('Password of a user'));

        $roleName = $this->choice('Choose the role of a user:', ['Admin', 'Editor', 1]);

        $role = roles::where('name', $roleName)->first();
        if(!$role)
        {
            $this->error('role not found');

            return -1;
        }

        DB::transaction(function () use ($user, $role){
            $newUser = User::create($user);
            $newUser->roles()->attach($role->user_id);
        });


        $this->info('User '.$user['email'].' Created successfully!');
    }
}
