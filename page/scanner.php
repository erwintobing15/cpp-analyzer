<?php 

    require './compiler/scanner/analyzer.php';
    require './compiler/scanner/tokens.php';
    
    $scanner = new Analyzer($alphabets,$numbers,$keywords,$operators,$special_symbols);

    if (isset($_POST['submit'])) {
        $inputCode = isset($_POST['inputCode']) ? $_POST['inputCode'] : "";

        $token_output = $scanner->generate_tokens($inputCode);

    } else {
        $inputCode = "";
    };

    // initialize tokens total
    $identifers_total = 0;
    $numbers_total = 0;
    $keywords_total = 0;
    $operators_total = 0;
    $special_symbols_total = 0;
    $constant_total = 0;
    $string_total = 0;
    $char_total = 0;
    $comment_total = 0;
    $unrecognized_total = 0;
?>

<div id="scanner-page">
    <div class="row">
        <!-- input code textarea -->
        <div class="col-xs-12 col-md-6">
            <form method="post">
                <div class="form-group">
                    <label for="inputCode">Type code here!</label>
                    <textarea class="lined" rows="31" name="inputCode" 
                    id="inputCode"><?php echo $inputCode; ?></textarea>
                </div>
                <input type="submit" name="submit" value="Run" class="btn btn-success"/>
                <button class="btn btn-danger" onclick="document.getElementById('inputCode').value = ''">
                    Clear
                </button>
            </form>

        </div>

        <div class="col-xs-12 col-md-6">
            <div class="form-group">

                <!-- table token list -->
                <label for="outputToken">Token List</label>
                <table class="scrolldown" id="outputToken">
                    <!-- Table head content -->
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Line</th>
                            <th>Token</th>
                            <th>Kategori</th>
                        </tr>
                    </thead>

                    <!-- Table body content -->
                    <tbody>
                    <?php if ($inputCode != "") { ?>
                    <?php $counter = 1;?>
                    <?php foreach ($token_output as $key => $string_splitted) { ?>
                        <?php foreach ($string_splitted as &$string) { ?>
                     
                                <?php echo "<tr>"; ?>
                                <?php echo "<td>" . $counter . "</td>"; ?>
                                <?php echo "<td>" . ($key+1) . "</td>"; ?>
                                <?php echo "<td>" . $string[0] . "</td>"; ?>
                                <?php echo "<td>" . $string[1] . "</td>"; ?>
                                <?php $counter += 1; ?>   
                                <?php echo "</tr>"; ?>

                                <?php 
                                // count total of every token category 
                                switch ($string[1]) {
                                    case "Identifier" : $identifers_total += 1; break;
                                    case "Number" : $numbers_total += 1; break;
                                    case "Keyword" : $keywords_total += 1; break;
                                    case "Operator" : $operators_total += 1; break;
                                    case "Special Symbol" : $special_symbols_total += 1; break;
                                    case "Constant" : $constant_total += 1; break;
                                    case "String" : $string_total += 1; break;
                                    case "Char" : $char_total += 1; break;
                                    case "Comment" : $comment_total += 1; break;
                                    case "Couldn't analyze token" : $unrecognized_total += 1; break;
                                }
                                ?>
                    
                        <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>
            </div>

            <!-- table token total -->
            <label for="tokenTotal">Total Token</label>
            <table id="tokenTotal">
                <thead>
                    <tr>
                        <th>Identifier</th>
                        <th>Number</th>
                        <th>Keyword</th>
                        <th>Operator</th>
                        <th>Special Symbol</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- display 0 as tokens total if there is no input code -->
                    <?php if (!isset($_POST['submit'])) { ?>
                        <tr>
                            <td>0</td>  
                            <td>0</td>  
                            <td>0</td>  
                            <td>0</td>  
                            <td>0</td>  
                        </tr>
                    <?php } ?>
                
                    <!-- display tokens total that already counted if there is input code -->
                    <?php if (isset($_POST['submit'])) {?>
                        <?php echo "<tr>"; ?>
                            <?php echo "<td>" . $identifers_total . "</td>"; ?>
                            <?php echo "<td>" . $numbers_total . "</td>"; ?> 
                            <?php echo "<td>" . $keywords_total . "</td>"; ?> 
                            <?php echo "<td>" . $operators_total . "</td>"; ?> 
                            <?php echo "<td>" . $special_symbols_total . "</td>"; ?> 
                        <?php echo "</tr>"; ?>
                    <?php }?> 
                </tbody>
            </table>

            <table>
                <thead>
                    <tr>
                        <th>Constant</th>
                        <th>String</th>
                        <th>Character</th>
                        <th>Comment</th>
                        <th>Error</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- display 0 as tokens total if there is no input code -->
                    <?php if (!isset($_POST['submit'])) { ?>
                        <tr>
                            <td>0</td>  
                            <td>0</td>  
                            <td>0</td>  
                            <td>0</td>  
                            <td>0</td>   
                        </tr>
                    <?php } ?>
                
                    <!-- display tokens total that already counted if there is input code -->
                    <?php if (isset($_POST['submit'])) {?>
                        <?php echo "<tr>"; ?>
                            <?php echo "<td>" . $constant_total . "</td>"; ?>
                            <?php echo "<td>" . $string_total . "</td>"; ?> 
                            <?php echo "<td>" . $char_total . "</td>"; ?> 
                            <?php echo "<td>" . $comment_total . "</td>"; ?> 
                            <?php echo "<td>" . $unrecognized_total . "</td>"; ?> 
                        <?php echo "</tr>"; ?>
                    <?php }?> 
                </tbody>
            </table>
        </div>
    </div> 
</div>