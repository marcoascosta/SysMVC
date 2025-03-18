{% extends 'layout.twig.php' %}

{% block title %}Crud Example List{% endblock %}

{% block content %}
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="display-4 text-primary">Twig - Crud Example List</h1>
        <a href="/twigexample/create" class="btn btn-success btn-lg">Add New Item</a>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                {% for item in twigexample %}
                    <tr>
                        <td>{{ item.id }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.company }}</td>
                        <td>
                            <a href="/twigexample/show/{{ item.id }}" class="btn btn-info btn-sm me-2">View</a>
                            <a href="/twigexample/edit/{{ item.id }}" class="btn btn-warning btn-sm me-2">Edit</a>
                            
                            <!-- Delete form -->
                            <form action="/twigexample/delete/{{ item.id }}" method="POST" style="display:inline;">
                                <input type="hidden" name="_method" value="POST">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
