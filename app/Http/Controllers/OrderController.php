<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller {

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

  	// if ($order->jumlah_barang > 1) {
  	// 	$jumlah = $order->jumlah_barang;
  	// 	$total = 0;
  	// 	$mengukur = 25;
  	// 	$membuat_pola = 8;
  	// 	$memotong_bahan = 12;
  	// 	$menjahit_pakaian = 2;
  	// 	$penyelesain = 15;
		//
  	// 	if ($jumlah > $mengukur) {
  	// 		$hitung = $jumlah / $mengukur;
  	// 		$total += ceil($hitung);
  	// 	} else {
  	// 		$total += 1;
  	// 	}
		//
  	// 	if ($jumlah > $membuat_pola) {
  	// 		$hitung = $jumlah / $membuat_pola;
  	// 		$total += ceil($hitung);
  	// 	} else {
  	// 		$total += 1;
  	// 	}
		//
  	// 	if ($jumlah > $memotong_bahan) {
  	// 		$hitung = $jumlah / $memotong_bahan;
  	// 		$total += ceil($hitung);
  	// 	} else {
  	// 		$total += 1;
  	// 	}
		//
  	// 	if ($jumlah > $menjahit_pakaian) {
  	// 		$hitung = $jumlah /  $menjahit_pakaian;
  	// 		$total += ceil($hitung);
  	// 	} else {
  	// 		$total += 1;
  	// 	}
		//
  	// 	if ($jumlah > $penyelesain) {
  	// 		$hitung = $jumlah / $penyelesain;
  	// 		$total += ceil($hitung);
  	// 	} else {
  	// 		$total += 1;
  	// 	}
		//
  	// } else {
  	// 	$total = 1;
  	// }

		$jumlah = $order->jumlah_barang;
		$total = 0;
		$sisa = (float) 0;

		$mengukur = 25;
		$membuat_pola = 8;
		$memotong_bahan = 12;
		$menjahit_pakaian = 2;
		$penyelesain = 15;

		// if ($order->jumlah_barang > 1) {
		//
		// 	$hitung = ($jumlah/$mengukur) + ($jumlah/$membuat_pola) + ($jumlah/$memotong_bahan)
		// 						+ ($jumlah/$menjahit_pakaian) + ($jumlah/$penyelesain);
		//
		// 	$total = ceil($hitung);
		// 	$sisaString = (string) round($hitung, 1);
		//
		// 	if(strlen($sisaString) === 5) {
		//     $sisa = floatval("0." . $sisaString[4]);
		// 	} elseif(strlen($sisaString) === 4) {
		// 		$sisa = floatval("0." . $sisaString[3]);
		// 	} else {
		// 	  $sisa = floatval("0." . $sisaString[2]);
		// 	}
		//
		// } else {
		// 	$total = 1;
		// }

		$order_list = Order::orderBy('id', 'desc')->first();

		if ($order_list !== null && $order->jumlah_barang > 1) {
			$sisaFloat = floatval($order_list->sisa);
			if ($sisaFloat !== 0.0) {

				$hitung = (($jumlah/$mengukur) + ($jumlah/$membuat_pola) + ($jumlah/$memotong_bahan)
									+ ($jumlah/$menjahit_pakaian) + ($jumlah/$penyelesain)) + $sisaFloat;
				$total = ceil($hitung);
				$sisaString = (string) round($hitung, 1);
				if(strlen($sisaString) === 5) {
					$sisa = floatval("0." . $sisaString[4]);
				} elseif(strlen($sisaString) === 4) {
					$sisa = floatval("0." . $sisaString[3]);
				} else {
					$sisa = floatval("0." . $sisaString[2]);
				}

				$date = $order_list->tgl_selesai_pesanan;
				$t_pengerjaan_pesanan = $date;
				$t_selesai_pesanan = date('Y-m-d', strtotime($date. ' + '. $total .' days'));
			} else {
				$hitung = ($jumlah/$mengukur) + ($jumlah/$membuat_pola) + ($jumlah/$memotong_bahan)
									+ ($jumlah/$menjahit_pakaian) + ($jumlah/$penyelesain);
				$total = ceil($hitung);
				$sisaString = (string) round($hitung, 1);
				if(strlen($sisaString) === 5) {
					$sisa = floatval("0." . $sisaString[4]);
				} elseif(strlen($sisaString) === 4) {
					$sisa = floatval("0." . $sisaString[3]);
				} else {
					$sisa = floatval("0." . $sisaString[2]);
				}

				$date = $order_list->tgl_selesai_pesanan;
				$t_pengerjaan_pesanan = $date;
				$t_selesai_pesanan = date('Y-m-d', strtotime($date. ' + '. $total .' days'));
			}
		} else {

			$total = 1;

			$hitung = ($jumlah/$mengukur) + ($jumlah/$membuat_pola) + ($jumlah/$memotong_bahan)
								+ ($jumlah/$menjahit_pakaian) + ($jumlah/$penyelesain);
			$total = ceil($hitung);
			$sisaString = (string) round($hitung, 1);
			if(strlen($sisaString) === 5) {
				$sisa = floatval("0." . $sisaString[4]);
			} elseif(strlen($sisaString) === 4) {
				$sisa = floatval("0." . $sisaString[3]);
			} else {
				$sisa = floatval("0." . $sisaString[2]);
			}

			$date = date("Y-m-d");
			$t_pengerjaan_pesanan = $date;
			$t_selesai_pesanan = $date;
		}

  	$order->proses_pengerjaan = $total;
		$order->sisa = $sisa;
		$order->tgl_ajukan_pesanan = $t_pengerjaan_pesanan;
		$order->tgl_selesai_pesanan = $t_selesai_pesanan;
  	$request->session()->put('order', $order);
  	$order = $request->session()->get('order');
  	$order->save();
  	return redirect('/list-pesanan');
  }

	// public function hitung()
}
