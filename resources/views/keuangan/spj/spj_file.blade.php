<div class="modal fade bd-example-modal-lg" id="spj_file" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="modal-title text-center">Dasar Hukum</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <style>
                    ul,
                    #myUL {
                        list-style-type: none;
                    }

                    #myUL {
                        margin: 0;
                        padding: 0;
                    }

                    .caret {
                        cursor: pointer;
                        -webkit-user-select: none;
                        /* Safari 3.1+ */
                        -moz-user-select: none;
                        /* Firefox 2+ */
                        -ms-user-select: none;
                        /* IE 10+ */
                        user-select: none;
                    }

                    .caret::before {
                        content: "\25B6";
                        color: black;
                        display: inline-block;
                        margin-right: 6px;
                    }

                    .caret-down::before {
                        -ms-transform: rotate(90deg);
                        /* IE 9 */
                        -webkit-transform: rotate(90deg);
                        /* Safari */
                        '
transform: rotate(90deg);
                    }

                    .nested {
                        display: none;
                    }

                    .active {
                        display: block;
                    }

                </style>
                </head>

                <body>
                    <p>Klik untuk melihat!</p>

                    <ul id="myUL">
                        <li><span class="caret"><b>Dasar Hukum</b></span>
                            <ol class="nested">
                                <li>
                                    <a href="{{ '/dasarhukumspj1' }}" target="_blank" rel="noopener noreferrer">
                                        Peraturan Rektor No. 38 Tahun
                                        2021 tentang Pengadaan Barang Jasa
                                        Universitas Sebelas
                                        Maret</a>
                                </li>
                                <li>
                                    <a href="{{ 'dasarhukumspj2' }}" target="_blank" rel="noopener noreferrer">
                                        Peraturan Rektor Nomor 30 Tahun 2021 dan Lampiran Standar Biaya Masukan SBM
                                        UNS TA 2022</a>
                                </li>
                            </ol>
                        </li>
                        <li><span class="caret"><b>Panduan SPJ</b></span>
                            <ol class="nested">
                                <li>
                                    <a href="{{ 'spj2022' }}" target="_blank" rel="noopener noreferrer">
                                        SPJ 2022</a>
                                </li>
                                <li>
                                    <a href="{{ 'panduankelengkapanspj2022' }}" target="_blank"
                                        rel="noopener noreferrer">
                                        Panduan Kelengkapan SPJ 2022</a>
                                </li>
                            </ol>
                        </li>
                        <li><span class="caret"><b>Template SPJ</b></span>
                            <ol class="nested">
                                <li>
                                    <a href="{{ 'template1' }}" target="_blank" rel="noopener noreferrer">
                                        Daftar Hadir dan Tanda Terima</a>
                                </li>
                                <li><span class="caret">Format Kwitansi</span>
                                    <ul class="nested">
                                        <li>
                                            <a href="{{ 'template2a' }}" target="_blank" rel="noopener noreferrer">
                                                Kwitansi Belanja Barang dan Jasa kurang 10jt (Dengan nota, struk, bukti
                                                pembelian)</a>
                                        </li>
                                        <li>
                                            <a href="{{ 'template2b' }}" target="_blank" rel="noopener noreferrer">
                                                Kwitansi Belanja Barang dan Jasa kurang 10jt</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ 'template3' }}" target="_blank" rel="noopener noreferrer">
                                        Kwitansi Bantuan Transport</a>
                                </li>
                                <li>
                                    <a href="{{ 'template4' }}" target="_blank" rel="noopener noreferrer">
                                        Kwitansi Honor, bantuan transport, uang pembinaan 1 ORANG</a>
                                </li>
                                <li>
                                    <a href="{{ 'template5' }}" target="_blank" rel="noopener noreferrer">
                                        Kwitansi Honor Lebih 1 ORANG</a>
                                </li>
                                <li>
                                    <a href="{{ 'template6' }}" target="_blank" rel="noopener noreferrer">
                                        Kwitansi SPPD</a>
                                </li>
                            </ol>
                        </li>
                    </ul>

                    <script>
                        var toggler = document.getElementsByClassName("caret");
                        var i;

                        for (i = 0; i < toggler.length; i++) {
                            toggler[i].addEventListener("click", function() {
                                this.parentElement.querySelector(".nested").classList.toggle("active");
                                this.classList.toggle("caret-down");
                            });
                        }
                    </script>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
