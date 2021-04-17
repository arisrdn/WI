<?php
/**
 * Created by PhpStorm.
 * User: Aris Ramadhan
 * Date: 18-Jul-18
 * Time: 7:01 AM
 */

namespace App\Repositories\Harga;


interface InvoiceInterface
{
    public function getAll();
    public function getDetail($id);
    public function store(array $data);
    public function update($id, $data);
    public function destroy($id);
    public function konfirmasi($id);
    public function getNoInvoice();
    public function getNominal($id);
}