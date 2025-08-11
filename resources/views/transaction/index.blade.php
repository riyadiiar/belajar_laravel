<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Homepage Transaksi</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container mt-5">
		<h1 class="mb-4">Daftar Transaksi</h1>
		<div class="mb-3">
			<a href="{{ route('BuatTransaksi') }}" class="btn btn-success">Tambah Transaksi</a>
		</div>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Tempat</th>
					<th>ID Transaksi</th>
					<th>Tanggal</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			 <tbody>
                @if(count($transactions) > 0)
                    @foreach($transactions as $index => $transaction)
                    <tr>
                        <td>{{ $index +1 }}</td>
                        <td>{{ $transaction->name }}</td> 
                        <td>{{ $transaction->amount }}</td>
                        <td>{{ $transaction->tempat }}</td>
                        <td>{{ $transaction->transaction_id }}</td>
                        <td>{{ $transaction->created_at }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>
                            <a href="{{ route('EditTransaksi', $transaction->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('HapusTransaksi', $transaction->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus transaksi ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada transaksi.</td>
                    </tr>
                @endif
            </tbody>
		</table>
	</div>
</body>

</html>