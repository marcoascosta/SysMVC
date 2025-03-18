{% extends 'layout.twig.php' %}

{% block title %}Edit Crud Example{% endblock %}

{% block content %}
<div class="container mt-5">
    <h1 class="display-4 text-primary">Twig - Edit Crud Example</h1>
    <form action="/twigexample/update/{{ twigexample.id }}" method="POST">
        <input type="hidden" name="csrf_token" value="{{ csrf_token }}">
        
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ twigexample.name }}" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Company:</label>
            <input type="text" id="company" name="company" class="form-control" value="{{ twigexample.company }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ twigexample.address }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ twigexample.phone }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ twigexample.email }}" required>
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes:</label>
            <textarea id="notes" name="notes" class="form-control">{{ twigexample.notes }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
{% endblock %}
