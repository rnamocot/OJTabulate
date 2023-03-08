<?php
function generateQRCodeLink($url) {
    // Generate QR code using qrcode.js library
    echo '<div id="qrcode"></div>';
    echo '<script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs/qrcode.min.js"></script>';
    echo '<script>';
    echo 'new QRCode(document.getElementById("qrcode"), "' . $url . '");';
    echo '</script>';
    // Add save button to download QR code image
    echo '<button id="save_btn">Save QR Code</button>';
    // JavaScript to save QR code image when "Save QR Code" button is clicked
    echo '<script>';
    echo 'const saveBtn = document.getElementById("save_btn");';
    echo 'const canvas = document.querySelector("canvas");';
    echo 'saveBtn.addEventListener("click", function() {';
    echo 'const dataUrl = canvas.toDataURL();';
    echo 'const filename = "' . basename($url) . '.png";';
    echo 'saveBtn.innerHTML = "Downloading...";';
    echo 'saveBtn.disabled = true;';
    echo 'const link = document.createElement("a");';
    echo 'link.download = filename;';
    echo 'link.href = dataUrl;';
    echo 'link.click();';
    echo 'saveBtn.innerHTML = "Save QR Code";';
    echo 'saveBtn.disabled = false;';
    echo '});';
    echo '</script>';
  }
?>


