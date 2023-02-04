<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Enums\UserRoleEnum;
use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class AddUserCommand extends Command
{
    protected $signature = 'karibu:add-user';

    protected $description = 'Creation of a user with higher priorities';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->comment('Add User Command Interactive Wizard');

        process :
            $name = ucwords($this->anticipate('name', ['admin', 'Place manager']));
        $email = strtolower($this->ask('email'));
        $password = $this->secret('password');

        $validator = validator(
            compact('name', 'email', 'password'),
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        if (! $validator->fails()) {
            try {
                $password = Hash::make($password);
                $role = Role::query()
                    ->where('id', '=', UserRoleEnum::ADMINS_ROLE)
                    ->first();
                $role_id = $role->id;
                $status = 1;
                $user = User::query()
                    ->create(compact('name', 'email', 'password', 'role_id', 'status'));

                $user->save();
                $this->info(sprintf('User %s <%s> created', $name, $email));
                exit();
            } catch (\Exception $exception) {
                $this->error('Something went wrong run the command with -v for more details');
                dd($exception);
            }
        } else {
            $this->error('some values are wrong !');
            $this->table(['Errors'], $validator->errors()->messages());
            goto process;
        }
    }
}
