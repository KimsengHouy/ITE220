<?php
/**
 * Form Class is responsible for emitting main form tags.
 *
 * @author Kimseng Houy, eyequickly@gmail.com
 * @copyright  Nope, This fellows copyleft
 *
 * @since 0.1
 */

class Form

{

    /**
     * @var string Default form processor script filename.
     */

    public $formProcessor = "dummyProcessor.php";
    public $addTable = false;


    /**
     * @param string $formProcessor the name of filename that contains the form processing logic.
     */

    public function __construct($formProcessor, $addTable = false)
    {

        $this->formProcessor = $formProcessor;
        $this->addTable = $addTable;

    }


    /**
     * Emits the beginning of a form.
     * @param string $title
     * @param string $validation_func
     */
    public function startForm($title = "", $validation_func = "")
    {
        if ($this->addTable) {
            echo "\n<table class='xo-form'>\n";
            echo "\n<th class='xo-form-header'>" . $title . "</th>";
        }
        if ($validation_func === "")

            echo "<form method=\"post\" action=\"" . $this->formProcessor . "\">";
        else
            echo "<form method=\"post\" action=\"" . $this->formProcessor . "\" onsubmit=\"return " .
                $validation_func . "(this)\">";


    }


    /**
     * Emits a simple message in the form.
     *
     * @param string $text a message to be echoed into the form.
     */

    public function emitText($text)
    {
        if ($this->addTable)
            echo "<td class='xo-form-col'>" . $text . "</td>";
        else
            echo $text;

    }


    /**
     * @param string $inputName name value for \<input\> tag.
     */

    public function emitInputText($inputName)
    {
        if ($this->addTable)
            echo "<td class='xo-form-col'>" . "<input type=\"text\" id = 'form_" . $inputName . "' name=\"" . $inputName . "\"><br>" . "</td>";
        else
            echo "<input type=\"text\" name=\"" . $inputName . "\"><br>";

    }

    /**
     * @param $inputPassword dot sign
     */
    public function emitInputPassword($inputPassword)
    {
        if ($this->addTable)
            echo "<td class='xo-form-col'>" . "<input type=\"password\" id = 'form_" . $inputPassword . "' name=\"" . $inputPassword . "\"><br>" . "</td>";
        else
            echo "<input type=\"password\" name=\"" . $inputPassword . "\"><br>";

    }


    /**
     * @param string $value the value field value for submit button.
     */

    public function emitSubmitBtn($value)
    {
        if ($this->addTable)
            echo "<td class='xo-form-col'>" . "<input type=\"submit\" value=\"" . $value . "\">" . "</td>";
        else
            echo "<input type=\"submit\" value=\"" . $value . "\">";

    }

    /**
     * @param $selectName
     * @param $selectID
     * @param $items
     */
    public function emitSelect($selectName, $selectID, $items)
    {
        if ($this->addTable) {
            echo "<td class='xo-form-col'>";
            echo "<select name=\"" . $selectName . "\" id='" . $selectID . "'>";
            foreach ($items as $item) {
                echo "<option id= \"" . $selectName . "_" . $item['id'] . "\" value=\"" . strtolower($item['name']) . "\"> " . $item['name'] . "</option>";
            }
            echo "</select></td>";
        } else {
            echo "<select name=\"" . $selectName . "\" id='" . $selectID . "'>";
            foreach ($items as $item) {
                echo "<option id= \"" . $selectName . "_" . $item['id'] . "\" value=\"" . strtolower($item['name']) . "\"> " . $item['name'] . "</option>";
            }
            echo "</select>";
        }
    }

    /**
     * @param $selectName
     * @param $id
     * @param $items
     */
    public function emitHiddenSelect($selectName, $id, $items)
    {
        echo "<select style=\"display:none\" name=\"" . $selectName . "\" id='" . $id . "'>";
        foreach ($items as $item) {
            echo "\n<option value=\"" . strtolower($item) . "\"> " . $item . "</option>";
        }
        echo "</select>";
    }

    /**
     * row in form
     */
    public function startRow()
    {
        echo "\n<tr class='xo-form-row'>";
    }

    public function endRow()
    {
        echo "</tr>";
    }


    /**
     * Emits the end of the form.
     */

    public function endForm()
    {
        if ($this->addTable)
            echo "\n</table> </form>";
        else
            echo "\n</form>";

    }

}