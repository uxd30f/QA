<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/studentSystem/Public/layui/css/layui.css">
    <script src="/studentSystem/Public/layui/layui.js"></script>
    <script src="/studentSystem/Public/jquery.min.js"></script>
    <script src="/studentSystem/Public/layui/layui.all.js"></script>
</head>
<body>
<div class="layui-form" style="width: 90%;padding-top: 5px;">
    <div class="layui-form-item">
        <label class="layui-form-label">姓名</label>
        <div class="layui-input-block">
            <input value="<?php echo ($item["name"]); ?>" type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input name">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">密码</label>
        <div class="layui-input-block">
            <input value="" type="text" name="title" placeholder="不改请留空" autocomplete="off" class="layui-input pwd">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">年龄</label>
        <div class="layui-input-block">
            <input value="<?php echo ($item["archives"]["age"]); ?>" type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input age">
        </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">邮箱</label>
        <div class="layui-input-block">
            <input value="<?php echo ($item["archives"]["email"]); ?>" type="text" name="title" required  lay-verify="required" placeholder="请输入标题" autocomplete="off" class="layui-input email">
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-input-block">
            <button class="layui-btn EditBtn" lay-submit lay-filter="formDemo">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
    <input type="hidden" name="" value="<?php echo ($item["id"]); ?>" class="id">
</div>


<script>
    $(function () {
        $('.EditBtn').click(function () {
            var name = $.trim($('.name').val());
            var age = $.trim($('.age').val());
            var email = $.trim($('.email').val());
            var pwd = $.trim($('.pwd').val());
            var id = $.trim($('.id').val());
            if (name.length == 0 || age.length == 0 || email.length == 0 ) {
                layer.msg('请填写数据', {
                    icon: 0
                });
            } else {
                $.post('<?php echo U("EditData");?>', {
                    Name: name,
                    Age: age,
                    Email: email,
                    Pwd: pwd,
                    id:id
                }, function (res) {
                    if (res == '0') {
                        layer.msg('修改成功', {
                            icon: 1
                        });
                        setTimeout(function () {
                            window.parent.location.reload();
                        },1000);
                    } else {
                        layer.msg('修改失败', {
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