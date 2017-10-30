<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/ThinkPHP/Public/layui/css/layui.css">
    <script src="/ThinkPHP/Public/layui/layui.js"></script>
    <script src="/ThinkPHP/Public/layui/layui.all.js"></script>
    <script src="/ThinkPHP/Public/jquery.min.js"></script>
</head>
<body>
<div class="layui-form" style="width: 90%;padding-top: 50px;">
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block">
            <input value="" type="text" name="title" placeholder="请输入姓名" class="layui-input name">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input value="" type="text" name="title" placeholder="请输入密码" class="layui-input pwd">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-block">
            <input value="" type="text" name="title" placeholder="请输入年龄" class="layui-input age">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-block">
            <input value="" type="text" name="title" placeholder="请输入邮箱" class="layui-input email">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn AddBtn">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</div>

<script>
    $(function () {
        $('.AddBtn').click(function () {
            var name = $.trim($('.name').val());
            var age = $.trim($('.age').val());
            var email = $.trim($('.email').val());
            var pwd = $.trim($('.pwd').val());
            console.log(name);
            console.log(age);
            console.log(email);
            if (name.length == 0 || age.length == 0 || email.length == 0 || pwd.length == 0) {
                layer.msg('请填写数据', {
                    icon: 0
                });
            } else {
                $.post('<?php echo U("AddData");?>', {
                    Name: name,
                    Age: age,
                    Email: email,
                    Pwd: pwd
                }, function (res) {
                    if (res == '0') {
                        layer.msg('添加成功', {
                            icon: 1
                        });
                        setTimeout(function () {
                            window.parent.location.reload();
                        },1000);
                    } else {
                        layer.msg('添加失败', {
                            icon: 0
                        });
                        layer.closeAll();
                    }
                })
            }
        });
    })
</script>
</body>
</html>