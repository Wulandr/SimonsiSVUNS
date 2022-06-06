<div class="modal fade" id="template_lpj" tabindex="-1" role="dialog" aria-labelledby="Input LPJ" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="template_lpj">Panduan Penyusunan Laporan
                    Pertanggungjawaban
                    (LPJ)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php 
                foreach ($pedoman as $data){
                    if ($data->jenis == "LPJ") { 
                ?>
                <embed src="{{ asset('/pedoman/' . $data->file) }}" type="application/pdf" width="100%"
                    height="500px">
                </embed>
                <?php }} ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>