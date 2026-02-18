// Tämä on js koodi jonka avulla hinnasto on editable eli tekstiä voi muuttaa hinnastoa tuplaklikkaamalla
// Toimivuudesta ei vielä tarkkaa tietoa ja hinnaston tablen id pitää luultavasti muuttaa vielä classiksi


var lista = {
  // EDIT CELL
  ccell : null,
  cval : null,
  edit : cell => {

    // "SAVE" SELECTED CELL
    editable.ccell = cell;
    editable.cval = cell.innerHTML;

    // SET EDITABLE
    cell.classList.add("edit");
    cell.contentLista = true;
    cell.focus();

    // LISTEN TO END EDIT
    cell.onblur = lista.done;
    cell.onkeydown = e => {
      if (e.key=="Enter") { lista.done(); }
      if (e.key=="Escape") { lista.done(1); }
    };
  },

  // EXIT EDIT CELL
  done : discard => {
    // REMOVE LISTENERS
    lista.ccell.onblur = "";
    lista.ccell.onkeydown = "";

   // STOP EDIT
    lista.ccell.classList.remove("edit");
    lista.ccell.contentlista = false;

    // DISCARD CHANGES
    if (discard==1) { lista.ccell.innerHTML = lista.cval; }
    lista.cval = "";

    // DO WHATEVER YOU WANT
    if (lista.ccell.innerHTML != lista.cval) {
    // VALUE CHANGED
    console.log(lista.ccell.innerHTML);
    }
  }
};



// DOUBLE CLICK TO EDIT CELL
window.addEventListener("load", () => {
  for (let td of document.querySelectorAll("td.lista td")) {
    td.addEventListener("dblclick", () => {
      lista.edit(td);
    });
  }
});
