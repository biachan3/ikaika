<form action="{{ route('ticket.create') }}" method="POST">
    @csrf
    <label for="email">Email :</label>
    <input type="email" name="email" id="email">
    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject">

    <label for="description">Description:</label>
    <textarea name="description" id="description"></textarea>

    <label for="category">Category:</label>
    <select name="category" id="category">
        <option value="general">General</option>
        <option value="billing">Billing</option>
        <option value="technical">Technical</option>
    </select>

    <button type="submit">Submit</button>
</form>
