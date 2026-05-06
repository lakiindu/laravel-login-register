<h2>Add Membership</h2>

<form method="POST" action="/memberships">
    @csrf

    <input type="text" name="name" placeholder="e.g. Premium Plan"><br><br>
    <input type="text" name="price" placeholder="e.g. 5000"><br><br>
    <textarea name="description" placeholder="Description"></textarea><br><br>

    <button type="submit">Save</button>
</form>