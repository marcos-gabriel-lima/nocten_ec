<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\PermissionRegistrar;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra quaisquer serviços de aplicação.
     *
     * @return void
     */
    public function register(): void
    {
        // Você pode registrar serviços aqui se precisar
    }

    /**
     * Executa as ações necessárias no bootstrap da aplicação.
     *
     * @param  \Spatie\Permission\PermissionRegistrar  $permissionRegistrar
     * @return void
     */
    public function boot(PermissionRegistrar $permissionRegistrar): void
    {
        // Registrando as permissões com o Gate
        $permissionRegistrar->registerPermissions(Gate::getFacadeRoot());
    }
}
