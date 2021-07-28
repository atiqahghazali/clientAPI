<style>
table, th, td {
  border: 1px solid black;
}
</style>
<h4>This list of users from API</h4>
@if( session()->has('alert-message'))
    <div class="alert {{ session()->get('alert-type') }}">
        {{ session()->get('alert-message') }}
    </div>
@endif
<form action="{{route('user-index')}}"> 
    @csrf
    <input type="text" id="search" name="search" placeholder="search">
    <input type="submit" value="Search">
</form>
<button onclick="location.href='{{route('user-create')}}'">Add New</button>
<table> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td>
            <button onclick="location.href='{{route('user-edit',$user['id'])}}'">Update</button>
            <button onclick="location.href='{{route('user-destroy',$user['id'])}}'">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
