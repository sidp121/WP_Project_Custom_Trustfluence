<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
 *
 * @package OceanWP WordPress theme
 */

get_header(); ?>


     
 <script src="https://kit.fontawesome.com/704ff50790.js" 
         crossorigin="anonymous">
 </script>
 <style>
    .main-section-share-button {
        max-width: 900px;
        margin: 0 auto;
        width: 100%;
        text-align: center;
        padding: 150px 0;
    }
    .share-buttons-section {
    display: flex;
    align-items: center;
    justify-content: center;
}
    .share-button {
        padding: 5px;
        margin: 10px;
        background-color: #E4405F;
        border: none;
        color: white;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 40px;
        width: 120px;
        border-radius: 5px;
    }

    .share-button:hover {
        background-color: #BD3D5D;
    }

    .share-button i {
        margin-right: 5px;
    }

    .img-section {
        padding-bottom: 30px;
    }
</style>

<div class="main-section-share-button">
    <div class="img-section">
        <img src="https://trustfluence-reviews.ch/wp-content/uploads/2023/02/Bitmap.png" class="share-img" alt="">
    </div>
    <div class="share-buttons-section">
        <?php
        $facebook_enabled = get_option('facebook_enabled', 0);
        $linkedin_enabled = get_option('linkedin_enabled', 0);
        $instagram_enabled = get_option('instagram_enabled', 0);
        $share_image_url = "https://trustfluence-reviews.ch/wp-content/uploads/2023/02/Bitmap.png"; // Replace with the actual URL of the share image
        $share_url = "https://trustfluence-reviews.ch/wp-content/uploads/2023/02/Bitmap.png"; // Replace with the URL you want to share
        ?>

        <?php if ($facebook_enabled) : ?>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($share_image_url); ?>" target="_blank" rel="noopener noreferrer">
                <button class="share-button facebook">
                    <i class="fab fa-facebook-f"></i>
                    <span>Facebook</span>
                </button>
            </a>
        <?php endif; ?>

        <?php if ($linkedin_enabled) : ?>
            <?php if (wp_is_mobile()) : ?>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode($share_url); ?>&title=&summary=&source=" target="_blank" rel="noopener noreferrer">
                    <button class="share-button linkedin">
                        <i class="fab fa-linkedin-in"></i>
                        <span>LinkedIn</span>
                    </button>
                </a>
            <?php else : ?>
                <button class="share-button linkedin" onclick="shareOnLinkedIn('<?php echo $share_url; ?>')">
                    <i class="fab fa-linkedin-in"></i>
                    <span>LinkedIn</span>
                </button>
            <?php endif; ?>
        <?php endif; ?>

        <?php if ($instagram_enabled) : ?>
            <!-- Instagram sharing functionality is limited to their mobile app -->
            <button class="share-button instagram" onclick="shareOnInstagram('<?php echo $share_image_url; ?>')">
                <i class="fab fa-instagram"></i>
                <span>Instagram</span>
            </button>
        <?php endif; ?>
    </div>
</div>

<script>
    // Function to open LinkedIn sharing
    function shareOnLinkedIn(shareUrl) {
        var url = "https://www.linkedin.com/shareArticle?mini=true&url=" + encodeURIComponent(shareUrl) + "&title=&summary=&source=";
        window.open(url, "_blank");
    }

    // Function to open Instagram sharing in the mobile app
    function shareOnInstagram(imageUrl) {
        // Generate the Instagram sharing URL
        var url = "instagram://library?AssetPath=" + encodeURIComponent(imageUrl);
        window.location.href = url;
    }
</script>




<?php get_footer(); ?>