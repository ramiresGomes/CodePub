<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);

        $user = factory(\CodePub\Models\User::class)->create([
            'name' => 'Admin da Silva',
            'email' => 'admin@admin.com',
            'password' => bcrypt(123456)
        ]);

        $roleAdmin = factory(\CodePub\Models\Role::class)->create([
            'name' => 'Admin',
            'description' => 'Administrador do Sistema'
        ]);

        $user->addRole($roleAdmin);

        $userManager = factory(\CodePub\Models\User::class)->create([
            'name' => 'Gerente da Silva',
            'email' => 'gerente@admin.com',
            'password' => bcrypt(123456)
        ]);

        $roleManager = factory(\CodePub\Models\Role::class)->create([
            'name' => 'Gerente',
            'description' => 'Gerente do Sistema'
        ]);

        $userManager->addRole($roleManager);

        $userSupervisor = factory(\CodePub\Models\User::class)->create([
            'name' => 'Supervisor da Silva',
            'email' => 'supervisor@admin.com',
            'password' => bcrypt(123456)
        ]);

        $roleSupervisor = factory(\CodePub\Models\Role::class)->create([
            'name' => 'Supervisor',
            'description' => 'Supervisor do Sistema'
        ]);

        $userSupervisor->addRole($roleSupervisor);


        $userList = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'user_list',
            'description' => 'Pode listar os usuários'
        ]);

        $userAdd = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'user_add',
            'description' => 'Pode cadastrar usuários'
        ]);

        $userEdit = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'user_edit',
            'description' => 'Pode editar usuários'
        ]);

        $userDestroy = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'user_destroy',
            'description' => 'Pode apagar usuários'
        ]);

        $userViewRoles = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'user_view_roles',
            'description' => 'Pode visualizar as roles dos usuários'
        ]);

        $userAddRole = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'user_add_role',
            'description' => 'Pode cadastrar uma nova role para um usuário'
        ]);

        $userRevokeRole = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'user_revoke_role',
            'description' => 'Pode revogar roles dos usuários'
        ]);

        $managePermissions = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'permission_admin',
            'description' => 'Pode administrar permissões'
        ]);

        $manageRoles = factory(\CodePub\Models\Permission::class)->create([
            'name' => 'role_admin',
            'description' => 'Pode administrar as roles'
        ]);


        $roleManager->addPermission($userList);
        $roleManager->addPermission($userEdit);
        $roleManager->addPermission($userAdd);
        $roleManager->addPermission($userViewRoles);

        $roleSupervisor->addPermission($userList);
        $roleSupervisor->addPermission($userViewRoles);

    }
}
