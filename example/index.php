<!DOCTYPE html>
<script type="module" defer src="https://cdn.skypack.dev/@hotwired/turbo"></script>

<turbo-frame id="lazy-loaded-content" src="/lazy-loaded-content.php"></turbo-frame>

<turbo-frame id="messages">
  <form action="/add-message.php" method="POST">
    <input type="text" name="message" placeholder="Message"><br>
    <button type="submit">Submit</button>
  </form>
</turbo-frame>
