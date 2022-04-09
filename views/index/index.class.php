<?php
/*
* Author: Oluwatishe Elesinnla
 * Date: April 7 2022
 * Name: guest_index.class.php
 * Description: This class defines a method called "display", which displays all guests.
 */
class GuestIndex extends GuestIndexView {
    /*
     * the display method accepts an array of guest objects and displays
     * them in a grid.
     */

    public function display($guest) {
        //display page header
        parent::displayHeader("List All Guests");

        ?>
        <div id="main-header"> Guest in the Library</div>

        <div class="grid-container">
            <?php
            if ($guest === 0) {
                echo "No guest was found.<br><br><br><br><br>";
            } else {
                //display guests in a grid; six guests per row
                foreach ($guest as $i => $guest) {
                    $id = $guest->getId();
                    $title = $guest->getTitle();
                    $rating = $guest->getRating();
                    $release_date = new \DateTime($guest->getRelease_date());
                    $image = $guest->getImage();
                    if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                        $image = BASE_URL . "/" . GUEST_IMG . $image;
                    }
                    if ($i % 6 == 0) {
                        echo "<div class='row'>";
                    }

                    echo "<div class='col'><p><a href='", BASE_URL, "/guest/detail/$id'><img src='" . $image .
                        "'></a><span>$title<br>Rated $rating<br>" . $release_date->format('m-d-Y') . "</span></p></div>";
                    ?>
                    <?php
                    if ($i % 6 == 5 || $i == count($guest) - 1) {
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>

        <?php
        //display page footer

        parent::displayFooter();
    } //end of display method

}
