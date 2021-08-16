@csrf
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            <input type="text" name="title" value="{{ old('title') ?? $test->title ?? '' }}" class="form-control" placeholder="Title">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Performance time:</strong>
            <input type="text" name="performance_time" value="{{ old('performance_time') ?? $test->performance_time ?? '' }}" class="form-control" placeholder="Performance title">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Category:</strong>
            <select name="category_id" class="form-control" title="Category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Test photos (can attach more than one):</strong>
            <input name="image" type="file" multiple="multiple">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        @isset($test->image)
            <div class="form-group form-check">
                <label class="form-check-label" for="remove">
                    <strong>Delete image</strong><br>
                    <input type="checkbox" class="form-check-input"  name="remove" value="{{$test->image->id}}">
                    <img src="{{ asset('/storage/images/Test/'.$test->id.'/thumb/'.$test->image->body) }}" alt="" class="img-fluid">
                </label>
            </div>
        @endisset
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>
