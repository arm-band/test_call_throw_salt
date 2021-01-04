<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->Helper->_h($this->config['sitename']); ?> - aError</title>
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
small {
    margin-left: .25rem;
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <a href="<?= $this->Helper->_h($this->config['base']); ?>"><h1>エラー<small><?= $this->Helper->_h($status['code']); ?></small></h1></a>
            <p><?= $this->Helper->_h($status['message']); ?></p>
        </div>
    </div>
</body>
</html>