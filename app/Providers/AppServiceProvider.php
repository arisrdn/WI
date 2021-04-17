<?php

namespace App\Providers;

use App\Models\Module;
use App\Repositories\Harga\DetailHargaInterface;
use App\Repositories\Harga\DetailHargaRepository;
use App\Repositories\Harga\InvoiceInterface;
//use App\Repositories\Harga\InvoiceRepository;
use App\Repositories\Harga\InvoiceRepository;
use App\Repositories\Jabatan\JabatanInterface;
use App\Repositories\Jabatan\JabatanRepository;
use App\Repositories\Konfig\ModuleAksesInterface;
use App\Repositories\Konfig\ModuleAksesRepository;
use App\Repositories\Konfig\ModuleInterface;
use App\Repositories\Konfig\ModuleRepository;
use App\Repositories\Konfig\ModuleServiceInterface;
use App\Repositories\Konfig\ModulService;
use App\Repositories\Laporan\Mtc\LaporanMtcInterface;
use App\Repositories\Laporan\Mtc\laporanMtcRepository;
use App\Repositories\Laporan\Mtc\LaporanMtcService;
use App\Repositories\Laporan\Mtc\LaporanMtcServiceIntervace;
use App\Repositories\Laporan\Mtc\MtcItemInterface;
use App\Repositories\Laporan\Mtc\MtcItemRepository;
use App\Repositories\Pegawai\PegawaiInterface;
use App\Repositories\Pegawai\PegawaiRepository;
use App\Repositories\Pegawai\PegawaiService;
use App\Repositories\Pegawai\PegawaiServiceInterface;
use App\Repositories\SuratTugas\SuratTugasInterface;
use App\Repositories\SuratTugas\SuratTugasRepository;
use App\Repositories\Toko\Detail\JenisTokoInterface;
use App\Repositories\Toko\Detail\JenisTokoRepository;
use App\Repositories\Toko\Detail\TokoInterface;
use App\Repositories\Toko\Detail\TokoRepository;
use App\Repositories\Toko\Spk\SpkInterface;
use App\Repositories\Toko\Spk\SpkItemInterface;
use App\Repositories\Toko\Spk\SpkItemRepository;
use App\Repositories\Toko\Spk\SpkJenisInterface;
use App\Repositories\Toko\Spk\SpkJenisRepository;
use App\Repositories\Toko\Spk\SpkRepository;
use App\Repositories\Toko\TokoService;
use App\Repositories\Toko\TokoServiceInterface;
use App\Repositories\Toko\Topologi\JenisTopologiInterface;
use App\Repositories\Toko\Topologi\JenisTopologiRepository;
use App\Repositories\Toko\Topologi\TopologiInterface;
use App\Repositories\Toko\Topologi\TopologiRepository;
use App\Repositories\Upload\UploadGambarService;
use App\Repositories\Upload\UploadGambarServiceInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
            */

    public function boot()
    {
        //
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        require_once app_path('Helpers/terbilang.php');
        require_once app_path('Helpers/rupiah.php');
        $this->bindToko();
        $this->bindStatus();
        $this->bindUser();
        $this->bindLaporan();
        $this->bindHarga();
    }
    private function bindToko()
    {
        $this->app->bind(JenisTopologiInterface::class, JenisTopologiRepository::class);
        $this->app->bind(TopologiInterface::class, TopologiRepository::class);
        $this->app->bind(JenisTokoInterface::class,JenisTokoRepository::class);
        $this->app->bind(TokoInterface::class,TokoRepository::class);
        $this->app->bind(SpkJenisInterface::class,SpkJenisRepository::class);
        $this->app->bind(SpkInterface::class,SpkRepository::class);
        $this->app->bind(SpkItemInterface::class,SpkItemRepository::class);
        $this->app->bind(TokoServiceInterface::class, TokoService::class);
    }
    private function bindStatus()
    {
        $this->app->bind(JabatanInterface::class, JabatanRepository::class);
        $this->app->bind(ModuleAksesInterface::class, ModuleAksesRepository::class);
        $this->app->bind(ModuleInterface::class,ModuleRepository::class);
        $this->app->bind(ModuleServiceInterface::class,ModulService::class);
        $this->app->bind(UploadGambarServiceInterface::class,UploadGambarService::class);
    }
    private function bindUser()
    {
        $this->app->bind(PegawaiInterface::class, PegawaiRepository::class);
        $this->app->bind(PegawaiServiceInterface::class, PegawaiService::class);
    }
    private function bindLaporan()
    {
        $this->app->bind(LaporanMtcInterface::class, laporanMtcRepository::class);
        $this->app->bind(MtcItemInterface::class, MtcItemRepository::class);
        $this->app->bind(LaporanMtcServiceIntervace::class, LaporanMtcService::class);
        $this->app->bind(SuratTugasInterface::class, SuratTugasRepository::class);

    }
    private function bindHarga()
    {
        $this->app->bind(DetailHargaInterface::class, DetailHargaRepository::class);
        $this->app->bind(InvoiceInterface::class, InvoiceRepository ::class);
    }


}
