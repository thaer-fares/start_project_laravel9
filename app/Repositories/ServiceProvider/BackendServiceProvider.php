<?php
namespace App\Repositories\ServiceProvider;

use App\Repositories\Interfaces\GradeRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Interfaces\UserRepositoryInterface',
            'App\Repositories\UserRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RoleRepositoryInterface',
            'App\Repositories\RoleRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\CertificationRepositoryInterface',
            'App\Repositories\CertificationRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\RegistrationApplicationRepositoryInterface',
            'App\Repositories\RegistrationApplicationRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\SchoolRepositoryInterface',
            'App\Repositories\SchoolRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\GradeRepositoryInterface',
            'App\Repositories\GradeRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\SubjectRepositoryInterface',
            'App\Repositories\SubjectRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\AcademicYearRepositoryInterface',
            'App\Repositories\AcademicYearRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\AcceptanceRateRepositoryInterface',
            'App\Repositories\AcceptanceRateRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\StudentApplicationRepositoryInterface',
            'App\Repositories\StudentApplicationRepository'
        );
        $this->app->bind(
            'App\Repositories\Interfaces\StudentRepositoryInterface',
            'App\Repositories\StudentRepository'
        );
    }
}
