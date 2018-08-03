
<div class="form-group">
    <label class="control-label col-md-3" for="cate_title">Product Name <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="text" name="name" value="{{ isset($product->name)? $product->name : old('name') }}" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="summary"> Summary <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <textarea name="summary" class="form-control">{{ isset($product->summary)? $product->summary: old('summary') }}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="description"> Description <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <textarea name="description" class="form-control">{{ isset($product->description)? $product->description: old('description') }}</textarea>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="cate_id">Category</label>
    <div class="col-md-6">
        <select class="form-control" name="cate_id" id="cate_id">
            <option value="" required disabled selected>-- Choose option --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->cate_title }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group" id="child_cate_div">
</div>

<div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <select class="form-control" name="status">
            <option>Choose option</option>
            <option value="1" {{ isset($product->status)? 'selected': '' }}>Available</option>
            <option value="0" {{ isset($product->status)? 'selected': '' }}>Unavailable</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="price">Price <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="number" name="price" value="{{ isset($product->price)? $product->price : old('price') }}" min="1" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="discount">Discount <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="number" name="discount" value="{{ isset($product->discount)? $product->discount : old('discount') }}" min="0" class="form-control">
    </div>
</div>
<div class="form-group">
    <label class="control-label col-md-3" for="image">Image <span class="required">*</span>
    </label>
    <div class="col-md-6">
        <input type="file" name="image">
    </div>
</div>
@if(isset($product->image))
    <div class="form-group">
        <label class="control-label col-md-3" for="image">
        </label>
        <div class="col-md-6">
            <img src="{{ asset($product->image) }}" alt="{{ $product->image }}">
        </div>
    </div>
@endif
<div class="form-group">
    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" class="btn btn-success">Save</button>
    </div>
</div>
