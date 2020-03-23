(function () {
    var session_key = window.localStorage.getItem('session_key')
    if (!session_key) {
      session_key = Math.floor(Date.now() / 1000)
      window.localStorage.setItem('session_key', session_key)
    }
  
    var payload = {
      url: window.location.href,
      host: window.location.hostname,
      action: 'visit',
      title: document.title,
      email: LoggedUser ? LoggedUser.email : null,
      session_key: session_key
    }
  
    $.post(window.location.protocol + '//' + window.location.host + "/api/stats", payload);
})()