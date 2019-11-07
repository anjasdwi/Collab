@extends('master')

@section('title', 'List Pesanan')

@section('content')
	<div align="center">
		<div
			style="
				width: 80%;
				background: white;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			"
		>
			<div align="left" style="padding: 6% 10%">
				<div align="center" style="margin-bottom: 4%">
					<hr />
					<h5>List atau Antrian Pesanan</h5>
					<hr />
				</div>

				@if(!$order->isEmpty())
					<div align="center" class="row">
						<div class="col border">
							Urutan
						</div>
						<div class="col border">
							Jenis
						</div>
						<div class="col border">
							Jumlah
						</div>
						<div class="col border">
							Pemesan
						</div>
						<div class="col border">
							Pengerjaan
						</div>
						<div class="col border">
							Tanggal Pengerjaan Pesanan
						</div>
						<div class="col border">
							Tanggal Selesai Pesanan
						</div>
						<div class="col border">
							View
						</div>
					</div>
					@foreach($order as $index => $pesanan)
					<div align="center" class="row">
						<div class="col border">
							{{ $index + 1 }}
						</div>
						<div class="col border">
							{{ $pesanan->nama_barang }}
						</div>
						<div class="col border">
							{{ $pesanan->jumlah_barang }}
						</div>
						<div class="col border">
							{{ $pesanan->nama_pemesan }}
						</div>
						<div class="col border">
							{{ $pesanan->proses_pengerjaan . " Hari" }}
						</div>
						<div class="col border">
							{{ $pesanan->tgl_ajukan_pesanan }}
						</div>
						<div class="col border">
							{{ $pesanan->tgl_selesai_pesanan }}
						</div>
						<div class="col border">
							<a href="#">Detail</a>
						</div>
					</div>
					@endforeach
				@else
					<p>Belum ada pesanan</p>
				@endif

			</div>
		</div>
	</div>
@endsection
