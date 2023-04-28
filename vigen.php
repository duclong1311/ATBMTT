<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$P=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');

function mahoa($s,$k) {
    global $P;
    $l=strlen($s);
    $tmp=Array();
    $roso=Array();
    $x=strlen($k);
    $makhoa=Array();
    $j=0;
    while($j<$l) {
        for($i=0;$i<26;$i++) {
            if($P[$i]==$s[$j]) {
                $roso[$j]=$i;
            }
        }
        $j++;
    }
    $t=0;
    while($t<$x) {
        for($i=0;$i<26;$i++) {
            if($P[$i]==$k[$t]) {
                $makhoa[$t]=$i;
            }
        }
        $t++;
    }
    $b=0;
    for($a=0;$a<$l;$a++) {
        if($b==$x) $b=0;
        $maso=($roso[$a]+$makhoa[$b])%26;
        $tmp[$a]=$P[$maso];
        $b++;
    }
    return implode($tmp);
}
function giaima($s,$k) {
    global $P;
    $l=strlen($s);
    $tmp=Array();
    $roso=Array();
    $x=strlen($k);
    $makhoa=Array();
    $j=0;
    while($j<$l) {
        for($i=0;$i<26;$i++) {
            if($P[$i]==$s[$j]) {
                $roso[$j]=$i;
            }
        }
        $j++;
    }
    $t=0;
    while($t<$x) {
        for($i=0;$i<26;$i++) {
            if($P[$i]==$k[$t]) {
                $makhoa[$t]=$i;
            }
        }
        $t++;
    }
    $b=0;
    for($a=0;$a<$l;$a++) {
        if($b==$x) $b=0;
        $maso=($roso[$a]+26-$makhoa[$b])%26;
        $tmp[$a]=$P[$maso];
        $b++;
    }
    return implode($tmp);
}  
?>
    <h1>Nhập xâu kí tự và khóa k</h1>
    <h4>Lưu ý: Không để khoảng trống khi nhập kí tự</h4>
    <form method="POST" action="">
    <table>
        <tr>
            <td style="padding: 10px">Nhập xâu kí tự:</td>
            <td style="padding: 10px"><input type="text" name="input" value="" /></td>
        </tr>
        <tr>
            <td style="padding: 10px">Nhập khóa k:</td>
            <td style="padding: 10px"><input type="text" name="k" value="" /></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td style="padding: 10px">
                <input type="submit" name= "encode" value="Mã hóa" style="margin-right: 10px;">
                <input type="submit" name="decode" value="Giải mã" style="margin-left: 20px;">
            </td>
        </tr>
        <tr>
            <td style="padding: 10px">Bản mã:</td>
            <?php 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['encode'])) {
                        if (empty($_POST['input'])) {
                            $s2 = 'Bạn chưa nhập xâu';
                        }
                        else if (empty($_POST['k'])) {
                            $s2 = 'Bạn chưa nhập k';
                        }                   
                        else {
                            $s1 = $_POST['input'];
                            $k = $_POST['k'];
                            $s2 = mahoa($s1, $k);
                            //$result_mahoa = hienthi($s2, $l); 
                        }                         
                    }
                    else {
                        $s1 = '';
                        $k = '';
                        $s2 = '';
                    }            
                }
            ?>
            <td style="padding: 10px"><input type="text" name="bm" value="<?php echo $s2; ?>"></td>
        </tr>
        <tr>
            <td style="padding: 10px">Bản rõ:</td>
            <?php 
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if (isset($_POST['decode'])) {
                        if (empty($_POST['input'])) {
                            $s3 = 'Bạn chưa nhập xâu';
                        }
                        else if (empty($_POST['k'])) {
                            $s3 = 'Bạn chưa nhập k';
                        }
                        else {
                            $s2 = $_POST['input'];
                            $k = $_POST['k'];
                            $s3 = giaima($s2, $k);
                            //$result_giaima = hienthi($s3 ,$l);
                        }                          
                    }
                    else {
                        $s2 = '';
                        $k = '';
                        $s3 = '';
                    }
                }
            ?>
            <td style="padding: 10px"><input type="text" name="br" value="<?php echo $s3; ?>"></td>
        </tr>
    </table>
</form>
</body>
</html>