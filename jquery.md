# JQuery

Essendo una libreria per JavaScript

Sintassi generale
```javascript
$("selector").action();
```

- $ sign to define/access jQuery
- (selector) to "query (or find)" HTML elements
- jQuery action() to be performed on the element(s)

Tutti gli script o i metodi in jQuery vanno messi all'interno di

```javascript	
$(document).ready(function(){

// jQuery methods go here...

});
```

Le funzioni di JQuery, una volta selezionato l'ememento nel selettore, per eseguire un azione, usano dei modificatori, degli eventi, come .click, .onblur, .onmouseover...