<div class="sidebar">
    <h1 class="helBold"><a href="/blog/admin">The<span>Blog</span><sup>ADMIN</sup></a> </h1>
    <ul class="sidebar__options helMed">
        <li class="sidebar__option <?php if($activeSidebarOption=="users") echo "active"; ?>">
           <a href="/blog/admin/users.php">Users</a> 
        </li>
        <li class="sidebar__option <?php if($activeSidebarOption=="categories") echo "active"; ?>">
            <a href="/blog/admin/categories.php">Categories</a>
        </li>
        <li class="sidebar__option <?php if($activeSidebarOption=="posts") echo "active"; ?>">
            <a href="/blog/admin/posts.php">Posts</a>
        </li>
        <li class="sidebar__option">
            <a href="/blog">Go to the Website</a>
        </li>
        <li class="sidebar__option">
            <a href="/blog/admin/logout.php">Log Out</a>
        </li>
       
    </ul>
</div>