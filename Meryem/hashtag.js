/* 
  Select all paragraphs inside 
  of any divs with class "entry".
  Replace any hashtags with links.
*/

(function (win,doc) {
    'use strict';
    var siteURL = 'http://cdevroe.com',
        entries = doc.querySelectorAll('div.entry > p'),
        i;
    
    if ( entries.length > 0 ) {
      for (i = 0; i < entries.length; i = i + 1) {
        entries[i].innerHTML = entries[i].innerHTML.replace(/#(\S+)/g,'<a href="'+siteURL+'search/$1" title="Find more posts tagged with #$1">#$1</a>');
      }
    }
    
  }(this, this.document));