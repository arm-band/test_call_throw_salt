<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->Helper->_h($this->config['sitename']); ?></title>
    <meta name="description" content="<?= $this->Helper->_h($this->config['description']); ?>">
    <style>
form,
.container-fluid {
    padding: 1rem;
}
.container {
    padding: .5rem 1rem;
    display: flex;
    flex-direction: column;
    justify-content: space-around;
    align-items: center;
}
.container label,
.container div {
    padding-bottom: .25rem;
    width: 100%;
}
input {
    font-size: 1rem;
    line-height: 1.25;
    padding: 0.25rem;
    width: 100%;
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <a href="<?= $this->Helper->_h($this->config['base']); ?>"><h1><?= $this->Helper->_h($this->config['sitename']); ?></h1></a>
        </div>
    </div>
    <form action="<?= $this->Helper->_h($this->config['base']); ?>call/" method="post">
        <div class="container">
            <label for="pswd">パスワード文字列</label>
            <div>
                <input type="text" name="pswd" id="pswd" placeholder="password" required>
            </div>
        </div>
        <div class="container">
            <label for="salt">ソルト</label>
            <div>
                <input type="text" name="salt" id="salt" placeholder="salt">
            </div>
        </div>
        <div class="container">
            <button type="submit">ハッシュを計算</button>
        </div>
    </form>
</body>
</html>