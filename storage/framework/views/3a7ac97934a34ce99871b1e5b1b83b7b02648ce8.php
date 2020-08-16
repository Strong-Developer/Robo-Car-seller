<?php $__env->startSection('content'); ?>

    <script>
        UPLOADCARE_PUBLIC_KEY = '10f6f0c70307799b21e5';
    </script>



    <div class="row">

        <div class="col-12">



            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold float-left">Edit <?php echo e(app('request')->get('post_type')); ?> <?php if($post->name !== null): ?>
                            (<?php echo e($post->name); ?>) <?php endif; ?></p>

                    <?php if($post->name !== null): ?>
                    <a class="btn btn-primary float-right" href="<?php echo e(route('page.custom',['page_url' => $post->page_url])); ?>">Preview this page</a>
                        <a class="btn btn-primary float-right" href="<?php echo e(route('admin.cms.create_page',['clone_id' =>
                    $post->id ])); ?>">Clone this page</a>
                    <?php endif; ?>

                </div>

                <div class="card-body">

                    <form class="row" method="post" action="<?php echo e(route('admin.cms.update_page')); ?>"> <?php echo e(csrf_field()); ?>


                        <input type="hidden" name="post_type" value="<?php echo e(app('request')->get('post_type')); ?>">
                        <input type="hidden" name="post_id" value="<?php echo e($post->id); ?>">
                        <div class="col-12">
                            <div class="form-group">

                                <label><?php echo e(app('request')->get('post_type')); ?> content</label>

                                <textarea required name="content" id="summernote" class="md-textarea
                                form-control"><?php echo html_entity_decode($post->content); ?></textarea>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                <button type="submit" class="btn btn-blue btn-block float-right">
                                    Publish
                                </button>

                            </div>
                        </div>

                    </form>

                </div>

            </div>








        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('extra-js'); ?>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

    <script>
        UPLOADCARE_PUBLIC_KEY = '10f6f0c70307799b21e5';
        UPLOADCARE_EFFECTS = 'crop,rotate,mirror,flip,enhance,sharp,blur,grayscale';
        UPLOADCARE_PREVIEW_STEP = true;
        UPLOADCARE_CLEARABLE = true;
    </script>

    <script src="https://ucarecdn.com/libs/widget/3.x/uploadcare.full.min.js"></script>
    <script src="https://ucarecdn.com/libs/widget-tab-effects/1.x/uploadcare.tab-effects.js"></script>

    <script>
        uploadcare.registerTab('preview', uploadcareTabEffects)
    </script>
    <script type="text/javascript" src="<?php echo e(asset('js/uploadcare.js')); ?>?="></script>


    <script type="text/javascript" src="<?php echo e(asset('js/summernote-image-attributes.js')); ?>" ></script>

    <script src="https://cdn.jsdelivr.net/gh/perevoshchikov/summernote-grid@1.0.0/summernote-grid.min.js"></script>


  <!--  <script type="text/javascript">

        $('#summernote').summernote({
            // unfortunately you can only rewrite
            // all the toolbar contents, on the bright side
            // you can place uploadcare button wherever you want
            height : '350px' ,
            toolbar: [
                ['uploadcare', ['uploadcare']], // here, for example
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                ['table', ['table']],
                ['insert', ['media', 'link', 'hr', 'video']],
                ['view', ['fullscreen', 'codeview']],
                ['help', ['help']] ,
                ['insert', ['grid']]
            ],
            uploadcare: {
                // button name (default is Uploadcare)
                buttonLabel: 'Image / file',
                // font-awesome icon name (you need to include font awesome on the page)
                buttonIcon: 'picture-o',
                // text which will be shown in button tooltip
                tooltipText: 'Upload files or video or something',

                // uploadcare widget options, see https://uploadcare.com/documentation/widget/#configuration
                publicKey: '10f6f0c70307799b21e5', // set your API key
                crop: 'free',
                tabs: 'all',
                multiple: true
            }
            ,
            popover: {
                image: [
                    ['custom', [' imageAttributes']],
                    ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
            },
            lang: 'en-US', // Change to your chosen language
            imageAttributes:{
                icon:'<i class="note-icon-pencil"/>',
                removeEmpty:false, // true = remove attributes | false = leave empty if present
                disableUpload: false // true = don't display Upload Options | Display Upload Options
            }  ,
            grid: {
                wrapper: "row",
                columns: [
                    "col-md-12",
                    "col-md-6",
                    "col-md-4",
                    "col-md-3",
                ]
            },
            callbacks: {
                onGridInsert: null
            },
            icons: {
                grid: "glyphicon glyphicon-th"
            } ,

            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150']
        });


    </script> -->

    <link href="https://eissasoubhi.github.io/summernote-bricks/dist/assets/editable-bloc.css" rel="stylesheet">
    <script type="text/javascript" src="https://eissasoubhi.github.io/summernote-bricks/dist/summernote-extensions.dist.js"></script>

    <script type="text/javascript">

        $('#summernote').summernote({
            height: 635,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['font', ['fontsize', 'color']],
                ['font', ['fontname']],
                ['color', ['color']],
                ['para',['ul','ol', 'listStyles','paragraph']],
                ['height',['height']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video', 'hr', 'doc', 'readmore', 'lorem', 'emoji','grid','bricks']],
                ['history', ['undo', 'redo']],
                ['view', ['codeview', 'fullscreen', 'findnreplace']],
                ['help',['help']]
            ],
            popover: {
                image: [
                    ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],

                    ['custom', ['imageAttributes', 'imageShape']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['remove', ['removeMedia']]
                ],
                imageAttributes:{
                    imageDialogLayout:'default', // default|horizontal
                    icon:'<i class="note-icon-pencil"/>',
                    removeEmpty:false // true = remove attributes | false = leave empty if present
                },
                imageShape: {
                    icon: '<i class="note-icon-picture"/>'
                } ,
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ],
                table: [
                    ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                    ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                ],
                air: [
                    ['color', ['color']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['para', ['ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']]
                ]
            },
            grid: {
                wrapper: "row",
                columns: [
                    "col-md-12",
                    "col-md-6",
                    "col-md-4",
                    "col-md-3",
                ]
            },
            bricks: {
                gallery: {
                    modal_body_file: "php/gallery_dynamic_content.html"
                },
                thumbnails: {
                    modal_body_file: "php/thumbnails_dynamic_content.html"
                },
            },
            callbacks: {
                onGridInsert: null
            },
            icons: {
                grid: "glyphicon glyphicon-th"
            } ,
            dialogsInBody: true,
            dialogsFade: true , // Add fade effect on dialogs

            disableDragAndDrop: false ,

            spellCheck: true


        }) ;
    </script>

    <style type="text/css">
        .nav-tabs li a {
            padding: 15px !important;
        }
    </style>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.cms.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>