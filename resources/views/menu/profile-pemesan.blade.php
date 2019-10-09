@extends('master')

@section('title', 'Profile Pesanan Anda')

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
				<form action="/profile-pemesan" method="post">
					{{ csrf_field() }}
					<div align="center" style="margin-bottom: 4%">
						<hr />
						<h5>Profile Pemesan</h5>
						<hr />
					</div>
					<div style="margin-bottom: 4%">
						<div class="form-group">
							<label for="namaPemesan">Nama Pemesan</label>
							<input 
								type="text" 
								class="form-control" 
								id="namaPemesan" 
								placeholder="Nama Pemesan ..."
								value="{{{ $order['nama_pemesan'] or '' }}}"
								name="nama_pemesan" 
							/>
						</div>
						<div class="form-group">
							<label for="nomorPemesan">Nomor Pemesan</label>
							<input 
								type="text" 
								class="form-control" 
								id="nomorPemesan" 
								placeholder="082111426xxx"
								value="{{{ $order['nomor_pemesan'] or '' }}}"
								name="nomor_pemesan" 
							/>
						</div>
						<div class="form-group">
							<label for="emailPemesan">Email Pemesan</label>
							<input 
								type="email" 
								class="form-control" 
								id="emailPemesan" 
								placeholder="name@example.com"
								value="{{{ $order['email_pemesan'] or '' }}}"
								name="email_pemesan" 
							/>
						</div>
						<div class="form-group">
							<label for="alamatPemesan">Alamat Pemesan</label>
							<textarea 
								name="alamat_pemesan"
								class="form-control" 
								id="alamatPemesan" 
								rows="3" 
								placeholder="Alamat Pemesan ..."
							>
								{{{ $order['alamat_pemesan'] or '' }}}
							</textarea>
						</div>
					</div>
					<div style="margin-bottom: 4%">
						<input style="width: 100%; margin-bottom: 2%;" class="btn btn-success" type="submit" value="Finish">
						<a style="width: 100%" class="btn btn-secondary" href="/ajukan-pesanan" role="button">Back</a>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection