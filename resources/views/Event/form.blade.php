


<div class="form-group">
    <label for="exampleInputPassword1">Event Name</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Enter The Event Name" value="{{old('name') ?? $event->name}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Event Price</label>
    <input type="number" name="price" id="price" class="form-control" placeholder="Enter The Event Price" value="{{old('price') ?? $event->price}}">
</div>

<div class="form-group">
    <label for="exampleInputPassword1">Event Information</label>
    <textarea name="info" class="form-control" id="info" placeholder="Informations About The Event"> {{old('info') ?? $event->info}}</textarea>
</div>

<label for="exampleInputPassword1">Event Image</label>
@if ($event->image != 0)

<img src="{{asset('/Images/Event/'.$event->image)}}" alt="Book-image" class=" d-block m-1" style="width: 200px ; height: 200px ">
@endif

<input type="file" name="image" id="image" accept="image/*" class="form-control"/>
