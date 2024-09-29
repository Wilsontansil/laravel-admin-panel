<?php

namespace App\Livewire\Pages\Users;

use Livewire\Component;
use App\Models\User;

class UserTable extends Component
{
    public $selectedRole = '';
    public $users;
    public $headers = [
        ['key' => 'id', 'label' => 'ID'],
        ['key' => 'name', 'label' => 'Name'],
        ['key' => 'email', 'label' => 'Email'],
        ['key' => 'roles.name', 'label' => 'Role'],
        ['key' => 'created_at', 'label' => 'Created At'],
        ['key' => 'updated_at', 'label' => 'Updated At'],
    ];

    public function render()
    {
        $selectedRole = $this->selectedRole;
        $this->users = User::when($selectedRole != 'all' && $selectedRole != '', function ($query) use ($selectedRole) {
            return $query->whereHas('roles', function ($query) use ($selectedRole) {
                $query->where('name', $selectedRole);
            });
        })->get();

        return view('livewire.pages.users.user-table', [
            'users' => $this->users,
            'headers' => $this->headers,
        ]);
    }
}
