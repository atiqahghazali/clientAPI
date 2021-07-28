<form action="{{route('house-update', $house->id)}}" method="post"> 
    @csrf
    <label>Type</label>
    <input type="text" id="type" name="type" placeholder="type" value="{{$house->type}}">
    <br>
    <label>Price</label>
    <input type="text" id="price" name="price" placeholder="price" value="{{$house->price}}">
    <br>
    <input type="submit" value="submit">
</form>