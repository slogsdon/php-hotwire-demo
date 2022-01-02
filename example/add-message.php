<?php

require '../vendor/autoload.php';

\Slogsdon\Hotwire\Turbo\respondAsTurboStream();

$messageCount = false;

if (file_exists('message-counter')) {
  $messageCount = file_get_contents('message-counter');
}

if ($messageCount === false) {
  $messageCount = 0;
}

$messageCount++;

file_put_contents('message-counter', (string) $messageCount);
?>
<turbo-stream action="append" target="messages">
  <template>
    <div id="message-<?= $messageCount ?>"><?= $_POST['message'] ?></div>
  </template>
</turbo-stream>
