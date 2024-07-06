            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title" data-key="t-menu">Menu</li>
                            <li>
                                <a href="./">
                                    <i data-feather="home"></i>
                                    <span data-key="t-dashboard">Dashboard</span>
                                </a>
                            </li>
                            <?php
                            if (in_array("Manage Staff", $roleview) || in_array("All", $roleview)) {
                            ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-apps">Manage Staff</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li>
                                            <a href="manage-admin-users.php">
                                                <span data-key="t-calendar">Admin User</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="manage-assign-role.php">
                                                <span data-key="t-chat">Authorise Role</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="manage-admin-permission.php">
                                                <span data-key="t-chat">Permission </span>
                                            </a>
                                        </li>


                                    </ul>
                                </li>
                            <?php
                            }
                            if (in_array("Banner", $roleview) || in_array("All", $roleview)) {
                            ?>

                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-apps">Basic Cources Section's</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">

                                        <li>
                                            <a href="phase-list.php">
                                                <span data-key="t-chat">Add Phase</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="lesson.php">
                                                <span data-key="t-calendar">Add lesson</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="fill-in-the-blank.php">
                                                <span data-key="t-chat"> Fill In the Blanks</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="rearragments-Of-the-Sentences.php">
                                                <span data-key="t-chat"> Rearragments Of the Sentences </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="find-out-the-correct-sentence.php">
                                                <span data-key="t-chat"> find out the correct sentence</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="listen-type.php">
                                                <span data-key="t-chat"> Listen & Type</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="conversation.php">
                                                <span data-key="t-chat"> Conversation</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="Story.php">
                                                <span data-key="t-chat">Story</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="answer-the-questions.php">
                                                <span data-key="t-chat">Answer the questions</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="finding-the-gems.php">
                                                <span data-key="t-chat">Finding the Gems</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="listen-select-the-correct-sentence.php">
                                                <span data-key="t-chat">Listen & select the correct sentence</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="fill-the-code-from-video-tips.php">
                                                <span data-key="t-chat">Fill the code from video tips</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            <?php
                            }
                            if (in_array("About Us", $roleview) || in_array("All", $roleview)) {
                            ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-apps">Practice Section's</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">

                                        <li>
                                            <a href="tips.php">
                                                <span data-key="t-chat">Tips</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="news.php">
                                                <span data-key="t-calendar">News</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="artical.php">
                                                <span data-key="t-chat"> Artical</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="videos.php">
                                                <span data-key="t-chat">Video's</span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="audios.php">
                                                <span data-key="t-chat"> Audio's</span>
                                            </a>
                                        </li>

                                        <!-- <li>
                                            <a href="conversation.php">
                                                <span data-key="t-chat"> Conversation</span>
                                            </a>
                                        </li> -->
                                        <!-- <li>
                                            <a href="book.php">
                                                <span data-key="t-chat">Books</span>
                                            </a>
                                        </li> -->
                                    </ul>
                                </li>
                            <?php
                            }
                            if (in_array("Our Service", $roleview) || in_array("All", $roleview)) {
                            ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-apps">Book's Section's</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">

                                        <li>
                                            <a href="book.php">
                                                <span data-key="t-chat">Book Name</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="book-chapter.php">
                                                <span data-key="t-calendar">Books Chapter's</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            <?php
                            }
                            if (in_array("Testimonials", $roleview) || in_array("All", $roleview)) {
                            ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-apps">Game Section's</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">

                                        <li>
                                            <a href="tea-game.php">
                                                <span data-key="t-chat">Tea Game's</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="hangman-game.php">
                                                <span data-key="t-calendar">Hangman Game's</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="spellbee-game.php">
                                                <span data-key="t-calendar">Spellbee Game</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            <?php
                            }
                            if (in_array("Blogs", $roleview) || in_array("All", $roleview)) {
                            ?>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow">
                                        <i data-feather="grid"></i>
                                        <span data-key="t-apps">Message Section's</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">

                                        <li>
                                            <a href="ask-question-students.php">
                                                <span data-key="t-chat">Ask Questions By Students</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="word-of-the-day.php">
                                                <span data-key="t-calendar">Word of the Day</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="tip-of-the-day.php">
                                                <span data-key="t-calendar">Tip of the day</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>
                            <?php
                            }
                            ?>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->