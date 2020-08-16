@extends('admin.layout')

@section('content')

    <link rel="stylesheet" type="text/css"
          href="https://robonegotiator.com/css/mdb.css">
    <div class="row">

        <div class="col-12">



            <div class="card mb-5">

                <div class="card-header">

                    <p class="font-weight-bold">Edit Page</p>

                </div>

                <div class="card-body">

                    <form class="row" method="post" action=""> {{csrf_field()}}

                        <div class="col-12">
                            <div class="form-group">

                                <label>Page Content</label>

                                <textarea required name="content" id="summernote" class="md-textarea
                                form-control"></textarea>

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

@endsection

@section('extra-js')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>


    <script type="text/javascript" src="{{asset('js/uploadcare.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/summernote-image-attributes.js')}}" ></script>



    <script type="text/javascript">

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
                ['help', ['help']]
            ],
            uploadcare: {
                // button name (default is Uploadcare)
                buttonLabel: 'Image / file',
                // font-awesome icon name (you need to include font awesome on the page)
                buttonIcon: 'picture-o',
                // text which will be shown in button tooltip
                tooltipText: 'Upload files or video or something',

                // uploadcare widget options, see https://uploadcare.com/documentation/widget/#configuration
                publicKey: 'demopublickey', // set your API key
                crop: 'free',
                tabs: 'all',
                multiple: true
            }
            ,
            popover: {
                image: [
                    ['custom', ['imageAttributes']],
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

            fontSizes: ['8', '9', '10', '11', '12', '14', '18', '24', '36', '48' , '64', '82', '150']
        });


    </script>






@endsection