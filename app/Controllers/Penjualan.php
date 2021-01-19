<?php
namespace App\Controllers;

use App\Models\m_barang;
use App\Models\m_jual;
use App\Models\m_ongkir;
use App\Models\m_penjualan;


class Penjualan extends BaseController{
	 

      public function keranjang()
      {
         $data = [
         'title' => 'Tugas Nomor 3',
         'cart' => \Config\Services::cart(),
         ];
         return view('v_keranjang',$data);
      }

      public function proses_order()
      {
            $model = new m_penjualan();
            $model2 = new m_jual();
            $model3 = new m_barang();
            $cart = \Config\Services::cart();
  
            //-------------------------Input data order------------------------------
            $data_pelanggan = array('nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'tanggal' => date('Y-m-d H:i:s'),
            'telp' => $this->request->getVar('telp'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kota_tujuan' => $this->request->getVar('kota_tujuan'));
            $model->saveOrder($data_pelanggan);
            $order_id = $model->insertID();
            //-------------------------Input data detail order-----------------------
            if ($keranjang = $cart->contents())
            {
            foreach ($keranjang as $item)
            {
            $productId = $item['id'];
            $data_detail = array(
            'id_penjualan' =>$order_id,
            'id_brg' => $item['id'],
            'nama_brg' => $item['name'],
            'jml_jual' => $item['qty'],
            'total' => $item['price'] * $item['qty'] );
            $model2->saveInvoice($data_detail); 
            //-------------------------Update Stok Barang-----------------------
            $productStock = $this->db->table('products')->where('id', $productId)->get()->getRowArray();
            }
            }
            //-------------------------Hapus shopping cart--------------------------
            $cart->destroy();
            return redirect()->to(base_url('cart/invoice'));
      }

      public function checkout()
       {
         $data = [
         'title' => 'Tugas Nomor 3',
         'cart' => \Config\Services::cart(),
         ];
         return view('v_checkout', $data);

       }
      
       public function invoice()
       {
        $ModelBarang= new m_penjualan();
         $data = [
            'title' => 'Invoice',
            'order' => $ModelBarang->getOrder(),
         ];
         return view('v_allinvoice.php', $data);

       }

      public function detail($id_order)
       {
         $model = new m_penjualan();
         $model2 = new m_jual();
         $model3 = new m_ongkir();
         $order = $model->getOrder($id_order)->getRow();
         $invoice = $model2->getInvoice($id_order)->getRow();
         $ongkir = $model3->getOneOngkir($id_order);
         $transaksi = $model2->select('*, tbl_jual.id AS id_jual')->join('barang',
         	'barang.id_barang=tbl_jual.id_brg')
         	->join('tbl_penjualan', 'tbl_penjualan.id_penjualan=tbl_jual.id_penjualan')
         	->where('tbl_jual.id_penjualan', $id_order)
           ->first();
        
         $data = [
         'order' => $order,
         'invoice' => $invoice,
         'transaksi' => $transaksi,
         'ongkir' => $ongkir
         ];

         return view('v_invoice.php', $data);

       }

           public function exportPDF()
           {
           $ModelBarang= new m_penjualan();
           $data = [
           'title' => 'Invoice',
           'order' => $ModelBarang->getOrder(),
           ];
           return view('v_laporan_pdf.php', $data);

           }

           public function export()
           {
           $ModelBarang= new m_penjualan();
           $data = [
           'title' => 'Invoice',
           'order' => $ModelBarang->getOrder(),
           ];
           return view('v_penjualan_excel.php', $data);

           }

           public function export_excel()
           {
           $ModelBarang= new m_penjualan();
           $data = [
           'title' => 'Invoice',
           'order' => $ModelBarang->getOrder(),
           ];
           return view('v_export_excel.php', $data);

           }
      
      

	
	
}