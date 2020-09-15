

<div class="form-group">
    <label for="exampleInputPassword1">Session Name</label>
    <input type="text" name="Sname" id="Sname" class="form-control" placeholder="Enter The Session Name">
</div>

<label for="exampleInputPassword1"> Select The Session Category </label>
<select class="form-control" name="category" id="category">
    @if (count($categories) > 0)
        @foreach($categories as $category)
            <option id="category" name="category" value="{{$category->id}}" >{{$category->name}}</option>
        @endforeach
    @endif
</select>

<label for="exampleInputPassword1">Session Cover</label>
<input type="file" name="Simage" id="Simage" accept="image/*" class="form-control"/>
