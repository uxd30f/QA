<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/studentSystem/Public/layui/css/layui.css">
</head>
<body style="">
        <table class="layui-table" style="margin: 10px;width: 480px;" >
            <tbody>
                <tr>
                    <td style="width: 50px;" align="center">编号</td>
                    <td style="width: 150px;"><?php echo ($item["id"]); ?></td>
                </tr>
                <tr>
                    <td align="center">姓名</td>
                    <td style="width: 50px;"><?php echo ($item["name"]); ?></td>
                </tr>
                <tr>
                    <td align="center">年龄</td>
                    <td style="width: 50px;"><?php echo ($item["archives"]["age"]); ?></td>
                </tr>
                <tr>
                    <td align="center">邮箱</td>
                    <td style="width: 50px;"><?php echo ($item["archives"]["email"]); ?></td>
                </tr>
                <tr>
                    <td align="center">添加时间</td>
                    <td style="width: 50px;"><?php echo ($item["createat"]); ?></td>
                </tr>
                <tr>
                    <td align="center">修改时间</td>
                    <td style="width: 50px;"><?php echo ($item["updateat"]); ?></td>
                </tr>
            </tbody>
        </table>
</body>
</html>