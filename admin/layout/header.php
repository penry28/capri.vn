<div class="main-act-aizo">
    <div class="container-fluid">
        <div class="grid-row">
            <div class="grid-column-1">
                <div class="left-act-aizo">
                    <i id="full-screen" class="icon aizo-menu-task"></i>
                    <script class="script-edit-screen">
                        let btnFullScreen = document.getElementById("full-screen");
                        let el = document.getElementById("app");
                        btnFullScreen.addEventListener('click', () => {
                            if (el.classList.contains('full-screen')) {
                                el.classList.remove('full-screen');
                                localStorage.removeItem('screenFullSize');
                            } else {
                                el.classList.add('full-screen');
                                localStorage.setItem('screenFullSize',true);
                            }
                        });

                        let localScreenFullSize = localStorage.getItem('screenFullSize');
                        if(localScreenFullSize === null) {
                            el.classList.remove('full-screen');
                        } else {
                            el.classList.add('full-screen');
                        }
                    </script>
                </div>
            </div>
            <div class="grid-column-6">
                <div class="midd-act-aizo">
                    <form action="" method="GET" class="formSearch">
                        <input type="text" name="q" id="q" class="form-control" autocomplete="off" spellcheck="false" placeholder="Search something ..." />
                        <button type="submit" name="btnS">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="grid-column-5">
                <div class="right-act-aizo">
                    <ul class="list">
                        <li>
                            <a href="<?php echo base_url("?mod=support&status=news"); ?>" id="notification-message" title="Có <?php echo getNumMessSupportNew(); ?> tin nhắn mới" class="item">
                                <i class="icon aizo-mail"></i>
                                <span class="indicator"><?php echo getNumMessSupportNew(); ?></span>
                            </a>
                        </li>
                        <li>
                            <a href="" class="item" onclick="functionNotFunction()">
                                <i class="icon aizo-alarm"></i>
                                <span class="indicator"></span>
                            </a>
                        </li>
                        <li>
                            <a href="" id="user-manager-top" class="item" data-toggle-modal="#user-manager-top">
                                <i class="icon aizo-user"></i>
                                <span class="username">Hùng</span>
                                <i class="icon aizo-down-arrow"></i>
                            </a>
                            <div role="menu" class="author-user-top">
                                <span class="close-author-message" data-close-modal="#user-manager-top">
                                    <i class="icon aizo-close"></i> 
                                </span>
                                <div class="user-single-top">
                                    <h4 class="user-single-title">User manager</h4>
                                </div>
                                <div class="user-menu">
                                    <ul>
                                        <li>
                                            <a href="" class="user-menu-item">
                                                <i class="icon aizo-user"></i>
                                                <span class="aizo-text">My Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="?mod=users&controler=regis&action=regis" class="user-menu-item">
                                                <i class="icon aizo-home"></i>
                                                <span class="aizo-text">Register</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="" class="user-menu-item">
                                                <i class="icon aizo-settings"></i>
                                                <span class="aizo-text">Setting</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="?mod=users&action=logout" class="user-menu-item">
                                                <i class="icon aizo-unlocked"></i>
                                                <span class="aizo-text">Log Out</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>