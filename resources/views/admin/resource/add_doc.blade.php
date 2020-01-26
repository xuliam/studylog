<div class="form-group">
    <label class="col-form-label">Content</label>
    <textarea class="form-control" id='content' name="content" cols="30" rows="4">{{old("content", $resource->doc->content ?? '')}}</textarea>
    <script>
        $(document).ready(function () {
            var editor = new Simditor({
                textarea: $('#content'),
                //optional options
                upload: {
                    url: '{{route("admin.resource.up")}}',
                    params: {
                        _token: '{{csrf_token()}}'
                    },
                    fileKey: 'image_file'
                },
                pasteImage: "image_file"
             });
        });
    </script>
    @error('content')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
</div>

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('static/simditor2328/styles/simditor.css')}}" />
    @endsection

@section('js')
    <script type="text/javascript" src="{{asset('static/simditor2328/scripts/module.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/simditor2328/scripts/hotkeys.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/simditor2328/scripts/uploader.js')}}"></script>
    <script type="text/javascript" src="{{asset('static/simditor2328/scripts/simditor.js')}}"></script>

    @endsection
