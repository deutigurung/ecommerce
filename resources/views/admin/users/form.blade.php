

    <div class="form-group">
        <label class="control-label col-md-3" for="name">Name <span class="required">*</span>
        </label>
        <div class="col-md-6">
            <input type="text" name="name" value="{{ isset($user->name)? $user->name : old('name') }}" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="email">Email <span class="required">*</span>
        </label>
        <div class="col-md-6">
            <input type="text" name="email" value="{{ isset($user->email)? $user->email : old('email') }}" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="password">Password <span class="required">*</span>
        </label>
        <div class="col-md-6">
            <input type="password" name="password" class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="confirm-password">Confirm Password <span class="required">*</span>
        </label>
        <div class="col-md-6">
            <input type="password" name="confirm-password"  class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="address">Address <span class="required">*</span>
        </label>
        <div class="col-md-6">
            <input type="text" name="address" value="{{ isset($user->address)? $user->address : old('address') }}"  class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="phone">Phone <span class="required">*</span>
        </label>
        <div class="col-md-6">
            <input type="text" name="phone" value="{{ isset($user->phone)? $user->phone : old('phone') }}"  class="form-control">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3" for="image">Image <span class="required">*</span>
        </label>
        <div class="col-md-6">
            <input type="file" name="image">
        </div>
    </div>
    @if(isset($user->image))
        <div class="form-group">
            <label class="control-label col-md-3" for="image">
            </label>
            <div class="col-md-6">
                <img src="{{ asset($user->image) }}" alt="{{ $user->name }}">
            </div>
        </div>
    @endif
    <div class="form-group">
        <label class="control-label col-md-3 col-sm-3 col-xs-12">Roles</label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <select class="form-control" name="roles[]" multiple>
                <option>Choose option</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}" {{ isset($user->role)? 'selected': '' }}>{{ ucfirst($role->name) }}</option>
                    @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
           <button type="submit" class="btn btn-success">Save</button>
        </div>
    </div>
