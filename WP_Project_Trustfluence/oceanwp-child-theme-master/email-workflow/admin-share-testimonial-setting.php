<?php
// Handle form submission
if (isset($_POST['submit'])) {
    // Get checkbox values
    $linkedin_enabled = isset($_POST['vehicle2']) ? 1 : 0;
    $facebook_enabled = isset($_POST['vehicle1']) ? 1 : 0;
    $instagram_enabled = isset($_POST['vehicle3']) ? 1 : 0;

    // Update options in wp_options table
    update_option('linkedin_enabled', $linkedin_enabled);
    update_option('facebook_enabled', $facebook_enabled);
    update_option('instagram_enabled', $instagram_enabled);
}

// Retrieve current option values
$linkedin_enabled = get_option('linkedin_enabled', 0);
$facebook_enabled = get_option('facebook_enabled', 0);
$instagram_enabled = get_option('instagram_enabled', 0);
?>

<style>
    .main-section{
        padding: 30px;
    }
    .head-share{
        text-align:center;
    }
.form-container {
    max-width: 100%;
    margin: 0 auto;
    padding: 40px;
    background-color: #f9f9f9;
}

.checkbox-group {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    padding: 5px;
}

.checkbox-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    padding-left: 10px;
}

.submit-button {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.submit-button:hover {
    background-color: #45a049;
}
</style>
<div class="main-section">
    <h1 class="head-share">Enable and Disable Share Option Setting</h2>
<div class="form-container">
    <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="checkbox-group">
            <input type="checkbox" id="vehicle1" name="vehicle1" value="1" <?php if ($facebook_enabled) echo 'checked'; ?>>
            <label for="vehicle1">Facebook</label>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="vehicle2" name="vehicle2" value="1" <?php if ($linkedin_enabled) echo 'checked'; ?>>
            <label for="vehicle2">LinkedIn</label>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="vehicle3" name="vehicle3" value="1" <?php if ($instagram_enabled) echo 'checked'; ?>>
            <label for="vehicle3">Instagram</label>
        </div>

        <input type="submit" name="submit" value="Save" class="submit-button">
    </form>
</div>
</div>