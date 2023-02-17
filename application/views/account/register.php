<div class="register-container">     
    <form action="http://localhost/voyages/account/adduser" method="post">          
        <div class="register__form-container">
        <h2>Create New User</h2> 
            <div>
                <label for="loginreg">Username *</label>
                <input type="text" id="loginreg" name="login">
                <i class="fa-solid fa-user"></i>
            </div>
            <div>
                <label for="emailreg">Email *</label>
                <input type="email" id="emailreg" name="email">
                <i class="fa-solid fa-envelope"></i>
            </div>
            <div class="password-block">
                <label for="passwordreg">Password *</label>
                <input type="password" id="passwordreg" name="password">
                <i class="fa-solid fa-eye"></i>
            </div>
            <div class="password-block">
                <label for="password_confirmreg">Confirm password *</label>
                <input type="password" id="password_confirmreg">
                <i class="fa-solid fa-eye"></i>
            </div>
            <button type="submit" id="createreg">Create User</button>
        </div>
    </form>
</div>