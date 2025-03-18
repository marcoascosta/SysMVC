{% extends 'layout.twig.php' %}

{% block title %}Create New Crud Example{% endblock %}

{% block content %}
<div class="container mt-5">
    <h1 class="display-4 text-primary">Twig - Create New Crud Example</h1>
    <form action="/twigexample/store" method="POST">
        <input type="hidden" name="csrf_token" value="{{ csrf_token }}">
        
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="user_email" class="form-control" required autocomplete="off">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="company" class="form-label">Company:</label>
            <input type="text" id="company" name="company" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address:</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone:</label>
            <input type="tel" id="phone" name="phone" class="form-control" required pattern="[0-9+\-\s]+" title="Please enter a valid phone number">
        </div>

        <div class="mb-3">
            <label for="notes" class="form-label">Notes:</label>
            <textarea id="notes" name="notes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
{% endblock %}

