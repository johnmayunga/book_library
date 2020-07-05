<form name="calc" class="calculator">
    <table>
        <tr>
            <td colspan=4><input class="input-boxes" name="display"  type="text"></td>
        </tr>
        <tr>
            <td><input type = "button" class="calc" value="0" OnClick="calc.display.value+='0'"></td>
            <td><input type = "button" class="calc" value="1" OnClick="calc.display.value+='1'"></td>
            <td><input type = "button" class="calc" value="2" OnClick="calc.display.value+='2'"></td>
            <td><input type = "button" class="calc" value="+" OnClick="calc.display.value+='+'"></td>
        </tr>
        <tr>
            <td><input type = "button" class="calc" value="3" OnClick="calc.display.value+='3'"></td>
            <td><input type = "button" class="calc" value="4" OnClick="calc.display.value+='4'"></td>
            <td><input type = "button" class="calc" value="5" OnClick="calc.display.value+='5'"></td>
            <td><input type = "button" class="calc" value="-" OnClick="calc.display.value+='-'"></td>
        </tr>
        <tr>
            <td><input type = "button" class="calc" value="6" OnClick="calc.display.value+='6'"></td>
            <td><input type = "button" class="calc" value="7" OnClick="calc.display.value+='7'"></td>
            <td><input type = "button" class="calc" value="8" OnClick="calc.display.value+='8'"></td>
            <td><input type = "button" class="calc" value="x" OnClick="calc.display.value+='*'"></td>
        </tr>
        <tr>
            <td><input type = "button" class="calc" value="9" OnClick="calc.display.value+='9'"></td>
            <td><input type = "button" class="calc" value="C" OnClick="calc.display.value=''"></td>
            <td><input type = "button" class="calc" value="=" OnClick="calc.display.value=eval(calc.display.value)"></td>
            <td><input type = "button" class="calc" value="/" OnClick="calc.display.value+='/'"></td>
        </tr>
    </table>
</form>
