let themeValue = 0;
window.onload = function() {
  if (document.cookie == "themeValue=0") {
    document.querySelector(".navbar").style.backgroundColor = "";
    document.body.style.backgroundColor = "";
    for (let i = 0; i < document.querySelectorAll("div").length; i++) {
      document.querySelectorAll("div")[i].style.backgroundColor = "";
    }
    for (
      let i = 0;
      i < document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label").length;
      i++
    ) {
      document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label")[
        i
      ].style.color = "";
    }
    themeValue = 0;
  } else if (document.cookie == "themeValue=1") {
    document.body.style.backgroundColor = "black";
    for (let i = 0; i < document.querySelectorAll("div").length; i++) {
      document.querySelectorAll("div")[i].style.backgroundColor = "black";
    }
    for (
      let i = 0;
      i < document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label").length;
      i++
    ) {
      document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label")[
        i
      ].style.color = "white";
    }
    themeValue = 1;
  }
};

function switchTheme() {
  if (themeValue == 0) {
    document.cookie = "themeValue=1";
    document.body.style.backgroundColor = "black";
    for (let i = 0; i < document.querySelectorAll("div").length; i++) {
      document.querySelectorAll("div")[i].style.backgroundColor = "black";
    }
    for (
      let i = 0;
      i < document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label").length;
      i++
    ) {
      document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label")[
        i
      ].style.color = "white";
    }
    themeValue = 1;
  } else if (themeValue == 1) {
    document.cookie = "themeValue=0";
    document.querySelector(".navbar").style.backgroundColor = "";
    document.body.style.backgroundColor = "";
    for (let i = 0; i < document.querySelectorAll("div").length; i++) {
      document.querySelectorAll("div")[i].style.backgroundColor = "";
    }
    for (
      let i = 0;
      i < document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label").length;
      i++
    ) {
      document.querySelectorAll("h1, h2, h3, h4, h5, h6, p, label")[
        i
      ].style.color = "";
    }
    themeValue = 0;
  }
}
