@extends('layout')

@section('title', 'Security')

@section('content')
    <div class="container">
        <h2>Security</h2>
        <p>We have implemented several security measures in SysMVC to protect your application against threats. Here are some of the implementations:</p>
        <h3>CSRF Protection</h3>
        <p>We use CSRF tokens to protect against Cross-Site Request Forgery attacks.</p>
        <h3>Data Sanitization</h3>
        <p>All input and output data are sanitized to prevent code injections and other attacks.</p>
        <h3>Security Headers</h3>
        <p>We add HTTP security headers to protect against attacks like clickjacking and MIME-type sniffing.</p>
        <p>For more information about security, refer to the <a href="https://owasp.org/" target="_blank">OWASP documentation</a>.</p>
    </div>

    <br><br>

    <p>Github: <a href="https://github.com/marcoascosta/SysMVC.git">https://github.com/marcoascosta/SysMVC.git</a></p>

    <br><br>

    <h2 class="mt-4">Contact</h2>
    <p>If you're interested in SysMVC, feel free to contact us:</p>
    <ul>
        <li>Email: <a href="mailto:marcocosta@gmx.us">marcocosta@gmx.us</a></li>
        <li>WhatsApp: <a href="https://wa.me/5535992261684" target="_blank">+55 (35) 99226-1684</a></li>
    </ul>

    <br>
    <h2 class="mt-4">Donations via PIX</h2>
    <p>If you would like to support the development of SysMVC, please consider making a donation via PIX to <strong>marcocosta@gmx.us</strong>.</p>
@endsection
