@extends('layout')

@section('title', 'Database Usage')

@section('content')
<div class="container mt-5">
    <h1 class="display-4 text-primary">Database Usage</h1>
    <p class="lead">CRUD Example with SysMVC.</p>
    
    <p>SysMVC makes it easy to interact with databases through the use of Eloquent ORM. You can easily create, read, update, and delete records in the database using intuitive methods.</p>
    
    <h2>CRUD Example</h2>
    <p>Below is a basic example of CRUD operations:</p>
    
    <h3>Creating a Record</h3>
    <pre><code>
$client = new Client();
$client->name = 'Client Name';
$client->email = 'email@example.com';
$client->save();
    </code></pre>
    
    <h3>Reading Records</h3>
    <pre><code>
$clients = Client::all();
foreach ($clients as $client) {
    echo $client->name;
}
    </code></pre>
    
    <h3>Updating a Record</h3>
    <pre><code>
$client = Client::find(1);
$client->name = 'New Name';
$client->save();
    </code></pre>
    
    <h3>Deleting a Record</h3>
    <pre><code>
$client = Client::find(1);
$client->delete();
    </code></pre>
    
    <p>With these examples, you can see how easy it is to work with databases using SysMVC.</p>
    <br><br>

    <p>Github: <a href="https://github.com/marcoascosta/SysMVC.git">https://github.com/marcoascosta/SysMVC.git</a></p>

    <br><br>

<h2 class="mt-4">Contact</h2>
<p>If you're interested in SysMVC, get in touch:</p>
<ul>
    <li>Email: <a href="mailto:marcocosta@gmx.com">marcocosta@gmx.com</a></li>
    <li>WhatsApp: <a href="https://wa.me/5535992261684" target="_blank">+55 (35) 99226-1684</a></li>
</ul>

<p>If you'd like to support the development of SysMVC, consider making a donation via PAYPAL to <b>marcocosta@gmx.com</b></p>

</div>
@endsection
