<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{

	public function index(Request $request) {
        $request->session()->forget('order');
        $order = Order::orderBy('created_at', 'ASC')->get();
        return view('menu.list-pesanan', ['order' => $order]);
    }

    public function ajukanPesanan(Request $request) {
    	$order = $request->session()->get('order');
    	return view('menu.ajukan-pesanan', compact('order', $order));
    }

    public function postAjukanPesanan(Request $request) {

    	$validatedData = $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'catatan_barang' => 'required',
        ]);

    	if (empty($request->session()->get('order'))) {
    		$order = new Order();
    		$order->fill($validatedData);
    		$request->session()->put('order', $order);
    	} else {
    		$order = $request->session()->get('order');
            $order->fill($validatedData);
            $request->session()->put('order', $order);
    	}

    	return redirect('/profile-pemesan');
    }

    public function profilePemesan(Request $request) {
        $order = $request->session()->get('order');
        return view('menu.profile-pemesan',compact('order', $order));
    }

    public function postProfilePemesan(Request $request) {
        $order = $request->session()->get('order');

        $validatedData = $request->validate([
    		'nama_pemesan' 		=> 'required',
            'nomor_pemesan' 	=> 'required|numeric',
            'email_pemesan' 	=> 'required',
            'alamat_pemesan' 	=> 'required'
    	]);

        $order->fill($validatedData);
        $request->session()->put('order', $order);

    	if ($order->jumlah_barang > 1) {
    		$jumlah = $order->jumlah_barang;
    		$total = 0;
    		$mengukur = 25;
    		$membuat_pola = 8;
    		$memotong_bahan = 12;
    		$menjahit_pakaian = 2;
    		$penyelesain = 15;

    		if ($jumlah > $mengukur) {
    			$hitung = $jumlah / $mengukur;
    			$total += ceil($hitung);
    		} else {
    			$total += 1;
    		}

    		if ($jumlah > $membuat_pola) {
    			$hitung = $jumlah / $membuat_pola;
    			$total += ceil($hitung);
    		} else {
    			$total += 1;
    		}

    		if ($jumlah > $memotong_bahan) {
    			$hitung = $jumlah / $memotong_bahan;
    			$total += ceil($hitung);
    		} else {
    			$total += 1;
    		}

    		if ($jumlah > $menjahit_pakaian) {
    			$hitung = $jumlah /  $menjahit_pakaian;
    			$total += ceil($hitung);
    		} else {
    			$total += 1;
    		}

    		if ($jumlah > $penyelesain) {
    			$hitung = $jumlah / $penyelesain;
    			$total += ceil($hitung);
    		} else {
    			$total += 1;
    		}
    		
    	} else {
    		$total = 1;
    	}

    	$order->proses_pengerjaan = $total;
    	$request->session()->put('order', $order);
    	$order = $request->session()->get('order');
    	$order->save();
    	return redirect('/list-pesanan');
    }
}
