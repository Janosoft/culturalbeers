<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Models\Cerveza;
use App\Models\CervezasEstilo;
use App\Models\CervezasFamilia;
use App\Models\CervezasFermento;
use App\Models\Localidad;
use App\Models\Lugar;
use App\Models\Pais;
use App\Models\Persona;
use App\Models\Productor;

use App\Observers\CervezasFamiliaObserver;
use App\Observers\CervezasFermentoObserver;
use App\Observers\CervezasEstiloObserver;
use App\Observers\CervezaObserver;
use App\Observers\LocalidadObserver;
use App\Observers\LugarObserver;
use App\Observers\PersonaObserver;
use App\Observers\PaisObserver;
use App\Observers\ProductorObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        CervezasEstilo::observe(CervezasFamiliaObserver::class);
        CervezasFamilia::observe(CervezasEstiloObserver::class);
        CervezasFermento::observe(CervezasFermentoObserver::class);
        Cerveza::observe(CervezaObserver::class);
        Localidad::observe(LocalidadObserver::class);
        Lugar::observe(LugarObserver::class);
        Pais::observe(PaisObserver::class);
        Persona::observe(PersonaObserver::class);
        Productor::observe(ProductorObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
