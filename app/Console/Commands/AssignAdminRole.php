<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AssignAdminRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-admin-role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign admin role to user with email dd@ssd';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user = User::where('email', 'dd@ssd')->first();
        
        if (!$user) {
            $this->error('User with email dd@ssd not found.');
            return 1;
        }

        $user->assignRole('admin');
        
        $this->info('Admin role assigned to user with email dd@ssd successfully.');
        
        return 0;
    }
}
