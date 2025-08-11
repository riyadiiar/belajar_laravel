<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Transaksi</h1>
        <form action="{{ route('UpdateTransaksi', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $transaction->name }}" required>
            </div>
            <div class="mb-3">
                <label for="transaction_id" class="form-label">Transaction Number</label>
                <input type="text" class="form-control" id="transaction_id" name="transaction_id" value="{{ $transaction->transaction_id }}" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah</label>
                <input type="number" step="0.01" class="form-control" id="amount" name="amount" value="{{ $transaction->amount }}" required>
            </div>
            <div class="mb-3">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $transaction->tempat }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-select" id="status" name="status" required>
                    <option value="pending" {{ $transaction->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="completed" {{ $transaction->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    <option value="canceled" {{ $transaction->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('DaftarTransaksi') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
