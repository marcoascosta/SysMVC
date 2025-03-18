{% extends 'layout.twig.php' %}

{% block title %}Show Crud Example{% endblock %}

{% block content %}
<div class="container mt-5">
    <h1 class="display-4 text-primary">Twig - Show Crud Example</h1>
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <td>{{ twigexample.id }}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{ twigexample.name }}</td>
        </tr>
        <tr>
            <th>Company</th>
            <td>{{ twigexample.company }}</td>
        </tr>
        <tr>
            <th>Address</th>
            <td>{{ twigexample.address }}</td>
        </tr>
        <tr>
            <th>Phone</th>
            <td>{{ twigexample.phone }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ twigexample.email }}</td>
        </tr>
        <tr>
            <th>Notes</th>
            <td>{{ twigexample.notes }}</td>
        </tr>
    </table>
    <a href="/twigexample/edit/{{ twigexample.id }}" class="btn btn-warning me-2">Edit</a>
    <form action="/twigexample/delete/{{ twigexample.id }}" method="POST" style="display:inline;">
        <button type="submit" class="btn btn-danger me-2" onclick="return confirm('Are you sure?')">Delete</button>
    </form>
    <a href="/twigexample" class="btn btn-secondary">Back to List</a>
</div>
{% endblock %}

