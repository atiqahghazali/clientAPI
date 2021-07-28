<style>
table, th, td {
  border: 1px solid black;
}
</style>
<h4>This list of houses from API</h4>
<button onclick="location.href='{{route('house-create')}}'">Add New</button>
<table> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Type</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($houses as $house)
        <tr>
            <td>{{$house['id']}}</td>
            <td>{{$house['type']}}</td>
            <td>{{$house['price']}}</td>
            <td>
            <button onclick="location.href='{{route('house-edit',$house['id'])}}'">Update</button>
            <button onclick="location.href='{{route('house-destroy',$house['id'])}}'">Delete</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
