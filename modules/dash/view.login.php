<?php

include_once 'blade/view.login.blade.php';
include_once '/../../common/class.common.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>USER Login Operation</title>
        <link rel="stylesheet" href="style.css" type="text/css" />
    </head>

<body style="background-color:#2F4F4F">
<center>
    <div id="header" style="margin-top:100px">
        <label style="font-size: 30px;color:  #B4B6B3;text-shadow: 2px 2px #040725">By : Kazi Masudul Alam</a></label>
    </div>

    <div id="form" style="width:500px;background-color: #040725;margin:10px auto;text-align:center">
        <table width="100%" border="1" cellpadding="15">
            <tr>
                <form method="post">
                    <td>
                        <table width="100%" border="0" cellpadding="3" >
                            <tr>
                                <td colspan="3"><strong style="color:white">Member Login </strong></td>
                            </tr>
                            <tr style="color:white">
                                <td width="78" >User Name (Email)</td>
                                <td width="6">::</td>
                                <td width="294"><input name="txtEmail" type="text" id="txtEmail"  style="width:300px;height:25px; background-color: #B4B6B3; color:black;font-size: 15px"></td>
                            </tr>
                            <tr style="color:white">
                                <td>Password</td>
                                <td>::</td>
                                <td><input name="txtPassword" type="password" id="txtPassword" style="width:300px;height:25px; background-color: #B4B6B3; color:black;font-size: 15px"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><input type="submit" name="login" value="Login" style="cursor: pointer;text-align: center;border-radius: 4px;font-size:16px"></td>
                            </tr>
                        </table>
                    </td>
                </form>
            </tr>
        </table>
    </div>    
</center>
</body>
</html>