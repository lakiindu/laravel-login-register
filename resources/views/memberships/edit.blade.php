<h2>Edit Membership</h2>

<form method="POST" action="/memberships/{{ $membership->id }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $membership->name }}"><br><br>
    <input type="text" name="price" value="{{ $membership->price }}"><br><br>

    <button type="submit">Update</button>
</form>