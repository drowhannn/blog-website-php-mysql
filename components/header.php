<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $title ?></title>
    <link rel="stylesheet" href="styles/global.css"/>
    <link rel="stylesheet" href="styles/header.css"/>
    <link rel="stylesheet" href="styles/allblogs.css"/>
    <link rel="stylesheet" href="styles/footer.css"/>
    <link rel="stylesheet" href="styles/blogDetail.css"/>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <nav>
     <h1 class="nav__title">
     <a href="/blog">Hamro<span>Sansar</span></a> 
     </h1>
     <ul class="nav__items">
      <li class="nav__item <?php if($activeNavItem=="Home") echo "active"; ?>"><a href="/blog">Home</a></li>
      <li class="nav__item <?php if($activeNavItem=="Trending") echo "active"; ?>"><a href="/blog/trending.php">Trending</a></li>
     </ul>
    </nav>