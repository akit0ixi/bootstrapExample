<?php
// ダミーデータの読み込み
require('data.php');

// 透過広告などを防ぐ
header('X-FRAME-OPTIONS:DENY');

// 特殊文字の処理をする短縮関数定義
function h($str){
  return htmlspecialchars($str,ENT_QUOTES,'UTF-8');
}

// ページ切り替え処理
$pageFlag = 0; #初期ページは0
if(!empty($_POST['reset'])){
  $pageFlag =0;
}elseif(!empty($_POST['cate'])){
  $pageFlag =1;
}


// 確認用
echo "<pre>";
var_dump($dammy->$categoryId[h($_POST['cate'])]);
echo "</pre>";
?>

<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>ぐーぐる検索</title>
  </head>
  <body>
    <h1>ぐーぐる検索</h1>
    <div>
    <?php if($pageFlag === 0):?>
      <form method="POST" action="index.php">
        <input type="submit" value="仕事" name="cate">
        <input type="submit" value="趣味" name="cate">
        <input type="submit" value="その他" name="cate">
        <!-- 追加ボタン -->
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCell">追加</button>
        <!-- 追加ボタン押下後のモーダル表示 -->
        <div class="modal fade" id="addCell" tabindex="-1" role="dialog" aria-labelledby="addCellModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCellModalTitle">ジャンル追加</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text">
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                       <button type="button" class="btn btn-info">登録</button>
                    </div>
                </div>
            </div>
        </div>
      </form>
    <?php endif;?>
    <?php if($pageFlag===1):?>
    <form method="POST" action="index.php">
    <ul>
    <?php if($dammy->$categoryId[h($_POST['cate'])] === 1):?>
    <?php for($i=0;$i<count($dammy->$words['work']);$i++):?>
    <li><?php echo $dammy->$words['work'][$i];?></li>
    <?php endfor;?>
    <?php endif;?>

    <?php if($dammy->$categoryId[h($_POST['cate'])] === 2):?>
    <?php for($i=0;$i<count($dammy->$words['hobby']);$i++):?>
    <li><?php echo $dammy->$words['hobby'][$i];?></li>
    <?php endfor;?>
    <?php endif;?>

    <?php if($dammy->$categoryId[h($_POST['cate'])] === 3):?>
    <?php for($i=0;$i<count($dammy->$words['other']);$i++):?>
    <li><?php echo $dammy->$words['other'][$i];?></li>
    <?php endfor;?>
    <?php endif;?>
    </ul>
    <input type="submit" value="トップに戻る" name="reset">
    </form>
    <?php endif;?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>