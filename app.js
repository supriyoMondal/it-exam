function loadData() {
  let xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      let xmlDoc = this.responseXML;
      xhttp.open('POST', 'server.php', false);
      xhttp.send('xmlfile=', encodeURIComponent(xmlDoc));
    }
  };
  xhttp.open('GET', 'exam.xml', true);
  xhttp.send();
}

window.addEventListener('load', loadData);
