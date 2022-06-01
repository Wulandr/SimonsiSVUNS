<div class="modal fade" id="add_kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Sub-Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" action="{{ url('/spj_subkategori/add') }}">
                    @csrf
                    <label>Kategori</label>
                    <select name="nama_kategori" id="nama_kategori" class="form-control">
                        @foreach ($spj_kategori as $a)
                            <option value="{{ $a->id }}">{{ $a->nama_kategori }}</option>
                        @endforeach
                    </select>
                    <div class="form-group">
                        <label>Nama Sub-Kategori</label>
                        <input name="nama_subkategori" id="nama_subkategori" type="text" class="form-control">
                    </div>
                    <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                    <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
