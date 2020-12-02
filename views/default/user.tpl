<div id="centerColumn">
    <h1>Ваши регистрационные данные</h1>
    <table id="tableUserData" border="0">
        <tr>
            <td>Логин (email)</td>
            <td>{$userArr['email']}</td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" name="newName" id="newName" value="{$userArr['name']}"></td>
        </tr>
        <tr>
            <td>Тел</td>
            <td><input type="text" name="newPhone" id="newPhone" value="{$userArr['phone']}"></td>
        </tr>
        <tr>
            <td>Адрес</td>
            <td><textarea name="newAddress" id="newAddress">{$userArr['address']}</textarea></td>
        </tr>
        <tr>
            <td>Новый пароль</td>
            <td><input type="password" name="newPwd1" id="newPwd1" value=""></td>
        </tr>
        <tr>
            <td>Повтор пароля</td>
            <td><input type="password" name="newPwd2" id="newPwd2" value=""></td>
        </tr>
        <tr>
            <td>Для сохранения изменений введите текущий пароль</td>
            <td><input type="password" name="curPwd" id="curPwd" value=""></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="button" value="Сохранить изменения" onclick="updateUserData();"></td>
        </tr>
    </table>
</div>
</div>