<div class="form-group">
    <label class="col-form-label">Content</label>
    <textarea class="form-control" id='content' name="content" cols="30" rows="4">{{old("content", $resource->doc->content ?? '')}}</textarea>
    @error('content')
    <small class="form-text text-danger">{{$message}}</small>
    @enderror
</div>

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
    @endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote();
        });
    </script>
    @endsection
