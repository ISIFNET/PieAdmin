# 单/复选框

## 单选框

通过 `Dcat\Admin\Widgets\Radio`类可以很方便地快速构建单选框表单。

### 基本使用

```php
<?php
use Dcat\Admin\Widgets\Radio;

// 表单 name 属性
$name = 'state';
// 选项
$options = [
   1 => '未处理',
   2 => '已处理',
   3 => '已拒绝',
];

$radio = Radio::make($name, $options)->check(1); // 选中第一个选项
```

效果
![](https://cdn.learnku.com/uploads/images/202004/26/38389/Q8GjIW9KyN.png!large)


### 显示在同一行 (inline)

```php
<?php
use Dcat\Admin\Widgets\Radio;

$name = 'state';
$options = [
   1 => '未处理',
   2 => '已处理',
   3 => '已拒绝',
];

$radio = Radio::make($name, $options)->check(1)->inline();
```
效果
![](https://cdn.learnku.com/uploads/images/202004/26/38389/aoTE8xwZEu.png!large)

### 设置禁选的选项 (disable)


```php
<?php
use Dcat\Admin\Widgets\Radio;

$name = 'state';
$options = [
   1 => '未处理',
   2 => '已处理',
   3 => '已拒绝',
];

$radio = Radio::make($name, $options)->inline()->disable([2, 3]);
```
效果
![](https://cdn.learnku.com/uploads/images/202004/26/38389/8Pf2f2sUi6.png!large)


### 设置样式 (style)

通过`style`方法可以设置单选框的样式，支持`primary`、`info`、`success`、`danger`。

### 设置尺寸

单选框支持3种尺寸，使用方法如下


`small`设置为小尺寸
```php
$radio->small();
```

`large`设置为大尺寸
```php
$radio->large();
```


## 复选框

通过 `Dcat\Admin\Widgets\Checkbox`类可以很方便地快速构建复选框表单，并且复选框类是属于`Radio`的子类，因此用法与`Radio`类基本一致。

### 基本用法

```php
<?php
use Dcat\Admin\Widgets\Checkbox;

// 表单 name 属性，因为此处是多选，所以需要加上中括号
$name = 'hobbies[]';
// 选项
$options = [
   1 => '唱',
   2 => '跳',
   3 => 'RAP',
   4 => '打篮球',
];

$checkbox = Checkbox::make($name, $options)
    ->inline()
    ->check([1, 2]); // 这里允许传递数组，默认选中多个选项
```

效果
![](https://cdn.learnku.com/uploads/images/202004/26/38389/KBAtO6uYvb.png!large)


### 全选

通过`checkAll`方法可以选中全部选项。

```php
<?php
use Dcat\Admin\Widgets\Checkbox;

// 表单 name 属性，因为此处是多选，所以需要加上中括号
$name = 'hobbies[]';
// 选项
$options = [
   1 => '唱',
   2 => '跳',
   3 => 'RAP',
   4 => '打篮球',
];

$checkbox = Checkbox::make($name, $options)
    ->inline()
    ->checkAll(); // 全部选中
```

`checkAll`方法也允许全选的同时排除指定选项。

```php
$checkbox = Checkbox::make($name, $options)
    ->inline()
    ->checkAll([1, 3]); // 全部选中，但是排除key为1和3的选项
```

### 更多用法

更多用法与`Radio`的用法一致，这里不再赘述。

