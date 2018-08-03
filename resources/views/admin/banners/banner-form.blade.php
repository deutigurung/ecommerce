
<div class="form-group">
    <label class="control-label col-md-3" for="banner_name">Banner Name <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="text" name="banner_name" value="{{ isset($banner->banner_name)? $banner->banner_name : old('banner_name') }}" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="description"> Description <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <textarea name="description" class="form-control">{{ isset($banner->description)? $banner->description: old('description') }}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="image">Banner Image <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="file" name="banner_image">
    </div>
</div>
@if(isset($banner->banner_image))
    <div class="form-group">
        <label class="control-label col-md-3" for="image">
        </label>
        <div class="col-md-6" >
            <img src="{{ asset($banner->banner_image) }}" alt="{{ $banner->banner_name }}" style="width: 40%; height: 30%">
        </div>
    </div>
@endif
<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control" name="status">
            <option>Choose option</option>
            <option value="1" {{ isset($banner->status) == 1? 'selected': '' }}>Active</option>
            <option value="0" {{ isset($banner->status) == 0? 'selected': '' }}>InActive</option>
        </select>
    </div>
</div>
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
