	// Let's check if the browser supports notifications
	if (!("Notification" in window)) {
// 		alert("Este Navegador no soporta Notificaciones en el Escritorio , le recomendamos use Google Chrome o Firefox para una mejor experiencia en la navegaci&oacute;n");
		document.open();
		document.write('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> Este Navegador <strong>no soporta</strong> Notificaciones en el Escritorio , le recomendamos usar <strong><a href="https://www.google.com/chrome/browser/desktop/" target="_blank" class="alert-link">Google Chrome</a></strong> o <strong><a href="https://www.mozilla.org/en-US/firefox/new/" target="_blank" class="alert-link">Firefox</a></strong> para una mejor experiencia en la navegaci&oacute;n<p>o puede descargar la siguiente <a href="http://ukot.github.io/ie_web_notifications/" target="_blank" class="alert-link">aplicaci&oacute;n</a> para emular el soporte en Internet Explorer de las <strong>notificaciones</strong> en el escritorio</p></div>');
		document.close();
	// Let's check if the user is okay to get some notification
	} else if (Notification.permission !== 'denied') {
// 		alert(Notification.permission);
		Notification.requestPermission()
	} else if (Notification.permission === 'denied') {
// 		Notification.permission = 'default';
		document.open();
		document.write('<div class="alert alert-warning"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Este sitio esta bloqueado para mostrar <strong >Notificaciones de Escritorio</strong> si desea activarlas nuevamente haga click en la siguiente <a href="https://support.google.com/chrome/answer/3220216?hl=es-Mx" target="_blank" class="alert-link">liga</a> para Chorme y &eacute;sta <a href="https://support.mozilla.org/en-US/questions/997362" target="_blank" class="alert-link">liga</a> para Firefox d&oacute;nde se describe como activarlas nuevamente</div>');
		document.close();
// 		alert(Notification.permission);
// 		<a href="javascript:void(0)" onclick="Notification.requestPermission()" class="alert-link">liga</a>
	}