<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户信息管理</title>
    <link rel="stylesheet" href="/ThinkPHP/Public/layui/css/layui.css">
    <script src="/ThinkPHP/Public/layui/layui.js"></script>
    <script src="/ThinkPHP/Public/layui/layui.all.js"></script>
    <script src="/ThinkPHP/Public/jquery.min.js"></script>
</head>
<body>
<div class="layui-container" style="margin-top: 50px;">
    <div class="layui-col-md12">
        <button class="layui-btn layui-btn-primary" onclick="Add();">
            <i class="layui-icon">&#xe654;</i>
            添加
        </button>
        <a class="layui-btn layui-btn-primary" href="">
            <i class="layui-icon">&#x1002;</i>
            刷新
        </a>
        <table class="layui-table">
            <colgroup>
                <col width="50">
                <col width="60">
                <col width="30">
                <col width="100">
                <col width="100">
                <col width="100">
                <col width="100">
            </colgroup>
            <thead>
            <tr>
                <th>编号</th>
                <th>姓名</th>
                <th>年龄</th>
                <th>邮箱</th>
                <th>添加时间</th>
                <th>修改时间</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><tr id="N<?php echo ($item["id"]); ?>">
                    <td align="center"><?php echo ($item["id"]); ?></td>
                    <td><?php echo ($item["name"]); ?></td>
                    <td><?php echo ($item["age"]); ?></td>
                    <td><?php echo ($item["email"]); ?></td>
                    <td><?php echo ($item["createat"]); ?></td>
                    <td><?php echo ($item["updateat"]); ?></td>
                    <td>
                        <div class="layui-btn-group">
                            <button onclick="Info(<?php echo ($item["id"]); ?>);" class="layui-btn layui-btn-primary layui-btn-small">
                                <i class="layui-icon">&#xe641;</i>
                            </button>
                            <button onclick="Edit(<?php echo ($item["id"]); ?>);" class="layui-btn layui-btn-primary layui-btn-small">
                                <i class="layui-icon">&#xe642;</i>
                            </button>
                            <button onclick="Del(<?php echo ($item["id"]); ?>);" class="layui-btn layui-btn-primary layui-btn-small">
                                <i class="layui-icon">&#xe640;</i>
                            </button>
                        </div>
                    </td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>

</div>

<script>
    function Info(id) {
        layui.use([['layer']], function () {
            var layer = layui.layer;
            $.get('<?php echo U("Info/");?>?id=' + id, {}, function (res) {
                layer.open({
                    title:'详细信息',
                    type: 1,
                    area: ['500px', '400px'],
                    content: res //注意，如果str是object，那么需要字符拼接。
                });
            });
        });
    }

    function Add() {
        layui.use([['layer']], function () {
            var layer = layui.layer;
            $.get('<?php echo U("Add");?>', {}, function (res) {
                layer.open({
                    title:'添加数据',
                    type: 1,
                    area: ['500px', '400px'],
                    content: res //注意，如果str是object，那么需要字符拼接。
                });
            });
        });
    }

    function Edit(id) {
        $.get('<?php echo U("Edit/");?>?id=' + id, {}, function (res) {
            layer.open({
                title:'编辑信息',
                type: 1,
                area: ['500px', '400px'],
                content: res //注意，如果str是object，那么需要字符拼接。
            });
        });
    }

    function Del(id) {
        layer.confirm('确定删除吗？', {
            btn: ['确认', '取消'] //按钮
        }, function () {
            $.get('<?php echo U("Del/");?>?id=' + id, {}, function (res) {
                if (res == '0') {
                    layer.msg('删除成功', {icon: 1});
                    $('#N' + id).remove();
                } else {
                    layer.msg('删除失败', {icon: 2});
                }
            });
        }, function () {

        });

    }
</script>

</body>
</html>