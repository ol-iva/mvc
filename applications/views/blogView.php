<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="text/stylesheet" href="../../public/css/blogCSS.css">

    <title>Blog – Coffee art</title>
</head>

<body class="blog">
    <header>
        <div class="navbar-menu">
            <ul class="row">
                <li class="offset-2 col-3">
                    <a href="#index">HOME</a>
                </li>
                <li class="col-3">
                    <a href="#blog">BLOG</a>
                </li>
                <li class="col-3">
                    <a href="#contact">CONTACT</a>
                </li>
            </ul>
        </div>
    </header>
   <section id="content">
   <?php foreach ($articleList as $articleItem):?>
    <article class="post">
        <h2 class="title"><?php echo $articlesItem['title'];?></h2>
        <p class="category">

        </p>
        <div class="post-content">
            <p><?php echo $articlesItem['content'];?></p>
        </div>
        <div class="meta">
            <p class="links"><a href="/blog/cofee/<?php echo $articlesItem['id'];?>">Read more</a></p>
        </div>

    </article>
    <?php endforeach;?>
   </section>


   </body>
</html>