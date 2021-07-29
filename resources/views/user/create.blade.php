<form action="{{route('user-store')}}"> 
    @csrf
    <input type="text" id="name" name="name" placeholder="name">
    <input type="email" id="email" name="email" placeholder="email">
    <input type="password" id="password" name="password" placeholder="password">
    <input type="submit" value="submit">
</form>
@if( session()->has('alert-message'))
    <div class="alert {{ session()->get('alert-type') }}">
        {{ session()->get('alert-message') }}
    </div>
@endif