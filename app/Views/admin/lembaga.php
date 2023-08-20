<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <div class="container-fluid bg-light px-4 rounded">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
            <h1 class="h3 id-table" data-bakalslug="<?=url_title($singkatanlembaga, '-', true)?>"><?= $singkatanlembaga . ' ' . DESA ?></h1>
        </div>
    </div>

    <?php if (session()->getFlashdata('updateData')) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
            </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center alert-dismissible fade show" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                <use xlink:href="#check-circle-fill" />
            </svg>
            <div>
                <?= session()->getFlashdata('updateData') ?>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif ?>

    <?php if ($active != 1) : ?>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </symbol>
        </svg>

        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                'Foto Utama' belum diatur dengan benar !
            </div>
        </div>
    <?php endif ?>

    <div>
        <div class="card border-primary mb-3">
            <div class="card-header text-white bg-primary">
                <span class="text-white fs-5">Kepengurusan <?= $singkatanlembaga ?></span>
                <button type="button" class="btn btn-sm btn-success float-end" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Tambah Data
                </button>
            </div>
            <div class="card-body overflow-auto">
                <table class="table table-striped" id="<?= url_title($singkatanlembaga . ' ' . DESA, '-', true) ?>" data-tabelsiades="<?= caesarCipherReverse($tabeldtb); ?>">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Aksi</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Pendidikan</th>
                            <th scope="col">Kontak</th>
                            <th scope="col">Updated By</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($personildesa as $personil) : ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td>
                                    <button style="font-size: 87%;" id="btnGroupDrop1" type="button" class="btn btn-sm btn-primary dropdown-toggle position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                        <?= ($personil['class']) ?
                                            '<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                M
                                                <span class="visually-hidden">KMZ Alzaid</span>
                                            </span>' : ''
                                        ?>
                                    </button>


                                    <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="font-size: 90%!important;">
                                        <li>
                                            <button type="button" data-id="<?= convertToLetter($personil['id']) ?>" class="dropdown-item viewStruktur" data-bs-toggle="modal" data-bs-target="#staticBackdropView">
                                                View
                                            </button>
                                        </li>
                                        <li>
                                            <form action="/adm-proses/delete-personillembaga/<?= convertToLetter($personil['id']) ?>/<?= url_title($singkatanlembaga, '-', true) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="dropdown-item" onclick="return confirm('Yakin mau menghapus ?')">Hapus</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form action="/adm-proses/mainfoto-lembaga/<?= convertToLetter($personil['id']) ?>/<?= url_title($singkatanlembaga, '-', true) ?>" method="post">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="dropdown-item">Set Foto Utama</button>
                                            </form>
                                        </li>
                                    </ul>
                                </td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('nama'); ?>"><?= $personil['nama'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('jabatan'); ?>"><?= $personil['jabatan'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('alamat'); ?>"><?= $personil['alamat'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('pendidikan'); ?>"><?= $personil['pendidikan'] ?></td>
                                <td class="edit-dbClick" data-id="<?= convertToLetter($personil['id']) ?>" data-colum="<?= caesarCipherReverse('kontak'); ?>"><?= $personil['kontak'] ?></td>
                                <td><?= $personil['updated_by'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <form action="/adm-proses/update-lembaga/<?= convertToLetter($idlembaga) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="valueupdate" id="valueTentang">
            <input type="hidden" name="kolumtarget" value="<?= caesarCipherReverse('tentang') ?>">

            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">
                    <span class="d-inline text-white fs-5">Profil <?= $singkatanlembaga ?></span>
                    <button type="submit" class="float-end btn btn-warning btn-sm update-data">Edit</button>
                </div>
                <div class="card-body">
                    <div class="ck-editor">
                        <style>
                            /* #container {
                                width: 1000px;
                                margin: 20px auto;
                            } */

                            .ck-editor__editable[role="textbox"] {
                                /* editing area */
                                min-height: 280px;
                            }

                            .ck-content .image {
                                /* block images */
                                max-width: 80%;
                                margin: 20px auto;
                            }
                        </style>

                        <div id="containerTentang">
                            <div id="editor">
                                <?= $tentang ?>
                            </div>
                        </div>

                        <div class="close">
                            <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script>
                            <script>
                                // This sample still does not showcase all CKEditor 5 features (!)
                                // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
                                CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                                    toolbar: {
                                        items: [
                                            'exportPDF', 'exportWord', '|',
                                            'findAndReplace', 'selectAll', '|',
                                            'heading', '|',
                                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                                            'bulletedList', 'numberedList', 'todoList', '|',
                                            'outdent', 'indent', '|',
                                            'undo', 'redo',
                                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                            'alignment', '|',
                                            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'htmlEmbed', '|',
                                            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                                            'sourceEditing'
                                        ],
                                        shouldNotGroupWhenFull: true
                                    },
                                    // Changing the language of the interface requires loading the language file using the <script> tag.
                                    // language: 'es',
                                    list: {
                                        properties: {
                                            styles: true,
                                            startIndex: true,
                                            reversed: true
                                        }
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                                    heading: {
                                        options: [{
                                                model: 'paragraph',
                                                title: 'Paragraph',
                                                class: 'ck-heading_paragraph'
                                            },
                                            {
                                                model: 'heading1',
                                                view: 'h1',
                                                title: 'Heading 1',
                                                class: 'ck-heading_heading1'
                                            },
                                            {
                                                model: 'heading2',
                                                view: 'h2',
                                                title: 'Heading 2',
                                                class: 'ck-heading_heading2'
                                            },
                                            {
                                                model: 'heading3',
                                                view: 'h3',
                                                title: 'Heading 3',
                                                class: 'ck-heading_heading3'
                                            },
                                            {
                                                model: 'heading4',
                                                view: 'h4',
                                                title: 'Heading 4',
                                                class: 'ck-heading_heading4'
                                            },
                                            {
                                                model: 'heading5',
                                                view: 'h5',
                                                title: 'Heading 5',
                                                class: 'ck-heading_heading5'
                                            },
                                            {
                                                model: 'heading6',
                                                view: 'h6',
                                                title: 'Heading 6',
                                                class: 'ck-heading_heading6'
                                            }
                                        ]
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                                    placeholder: 'Ketikkan disini !',
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                                    fontFamily: {
                                        options: [
                                            'default',
                                            'Arial, Helvetica, sans-serif',
                                            'Courier New, Courier, monospace',
                                            'Georgia, serif',
                                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                            'Tahoma, Geneva, sans-serif',
                                            'Times New Roman, Times, serif',
                                            'Trebuchet MS, Helvetica, sans-serif',
                                            'Verdana, Geneva, sans-serif'
                                        ],
                                        supportAllValues: true
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                                    fontSize: {
                                        options: [10, 12, 14, 'default', 18, 20, 22],
                                        supportAllValues: true
                                    },
                                    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                                    htmlSupport: {
                                        allow: [{
                                            name: /.*/,
                                            attributes: true,
                                            classes: true,
                                            styles: true
                                        }]
                                    },
                                    // Be careful with enabling previews
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                                    htmlEmbed: {
                                        showPreviews: true
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                                    link: {
                                        decorators: {
                                            addTargetToExternalLinks: true,
                                            defaultProtocol: 'https://',
                                            toggleDownloadable: {
                                                mode: 'manual',
                                                label: 'Downloadable',
                                                attributes: {
                                                    download: 'file'
                                                }
                                            }
                                        }
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                                    mention: {
                                        feeds: [{
                                            marker: '@',
                                            feed: [
                                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                                '@sugar', '@sweet', '@topping', '@wafer'
                                            ],
                                            minimumCharacters: 1
                                        }]
                                    },
                                    // The "super-build" contains more premium features that require additional configuration, disable them below.
                                    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                                    removePlugins: [
                                        // These two are commercial, but you can try them out without registering to a trial.
                                        // 'ExportPdf',
                                        // 'ExportWord',
                                        'CKBox',
                                        'CKFinder',
                                        'EasyImage',
                                        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                                        // Storing images as Base64 is usually a very bad idea.
                                        // Replace it on production website with other solutions:
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                                        // 'Base64UploadAdapter',
                                        'RealTimeCollaborativeComments',
                                        'RealTimeCollaborativeTrackChanges',
                                        'RealTimeCollaborativeRevisionHistory',
                                        'PresenceList',
                                        'Comments',
                                        'TrackChanges',
                                        'TrackChangesData',
                                        'RevisionHistory',
                                        'Pagination',
                                        'WProofreader',
                                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                                        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                                        'MathType',
                                        // The following features are part of the Productivity Pack and require additional license.
                                        'SlashCommand',
                                        'Template',
                                        'DocumentOutline',
                                        'FormatPainter',
                                        'TableOfContents'
                                    ]
                                });
                            </script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const topoksi = document.querySelector("#containerTentang .ck-editor__main div");
                                    const valTupoksi = document.getElementById("valueTentang");

                                    valTupoksi.value = topoksi.innerHTML;

                                    topoksi.addEventListener("keyup", function(event) {
                                        valTupoksi.value = event.target.innerHTML;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <form action="/adm-proses/update-lembaga/<?= convertToLetter($idlembaga) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="valueupdate" id="valueTupoksi">
            <input type="hidden" name="kolumtarget" value="<?= caesarCipherReverse('tupoksi') ?>">

            <div class="card border-primary mb-3">
                <div class="card-header bg-primary text-white">
                    <span class="d-inline text-white fs-5">Tugas Pokok & Fungsi <?= $singkatanlembaga ?></span>
                    <button type="submit" class="float-end btn btn-warning btn-sm">Edit</button>
                </div>
                <div class="card-body">
                    <div class="ck-editor">

                        <div id="containerTupoksi">
                            <div id="editor2">
                                <?= $tupoksi ?>
                            </div>
                        </div>

                        <div class="close">
                            <!-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/super-build/ckeditor.js"></script> -->
                            <script>
                                // This sample still does not showcase all CKEditor 5 features (!)
                                // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
                                CKEDITOR.ClassicEditor.create(document.getElementById("editor2"), {
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
                                    toolbar: {
                                        items: [
                                            'exportPDF', 'exportWord', '|',
                                            'findAndReplace', 'selectAll', '|',
                                            'heading', '|',
                                            'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                                            'bulletedList', 'numberedList', 'todoList', '|',
                                            'outdent', 'indent', '|',
                                            'undo', 'redo',
                                            'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                                            'alignment', '|',
                                            'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'htmlEmbed', '|',
                                            'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                                            'sourceEditing'
                                        ],
                                        shouldNotGroupWhenFull: true
                                    },
                                    // Changing the language of the interface requires loading the language file using the <script> tag.
                                    // language: 'es',
                                    list: {
                                        properties: {
                                            styles: true,
                                            startIndex: true,
                                            reversed: true
                                        }
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
                                    heading: {
                                        options: [{
                                                model: 'paragraph',
                                                title: 'Paragraph',
                                                class: 'ck-heading_paragraph'
                                            },
                                            {
                                                model: 'heading1',
                                                view: 'h1',
                                                title: 'Heading 1',
                                                class: 'ck-heading_heading1'
                                            },
                                            {
                                                model: 'heading2',
                                                view: 'h2',
                                                title: 'Heading 2',
                                                class: 'ck-heading_heading2'
                                            },
                                            {
                                                model: 'heading3',
                                                view: 'h3',
                                                title: 'Heading 3',
                                                class: 'ck-heading_heading3'
                                            },
                                            {
                                                model: 'heading4',
                                                view: 'h4',
                                                title: 'Heading 4',
                                                class: 'ck-heading_heading4'
                                            },
                                            {
                                                model: 'heading5',
                                                view: 'h5',
                                                title: 'Heading 5',
                                                class: 'ck-heading_heading5'
                                            },
                                            {
                                                model: 'heading6',
                                                view: 'h6',
                                                title: 'Heading 6',
                                                class: 'ck-heading_heading6'
                                            }
                                        ]
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
                                    placeholder: 'Ketikkan disini !',
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
                                    fontFamily: {
                                        options: [
                                            'default',
                                            'Arial, Helvetica, sans-serif',
                                            'Courier New, Courier, monospace',
                                            'Georgia, serif',
                                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                                            'Tahoma, Geneva, sans-serif',
                                            'Times New Roman, Times, serif',
                                            'Trebuchet MS, Helvetica, sans-serif',
                                            'Verdana, Geneva, sans-serif'
                                        ],
                                        supportAllValues: true
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
                                    fontSize: {
                                        options: [10, 12, 14, 'default', 18, 20, 22],
                                        supportAllValues: true
                                    },
                                    // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
                                    htmlSupport: {
                                        allow: [{
                                            name: /.*/,
                                            attributes: true,
                                            classes: true,
                                            styles: true
                                        }]
                                    },
                                    // Be careful with enabling previews
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
                                    htmlEmbed: {
                                        showPreviews: true
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
                                    link: {
                                        decorators: {
                                            addTargetToExternalLinks: true,
                                            defaultProtocol: 'https://',
                                            toggleDownloadable: {
                                                mode: 'manual',
                                                label: 'Downloadable',
                                                attributes: {
                                                    download: 'file'
                                                }
                                            }
                                        }
                                    },
                                    // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
                                    mention: {
                                        feeds: [{
                                            marker: '@',
                                            feed: [
                                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                                '@sugar', '@sweet', '@topping', '@wafer'
                                            ],
                                            minimumCharacters: 1
                                        }]
                                    },
                                    // The "super-build" contains more premium features that require additional configuration, disable them below.
                                    // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
                                    removePlugins: [
                                        // These two are commercial, but you can try them out without registering to a trial.
                                        // 'ExportPdf',
                                        // 'ExportWord',
                                        'CKBox',
                                        'CKFinder',
                                        'EasyImage',
                                        // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
                                        // Storing images as Base64 is usually a very bad idea.
                                        // Replace it on production website with other solutions:
                                        // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
                                        // 'Base64UploadAdapter',
                                        'RealTimeCollaborativeComments',
                                        'RealTimeCollaborativeTrackChanges',
                                        'RealTimeCollaborativeRevisionHistory',
                                        'PresenceList',
                                        'Comments',
                                        'TrackChanges',
                                        'TrackChangesData',
                                        'RevisionHistory',
                                        'Pagination',
                                        'WProofreader',
                                        // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
                                        // from a local file system (file://) - load this site via HTTP server if you enable MathType.
                                        'MathType',
                                        // The following features are part of the Productivity Pack and require additional license.
                                        'SlashCommand',
                                        'Template',
                                        'DocumentOutline',
                                        'FormatPainter',
                                        'TableOfContents'
                                    ]
                                });
                            </script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    const topoksi = document.querySelector("#containerTupoksi .ck-editor__main div");
                                    const valTupoksi = document.getElementById("valueTupoksi");

                                    valTupoksi.value = topoksi.innerHTML;

                                    topoksi.addEventListener("keyup", function(event) {
                                        valTupoksi.value = event.target.innerHTML;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</main>

<!-- Modal Add-->
<form action="/adm-proses/add-personillembaga/<?= url_title($singkatanlembaga, '-', true) ?>" method="post">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Pengurus <?= $singkatanlembaga ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control" id="labelimgajax" placeholder="nama" name="nama">
                        <label for="labelimgajax">Nama</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control" id="bb" placeholder="Alamat" name="alamat">
                        <label for="bb">Alamat</label>
                    </div>
                    <div class="form-floating mb-2">
                        <input autocomplete="off" type="text" class="form-control" id="aav" placeholder="Jabatan" name="jabatan">
                        <label for="aav">Jabatan</label>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating mb-2">
                                <input autocomplete="off" type="text" class="form-control" id="bb" placeholder="Pendidikan" name="pendidikan">
                                <label for="bb">Pendidikan</label>
                            </div>
                            <div class="form-floating mb-2">
                                <input autocomplete="off" type="text" class="form-control" id="cc" placeholder="Kontak" name="kontak">
                                <label for="cc">Kontak</label>
                            </div>

                            <div class="mb-3">
                                <input class="form-control form-control-sm" id="imgtarget" type="file">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="W-100" id="uploaded">
                                <img src="<?= "/img/assets/image-default.jpg"; ?>" class="img-thumbnail img-fluid" alt="default">
                            </div>
                        </div>
                    </div>

                    <div class="alert alert-danger d-none" role="alert" id="pesan-error">
                        BUG dev.by KMZ
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="subnit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal View-->
<form action="/dariAjax" method="post" id="vwForm">
    <?= csrf_field() ?>
    <div class="modal fade" id="staticBackdropView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">View Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeView"></button>
                </div>
                <div class="modal-body p-0">
                    <div class="card bg-white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="uploaded">
                                        <img src="/img/personil/team-1.jpg" class="card-img-top img-fluid vwFoto" alt="kmz" id="vwFoto">
                                    </div>
                                    <div class="alert alert-danger d-none pesan-error m-0 mt-2" role="alert">
                                        BUG dev.by KMZ
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-5">
                                            <ul class="ps-3">
                                                <li class="mb-2">Nama </li>
                                                <li class="mb-2">Jabatan </li>
                                                <li class="mb-2">Alamat </li>
                                                <li class="mb-2">Pendidikan</li>
                                                <li class="mb-2">Kontak</li>
                                                <li class="mb-2 fst-italic">Updated By</li>
                                                <li class="mb-2 fst-italic">Updated Date</li>
                                            </ul>
                                        </div>
                                        <div class="col-7">
                                            <span id="vwNama" class="mb-2 d-block">: Khaeril Maswal Zaid </span>
                                            <span id="vwJabatan" class="mb-2 d-block">: Presiden RI </span>
                                            <span id="vwAlamat" class="mb-2 d-block">: Dusun Samaenre </span>
                                            <span id="vwPendidikan" class="mb-2 d-block">: Sarjana 1</span>
                                            <span id="vwKontak" class="mb-2 d-block">: +62 853-4365-2494</span>
                                            <span id="vwBy" class="mb-2 d-block fst-italic">: Admin</span>
                                            <span id="vwDate" class="mb-2 d-block fst-italic">: 1234567</span>
                                        </div>
                                    </div>

                                    <div class="form-floating mt-2">
                                        <input name="imageblog" type="file" class="form-control imgtarget" id="aabc">
                                        <label for="aabc">Foto</label>
                                    </div>
                                </div>
                            </div>

                            <div class="position-absolute start-0 end-0 top-0 text-center bg-white" id="blockspinner" style="height: 100%;">
                                <div class="spinner-border text-info position-relative top-50" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="nama" value="dariAjax" class="labelimgajax" id="labelimgajax">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

<?php $this->endSection() ?>