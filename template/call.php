<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->Helper->_h($this->config['sitename']); ?> - called sald</title>
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
            <a href="<?= $this->Helper->_h($this->config['base']); ?>"><h1><?= $this->Helper->_h($this->config['sitename']); ?> - called sald</h1></a>
        </div>
    </div>
    <form>
        <div class="container">
            <label for="hash">ハッシュ</label>
            <div>
                <input type="text" name="hash" id="hash" value="<?= $this->Helper->_h($result_array['result']); ?>">
            </div>
            <small><?= $this->Helper->_h($result_array['message']); ?></small>
        </div>
    </form>
</body>
</html>