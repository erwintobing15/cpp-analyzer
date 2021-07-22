<?php 
    if (isset($_POST['submit'])) {
        $inputCode = isset($_POST['inputCode']) ? $_POST['inputCode'] : "";

        $text_input = explode("\n", $inputCode);

        $token_output = [];
        foreach ($text_input as $key_row => $string_row) {
            $string_splitted = explode(" ", $string_row);
            $temp_arr = [];
            foreach ($string_splitted as $key_string => $string) {
            array_push($temp_arr, $string);
            }
            array_push($token_output, $temp_arr);
        }
    } else {
        $inputCode = "";
    };
?>

<div id="scanner-page">
    <div class="row">
        <div class="col-xs-12 col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="inputCode">Type code here!</label>
                    <textarea class="form-control" id="inputCode" name="inputCode" rows="25"><?php echo $inputCode; ?></textarea>
                </div>
                <input type="submit" name="submit" value="Run" class="btn btn-success"/>
                <button class="btn btn-danger" onclick="document.getElementById('inputCode').value = ''">
                    Clear
                </button>
            </form>
        </div>

        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                <!-- <label for="outputToken">Token List</label>
                <textarea class="form-control" id="outputToken" rows="25">

                </textarea> -->

                <label for="outputToken">Token List</label>
                <table class="scrolldown" id="outputToken">
                    <!-- Table head content -->
                    <thead>
                        <tr>
                            <th>Token</th>
                            <th>Line</th>
                            <th>Token</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>

                    <!-- Table body content -->
                    <tbody>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                            <td>Content</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php
                if ($inputCode != "") {
                    $counter = 1;
                    foreach ($token_output as $key => $string_splitted) {
                        foreach ($string_splitted as &$string) {
                            if (strlen($string) > 1) {
                            echo "Token " . $counter . " - Line " . $key+1 . " --> " . $string . "<br>";
                            $counter += 1;
                            }
                        }
                    }
                }
            ?>

        </div>
    </div> 
</div>