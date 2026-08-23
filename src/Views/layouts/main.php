<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $title ?? 'Portfolio' ?></title>
</head>
<body>

    <header>
        <h1>My Portfolio</h1>
    </header>

    <main>
    <?php echo $content ?? ''; ?>
    </main>

    <footer>
        <p>&copy; <?php echo date('Y'); ?> My Portfolio</p>
    </footer>

</body>
</html>