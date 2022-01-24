<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"  content="width=device-width, initial-scale=1.0">
    <title>Mini Instagram</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-wrapper">
            <img src="./img/logo.PNG" class="brand-img" alt="">
            <input type="text" class="search-box" placeholder="search">
            <div class="nav-items">
                <img src="./img/home.PNG" class="icon" alt="">
                <img src="./img/messenger.PNG" class="icon" alt="">
                <img src="./img/add.PNG" class="icon" alt="">
                <img src="./img/explore.PNG" class="icon" alt="">
                <img src="./img/like.PNG" class="icon" alt="">
                <div class="icon user-profile"></div>
            </div>
        </div>
    </nav>
    <section class="main">
        <div class="wrapper">
            <div class="left-col">
                <div class="status-wrapper">
                    <div class="status-card">
                        <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                        <p class="username">user_name_1</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="img/cover 2.png" alt=""></div>
                        <p class="username">user_name_2</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="img/cover 2.png" alt=""></div>
                        <p class="username">user_name_3</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                        <p class="username">user_name_5</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                        <p class="username">user_name_6</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                        <p class="username">user_name_7</p>
                    </div>
                    <div class="status-card">
                        <div class="profile-pic"><img src="img/cover 3.png" alt=""></div>
                        <p class="username">user_name_3</p>
                    </div>
                    // +5 more status card elements.
            </div>
            <div class="wrapper">
                <div class="left-col">

                    <div class="post">
                        <div class="info">
                            <div class="user">
                                <div class="profile-pic"><img src="img/cover 1.png" alt=""></div>
                                <p class="username">modern_web_channel</p>
                            </div>
                            <img src="img/option.PNG" class="options" alt="">
                        </div>
                        <img src="img/cover 1.png" class="post-image" alt="">
                        <div class="post-content">
                            <div class="reaction-wrapper">
                                <img src="img/like.PNG" class="icon" alt="">
                                <img src="img/comment.PNG" class="icon" alt="">
                                <img src="img/send.PNG" class="icon" alt="">
                                <img src="img/save.PNG" class="save icon" alt="">
                            </div>
                            <p class="likes">1,012 likes</p>
                            <p class="description"><span>username </span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tenetur veritatis placeat, molestiae impedit aut provident eum quo natus molestias?</p>
                            <p class="post-time">2 minutes ago</p>
                        </div>
                        <div class="comment-wrapper">
                            <img src="img/smile.PNG" class="icon" alt="">
                            <input type="text" class="comment-box" placeholder="Add a comment">
                            <button class="comment-btn">post</button>
                        </div>
                    </div>
                    <div class="post">
                        <div class="info">
                            <div class="user">
                                <div class="profile-pic"><img src="img/cover 2.png" alt=""></div>
                                <p class="username">modern_web_channel</p>
                            </div>
                            <img src="img/option.PNG" class="options" alt="">
                        </div>
                        <img src="img/cover 2.png" class="post-image" alt="">
                        <div class="post-content">
                            <div class="reaction-wrapper">
                                <img src="img/like.PNG" class="icon" alt="">
                                <img src="img/comment.PNG" class="icon" alt="">
                                <img src="img/send.PNG" class="icon" alt="">
                                <img src="img/save.PNG" class="save icon" alt="">
                            </div>
                            <p class="likes">1,012 likes</p>
                            <p class="description"><span>username </span> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Pariatur tenetur veritatis placeat, molestiae impedit aut provident eum quo natus molestias?</p>
                            <p class="post-time">2 minutes ago</p>
                        </div>
                        <div class="comment-wrapper">
                            <img src="img/smile.PNG" class="icon" alt="">
                            <input type="text" class="comment-box" placeholder="Add a comment">
                            <button class="comment-btn">post</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="right-col">
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="./img/profile-pic.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">kunaal kumar</p>
                    </div>
                    <button class="action-btn">switch</button>
                </div>
                <p class="suggestion-text">Suggestions for you</p>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="./img/cover 9.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="./img/cover 10.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="./img/cover 11.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="./img/cover 12.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
                <div class="profile-card">
                    <div class="profile-pic">
                        <img src="./img/cover 13.png" alt="">
                    </div>
                    <div>
                        <p class="username">modern_web_channel</p>
                        <p class="sub-text">followed bu user</p>
                    </div>
                    <button class="action-btn">follow</button>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
