@extends('master')

@section('title', 'Ajukan Pesanan Anda')

@section('content')
	<div align="center">
		<div 
			style="
				width: 60%; 
				background: white;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			"
		>
			<div align="left" style="padding: 6% 10%">
				<form action="/ajukan-pesanan" method="post">
					{{ csrf_field() }}
					<div align="center" style="margin-bottom: 4%">
						<hr />
						<h4>Form Ajukan Pesanan</h4>
						<hr />
					</div>
					<div style="margin-bottom: 4%">
						<div class="form-group">
							<label for="nama_barang">Nama Barang</label>
							<input 
								name="nama_barang" 
								type="text" 
								class="form-control" 
								id="nama_barang" 
								placeholder="Blazer, Shirt, etc."
								value="{{ $order['nama_barang'] or '' }}"
							/>
						</div>
						<div class="form-group">
							<label for="jumlahBarang">Jumlah Barang</label>
							<input 
								type="number" 
								class="form-control" 
								id="jumlahBarang" placeholder="1"
								value="{{ $order['jumlah_barang'] or '' }}"
								name="jumlah_barang" 
							/>
						</div>
						<div class="form-group">
							<label for="catatanBarang">Catatan Barang</label>
							<textarea 
								class="form-control" 
								id="catatanBarang" 
								rows="3" 
								placeholder="Color, Size, etc."
								name="catatan_barang" 
							>
								{{ $order['catatan_barang'] or '' }}
							</textarea>
						</div>
					</div>
					<div style="margin-bottom: 4%">
						<input style="width: 100%" class="btn btn-success" type="submit" value="Next Profile Pemesan">
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection