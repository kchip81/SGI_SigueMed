
        <h1>Login</h1>

        <?php echo validation_errors(); ?>

        <?php echo form_open('Usuario/Login'); ?>

            <label for="usuario">Usuario</label>
            <input type="input" name="usuario" /><br />

            <label for="password">Password</label>
            <input type="input" name="password"/><br />

            <input type="submit" name="submit" value="Ingresar" />

        </form>

    