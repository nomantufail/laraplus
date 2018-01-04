<?php
/**
 * Created by PhpStorm.
 * User: nomantufail
 * Date: 20/09/2017
 * Time: 11:55 AM
 */
        ?>

<h2>Login</h2>
<form method="post" action="login">
    {{csrf_field()}}

    @if (Session::has('errors'))
        <span style="color: red;">{{session('errors')[0]}}</span><br>
    @endif
    <input type="text" name="username">
    <input type="password" required name="password">
    <input type="submit">
</form>
