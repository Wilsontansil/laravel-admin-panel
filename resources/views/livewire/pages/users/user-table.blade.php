<div>
    <x-mary-card title="Users" shadow separator>
        <div class="flex space-x-4">
        <x-mary-select label="Roles" :options="[
            [
                'id' => 'all',
                'name' => 'All'
            ],
            [
                'id' => 'master',
                'name' => 'Master'
            ],
            [
                'id' => 'admin',
                'name' => 'Admin'
            ],
            [
                'id' => 'user',
                'name' => 'User'
            ],
        ]" wire:model.live="selectedRole" no-x-anchor  class="w-20" />
        </div>
    </x-mary-card>
    <x-mary-table :headers="$headers" :rows="$users" striped @row-click="alert($event.detail.name)">
        @scope('cell_roles.name',$user)
            {{ $user->roles->first()->name }}
        @endscope
    
        @hasrole('master')

            @scope('actions', $user)
                <x-mary-button icon="o-trash" wire:click="delete({{ $user->id }})" spinner class="btn-sm" />
            @endscope
        @endhasrole
    </x-mary-table>
</div>
