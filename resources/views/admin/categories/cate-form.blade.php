
<div class="form-group">
    <label class="control-label col-md-3" for="cate_title">Category Title <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="text" name="cate_title" value="{{ isset($category->cate_title)? $category->cate_title : old('cate_title') }}" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="summary"> Summary <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <textarea name="summary" class="form-control">{{ isset($category->summary)? $category->summary: old('summary') }}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="image">Image <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="file" name="image">
    </div>
</div>
@if(isset($category->image))
    <div class="form-group">
        <label class="control-label col-md-3" for="image">
        </label>
        <div class="col-md-6">
            <img src="{{ asset($category->image) }}" alt="{{ $category->cate_title }}">
        </div>
    </div>
@endif
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control" name="status">
            <option value=""  disabled selected>Choose option</option>
            <option value="1" >Active</option>
            <option value="0" >InActive</option>
        </select>
    </div>
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Category</label>
<div class="col-md-6 col-sm-6 col-xs-12">
    <select class="form-control" name="is_parent">
        <option value=""  disabled selected>Choose option</option>
        <option value="0">---- Parent Category ---- </option>
            @foreach($parents as $parent)
                <option value="{!! $parent->id !!}">{!! $parent->cate_title !!}</option>
            @endforeach
    </select>
</div>
</div>
{{--
<div class="form-group">
    <label class="control-label col-md-3">Is Parent:</label>
    <div class="col-md-4">
        <input type="checkbox" name="is_parent" id="is_parent"  value="1" checked {{ isset($category->is_parent) == 1 ? 'selected=selected' : ''}}> Yes
        <input type="checkbox" name="is_parent" id="is_parent"  value="0" checked {{ isset($category->is_parent) == 0 ? 'selected=selected' : ''}}> No
    </div>
</div>
<div class="form-group hidden" id="parent_cat_div">
    <label class="control-label col-md-3" for="parent_cate_id">Parent Categories</label>
    <div class="col-md-6">
        <select class="form-control" name="parent_cate_id" id="parent_cate_id">
            <option value=""  disabled selected>Choose option</option>
           @foreach($is_parents as $is_parent)
                <option value="{{ $is_parent->id }}" {{ isset($category->parent_cate_id) ? $category->parent_cate_id : old('parent_cate_id') }}>{{ $is_parent->cate_title }}</option>
            @endforeach
        </select>
    </div>
</div>
--}}

<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
