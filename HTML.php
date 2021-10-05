<?php
/**
 * HTML class is responsible for emitting main HTML tags.
 *
 * Currently, we use a simple HTML5 template as we are learning the PHP in "ITE220 Web Development 2" course.
 *
 * * Markdown style lists function too
 * * Just try this out once
 * * emitHeader()
 * * emitFooter()
 *
 * The section after the description contains the  tags; which provide
 * structured meta-data concerning the given element.
 *
 * @author Kimseng Houy, eyequickly@gmail.com
 * @copyright Nope, This follows copyleft
 *
 * @since 0.1
 *
 */

class HTML
{
    public $lang = "en";
    public $charset = "utf-8";
    public $title = "A Basic HTML% Template";
    public $viewport = "width=device-width, initial-scale=1";
    public $description = "A simple HTML5 Template for new projects.";
    public $author = "SitePoint";

    /**
     * Emits doctype, head, and open the body.
     */


    public function emitHeader($css_files = array(), $js_files = array())
    {
        echo "<!doctype html>\n";
        echo "<html lang= \"" . $this->lang . "\">\n";
        echo "<head>\n";
        echo "<meta charset=\"" . $this->charset . "\">\n";
        echo "<meta name=\"viewport\" content=\"" . $this->viewport . "\">\n";
        echo "<title>" . $this->title . "</title>\n";
        echo "<meta name=\"description\" content=\"" . $this->description . "\">\n";
        echo "<meta name=\"author\" content=\"" . $this->author . "\">\n";
        foreach ($css_files as $filename) {
            echo "<link rel=\"stylesheet\" href=\"" . $filename . "\">";
        }
        foreach ($js_files as $filename) {
            if ($filename !== "")
                echo " <script src=\"" . $filename . "\"></script>";
        }
        echo "</head>\n";
        echo "<body>\n";
    }


    /**
     * Emits closing body and html tags.
     */


    public function emitFooter()
    {
        echo "\n<footer class='page_footer'>\n";
        echo " <p> ITE220 - Wev development 2. 1/2021 Academic Semester.</p>\n";
        echo " <p> Stamford University, Bangkok, Thailand.</p>\n";
        echo " <p> &copy; MutexXO 2021.</p>\n";
        echo "</footer>\n";
        echo "\n</body>\n</html>\n";
    }


    /**
     * Emits the aside
     */
    public function emitAside()
    {
        echo "<aside class='page_aside'>
        <p>Menu</p>
        <nav class='page_aside_nav'>
        <ul id='side_menu'>
        <li><div>New Game</div>
         <ul>
        <li><div>Single Player (offline)</div></li>
         <li><div>Multi Player (online)</div></li>
         </ul>
        </li>
        <li><div>Tutorial</div>
        </li>
        <li><div>Instruction</div></li>

        <li><div>Shop</div></li>
        </ul>
        </nav>
        </aside>";
    }


    /**
     * Emits the navigation
     */


    public function emitNavigation()
    {
        echo "<nav class='page_nav'>\n";
        echo "<ol id='main_nav'>\n";
        echo "<li>Home</li>\n";
        echo "<li>Sign Up</li>\n";
        echo "<li>Login</li>\n";
        echo "<li>Contact Us</li>\n";
        echo "</ol>\n";
        echo "</div>\n";
    }

    /**
     * Emits the main
     */
    /**
     * @param $header_msg
     * @param $mainFunc String The name of function that emits the main content
     */

    public function emitMain($header_msg, $mainFunc)
    {
        echo "<main class='page_main'>\n";
        echo "<header class='page_header'>" . $header_msg . "</header>";
        $mainFunc();
        echo "</main>\n";
    }


    /**
     * @param $script
     */
    public function loadJS($script)
    {
        echo "\n<script src=\"" . $script . "\"></script>\n";
    }

}
