<?php

function csrfField() {
    return '<input type="hidden" name="csrf_token" value="' . getCsrfToken() . '">';
}

function csrf() {
    echo csrfField();
}
?>