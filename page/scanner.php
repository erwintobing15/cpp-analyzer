<?php 

    require './compiler/scanner/analyzer.php';
    require './compiler/scanner/tokens.php';
    
    $scanner = new Analyzer($identifiers,$constants,$keywords,$operators,$special_symbols);

    if (isset($_POST['submit'])) {
        $inputCode = isset($_POST['inputCode']) ? $_POST['inputCode'] : "";

        $token_output = $scanner->generate_tokens($inputCode);

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
                            <?php if (strlen($string) > 0) { ?>
                                <?php echo "<tr>"; ?>
                                <?php echo "<td>" . $counter . "</td>"; ?>
                                <?php echo "<td>" . ($key+1) . "</td>"; ?>
                                <?php echo "<td>" . $string . "</td>"; ?>
                                <?php echo "<td>" . $string . "</td>"; ?>
                                <?php $counter += 1; ?>   
                                <?php echo "</tr>"; ?>
                            <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> 
</div>