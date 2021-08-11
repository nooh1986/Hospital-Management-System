<?php

namespace App\Providers;

use App\Repository\DoctorRepository;
use App\Repository\PatientRepository;
use App\Repository\PaymentRepository;
use App\Repository\ReceiptRepository;
use App\Repository\SectionRepository;
use App\Repository\AmbulanceRepository;
use App\Repository\InsuranceRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\SingleServiceRepository;
use App\Interfaces\DoctorRepositoryInterface;
use App\Interfaces\PatientRepositoryInterface;
use App\Interfaces\PaymentRepositoryInterface;
use App\Interfaces\ReceiptRepositoryInterface;
use App\Interfaces\SectionRepositoryInterface;
use App\Interfaces\AmbulanceRepositoryInterface;
use App\Interfaces\InsuranceRepositoryInterface;
use App\Interfaces\SingleServiceRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class, DoctorRepository::class);
        $this->app->bind(SingleServiceRepositoryInterface::class, SingleServiceRepository::class);
        $this->app->bind(InsuranceRepositoryInterface::class, InsuranceRepository::class);
        $this->app->bind(AmbulanceRepositoryInterface::class, AmbulanceRepository::class);
        $this->app->bind(PatientRepositoryInterface::class, PatientRepository::class);
        $this->app->bind(ReceiptRepositoryInterface::class, ReceiptRepository::class);
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
