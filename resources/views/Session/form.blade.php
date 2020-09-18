

<div class="form-group">
    <label for="exampleInputPassword1">Session Name</label>
    <input type="text" name="Sname" id="Sname" class="form-control" placeholder="Enter The Session Name" value="{{old('Sname') ?? $session->Sname}}">
</div>

<label for="exampleInputPassword1"> Select The Session Category </label>
<select class="form-control" name="category" id="category">
    @if (count($categories) > 0)
        @foreach($categories as $category)
            <option id="category" name="category" value="{{$category->id}}" {{$category->id == $session->category_id ? 'selected' : ''}}>{{$category->name}}</option>
        @endforeach
    @endif
</select>

<label for="exampleInputPassword1">Session Cover</label>
@if ($session->Simage)

    <img src="{{asset('/Images/' . $session->Sname . '/' .$session->Simage)}}" alt="Book-image" class=" d-block m-1" style="width: 200px ; height: 200px ">

@endif

<input type="file" name="Simage" id="Simage" accept="image/*" class="form-control"/>
