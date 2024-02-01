<x-layouts.default-layout>
    @if(Auth::check())
        <div style="text-align: center">You are logged in but not as admin. re-enter a different email + password combination to go to the admin screen</div>
    @endif
    @error('email')
    <div style="color: yellow; text-align: center">{{$message}}</div>
    @enderror
    <div class="loginFormContainer">
        <form method="post" action="{{route('login.authenticate')}}" class="loginForm">
            @csrf
            <div class="loginInputContainer">
                <label for="email">E-Mail</label>
                <input type="text" name="email" id="email">
            </div>
            <div class="loginInputContainer">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>
            <input class="loginButton" type="submit" value="Login">
        </form>
    </div>

    <div class="center">
        Email: test@test.com <br>
        Password: test <br>
        Role: Admin <br><br>
        Email: test@test2.com <br>
        Password: test2 <br>
        Role: Marketing (has no extra features) <br><br>
    </div>
</x-layouts.default-layout>
