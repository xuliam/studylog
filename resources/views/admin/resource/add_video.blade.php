<div class="form-group">
    <label class="col-form-label"> Video ID</label>
        <input type="text" class="form-control" name="ali_id">
        @error('ali_id')
            <small class="form-text text-danger">{{$message}}</small>
        @else
            <small class="form-text text-muted">pls input the Ali video ID</small>
        @enderror
</div>
