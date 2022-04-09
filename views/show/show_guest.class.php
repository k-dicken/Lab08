<?php
/*
 * Author: Oluwatishe Elesinnla
 * Date: April 7 2022
 * Name: guest_index_view.class.php
 * Description: the parent class that displays a search box.
 * The javascript varaiable media specifies the media type. This variable is needed for auto suggestion.
 */

class GuestIndexView extends IndexView {

    public static function displayHeader($title) {
        parent::displayHeader($title)
        ?>
        <script>
            //the media type
            var media = "guest";
        </script>
        <!--create the search bar -->
        <div id="searchbar">
            <form method="get" action="<?= BASE_URL ?>/guest/search">
                <input type="text" name="query-terms" id="searchtextbox" placeholder="Search guests by title" autocomplete="off" onkeyup="handleKeyUp(event)">
                <input type="submit" value="Go" />
            </form>
            <div id="suggestionDiv"></div>
        </div>

        //update a guest in the database
        public function update($id) {
        //update the guest
        $update = $this->guest_model->update_guest($id);
        if (!$update) {
        //handle errors
        $message = "There was a problem updating the guest id='" . $id . "'.";
        $this->error($message);
        return;
        }

        //display the updated guest details
        $confirm = "The guest was successfully updated.";
        $guest = $this->guest_model->view_guest($id);

        $view = new GuestDetail();
        $view->display($guest, $confirm);
        }
        <?php
    }

    public static function displayFooter()
    {
        parent::displayFooter();

        //update a guest in the database
        public
        function update($id)
        {
            //update the guest
            $update = $this->guest_model->update_guest($id);
            if (!$update) {
                //handle errors
                $message = "There was a problem updating the guest id='" . $id . "'.";
                $this->error($message);
                return;
            }

            //display the updateed guest details
            $confirm = "The guest was successfully updated.";
            $guest = $this->guest_model->view_guest($id);

            $view = new GuestDetail();
            $view->display($guest, $confirm);

            public
            function update_guest($id)
            {
                //if the script did not received post data, display an error message and then terminite the script immediately
                if (!filter_has_var(INPUT_POST, 'title') ||
                    !filter_has_var(INPUT_POST, 'rating') ||
                    !filter_has_var(INPUT_POST, 'release_date') ||
                    !filter_has_var(INPUT_POST, 'director') ||
                    !filter_has_var(INPUT_POST, 'image') ||
                    !filter_has_var(INPUT_POST, 'description')) {

                    return false;
                }

                //retrieve data for the new guest; data are sanitized and escaped for security.
                $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
                $rating = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING)));
                $release_date = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'release_date', FILTER_DEFAULT));
                $director = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING)));
                $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
                $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

                //query string for update
                $sql = "UPDATE " . $this->tblGuest .
                    " SET title='$title', rating='$rating', release_date='$release_date', director='$director', "
                    . "image='$image', description='$description' WHERE id='$id'";

                //execute the query
                return $this->dbConnection->query($sql);

                public
                function update_guest($id)
                {
                    //if the script did not received post data, display an error message and then terminite the script immediately
                    if (!filter_has_var(INPUT_POST, 'title') ||
                        !filter_has_var(INPUT_POST, 'rating') ||
                        !filter_has_var(INPUT_POST, 'release_date') ||
                        !filter_has_var(INPUT_POST, 'director') ||
                        !filter_has_var(INPUT_POST, 'image') ||
                        !filter_has_var(INPUT_POST, 'description')) {

                        return false;
                    }

                    //retrieve data for the new guest; data are sanitized and escaped for security.
                    $title = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
                    $rating = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING)));
                    $release_date = $this->dbConnection->real_escape_string(filter_input(INPUT_POST, 'release_date', FILTER_DEFAULT));
                    $director = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'director', FILTER_SANITIZE_STRING)));
                    $image = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
                    $description = $this->dbConnection->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

                    //query string for update
                    $sql = "UPDATE " . $this->tblGuest .
                        " SET title='$title', rating='$rating', release_date='$release_date', director='$director', "
                        . "image='$image', description='$description' WHERE id='$id'";

                    //execute the query
                    return $this->dbConnection->query($sql);
                }
            }
        }

    }
}
