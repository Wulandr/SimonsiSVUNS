@include('dashboards/users/layouts/script')

<body>
    <div id="loading">
        <div id="loading-center">
        </div>
    </div>

    @include('dashboards/users/layouts/navbar')
    @include('dashboards/users/layouts/sidebar')
    <!-- Page Content  -->
    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-center table-primary">
                            <div class="iq-header-title">
                                <h4 class="card-title">Unggah Dokumen Pendukung Surat Pertanggungjawaban (SPJ)</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <p></p>
                            <div class="row">
                                <div class="col-sm-3">
                                    <?php 
                                    for ($a = 0; $a < count($spj_kategori); $a++) {
                                    ?>
                                    <div class="nav flex-column nav-pills text-left" id="v-pills-tab" role="tablist"
                                        aria-orientation="vertical">
                                        <a class="nav-link active" id="spj" data-toggle="pill" href="#list" role="tab"
                                            aria-controls="v-pills-home"
                                            aria-selected="true">{{ $spj_kategori[$a]->nama_kategori }}</a>
                                    </div>
                                    <?php } ?>
                                </div>

                                <div class="col-sm-9">
                                    <div class="tab-content mt-0" id="v-pills-tabContent">
                                        <?php 
                                        for ($a = 0; $a < count($spj_kategori); $a++) {
                                            for ($b = 0; $b < count($spj_subkategori); $b++) {
                                                if($spj_subkategori[$b]->id_kategori == $spj_kategori[$a]->id){
                                        ?>
                                        <div class="tab-pane fade show" id="list" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">

                                            <form class="needs-validation" enctype="multipart/form-data" method="post"
                                                action="">
                                                <div class="col-12">
                                                    <h5 class="mb-2" style="color: #1E3D73">
                                                        <b>{{ $spj_kategori[$a]->nama_kategori }}</b>
                                                        <b>{{ $spj_subkategori[$b]->nama_subkategori }}</b>
                                                    </h5>
                                                    <table class="table">
                                                        <tr class="form-group">
                                                            <td>1.</td>
                                                            <td style="width: 65%" style="width: 65%">
                                                                <label for="exampleFormControlFile1">
                                                                    {{ $spj_subkategori[$b]->nama_subkategori }}
                                                                </label>
                                                            </td>
                                                            <td>
                                                                <input type="file" class="form-control-file"
                                                                    id="exampleFormControlFile1" required>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="float-right mb-3 mr-2">
                                                    <button type="submit" class="btn btn-primary">Upload</button>
                                                </div>
                                            </form>
                                        </div>
                                        <?php }}} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Dropdown on Click Radio Button --}}
    <script>
        const spj = document.getElementById("spj");
        const list = document.getElementById("list");
        list.style.display = "block";
        spj.addEventListener("click", (event) => {
            if (list.style.display = "block") {
                list.style.display = "none";
            } else {
                list.style.display = "block";
            }
        })
    </script>
    <!-- Footer -->
    @include('dashboards/users/layouts/footer')

</body>

</html>
