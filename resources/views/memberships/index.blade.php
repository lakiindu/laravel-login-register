<h2>All Memberships</h2>

<a href="/memberships/create">Add New</a>

<table border="1">
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>

    @foreach($memberships as $m)
    <tr>
        <td>{{ $m->name }}</td>
        <td>{{ $m->price }}</td>
        <td>
            <a href="/memberships/{{ $m->id }}/edit">Edit</a>

            <form action="/memberships/{{ $m->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>