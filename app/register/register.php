<div class="formDiv">
    <form class="registerForm" method="post" action="../../registry/SkryptRejestracji.php" name="register" autocomplete="off">
        <div class="inputFiled">
            <label for="Nick" class="formInputInfo">Nick</label>
            <input id="Nick" type="text" class="inputSpecific" required>
        </div>
        <div class="inputFiled">
            <label for="Login" class="formInputInfo">Login</label>
            <input id="Login" type="text" class="inputSpecific" required>
        </div>
        <div class="inputFiled">
            <label for="email" class="formInputInfo">Email</label>
            <input id="email" type="email" name="email" ng-model="email" class="inputSpecific" required>
        </div>
        <p class="alert alert-danger" ng-show="form-register.email.$error.email">Niepoprawny email.</p>
        <div class="inputFiled">
            <label for="password" class="formInputInfo">Hasło</label>
            <input id="password" type="password" name="password" ng-model="password" ng-minlength='7' class="inputSpecific" required autocomplete="new-password">
        </div>
        <p class="alert alert-danger" ng-show="form-register.password.$error.minlength || form.password.$invalid">Hasło musie zawierać minimum 7 znaków.</p>
        <div class="inputFiled">
            <label for="rePassword" class="formInputInfo">Powtórz hasło</label>
            <input id="rePassword" type="password" name="rePassword" class="inputSpecific" required autocomplete="new-password">
        </div>
        <p class="alert alert-danger" ng-show="">Hasła nie są takie same</p>
            <input type="submit" ng-disabled="form-register.$invalid" class="btn registerBtn" value="Zarejestruj się">
    </form>
</div>