<form action="{{route('house-store')}}" method="post"> 
    @csrf
    <input type="text" id="type" name="type" placeholder="type">
    <input type="text" id="price" name="price" placeholder="price">
    <input type="submit" value="submit">
</form>