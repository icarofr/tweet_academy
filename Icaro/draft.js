function hashtag(text) {
  var repl = text.replace(
    /#(\w+)/g,
    '<a href="tweetQuery.php?search=%23$1">#$1</a>'
  );
  return repl;
}
for (let i = 0; i < document.querySelectorAll(".tweet-innerhtml").length; i++) {
  document.querySelectorAll(".tweet-innerhtml")[i].innerHTML = hashtag(
    document.querySelectorAll(".tweet-innerhtml")[i].innerHTML
  );
}
