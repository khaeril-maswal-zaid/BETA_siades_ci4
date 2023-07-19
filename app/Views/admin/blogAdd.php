<?php $this->extend('layout-admin/template') ?>
<?php $this->section('content'); ?>


<main class="ms-sm-auto p-md-4 pb-md-0">
    <form action="/adm-proses/blog/<?= ($dataupdate) ? $dataupdate['id'] : ''; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field() ?>
        <input type="hidden" name="picture" value="<?= ($dataupdate) ? $dataupdate['picture'] : ''; ?>">
        <input type="hidden" name="isinaArtikel" id="isinaArtikel">

        <div class="container-fluid bg-light px-4 rounded">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h4"><?= $label ?></h1>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

        <div class="container-fluid bg-light border p-2 rounded">

            <?php if (session()->getFlashdata('addArtikel')) : ?>
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
                        <?= session()->getFlashdata('addArtikel') ?>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

            <div class="row">
                <div class="col-md-8">
                    <div class="form-floating mb-2">
                        <input <?= ($disabled) ? $disabled : ''; ?> value="<?php
                                                                            if (old('judul')) {
                                                                                echo old('judul');
                                                                            } elseif ($dataupdate) {
                                                                                echo $dataupdate['judul'];
                                                                            } else {
                                                                                echo '';
                                                                            } ?>" name="judul" type="text" class="form-control <?= ($validation[0]) ? 'is-invalid' : ''; ?>" id="labelimgajax" autofocus>
                        <label for="judulberita">Judul Artikel</label>
                        <div class="invalid-feedback">
                            Judul wajib diisi
                        </div>
                    </div>

                    <div class="form-floating mb-2">
                        <textarea name="deskripsi" class="form-control <?= ($validation[1]) ? 'is-invalid' : ''; ?>" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px; resize: vertical;"><?php
                                                                                                                                                                                                                        if (old('deskripsi')) {
                                                                                                                                                                                                                            echo old('deskripsi');
                                                                                                                                                                                                                        } elseif ($dataupdate) {
                                                                                                                                                                                                                            echo $dataupdate['description'];
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo '';
                                                                                                                                                                                                                        } ?></textarea>
                        <label for="floatingTextarea">Deskripsi artikel</label>
                        <div class="invalid-feedback">
                            Deskripsi wajib diisi
                        </div>
                    </div>

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

                        <div id="containerBlog">
                            <div id="editor" class="<?= (session()->getFlashdata('val-isinaArtikel')) ? 'is-invalid' : ''; ?>">
                                <?= ($dataupdate) ? $dataupdate['artikel'] : ''; ?>
                            </div>
                            <div class="invalid-feedback mt-2">
                                Artikel wajib untuk diisi !
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
                                    const topoksi = document.querySelector("#containerBlog .ck-editor__main div");
                                    const valTupoksi = document.getElementById("isinaArtikel");

                                    valTupoksi.value = topoksi.innerHTML;

                                    topoksi.addEventListener("keyup", function(event) {
                                        valTupoksi.value = event.target.innerHTML;
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-floating mb-2">
                        <select name="oleh" class="form-select" id="olehselect" aria-label="Floating label select example">
                            <option value="Admin" selected>Admin</option>
                            <option value="">Lainnya</option>
                        </select>
                        <label for="olehselect">Oleh</label>
                    </div>

                    <div class="form-floating mb-2">
                        <input name="oleh-lainnya" type="text" disabled class="form-control <?= (session()->getFlashdata('val-oleh')) ? 'is-invalid' : ''; ?>" id="penuliscustom" value="<?= ($dataupdate) ? $dataupdate['oleh'] : ''; ?>">
                        <label for="penuliscustom">Oleh Lainnya</label>
                        <div class="invalid-feedback">
                            Wajib untuk diisi !
                        </div>
                    </div>

                    <hr>

                    <div class="alert alert-danger d-none" role="alert" id="pesan-error">
                        BUG dev.by KMZ
                    </div>

                    <div class="form-floating mb-2">
                        <input value="<?= old('imageblog') ?>" name="imageblog" type="file" class="form-control <?= ($validation[2]) ? 'is-invalid' : ''; ?>" id="imgtarget">
                        <label for="pictureartikel">Image</label>
                        <div class="invalid-feedback">
                            <?= ($validation[2]) ? $validation[2] : ''; ?>
                        </div>
                    </div>

                    <div class="W-100" id="uploaded">
                        <img src="<?= ($dataupdate) ? "/img/blog/" . $dataupdate['picture'] : "/img/assets/image-default.jpg"; ?>" class="img-thumbnail img-fluid" alt="default">
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>

<?php $this->endSection() ?>