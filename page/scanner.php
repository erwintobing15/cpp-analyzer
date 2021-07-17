<?php 
    if (isset($_POST['submit'])) {
        $inputCodeRaw = isset($_POST['inputCode']) ? $_POST['inputCode'] : "";
        $inputCode = trim($inputCodeRaw);
    } else {
        $inputCode = "";
    };
?>

<div id="scanner-page">
    <div class="row">
        <div class="col-xs-12 col-md-8">
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

        <div class="col-xs-12 col-md-4">
            <div class="form-group">
                <label for="outputToken">Token List</label>
                <textarea class="form-control" id="outputToken" rows="25"><?php echo $inputCode; ?></textarea>
            </div>
        </div>
    </div> 
</div>