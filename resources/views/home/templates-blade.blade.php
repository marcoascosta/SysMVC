@extends('layout')

@section('title', 'SysMVC Advantages - Blade, Twig, and Pure PHP')

@section('content')
<div class="container">
    <h2>SysMVC: Support for Blade, Twig, and Pure PHP</h2>
    <p>SysMVC is a versatile PHP framework that supports three template rendering methods: <strong>Blade</strong>, <strong>Twig</strong>, and <strong>Pure PHP</strong>. This flexibility allows developers to choose the tool that best suits their needs, providing several advantages.</p>

    <h3>Blade Advantages</h3>
    <p>Blade is a simple yet powerful template engine developed for the Laravel framework. With Blade, developers can easily create reusable layouts and dynamic components. It is known for its clean and clear syntax, making template development fast and intuitive.</p>
    <p>For more information, refer to the <a href="https://laravel.com/docs/8.x/blade" target="_blank">official Blade documentation</a>.</p>

    <h3>Twig Advantages</h3>
    <p>Twig is a flexible and robust template engine, widely used in various PHP frameworks. It offers a series of advanced features such as template inheritance, filters, custom extensions, and more. Twig is known for its security and performance, making it a reliable choice for projects of any scale.</p>
    <p>For more information, refer to the <a href="https://twig.symfony.com/doc/3.x/" target="_blank">official Twig documentation</a>.</p>

    <h3>Pure PHP Advantages</h3>
    <p>SysMVC also supports template rendering using pure PHP. This means you can directly include PHP files and render content dynamically. If you prefer not to use a template engine, you can simply use the <code>include</code> command to include template files and generate the desired content. This can be a simpler and more straightforward choice for smaller projects or developers more familiar with PHP.</p>
    <p>Example of using pure PHP in SysMVC:</p>
    <pre><code>include('page.php');</code></pre>

    <h3>Why Choose SysMVC?</h3>
    <p>With SysMVC, you don't have to worry about choosing between Blade, Twig, or Pure PHP. You can use any of these options, or even combine different approaches within the same project, depending on the context. This flexibility is a significant advantage, as it allows developers to take the best of each tool, adapting to their preferences and specific requirements.</p>

    <h3>Conclusion</h3>
    <p>Whether you're a Blade enthusiast, a Twig fan, or someone who prefers pure PHP, SysMVC is ready to meet your needs. The ability to switch between these options makes SysMVC an excellent choice for developers seeking efficiency, flexibility, and ease of use in their PHP projects.</p>
</div>

<br><br>

<p>Github: <a href="https://github.com/marcoascosta/SysMVC.git">https://github.com/marcoascosta/SysMVC.git</a></p>

<br><br>

<h2 class="mt-4">Contact</h2>
<p>If you're interested in SysMVC, feel free to contact us:</p>
<ul>
    <li>Email: <a href="mailto:marcocosta@gmx.com">marcocosta@gmx.com</a></li>
    <li>WhatsApp: <a href="https://wa.me/5535992261684" target="_blank">+55 (35) 99226-1684</a></li>
</ul>

<br>
<h2 class="mt-4">Donations via PAYPAL</h2>
<p>If you would like to support the development of SysMVC, please consider making a donation via PAYPAL to <strong>marcocosta@gmx.com</strong>.</p>
@endsection

