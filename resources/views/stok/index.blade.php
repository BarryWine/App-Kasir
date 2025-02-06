@auth
@extends('app')
@section('content')
<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Produk</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php $n=1; @endphp
            @forelse ($posts as $post)
                <tr>
                    <td>{{ $n++ }}</td>
                    <td>{{ $post->NamaProduk }}</td>
                    <td>{{ $post->Stok }}</td>
                    <td>
                        <button data-id="{{ $post->id }}" onclick="ambilattr(this);" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahstok"><i class="fa fa-plus"></i></button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Data Kosong</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="modal fade bd-example-modal-md" id="tambahstok" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form action="{{ route('stok.store') }}" method="post">
                @csrf
                <input type="hidden" name="idproduk" id="idproduk">
                <h5 class="modal-title">&nbsp; Stok</h5>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" name="tmbstok" placeholder="Tambah Stok">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-plus"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@endauth

<script>
    function ambilattr(obj) {
        var id = $(obj).attr('data-id');
        $("#idproduk").val(id);
    }
</script>
