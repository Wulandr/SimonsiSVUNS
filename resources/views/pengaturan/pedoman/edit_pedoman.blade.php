 <div class="modal fade" tabindex="-1" role="dialog" id="update_pedoman<?= $pedomansbm->id ?>">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Ubah Pedoman SBM</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form class="form-horizontal" enctype="multipart/form-data" method="post"
                     action="{{ url('/pedomans/update/' . $pedomansbm->id) }}">
                     @csrf
                     <div class="form-group">
                         <label>Jenis</label>
                         <div class="">
                             <input type="radio" name="jenis" id="jenis" value="{{ $pedomansbm->jenis }}" checked>
                             <label class="">
                                 {{ $pedomansbm->jenis }}</label>
                         </div>
                     </div>
                     <div class="form-group">
                         <label>Nama File</label>
                         <input name="nama" value="{{ old('nama', $pedomansbm->nama) }}" id="nama" type="text"
                             class="form-control">
                     </div>
                     <div class="form-group">
                         <label>Tahun File</label>
                         <input name="tahun" value="{{ old('tahun', $pedomansbm->tahun) }}" id="tahun" type="text"
                             class="form-control">
                     </div>
                     <div class="form-group">
                         <label>File</label>
                         <input type="file" class="form-control-file" name="file" id="file" value="{{ old('file') }}"
                             required>
                         <small>File yang sudah diupload:
                             <a class="text-primary" href="{{ asset('pedoman/' . $pedomansbm->file) }}"
                                 target="_blank"><?= $pedomansbm->file ?></a>
                         </small>

                     </div>
                     <input name="created_at" id="created_at" type="hidden" value="<?= date('Y-m-d') ?>">
                     <input name="updated_at" id="updated_at" type="hidden" value="<?= date('Y-m-d') ?>">
                     <button class="btn btn-primary mr-1" type="submit">Submit</button>
                 </form>
             </div>
         </div>
     </div>
 </div>
