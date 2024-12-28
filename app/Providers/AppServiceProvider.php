<?php

namespace App\Providers;

use App\Core\Interfaces\IDaftarKpmQuery;
use App\Core\Interfaces\IDashboardQuery;
use App\Core\Interfaces\IHasilPrediksiQuery;
use App\Core\Interfaces\IHasilSurveyRepository;
use App\Core\Interfaces\IKpmRepository;
use App\Core\Interfaces\ISurveyRepository;
use App\Core\Interfaces\IUserRepository;
use App\Infrastructure\queries\DaftarKpmQuery;
use App\Infrastructure\queries\DashboardQuery;
use App\Infrastructure\queries\HasilPrediksiQuery;
use App\Infrastructure\repositories\HasilSurveyRepository;
use App\Infrastructure\repositories\KpmRepository;
use App\Infrastructure\repositories\SurveyRepository;
use App\Infrastructure\repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(ISurveyRepository::class, SurveyRepository::class);
        $this->app->bind(IHasilSurveyRepository::class, HasilSurveyRepository::class);
        $this->app->bind(IHasilPrediksiQuery::class, HasilPrediksiQuery::class);
        $this->app->bind(IDashboardQuery::class, DashboardQuery::class);
        $this->app->bind(IDaftarKpmQuery::class, DaftarKpmQuery::class);
        $this->app->bind(IKpmRepository::class, KpmRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
