<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CheckUserPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:check-user-permissions {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user roles and permissions';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $user = User::where('email', $email)->first();
        
        if (!$user) {
            $this->error("User with email {$email} not found.");
            return 1;
        }

        $this->info("User: {$user->name} ({$user->email})");
        $this->info("ID: {$user->id}");
        
        $roles = $user->roles->pluck('name')->toArray();
        $this->info("Roles: " . (empty($roles) ? 'None' : implode(', ', $roles)));
        
        $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        $this->info("Permissions: " . (empty($permissions) ? 'None' : implode(', ', $permissions)));
        
        // Check specific permissions
        $this->info("\nPermission Checks:");
        $this->info("Can edit users: " . ($user->hasPermissionTo('edit-users') ? 'YES' : 'NO'));
        $this->info("Can delete users: " . ($user->hasPermissionTo('delete-users') ? 'YES' : 'NO'));
        $this->info("Can update users: " . ($user->hasPermissionTo('update-users') ? 'YES' : 'NO'));
        
        return 0;
    }
}
