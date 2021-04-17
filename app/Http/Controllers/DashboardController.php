<?php

namespace App\Http\Controllers;

use App\Repositories\Toko\TokoServiceInterface;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * @var TokoServiceInterface
     */
    private $service;

    public function __construct(TokoServiceInterface $service)
    {
        $this->service = $service;
    }

    public function index()
    {
//        dd('as');
        $branch=$this->service->getTokoBranch();
        $toko=$this->service->getTokoAll();
        $data=compact('branch','toko');
        return view('home.index',$data);
    }
}
