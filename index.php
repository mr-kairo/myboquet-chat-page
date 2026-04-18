<?php

$path = $_SERVER['DOCUMENT_ROOT'];
include_once($path . '/seller_app_auth.php');
include_once "$path/cache-control/caching.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include $path . '/app/vendor/header-footer/head.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/assets/styles/framework.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.6.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="/app/vendor/header-footer/index.css<?= $myb_cache_version ?>">
    <link rel="stylesheet" href="/app/vendor/message/index.css<?= $myb_cache_version ?>">
    <link rel="stylesheet" href="/app/assets/styles/navbar.css<?= $myb_cache_version ?>">
    <link rel="stylesheet" href="/app/assets/styles/order.css<?= $myb_cache_version ?>">
    <title>Message Vendor - My Bouquet</title>
</head>

<body>

    <?php include $path . '/app/vendor/header-footer/header.php'; ?>

    <div class="message-page-container">
      <div id="message-wrapper">
        <div class="skeleton" style="height: 400px"></div>
      </div>
    </div>

    <?php   if(!empty($alert)){
        $alert_html = "<section class='modern-alert' id='modernAlert'> <div class='modern-alert-content'>";
        foreach($alert as $a){
            
                    
            if (isset($a['url']) && $a['url'] == $_SERVER['REQUEST_URI']) {
                continue;
            }

            $alert_html .= "<div class='modern-alert-info'>";
            $alert_html .= "<span class='modern-alert-icon'>ℹ️</span>";
            $alert_html .= "<span class='modern-alert-text'>".$a['text']."</span>";
            $alert_html .= "</div>";
            $alert_html .= "<div class='modern-alert-actions'>";
            if(!empty($a['url'])){
                $alert_html .= "<a href='".$a['url']."' class='modern-alert-button'>Go</a>";
            }
            $alert_html .= "<button id='closeModernAlert' onclick=\"document.getElementById('modernAlert').style.display='none';\" class='modern-alert-close'>×</button>";
            $alert_html .= "</div>";
            $alert_html .= "</div>";
        }
        $alert_html .= "</section>";
        echo $alert_html;
    }
    ?>

    <script>
        const buyerUUID = '<?= $_GET['uuid'] ?? '' ?>'
        const conversationId = '<?= $_GET['conversation_id'] ?? '' ?>'
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.8.1/socket.io.js" integrity="sha512-8BHxHDLsOHx+flIrQ0DrZcea7MkHqRU5GbTHmbdzMRnAaoCIkZ97PqZcXJkKZckMMhqfoeaJE+DNUVuyoQsO3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/app/vendor/header-footer/index.js<?= $myb_cache_version ?>"></script>
    <script src="/app/vendor/message/index.js<?= $myb_cache_version ?>"></script>
</body>

</html>