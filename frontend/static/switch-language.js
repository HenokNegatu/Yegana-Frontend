function switchLanguage(language){
    if (language === 'en'){
      localStorage.setItem("indexPage", "index.html")
      window.location.href = 'index.html';
      
     } else if (language === 'am'){
      localStorage.setItem("indexPage", "index-am.html")
      window.location.href = 'index-am.html';

    }
}