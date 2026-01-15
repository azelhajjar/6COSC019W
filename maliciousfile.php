<?php
echo '<!DOCTYPE html>';
echo '<html>';
echo '<head>';
echo '<title>You Have Been Hacked</title>';
echo '<style>';
echo 'body {';
echo '  background-color: black;';
echo '  color: #ff0000;';
echo '  font-family: "Courier New", Courier, monospace;';
echo '  text-align: center;';
echo '  padding-top: 100px;';
echo '  margin: 0;';
echo '  font-size: 30px;';
echo '  animation: glitch 1s infinite;';
echo '}';

echo 'h1 {';
echo '  font-size: 50px;';
echo '  text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0000;';
echo '}';

echo 'p {';
echo '  font-size: 20px;';
echo '  color: #ff0000;';
echo '  text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000;';
echo '}';

echo '@keyframes glitch {';
echo '  0% { text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0000; }';
echo '  20% { text-shadow: 2px 2px 0px #ff0000, -2px -2px 0px #ff0000; }';
echo '  40% { text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0000; }';
echo '  60% { text-shadow: -2px 2px 0px #ff0000, 2px -2px 0px #ff0000; }';
echo '  80% { text-shadow: 0 0 5px #ff0000, 0 0 10px #ff0000, 0 0 15px #ff0000; }';
echo '  100% { text-shadow: -2px -2px 0px #ff0000, 2px 2px 0px #ff0000; }';
echo '}';

echo 'canvas {';
echo '  position: absolute;';
echo '  top: 0;';
echo '  left: 0;';
echo '  width: 100%;';
echo '  height: 100%;';
echo '  z-index: -1;';
echo '}';

echo '.glitch-text {';
echo '  animation: glitch 1s infinite;';
echo '}';

echo '.smiley-container {';
echo '  display: flex;';
echo '  justify-content: center;';
echo '  align-items: center;';
echo '  gap: 20px;';
echo '  font-size: 40px;';
echo '}';

echo '.smiley {';
echo '  color: #ff0000;';
echo '  font-size: 40px;';
echo '  white-space: pre;';
echo '}';

echo '.ascii-art {';
echo '  font-size: 20px;';
echo '  line-height: 1.5;';
echo '  white-space: pre-wrap;';
echo '}';

echo '</style>';
echo '</head>';
echo '<body>';

echo '<canvas id="matrix"></canvas>';

echo '<script>';
echo 'const canvas = document.getElementById("matrix");';
echo 'const ctx = canvas.getContext("2d");';
echo 'canvas.width = window.innerWidth;';
echo 'canvas.height = window.innerHeight;';

echo 'const chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";';
echo 'const fontSize = 14;';
echo 'const columns = canvas.width / fontSize;';
echo 'const drops = Array(columns).fill(0);';

echo 'function draw() {';
echo '  ctx.fillStyle = "rgba(0, 0, 0, 0.1)";';
echo '  ctx.fillRect(0, 0, canvas.width, canvas.height);';
echo '  ctx.fillStyle = "#00ff00";';
echo '  ctx.font = fontSize + "px Courier";';

echo '  for (let i = 0; i < drops.length; i++) {';
echo '    const char = chars[Math.floor(Math.random() * chars.length)];';
echo '    ctx.fillText(char, i * fontSize, drops[i] * fontSize);';
echo '    if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {';
echo '      drops[i] = 0;';
echo '    }';
echo '    drops[i]++;';
echo '}';

echo 'setInterval(draw, 35);';
echo '</script>';

echo '<div class="smiley-container">';

// The smiley face
echo '<pre class="smiley">
   _____
  |     |
  |  O  |
  | \_/ |
  |     |
  |_____|
</pre>';

// The ASCII text "6COSC019W"
echo '<pre class="smiley">
  6   CCCC  OOO  SSS  CCCC   0   1  9   W   W
  6  C     O   O S    C     0   1  9   W   W
  6  C     O   O  SSS  C     0   1  9   W W W
  6  C     O   O    S  C     0   1  9   WW WW
  6   CCCC  OOO   SSS  CCCC   0   1  9   W   W
</pre>';

echo '</div>';

echo '<h1>YOU HAVE BEEN HACKED!</h1>';
echo '<h2>The RFI Activity Completed</h2>';
echo '<p>Warning: The system is vulnerable not only to the Local File Inclusion (LFI) attack but also to the remote one (RFI)! Take immediate action!</p>';
echo '<p>Take immediate action! Screenshot and think about your assignment answer.</p>';
echo '<p>Stay calm, and think about the Remote File Inclusion question in your assignment.</p>';

echo '</body>';
echo '</html>';
?>
